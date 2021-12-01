<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller
{

    //Konstruktor Untuk Controller 
    public function __construct()
    {
        parent::__construct();
        //Memuat Model Search
        $this->load->model('Search_model', 'search'); //load search_model as search
    }

    public function index()
    {
        // ambil data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');

            if ($data['keyword'] == '') {
                // jika keyword kosong
                $this->session->set_userdata('alert', '1');
                redirect(base_url());
            }

            $this->session->unset_userdata('alert');
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $data['arrKeyword'] = $this->olahKeyword($data['keyword']);
        $data['lowongan'] = $this->search->getLowongan($data['arrKeyword']);

        // jika kata kunci tidak ditemukan
        if (empty($data['lowongan'])) {
            $this->session->set_userdata('alert', '2');
            $this->session->set_userdata('keyword', $data['keyword']);
            redirect(base_url());
        } else {
            $this->session->unset_userdata('alert');

            // hitung nilai TF
            $data['nilai_tf'] = $this->fungsiHitungTF($data['lowongan'], $data['arrKeyword']);
            // hitung nilai IDF
            $data['total_rows'] = count($data['nilai_tf']);
            $data['nilai_idf'] = $this->fungsiHitungIDF($data['nilai_tf'], $data['arrKeyword']);
            // hitung nilai tf*idf
            $data['nilai_tfidf'] = $this->fungsiHitungTFIDF($data['nilai_tf'], $data['nilai_idf'], $data['arrKeyword']);

            $this->load->view('template/Header', $data);
            $this->load->view('search/Index', $data);
            $this->load->view('template/Footer');
        }
    }

    public function olahKeyword($Keyword = null)
    {
        $rawKeyword = explode(' ', $Keyword);

        // stem keyword
        $arrKeyword = array();
        foreach ($rawKeyword as $x) {
            // create nadar stemmer
            $stemmed = \Nadar\Stemming\Stemm::stem($x, 'en');

            // create sastrawi stemmer
            $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
            $stemmer  = $stemmerFactory->createStemmer();
            // stem
            $output   = $stemmer->stem($stemmed);

            // fungsi mengatasi kata yang sama pada keyword (double)
            if (array_search($output, $arrKeyword) === false) {
                array_push($arrKeyword, trim($output));
            }

            // mengecek keyword dan menambahkan jika null
            $this->search->cekKeyword($arrKeyword);
        }

        return $arrKeyword;
    }

    public function fungsiHitungTF($dataLowongan, $arrKeyword)
    {
        // hitung nilai TF
        $nilai_tf = array();
        foreach ($dataLowongan as $colLow) {
            // untuk setiap stem_detail
            $kalimat = $colLow['stem_detail'];
            $counter = array();

            $counter['id_tf'] = $colLow['id_lowongan'];
            $counter['title_tf'] = $colLow['title_lowongan'];
            $counter['link_tf'] = $colLow['link_lowongan'];

            $allTf = 0;
            foreach ($arrKeyword as $key) {
                $counter[$key] = substr_count($kalimat, $key);
                $allTf += $counter[$key];
            }
            $counter['total_tf'] = $allTf;

            // jika nilainya nol maka dihilangkan dari list
            if ($allTf != 0) {
                array_push($nilai_tf, $counter);
            }
        }

        // mensorting $nilai_tfidf descending
        $_tf = array_column($nilai_tf, 'total_tf');
        array_multisort($_tf, SORT_DESC, $nilai_tf);

        return $nilai_tf;
    }

    public function fungsiHitungIDF($nilai_tf, $arrKeyword)
    {
        $nilai_idf = array();
        foreach ($arrKeyword as $key) {
            $df['term'] = $key;

            $counterDF = 0;
            foreach ($nilai_tf as $tf) {
                if ($tf[$key] !== 0)
                    ++$counterDF;
            }
            $df['df'] = $counterDF;

            // count rows $nilai_tf
            $TotalRows = count($nilai_tf);

            if ($counterDF !== 0) {
                try {
                    $df['idf'] = log10($TotalRows / $counterDF);
                } catch (DivisionByZeroError $e) {
                    $df['idf'] = $e;
                }
            } else {
                $df['idf'] = $counterDF;
            }

            array_push($nilai_idf, $df);
        }

        return $nilai_idf;
    }

    public function fungsiHitungTFIDF($nilai_tf, $nilai_idf, $arrKeyword)
    {
        $nilai_tfidf = array();
        foreach ($nilai_tf as $tf) {
            $counter = array();

            $counter['id_tfidf'] = $tf['id_tf'];
            $counter['title_tfidf'] = $tf['title_tf'];
            $counter['link_tfidf'] = $tf['link_tf'];

            $allTfidf = 0;
            foreach ($arrKeyword as $key) {
                $tfidf = 0;
                foreach ($nilai_idf as $idf) {
                    // jika ada kata kunci null
                    if ($idf['term'] == $key) {
                        if (!empty($idf['idf'])) {
                            $tfidf = $idf['idf'] * $tf[$key];
                        } else {
                            $tfidf = 0;
                        }

                        $allTfidf = $allTfidf + $tfidf;
                    }
                }
                $counter[$key] = $tfidf;
            }
            $counter['total_tfidf'] = $allTfidf;

            array_push($nilai_tfidf, $counter);
        }

        // mensorting $nilai_tfidf descending
        $_tfidf = array_column($nilai_tfidf, 'total_tfidf');
        array_multisort($_tfidf, SORT_DESC, $nilai_tfidf);

        return $nilai_tfidf;
    }
}
