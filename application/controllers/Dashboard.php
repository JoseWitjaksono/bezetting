<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

public function __construct(){
parent::__construct();
header("Access-Control-Allow-Origin: *");
$this->load->model('Bezetting_m');
}

    public function index()
    {
        $data['main_view'] = 'dashboard_bezetting';
        $data['page_title'] = 'Dashboard';
        $data['reg'] = $this->uri->segment(3);
        $data['lvl'] = $this->uri->segment(4);

        if (!isset($data['reg'])) {
            $data['reg'] = 'ALL';
        }
        if (!isset($data['lvl'])) {
            $data['lvl'] = 'ALL';
        }
        if (isset($data['reg'])) {
            //$ARR_REG_ALL = array("WITEL JAKARTA(HO)","Regional SUMATERA","WITEL ACEH","WITEL BATAM","WITEL BENGKULU","WITEL JAMBI","WITEL LAMPUNG","WITEL MEDAN","WITEL PADANG","WITEL PALEMBANG","WITEL PANGKAL PINANG","WITEL PEKANBARU","WITEL PEMATANG SIANTAR","Regional JAKARTA","WITEL BEKASI","WITEL BOGOR","WITEL JAKARTA BARAT","WITEL JAKARTA PUSAT","WITEL JAKARTA SELATAN","WITEL JAKARTA TIMUR","WITEL JAKARTA UTARA","WITEL SERANG","WITEL TANGERANG","Regional JAWA BARAT","WITEL BANDUNG","WITEL BANDUNG BARAT","WITEL CIREBON","WITEL KARAWANG","WITEL SUKABUMI","WITEL TASIKMALAYA","Regional JAWA TENGAH","WITEL DI YOGYAKARTA","WITEL KUDUS","WITEL MAGELANG","WITEL PEKALONGAN","WITEL PURWOKERTO","WITEL SEMARANG","WITEL SOLO","Regional JAWA TIMUR BALINUSRA","WITEL DENPASAR","WITEL JEMBER","WITEL KEDIRI","WITEL KUPANG","WITEL MADIUN","WITEL MADURA","WITEL MALANG","WITEL MATARAM","WITEL PASURUAN","WITEL SIDOARJO","WITEL SINGARAJA","WITEL SURABAYA SELATAN","WITEL SURABAYA UTARA","Regional KALIMANTAN","WITEL BALIKPAPAN","WITEL BANJARMASIN","WITEL PALANGKARAYA","WITEL PONTIANAK","WITEL SAMARINDA","WITEL TARAKAN","Regional KTI","WITEL AMBON","WITEL GORONTALO","WITEL JAYAPURA","WITEL KENDARI","WITEL MAKASSAR","WITEL MANADO","WITEL PALU","WITEL PARE-PARE","WITEL SORONG");
            $ARR_REG_ALL = array('HO', 'SUMATERA', 'JAKARTA', 'JAWA BARAT', 'JAWA TENGAH', 'JAWA TIMUR BALINUSRA', 'KALIMANTAN', 'KTI');
            $ARR_REG_HO = array("WITEL JAKARTA(HO)");
            $ARR_REG_SUMATERA = array("Regional SUMATERA", "WITEL ACEH", "WITEL BATAM", "WITEL BENGKULU", "WITEL JAMBI", "WITEL LAMPUNG", "WITEL MEDAN", "WITEL PADANG", "WITEL PALEMBANG", "WITEL PANGKAL PINANG", "WITEL PEKANBARU", "WITEL PEMATANG SIANTAR");
            $ARR_REG_JAKARTA = array("Regional JAKARTA", "WITEL BEKASI", "WITEL BOGOR", "WITEL JAKARTA BARAT", "WITEL JAKARTA PUSAT", "WITEL JAKARTA SELATAN", "WITEL JAKARTA TIMUR", "WITEL JAKARTA UTARA", "WITEL SERANG", "WITEL TANGERANG");
            $ARR_REG_JAWA_BARAT = array("Regional JAWA BARAT", "WITEL BANDUNG", "WITEL BANDUNG BARAT", "WITEL CIREBON", "WITEL KARAWANG", "WITEL SUKABUMI", "WITEL TASIKMALAYA");
            $ARR_REG_JAWA_TENGAH = array("Regional JAWA TENGAH", "WITEL DI YOGYAKARTA", "WITEL KUDUS", "WITEL MAGELANG", "WITEL PEKALONGAN", "WITEL PURWOKERTO", "WITEL SEMARANG", "WITEL SOLO");
            $ARR_REG_JAWA_TIMUR = array("Regional JAWA TIMUR BALINUSRA", "WITEL DENPASAR", "WITEL JEMBER", "WITEL KEDIRI", "WITEL KUPANG", "WITEL MADIUN", "WITEL MADURA", "WITEL MALANG", "WITEL MATARAM", "WITEL PASURUAN", "WITEL SIDOARJO", "WITEL SINGARAJA", "WITEL SURABAYA SELATAN", "WITEL SURABAYA UTARA");
            $ARR_REG_KALIMANTAN = array("Regional KALIMANTAN", "WITEL BALIKPAPAN", "WITEL BANJARMASIN", "WITEL PALANGKARAYA", "WITEL PONTIANAK", "WITEL SAMARINDA", "WITEL TARAKAN");
            $ARR_REG_KTI = array("Regional KTI", "WITEL AMBON", "WITEL GORONTALO", "WITEL JAYAPURA", "WITEL KENDARI", "WITEL MAKASSAR", "WITEL MANADO", "WITEL PALU", "WITEL PARE-PARE", "WITEL SORONG");

            if ($data['lvl'] == 'bod1') {
                $map_lvl = "'GM/VP/PM', 'OSM'";
            } elseif ($data['lvl'] == 'mgr') {
                $map_lvl = "'Manager'";
            } elseif ($data['lvl'] == 'sm') {
                $map_lvl = "'Site Manager', 'Officer 1'";
            } elseif ($data['lvl'] == 'tl') {
                $map_lvl = "'Team Leader', 'Officer 2'";
            } elseif ($data['lvl'] == 'teknisi') {
                $map_lvl = "'Teknisi'";
            } elseif ($data['lvl'] == 'staff') {
                $map_lvl = "'Staff'";
            } elseif ($data['lvl'] == 'helpdesk') {
                $map_lvl = "'Helpdesk'";
            } elseif ($data['lvl'] == 'drafter') {
                $map_lvl = "'Drafter'";
            } elseif ($data['lvl'] == 'surveyor') {
                $map_lvl = "'Surveyor'";
            }

            $data['td'] = '';
            $data['td2'] = '';
            $data['td3'] = '';
            foreach (${'ARR_REG_' . $data['reg']} as $witel) {
                if ($data['reg'] == 'ALL') {
                    if ($data['lvl'] == 'ALL') {
                        $bezetting = $this->Bezetting_m->get_bezetting_regional($witel);
                    } else {
                        $bezetting = $this->Bezetting_m->get_bezetting_regional_level($witel, $map_lvl);
                    }
                } else {
                    if ($data['lvl'] == 'ALL') {
                        $bezetting = $this->Bezetting_m->get_bezetting_witel($witel);
                    } else {
                        $bezetting = $this->Bezetting_m->get_bezetting_witel_level($witel, $map_lvl);
                    }
                }
                if(!empty($bezetting)) {
                    foreach ($bezetting as $key => $item) {
                        if ($key < 1) {
                            if ($data['reg'] == 'ALL') {
                                $new_witel = 'REG ' . $witel;
                            } else {
                                $new_witel = $item->WITEL;
                            }
                            $data['td'] .= '<tr>';
                            $data['td'] .= '<th class="tg-5h8a" style="min-width: 200px">' . $new_witel . '</th>';
                            $data['td2'] .= '<tr>';
                            $data['td2'] .= '<th class="tg-5h8a" style="min-width: 200px">' . $new_witel . '</th>';
                            $data['td3'] .= '<tr>';
                            $data['td3'] .= '<th class="tg-5h8a" style="width: 20%">' . $new_witel . '</th>';
                        }
                        if ($item->group_fungsi_2 == 'I-OAN') {
                            $ioan_formasi = $item->FORMASI;
                            $ioan_isi = $item->ISI;
                            $ioan_gap = $item->GAP;
                            $ioan_nfo = $item->NFO;
                        } else if ($item->group_fungsi_2 == 'MO SPBU') {
                            $spbu_formasi = $item->FORMASI;
                            $spbu_isi = $item->ISI;
                            $spbu_gap = $item->GAP;
                            $spbu_nfo = $item->NFO;
                        } else if ($item->group_fungsi_2 == 'MS NTE') {
                            $nte_formasi = $item->FORMASI;
                            $nte_isi = $item->ISI;
                            $nte_gap = $item->GAP;
                            $nte_nfo = $item->NFO;
                        } else if ($item->group_fungsi_2 == 'PROVISIONING BGES') {
                            $prov_bges_formasi = $item->FORMASI;
                            $prov_bges_isi = $item->ISI;
                            $prov_bges_gap = $item->GAP;
                            $prov_bges_nfo = $item->NFO;
                        } else if ($item->group_fungsi_2 == 'PROVISIONING WIBS') {
                            $prov_wibs_formasi = $item->FORMASI;
                            $prov_wibs_isi = $item->ISI;
                            $prov_wibs_gap = $item->GAP;
                            $prov_wibs_nfo = $item->NFO;
                        } else if ($item->group_fungsi_2 == 'SDI') {
                            $sdi_formasi = $item->FORMASI;
                            $sdi_isi = $item->ISI;
                            $sdi_gap = $item->GAP;
                            $sdi_nfo = $item->NFO;
                        } else if ($item->group_fungsi_2 == 'TDM') {
                            $tdm_formasi = $item->FORMASI;
                            $tdm_isi = $item->ISI;
                            $tdm_gap = $item->GAP;
                            $tdm_nfo = $item->NFO;
                        } else if ($item->group_fungsi_2 == 'TDS 1') {
                            $tds_formasi = $item->FORMASI;
                            $tds_isi = $item->ISI;
                            $tds_gap = $item->GAP;
                            $tds_nfo = $item->NFO;
                        } else if ($item->group_fungsi_2 == 'BOD') {
                            $bod_formasi = $item->FORMASI;
                            $bod_isi = $item->ISI;
                            $bod_gap = $item->GAP;
                            $bod_nfo = $item->NFO;
                        } else if ($item->group_fungsi_2 == 'CORP. OFFICE') {
                            $corp_formasi = $item->FORMASI;
                            $corp_isi = $item->ISI;
                            $corp_gap = $item->GAP;
                            $corp_nfo = $item->NFO;
                        } else if ($item->group_fungsi_2 == 'SQM') {
                            $sqm_formasi = $item->FORMASI;
                            $sqm_isi = $item->ISI;
                            $sqm_gap = $item->GAP;
                            $sqm_nfo = $item->NFO;
                        } else if ($item->group_fungsi_2 == 'CONSTRUCTION') {
                            $cons_formasi = $item->FORMASI;
                            $cons_isi = $item->ISI;
                            $cons_gap = $item->GAP;
                            $cons_nfo = $item->NFO;
                        } else if ($item->group_fungsi_2 == 'FINANCE') {
                            $fin_formasi = $item->FORMASI;
                            $fin_isi = $item->ISI;
                            $fin_gap = $item->GAP;
                            $fin_nfo = $item->NFO;
                        } else if ($item->group_fungsi_2 == 'HCM & STRATEGY') {
                            $hcm_formasi = $item->FORMASI;
                            $hcm_isi = $item->ISI;
                            $hcm_gap = $item->GAP;
                            $hcm_nfo = $item->NFO;
                        } else if ($item->group_fungsi_2 == 'IT') {
                            $it_formasi = $item->FORMASI;
                            $it_isi = $item->ISI;
                            $it_gap = $item->GAP;
                            $it_nfo = $item->NFO;
                        } else if ($item->group_fungsi_2 == 'OPERATION') {
                            $ops_formasi = $item->FORMASI;
                            $ops_isi = $item->ISI;
                            $ops_gap = $item->GAP;
                            $ops_nfo = $item->NFO;
                        } else if ($item->group_fungsi_2 == 'PROVISIONING') {
                            $prov_formasi = $item->FORMASI;
                            $prov_isi = $item->ISI;
                            $prov_gap = $item->GAP;
                            $prov_nfo = $item->NFO;
                        } else if ($item->group_fungsi_2 == 'QE & GAMAS') {
                            $qe_formasi = $item->FORMASI;
                            $qe_isi = $item->ISI;
                            $qe_gap = $item->GAP;
                            $qe_nfo = $item->NFO;
                        } else if ($item->group_fungsi_2 == 'SNC') {
                            $snc_formasi = $item->FORMASI;
                            $snc_isi = $item->ISI;
                            $snc_gap = $item->GAP;
                            $snc_nfo = $item->NFO;
                        } else if ($item->group_fungsi_2 == 'INTEGRASI SPBU') {
                            $int_spbu_formasi = $item->FORMASI;
                            $int_spbu_isi = $item->ISI;
                            $int_spbu_gap = $item->GAP;
                            $int_spbu_nfo = $item->NFO;
                        } else if ($item->group_fungsi_2 == 'TDS 2') {
                            $tds_2_formasi = $item->FORMASI;
                            $tds_2_isi = $item->ISI;
                            $tds_2_gap = $item->GAP;
                            $tds_2_nfo = $item->NFO;
                        }
                    }
                }
                error_reporting(0);
                $headcount_formasi = $ioan_formasi + $spbu_formasi + $nte_formasi + $prov_bges_formasi + $prov_wibs_formasi + $sdi_formasi + $tdm_formasi + $tds_formasi;
                $headcount_isi = $ioan_isi + $spbu_isi + $nte_isi + $prov_bges_isi + $prov_wibs_isi + $sdi_isi + $tdm_isi + $tds_isi;
                $headcount_gap = $ioan_gap + $spbu_gap + $nte_gap + $prov_bges_gap + $prov_wibs_gap + $sdi_gap + $tdm_gap + $tds_gap;
                $headcount_nfo = $ioan_nfo + $spbu_nfo + $nte_nfo + $prov_bges_nfo + $prov_wibs_nfo + $sdi_nfo + $tdm_nfo + $tds_nfo;
                $non_headcount_formasi = $bod_formasi + $corp_formasi + $sqm_formasi + $cons_formasi + $fin_formasi + $hcm_formasi + $it_formasi + $ops_formasi + $prov_formasi + $qe_formasi + $snc_formasi + $int_spbu_formasi + $tds_formasi;
                $non_headcount_isi = $bod_isi + $corp_isi + $sqm_isi + $cons_isi + $fin_isi + $hcm_isi + $it_isi + $ops_isi + $prov_isi + $qe_isi + $snc_isi + $int_spbu_isi + $tds_isi;
                $non_headcount_gap = $bod_gap + $corp_gap + $sqm_gap + $cons_gap + $fin_gap + $hcm_gap + $it_gap + $ops_gap + $prov_gap + $qe_gap + $snc_gap + $int_spbu_gap + $tds_gap;
                $non_headcount_nfo = $bod_nfo + $corp_nfo + $sqm_nfo + $cons_nfo + $fin_nfo + $hcm_nfo + $it_nfo + $ops_nfo + $prov_nfo + $qe_nfo + $snc_nfo + $int_spbu_nfo + $tds_nfo;
                $all_formasi = $headcount_formasi + $non_headcount_formasi;
                $all_isi = $headcount_isi + $non_headcount_isi;
                $all_gap = $headcount_gap + $non_headcount_gap;
                $all_nfo = $headcount_nfo + $non_headcount_nfo;
                error_reporting(1);
                // TR HEADCOUNT

                $data['td'] .= '
                <td onclick="getColumn(\'formasi\', \'I-OAN\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($ioan_formasi) ? $ioan_formasi : "-") . '</td>
                <td onclick="getColumn(\'isi\', \'I-OAN\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($ioan_isi) ? $ioan_isi : "-") . '</td>
                <td onclick="getColumn(\'gap\', \'I-OAN\',\'' . $new_witel . '\')" class="tg-' . (!empty($ioan_gap) ? 'x1q5' : "2bvr") . '">' . (!empty($ioan_gap) ? $ioan_gap : "-") . '</td>
                <td onclick="getColumn(\'nfo\', \'I-OAN\',\'' . $new_witel . '\')" class="tg-' . (!empty($ioan_nfo) ? 'x1q5' : "2bvr") . '">' . (!empty($ioan_nfo) ? $ioan_nfo : "-") . '</td>
                <td class="tg-2bvr">' . (!empty($ioan_isi) ? round($ioan_isi / $ioan_formasi * 100) : "0") . ' %</td>
                <td onclick="getColumn(\'formasi\', \'MO SPBU\',\'' . $new_witel . '\')" class="tg-x1q4">' . (!empty($spbu_formasi) ? $spbu_formasi : "-") . '</td>
                <td onclick="getColumn(\'isi\', \'MO SPBU\',\'' . $new_witel . '\')" class="tg-x1q4">' . (!empty($spbu_isi) ? $spbu_isi : "-") . '</td>
                <td onclick="getColumn(\'gap\', \'MO SPBU\',\'' . $new_witel . '\')" class="tg-' . (!empty($spbu_gap) ? 'x1q5' : "x1q4") . '">' . (!empty($spbu_gap) ? $spbu_gap : "-") . '</td>
                <td onclick="getColumn(\'nfo\', \'MO SPBU\',\'' . $new_witel . '\')" class="tg-' . (!empty($spbu_nfo) ? 'x1q5' : "x1q4") . '">' . (!empty($spbu_nfo) ? $spbu_nfo : "-") . '</td>
                <td class="tg-x1q4">' . (!empty($ioan_isi) ? round($ioan_isi / $ioan_formasi * 100) : "0") . ' %</td>
                <td onclick="getColumn(\'formasi\', \'MS NTE\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($nte_formasi) ? $nte_formasi : "-") . '</td>
                <td onclick="getColumn(\'isi\', \'MS NTE\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($nte_isi) ? $nte_isi : "-") . '</td>
                <td onclick="getColumn(\'gap\', \'MS NTE\',\'' . $new_witel . '\')" class="tg-' . (!empty($nte_gap) ? 'x1q5' : "2bvr") . '">' . (!empty($nte_gap) ? $nte_gap : "-") . '</td>
                <td onclick="getColumn(\'nfo\', \'MS NTE\',\'' . $new_witel . '\')" class="tg-' . (!empty($nte_nfo) ? 'x1q5' : "2bvr") . '">' . (!empty($nte_nfo) ? $nte_nfo : "-") . '</td>
                <td  class="tg-2bvr">' . (!empty($nte_isi) ? round($nte_isi / $nte_formasi * 100) : "0") . ' %</td>
                <td onclick="getColumn(\'formasi\', \'PROVISIONING BGES\',\'' . $new_witel . '\')" class="tg-x1q4">' . (!empty($prov_bges_formasi) ? $prov_bges_formasi : "-") . '</td>
                <td onclick="getColumn(\'isi\', \'PROVISIONING BGES\',\'' . $new_witel . '\')" class="tg-x1q4">' . (!empty($prov_bges_isi) ? $prov_bges_isi : "-") . '</td>
                <td onclick="getColumn(\'gap\', \'PROVISIONING BGES\',\'' . $new_witel . '\')" class="tg-' . (!empty($prov_bges_gap) ? 'x1q5' : "x1q4") . '">' . (!empty($prov_bges_gap) ? $prov_bges_gap : "-") . '</td>
                <td onclick="getColumn(\'nfo\', \'PROVISIONING BGES\',\'' . $new_witel . '\')" class="tg-' . (!empty($prov_bges_nfo) ? 'x1q5' : "x1q4") . '">' . (!empty($prov_bges_nfo) ? $prov_bges_nfo : "-") . '</td>
                <td  class="tg-x1q4">' . (!empty($prov_bges_isi) ? round($prov_bges_isi / $prov_bges_formasi * 100) : "0") . ' %</td>
                <td onclick="getColumn(\'formasi\', \'PROVISIONING WIBS\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($prov_wibs_formasi) ? $prov_wibs_formasi : "-") . '</td>
                <td onclick="getColumn(\'isi\', \'PROVISIONING WIBS\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($prov_wibs_isi) ? $prov_wibs_isi : "-") . '</td>
                <td onclick="getColumn(\'gap\', \'PROVISIONING WIBS\',\'' . $new_witel . '\')" class="tg-' . (!empty($prov_wibs_gap) ? 'x1q5' : "2bvr") . '">' . (!empty($prov_wibs_gap) ? $prov_wibs_gap : "-") . '</td>
                <td onclick="getColumn(\'nfo\', \'PROVISIONING WIBS\',\'' . $new_witel . '\')" class="tg-' . (!empty($prov_wibs_nfo) ? 'x1q5' : "2bvr") . '">' . (!empty($prov_wibs_nfo) ? $prov_wibs_nfo : "-") . '</td>
                <td  class="tg-2bvr">' . (!empty($prov_wibs_isi) ? round($prov_wibs_isi / $prov_wibs_formasi * 100) : "0") . ' %</td>
                <td onclick="getColumn(\'formasi\', \'SDI\',\'' . $new_witel . '\')" class="tg-x1q4">' . (!empty($sdi_formasi) ? $sdi_formasi : "-") . '</td>
                <td onclick="getColumn(\'isi\', \'SDI\',\'' . $new_witel . '\')" class="tg-x1q4">' . (!empty($sdi_isi) ? $sdi_isi : "-") . '</td>
                <td onclick="getColumn(\'gap\', \'SDI\',\'' . $new_witel . '\')" class="tg-' . (!empty($sdi_gap) ? 'x1q5' : "x1q4") . '">' . (!empty($sdi_gap) ? $sdi_gap : "-") . '</td>
                <td onclick="getColumn(\'nfo\', \'SDI\',\'' . $new_witel . '\')" class="tg-' . (!empty($sdi_nfo) ? 'x1q5' : "x1q4") . '">' . (!empty($sdi_nfo) ? $sdi_nfo : "-") . '</td>
                <td  class="tg-x1q4">' . (!empty($sdi_isi) ? round($sdi_isi / $sdi_formasi * 100) : "0") . ' %</td>
                <td onclick="getColumn(\'formasi\', \'TDM\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($tdm_formasi) ? $tdm_formasi : "-") . '</td>
                <td onclick="getColumn(\'isi\', \'TDM\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($tdm_isi) ? $tdm_isi : "-") . '</td>
                <td onclick="getColumn(\'gap\', \'TDM\',\'' . $new_witel . '\')" class="tg-' . (!empty($tdm_gap) ? 'x1q5' : "2bvr") . '">' . (!empty($tdm_gap) ? $tdm_gap : "-") . '</td>
                <td onclick="getColumn(\'nfo\', \'TDM\',\'' . $new_witel . '\')" class="tg-' . (!empty($tdm_nfo) ? 'x1q5' : "2bvr") . '">' . (!empty($tdm_nfo) ? $tdm_nfo : "-") . '</td>
                <td  class="tg-2bvr">' . (!empty($tdm_isi) ? round($tdm_isi / $tdm_formasi * 100) : "0") . ' %</td>
                <td onclick="getColumn(\'formasi\', \'TDS\',\'' . $new_witel . '\')" class="tg-x1q4">' . (!empty($tds_formasi) ? $tds_formasi : "-") . '</td>
                <td onclick="getColumn(\'isi\', \'TDS\',\'' . $new_witel . '\')" class="tg-x1q4">' . (!empty($tds_isi) ? $tds_isi : "-") . '</td>
                <td onclick="getColumn(\'gap\', \'TDS\',\'' . $new_witel . '\')" class="tg-' . (!empty($tds_gap) ? 'x1q5' : "x1q4") . '">' . (!empty($tds_gap) ? $tds_gap : "-") . '</td>
                <td onclick="getColumn(\'nfo\', \'TDS\',\'' . $new_witel . '\')" class="tg-' . (!empty($tds_nfo) ? 'x1q5' : "x1q4") . '">' . (!empty($tds_nfo) ? $tds_nfo : "-") . '</td>
                <td  class="tg-x1q4">' . (!empty($tds_isi) ? round($tds_isi / $tds_formasi * 100) : "0") . ' %</td>
                <td onclick="getColumn(\'formasi\', \'HEADCOUNT\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($headcount_formasi) ? $headcount_formasi : "-") . '</td>
                <td onclick="getColumn(\'isi\', \'HEADCOUNT\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($headcount_isi) ? $headcount_isi : "-") . '</td>
                <td onclick="getColumn(\'gap\', \'HEADCOUNT\',\'' . $new_witel . '\')" class="tg-' . (!empty($headcount_gap) ? 'x1q5' : "2bvr") . '">' . (!empty($headcount_gap) ? $headcount_gap : "-") . '</td>
                <td onclick="getColumn(\'nfo\', \'HEADCOUNT\',\'' . $new_witel . '\')" class="tg-' . (!empty($headcount_nfo) ? 'x1q5' : "2bvr") . '">' . (!empty($headcount_nfo) ? $headcount_nfo : "-") . '</td>
                <td  class="tg-2bvr">' . (!empty($headcount_isi) ? round($headcount_isi / $headcount_formasi * 100) : "0") . ' %</td>
            ';

                // END TR HEADCOUNT

                // TR NON HEADCOUNT

                $data['td2'] .= '
                <td onclick="getColumn(\'formasi\', \'BOD\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($bod_formasi) ? $bod_formasi : "-") . '</td>
                <td onclick="getColumn(\'isi\', \'BOD\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($bod_isi) ? $bod_isi : "-") . '</td>
                <td onclick="getColumn(\'gap\', \'BOD\',\'' . $new_witel . '\')" class="tg-' . (!empty($bod_gap) ? 'x1q5' : "2bvr") . '">' . (!empty($bod_gap) ? $bod_gap : "-") . '</td>
                <td onclick="getColumn(\'nfo\', \'BOD\',\'' . $new_witel . '\')" class="tg-' . (!empty($bod_nfo) ? 'x1q5' : "2bvr") . '">' . (!empty($bod_nfo) ? $bod_nfo : "-") . '</td>
                <td  class="tg-2bvr">' . (!empty($bod_isi) ? round($bod_isi / $bod_formasi * 100) : "0") . ' %</td>
                <td onclick="getColumn(\'formasi\', \'CORP. OFFICE\',\'' . $new_witel . '\')" class="tg-x1q4">' . (!empty($corp_formasi) ? $corp_formasi : "-") . '</td>
                <td onclick="getColumn(\'isi\', \'CORP. OFFICE\',\'' . $new_witel . '\')" class="tg-x1q4">' . (!empty($corp_isi) ? $corp_isi : "-") . '</td>
                <td onclick="getColumn(\'gap\', \'CORP. OFFICE\',\'' . $new_witel . '\')" class="tg-' . (!empty($corp_gap) ? 'x1q5' : "x1q4") . '">' . (!empty($corp_gap) ? $corp_gap : "-") . '</td>
                <td onclick="getColumn(\'nfo\', \'CORP. OFFICE\',\'' . $new_witel . '\')" class="tg-' . (!empty($corp_nfo) ? 'x1q5' : "x1q4") . '">' . (!empty($corp_nfo) ? $corp_nfo : "-") . '</td>
                <td  class="tg-x1q4">' . (!empty($corp_isi) ? round($corp_isi / $corp_formasi * 100) : "0") . ' %</td>
                <td onclick="getColumn(\'formasi\', \'SQM\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($sqm_formasi) ? $sqm_formasi : "-") . '</td>
                <td onclick="getColumn(\'isi\', \'SQM\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($sqm_isi) ? $sqm_isi : "-") . '</td>
                <td onclick="getColumn(\'gap\', \'SQM\',\'' . $new_witel . '\')" class="tg-' . (!empty($sqm_gap) ? 'x1q5' : "2bvr") . '">' . (!empty($sqm_gap) ? $sqm_gap : "-") . '</td>
                <td onclick="getColumn(\'nfo\', \'SQM\',\'' . $new_witel . '\')" class="tg-' . (!empty($sqm_nfo) ? 'x1q5' : "2bvr") . '">' . (!empty($sqm_nfo) ? $sqm_nfo : "-") . '</td>
                <td  class="tg-2bvr">' . (!empty($sqm_isi) ? round($sqm_isi / $sqm_formasi * 100) : "0") . ' %</td>
                <td onclick="getColumn(\'formasi\', \'CONSTRUCTION\',\'' . $new_witel . '\')" class="tg-x1q4">' . (!empty($cons_formasi) ? $cons_formasi : "-") . '</td>
                <td onclick="getColumn(\'isi\', \'CONSTRUCTION\',\'' . $new_witel . '\')" class="tg-x1q4">' . (!empty($cons_isi) ? $cons_isi : "-") . '</td>
                <td onclick="getColumn(\'gap\', \'CONSTRUCTION\',\'' . $new_witel . '\')" class="tg-' . (!empty($cons_gap) ? 'x1q5' : "x1q4") . '">' . (!empty($cons_gap) ? $cons_gap : "-") . '</td>
                <td onclick="getColumn(\'nfo\', \'CONSTRUCTION\',\'' . $new_witel . '\')" class="tg-' . (!empty($cons_nfo) ? 'x1q5' : "x1q4") . '">' . (!empty($cons_nfo) ? $cons_nfo : "-") . '</td>
                <td  class="tg-x1q4">' . (!empty($cons_isi) ? round($cons_isi / $cons_formasi * 100) : "0") . ' %</td>
                <td onclick="getColumn(\'formasi\', \'FINANCE\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($fin_formasi) ? $fin_formasi : "-") . '</td>
                <td onclick="getColumn(\'isi\', \'FINANCE\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($fin_isi) ? $fin_isi : "-") . '</td>
                <td onclick="getColumn(\'gap\', \'FINANCE\',\'' . $new_witel . '\')" class="tg-' . (!empty($fin_gap) ? 'x1q5' : "2bvr") . '">' . (!empty($fin_gap) ? $fin_gap : "-") . '</td>
                <td onclick="getColumn(\'nfo\', \'FINANCE\',\'' . $new_witel . '\')" class="tg-' . (!empty($fin_nfo) ? 'x1q5' : "2bvr") . '">' . (!empty($fin_nfo) ? $fin_nfo : "-") . '</td>
                <td  class="tg-2bvr">' . (!empty($fin_isi) ? round($fin_isi / $fin_formasi * 100) : "0") . ' %</td>
                <td onclick="getColumn(\'formasi\', \'HCM & STRATEGY\',\'' . $new_witel . '\')" class="tg-x1q4">' . (!empty($hcm_formasi) ? $hcm_formasi : "-") . '</td>
                <td onclick="getColumn(\'isi\', \'HCM & STRATEGY\',\'' . $new_witel . '\')" class="tg-x1q4">' . (!empty($hcm_isi) ? $hcm_isi : "-") . '</td>
                <td onclick="getColumn(\'gap\', \'HCM & STRATEGY\',\'' . $new_witel . '\')" class="tg-' . (!empty($hcm_gap) ? 'x1q5' : "x1q4") . '">' . (!empty($hcm_gap) ? $hcm_gap : "-") . '</td>
                <td onclick="getColumn(\'nfo\', \'HCM & STRATEGY\',\'' . $new_witel . '\')" class="tg-' . (!empty($hcm_nfo) ? 'x1q5' : "x1q4") . '">' . (!empty($hcm_nfo) ? $hcm_nfo : "-") . '</td>
                <td  class="tg-x1q4">' . (!empty($hcm_isi) ? round($hcm_isi / $hcm_formasi * 100) : "0") . ' %</td>
                <td onclick="getColumn(\'formasi\', \'IT\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($it_formasi) ? $it_formasi : "-") . '</td>
                <td onclick="getColumn(\'isi\', \'IT\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($it_isi) ? $it_isi : "-") . '</td>
                <td onclick="getColumn(\'gap\', \'IT\',\'' . $new_witel . '\')" class="tg-' . (!empty($it_gap) ? 'x1q5' : "2bvr") . '">' . (!empty($it_gap) ? $it_gap : "-") . '</td>
                <td onclick="getColumn(\'nfo\', \'IT\',\'' . $new_witel . '\')" class="tg-' . (!empty($it_nfo) ? 'x1q5' : "2bvr") . '">' . (!empty($it_nfo) ? $it_nfo : "-") . '</td>
                <td  class="tg-2bvr">' . (!empty($it_isi) ? round($it_isi / $it_formasi * 100) : "0") . ' %</td>
                <td onclick="getColumn(\'formasi\', \'OPERATION\',\'' . $new_witel . '\')" class="tg-x1q4">' . (!empty($ops_formasi) ? $ops_formasi : "-") . '</td>
                <td onclick="getColumn(\'isi\', \'OPERATION\',\'' . $new_witel . '\')" class="tg-x1q4">' . (!empty($ops_isi) ? $ops_isi : "-") . '</td>
                <td onclick="getColumn(\'gap\', \'OPERATION\',\'' . $new_witel . '\')" class="tg-' . (!empty($ops_gap) ? 'x1q5' : "x1q4") . '">' . (!empty($ops_gap) ? $ops_gap : "-") . '</td>
                <td onclick="getColumn(\'nfo\', \'OPERATION\',\'' . $new_witel . '\')" class="tg-' . (!empty($ops_nfo) ? 'x1q5' : "x1q4") . '">' . (!empty($ops_nfo) ? $ops_nfo : "-") . '</td>
                <td  class="tg-x1q4">' . (!empty($ops_isi) ? round($ops_isi / $ops_formasi * 100) : "0") . ' %</td>
                <td onclick="getColumn(\'formasi\', \'PROVISIONING\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($prov_formasi) ? $prov_formasi : "-") . '</td>
                <td onclick="getColumn(\'isi\', \'PROVISIONING\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($prov_isi) ? $prov_isi : "-") . '</td>
                <td onclick="getColumn(\'gap\', \'PROVISIONING\',\'' . $new_witel . '\')" class="tg-' . (!empty($prov_gap) ? 'x1q5' : "2bvr") . '">' . (!empty($prov_gap) ? $prov_gap : "-") . '</td>
                <td onclick="getColumn(\'nfo\', \'PROVISIONING\',\'' . $new_witel . '\')" class="tg-' . (!empty($prov_nfo) ? 'x1q5' : "2bvr") . '">' . (!empty($prov_nfo) ? $prov_nfo : "-") . '</td>
                <td  class="tg-2bvr">' . (!empty($prov_isi) ? round($prov_isi / $prov_formasi * 100) : "0") . ' %</td>
                <td onclick="getColumn(\'formasi\', \'QE & GAMAS\',\'' . $new_witel . '\')" class="tg-x1q4">' . (!empty($qe_formasi) ? $qe_formasi : "-") . '</td>
                <td onclick="getColumn(\'isi\', \'QE & GAMAS\',\'' . $new_witel . '\')" class="tg-x1q4">' . (!empty($qe_isi) ? $qe_isi : "-") . '</td>
                <td onclick="getColumn(\'gap\', \'QE & GAMAS\',\'' . $new_witel . '\')" class="tg-' . (!empty($qe_gap) ? 'x1q5' : "x1q4") . '">' . (!empty($qe_gap) ? $qe_gap : "-") . '</td>
                <td onclick="getColumn(\'nfo\', \'QE & GAMAS\',\'' . $new_witel . '\')" class="tg-' . (!empty($qe_nfo) ? 'x1q5' : "x1q4") . '">' . (!empty($qe_nfo) ? $qe_nfo : "-") . '</td>
                <td  class="tg-x1q4">' . (!empty($qe_isi) ? round($qe_isi / $qe_formasi * 100) : "0") . ' %</td>
                <td onclick="getColumn(\'formasi\', \'SNC\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($snc_formasi) ? $snc_formasi : "-") . '</td>
                <td onclick="getColumn(\'isi\', \'SNC\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($snc_isi) ? $snc_isi : "-") . '</td>
                <td onclick="getColumn(\'gap\', \'SNC\',\'' . $new_witel . '\')" class="tg-' . (!empty($snc_gap) ? 'x1q5' : "2bvr") . '">' . (!empty($snc_gap) ? $snc_gap : "-") . '</td>
                <td onclick="getColumn(\'nfo\', \'SNC\',\'' . $new_witel . '\')" class="tg-' . (!empty($snc_nfo) ? 'x1q5' : "2bvr") . '">' . (!empty($snc_nfo) ? $snc_nfo : "-") . '</td>
                <td  class="tg-2bvr">' . (!empty($snc_isi) ? round($snc_isi / $snc_formasi * 100) : "0") . ' %</td>
                <td onclick="getColumn(\'formasi\', \'INTEGRASI SPBU\',\'' . $new_witel . '\')" class="tg-x1q4">' . (!empty($int_spbu_formasi) ? $int_spbu_formasi : "-") . '</td>
                <td onclick="getColumn(\'isi\', \'INTEGRASI SPBU\',\'' . $new_witel . '\')" class="tg-x1q4">' . (!empty($int_spbu_isi) ? $int_spbu_isi : "-") . '</td>
                <td onclick="getColumn(\'gap\', \'INTEGRASI SPBU\',\'' . $new_witel . '\')" class="tg-' . (!empty($int_spbu_gap) ? 'x1q5' : "x1q4") . '">' . (!empty($int_spbu_gap) ? $int_spbu_gap : "-") . '</td>
                <td onclick="getColumn(\'nfo\', \'INTEGRASI SPBU\',\'' . $new_witel . '\')" class="tg-' . (!empty($int_spbu_nfo) ? 'x1q5' : "x1q4") . '">' . (!empty($int_spbu_nfo) ? $int_spbu_nfo : "-") . '</td>
                <td  class="tg-x1q4">' . (!empty($int_spbu_isi) ? round($int_spbu_isi / $int_spbu_formasi * 100) : "0") . ' %</td>
                <td onclick="getColumn(\'formasi\', \'TDS 2\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($tds_2_formasi) ? $tds_2_formasi : "-") . '</td>
                <td onclick="getColumn(\'isi\', \'TDS 2\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($tds_2_isi) ? $tds_2_isi : "-") . '</td>
                <td onclick="getColumn(\'gap\', \'TDS 2\',\'' . $new_witel . '\')" class="tg-' . (!empty($tds_2_gap) ? 'x1q5' : "2bvr") . '">' . (!empty($tds_2_gap) ? $tds_2_gap : "-") . '</td>
                <td onclick="getColumn(\'nfo\', \'TDS 2\',\'' . $new_witel . '\')" class="tg-' . (!empty($tds_2_nfo) ? 'x1q5' : "2bvr") . '">' . (!empty($tds_2_nfo) ? $tds_2_nfo : "-") . '</td>
                <td  class="tg-2bvr">' . (!empty($tds_2_isi) ? round($tds_2_isi / $tds_2_formasi * 100) : "0") . ' %</td>
                <td onclick="getColumn(\'formasi\', \'NON HEADCOUNT\',\'' . $new_witel . '\')" class="tg-x1q4">' . (!empty($non_headcount_formasi) ? $non_headcount_formasi : "-") . '</td>
                <td onclick="getColumn(\'isi\', \'NON HEADCOUNT\',\'' . $new_witel . '\')" class="tg-x1q4">' . (!empty($non_headcount_isi) ? $non_headcount_isi : "-") . '</td>
                <td onclick="getColumn(\'gap\', \'NON HEADCOUNT\',\'' . $new_witel . '\')" class="tg-' . (!empty($non_headcount_gap) ? 'x1q5' : "x1q4") . '">' . (!empty($non_headcount_gap) ? $non_headcount_gap : "-") . '</td>
                <td onclick="getColumn(\'nfo\', \'NON HEADCOUNT\',\'' . $new_witel . '\')" class="tg-' . (!empty($non_headcount_nfo) ? 'x1q5' : "x1q4") . '">' . (!empty($non_headcount_nfo) ? $non_headcount_nfo : "-") . '</td>
                <td  class="tg-x1q4">' . (!empty($non_headcount_isi) ? round($non_headcount_isi / $non_headcount_formasi * 100) : "0") . ' %</td>         
            ';

                // END TR NON HEADCOUNT

                // TR ALL

                $data['td3'] .= '
                <td onclick="getColumn(\'formasi\', \'HEADCOUNT\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($headcount_formasi) ? $headcount_formasi : "-") . '</td>
                <td onclick="getColumn(\'isi\', \'HEADCOUNT\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($headcount_isi) ? $headcount_isi : "-") . '</td>
                <td onclick="getColumn(\'gap\', \'HEADCOUNT\',\'' . $new_witel . '\')" class="tg-' . (!empty($headcount_gap) ? 'x1q5' : "2bvr") . '">' . (!empty($headcount_gap) ? $headcount_gap : "-") . '</td>
                <td onclick="getColumn(\'nfo\', \'HEADCOUNT\',\'' . $new_witel . '\')" class="tg-' . (!empty($headcount_nfo) ? 'x1q5' : "2bvr") . '">' . (!empty($headcount_nfo) ? $headcount_nfo : "-") . '</td>
                <td  class="tg-2bvr">' . (!empty($headcount_isi) ? round($headcount_isi / $headcount_formasi * 100) : "0") . ' %</td>
                <td onclick="getColumn(\'formasi\', \'NON HEADCOUNT\',\'' . $new_witel . '\')" class="tg-x1q4">' . (!empty($non_headcount_formasi) ? $non_headcount_formasi : "-") . '</td>
                <td onclick="getColumn(\'isi\', \'NON HEADCOUNT\',\'' . $new_witel . '\')" class="tg-x1q4">' . (!empty($non_headcount_isi) ? $non_headcount_isi : "-") . '</td>
                <td onclick="getColumn(\'gap\', \'NON HEADCOUNT\',\'' . $new_witel . '\')" class="tg-' . (!empty($non_headcount_gap) ? 'x1q5' : "x1q4") . '">' . (!empty($non_headcount_gap) ? $non_headcount_gap : "-") . '</td>
                <td onclick="getColumn(\'nfo\', \'NON HEADCOUNT\',\'' . $new_witel . '\')" class="tg-' . (!empty($non_headcount_nfo) ? 'x1q5' : "x1q4") . '">' . (!empty($non_headcount_nfo) ? $non_headcount_nfo : "-") . '</td>
                <td  class="tg-x1q4">' . (!empty($non_headcount_isi) ? round($non_headcount_isi / $non_headcount_formasi * 100) : "0") . ' %</td>      
                <td onclick="getColumn(\'formasi\', \'ALL\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($all_formasi) ? $all_formasi : "-") . '</td>
                <td onclick="getColumn(\'isi\', \'ALL\',\'' . $new_witel . '\')" class="tg-2bvr">' . (!empty($all_isi) ? $all_isi : "-") . '</td>
                <td onclick="getColumn(\'gap\', \'ALL\',\'' . $new_witel . '\')" class="tg-' . (!empty($all_gap) ? 'x1q5' : "2bvr") . '">' . (!empty($all_gap) ? $all_gap : "-") . '</td>
                <td onclick="getColumn(\'nfo\', \'ALL\',\'' . $new_witel . '\')" class="tg-' . (!empty($all_nfo) ? 'x1q5' : "2bvr") . '">' . (!empty($all_nfo) ? $all_nfo : "-") . '</td>
                <td  class="tg-2bvr">' . (!empty($all_isi) ? round($all_isi / $all_formasi * 100) : "0") . ' %</td>
            ';

                // END TR ALL

                $data['td'] .= '</tr>';
                $data['td2'] .= '</tr>';

                $ioan_formasi_all += $ioan_formasi;
                $ioan_isi_all += $ioan_isi;
                $ioan_gap_all += $ioan_gap;
                $ioan_nfo_all += $ioan_nfo;
                $spbu_formasi_all += $spbu_formasi;
                $spbu_isi_all += $spbu_isi;
                $spbu_gap_all += $spbu_gap;
                $spbu_nfo_all += $spbu_nfo;
                $nte_formasi_all += $nte_formasi;
                $nte_isi_all += $nte_isi;
                $nte_gap_all += $nte_gap;
                $nte_nfo_all += $nte_nfo;
                $prov_bges_formasi_all += $prov_bges_formasi;
                $prov_bges_isi_all += $prov_bges_isi;
                $prov_bges_gap_all += $prov_bges_gap;
                $prov_bges_nfo_all += $prov_bges_nfo;
                $prov_wibs_formasi_all += $prov_wibs_formasi;
                $prov_wibs_isi_all += $prov_wibs_isi;
                $prov_wibs_gap_all += $prov_wibs_gap;
                $prov_wibs_nfo_all += $prov_wibs_nfo;
                $sdi_formasi_all += $sdi_formasi;
                $sdi_isi_all += $sdi_isi;
                $sdi_gap_all += $sdi_gap;
                $sdi_nfo_all += $sdi_nfo;
                $tdm_formasi_all += $tdm_formasi;
                $tdm_isi_all += $tdm_isi;
                $tdm_gap_all += $tdm_gap;
                $tdm_nfo_all += $tdm_nfo;
                $tds_formasi_all += $tds_formasi;
                $tds_isi_all += $tds_isi;
                $tds_gap_all += $tds_gap;
                $tds_nfo_all += $tds_nfo;
                $bod_formasi_all += $bod_formasi;
                $bod_isi_all += $bod_isi;
                $bod_gap_all += $bod_gap;
                $bod_nfo_all += $bod_nfo;
                $corp_formasi_all += $corp_formasi;
                $corp_isi_all += $corp_isi;
                $corp_gap_all += $corp_gap;
                $corp_nfo_all += $corp_nfo;
                $sqm_formasi_all += $sqm_formasi;
                $sqm_isi_all += $sqm_isi;
                $sqm_gap_all += $sqm_gap;
                $sqm_nfo_all += $sqm_nfo;
                $cons_formasi_all += $cons_formasi;
                $cons_isi_all += $cons_isi;
                $cons_gap_all += $cons_gap;
                $cons_nfo_all += $cons_nfo;
                $fin_formasi_all += $fin_formasi;
                $fin_isi_all += $fin_isi;
                $fin_gap_all += $fin_gap;
                $fin_nfo_all += $fin_nfo;
                $hcm_formasi_all += $hcm_formasi;
                $hcm_isi_all += $hcm_isi;
                $hcm_gap_all += $hcm_gap;
                $hcm_nfo_all += $hcm_nfo;
                $it_formasi_all += $it_formasi;
                $it_isi_all += $it_isi;
                $it_gap_all += $it_gap;
                $it_nfo_all += $it_nfo;
                $ops_formasi_all += $ops_formasi;
                $ops_isi_all += $ops_isi;
                $ops_gap_all += $ops_gap;
                $ops_nfo_all += $ops_nfo;
                $prov_formasi_all += $prov_formasi;
                $prov_isi_all += $prov_isi;
                $prov_gap_all += $prov_gap;
                $prov_nfo_all += $prov_nfo;
                $qe_formasi_all += $qe_formasi;
                $qe_isi_all += $qe_isi;
                $qe_gap_all += $qe_gap;
                $qe_nfo_all += $qe_nfo;
                $snc_formasi_all += $snc_formasi;
                $snc_isi_all += $snc_isi;
                $snc_gap_all += $snc_gap;
                $snc_nfo_all += $snc_nfo;
                $int_spbu_formasi_all += $int_spbu_formasi;
                $int_spbu_isi_all += $int_spbu_isi;
                $int_spbu_gap_all += $int_spbu_gap;
                $int_spbu_nfo_all += $int_spbu_nfo;
                $tds_2_formasi_all += $tds_2_formasi;
                $tds_2_isi_all += $tds_2_isi;
                $tds_2_gap_all += $tds_2_gap;
                $tds_2_nfo_all += $tds_2_nfo;
                $bod_formasi_all += $bod_formasi;

                error_reporting(0);
                $headcount_formasi_all += $ioan_formasi + $spbu_formasi + $nte_formasi + $prov_bges_formasi + $prov_wibs_formasi + $sdi_formasi + $tdm_formasi + $tds_formasi;
                $headcount_isi_all += $ioan_isi + $spbu_isi + $nte_isi + $prov_bges_isi + $prov_wibs_isi + $sdi_isi + $tdm_isi + $tds_isi;
                $headcount_gap_all += $ioan_gap + $spbu_gap + $nte_gap + $prov_bges_gap + $prov_wibs_gap + $sdi_gap + $tdm_gap + $tds_gap;
                $headcount_nfo_all += $ioan_nfo + $spbu_nfo + $nte_nfo + $prov_bges_nfo + $prov_wibs_nfo + $sdi_nfo + $tdm_nfo + $tds_nfo;;
                $non_headcount_formasi_all += $bod_formasi + $corp_formasi + $sqm_formasi + $cons_formasi + $fin_formasi + $hcm_formasi + $it_formasi + $ops_formasi + $prov_formasi + $qe_formasi + $snc_formasi + $int_spbu_formasi + $tds_formasi;
                $non_headcount_isi_all += $bod_isi + $corp_isi + $sqm_isi + $cons_isi + $fin_isi + $hcm_isi + $it_isi + $ops_isi + $prov_isi + $qe_isi + $snc_isi + $int_spbu_isi + $tds_isi;
                $non_headcount_gap_all += $bod_gap + $corp_gap + $sqm_gap + $cons_gap + $fin_gap + $hcm_gap + $it_gap + $ops_gap + $prov_gap + $qe_gap + $snc_gap + $int_spbu_gap + $tds_gap;
                $non_headcount_nfo_all += $bod_nfo + $corp_nfo + $sqm_nfo + $cons_nfo + $fin_nfo + $hcm_nfo + $it_nfo + $ops_nfo + $prov_nfo + $qe_nfo + $snc_nfo + $int_spbu_nfo + $tds_nfo;
                $all_formasi_all = $headcount_formasi_all + $non_headcount_formasi_all;
                $all_isi_all = $headcount_isi_all + $non_headcount_isi_all;
                $all_gap_all = $headcount_gap_all + $non_headcount_gap_all;
                $all_nfo_all = $headcount_nfo_all + $non_headcount_nfo_all;
                error_reporting(1);

                $ioan_formasi = 0;
                $ioan_isi = 0;
                $ioan_gap = 0;
                $ioan_nfo = 0;
                $spbu_formasi = 0;
                $spbu_isi = 0;
                $spbu_gap = 0;
                $spbu_nfo = 0;
                $nte_formasi = 0;
                $nte_isi = 0;
                $nte_gap = 0;
                $nte_nfo = 0;
                $prov_bges_formasi = 0;
                $prov_bges_isi = 0;
                $prov_bges_gap = 0;
                $prov_bges_nfo = 0;
                $prov_wibs_formasi = 0;
                $prov_wibs_isi = 0;
                $prov_wibs_gap = 0;
                $prov_wibs_nfo = 0;
                $sdi_formasi = 0;
                $sdi_isi = 0;
                $sdi_gap = 0;
                $sdi_nfo = 0;
                $tdm_formasi = 0;
                $tdm_isi = 0;
                $tdm_gap = 0;
                $tdm_nfo = 0;
                $tds_formasi = 0;
                $tds_isi = 0;
                $tds_gap = 0;
                $tds_nfo = 0;
                $bod_formasi = 0;
                $bod_isi = 0;
                $bod_gap = 0;
                $bod_nfo = 0;
                $corp_formasi = 0;
                $corp_isi = 0;
                $corp_gap = 0;
                $corp_nfo = 0;
                $sqm_formasi = 0;
                $sqm_isi = 0;
                $sqm_gap = 0;
                $sqm_nfo = 0;
                $cons_formasi = 0;
                $cons_isi = 0;
                $cons_gap = 0;
                $cons_nfo = 0;
                $fin_formasi = 0;
                $fin_isi = 0;
                $fin_gap = 0;
                $fin_nfo = 0;
                $hcm_formasi = 0;
                $hcm_isi = 0;
                $hcm_gap = 0;
                $hcm_nfo = 0;
                $it_formasi = 0;
                $it_isi = 0;
                $it_gap = 0;
                $it_nfo = 0;
                $ops_formasi = 0;
                $ops_isi = 0;
                $ops_gap = 0;
                $ops_nfo = 0;
                $prov_formasi = 0;
                $prov_isi = 0;
                $prov_gap = 0;
                $prov_nfo = 0;
                $qe_formasi = 0;
                $qe_isi = 0;
                $qe_gap = 0;
                $qe_nfo = 0;
                $snc_formasi = 0;
                $snc_isi = 0;
                $snc_gap = 0;
                $snc_nfo = 0;
                $int_spbu_formasi = 0;
                $int_spbu_isi = 0;
                $int_spbu_gap = 0;
                $int_spbu_nfo = 0;
                $tds_2_formasi = 0;
                $tds_2_isi = 0;
                $tds_2_gap = 0;
                $tds_2_nfo = 0;
                if(empty($bezetting)){
                    $data['td'] = '';
                    $data['td2'] = '';
                    $data['td3'] = '';
                }
            }

            $data['td'] .= '
                <tr>
                    <th href="#" class="tg-tilr">GRAND TOTAL</th>
                    <td href="#" class="tg-w4n1">' . (!empty($ioan_formasi_all) ? $ioan_formasi_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($ioan_isi_all) ? $ioan_isi_all : "-") . '</td>
                    <td class="tg-' . (!empty($ioan_gap_all) ? 'w4n1' : "w4n1") . '">' . (!empty($ioan_gap_all) ? $ioan_gap_all : "-") . '</td>
                    <td class="tg-' . (!empty($ioan_nfo_all) ? 'w4n1' : "w4n1") . '">' . (!empty($ioan_nfo_all) ? $ioan_nfo_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($ioan_isi_all) ? round($ioan_isi_all / $ioan_formasi_all * 100) : "0") . ' %</td>
                    <td class="tg-hjjl">' . (!empty($spbu_formasi_all) ? $spbu_formasi_all : "-") . '</td>
                    <td class="tg-hjjl">' . (!empty($spbu_isi_all) ? $spbu_isi_all : "-") . '</td>
                    <td class="tg-' . (!empty($spbu_gap_all) ? 'hjjl' : "hjjl") . '">' . (!empty($spbu_gap_all) ? $spbu_gap_all : "-") . '</td>
                    <td class="tg-' . (!empty($spbu_nfo_all) ? 'hjjl' : "hjjl") . '">' . (!empty($spbu_nfo_all) ? $spbu_nfo_all : "-") . '</td>
                    <td class="tg-hjjl">' . (!empty($ioan_isi_all) ? round($ioan_isi_all / $ioan_formasi_all * 100) : "0") . ' %</td>
                    <td class="tg-w4n1">' . (!empty($nte_formasi_all) ? $nte_formasi_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($nte_isi_all) ? $nte_isi_all : "-") . '</td>
                    <td class="tg-' . (!empty($nte_gap_all) ? 'w4n1' : "w4n1") . '">' . (!empty($nte_gap_all) ? $nte_gap_all : "-") . '</td>
                    <td class="tg-' . (!empty($nte_nfo_all) ? 'w4n1' : "w4n1") . '">' . (!empty($nte_nfo_all) ? $nte_nfo_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($nte_isi_all) ? round($nte_isi_all / $nte_formasi_all * 100) : "0") . ' %</td>
                    <td class="tg-hjjl">' . (!empty($prov_bges_formasi_all) ? $prov_bges_formasi_all : "-") . '</td>
                    <td class="tg-hjjl">' . (!empty($prov_bges_isi_all) ? $prov_bges_isi_all : "-") . '</td>
                    <td class="tg-' . (!empty($prov_bges_gap_all) ? 'hjjl' : "hjjl") . '">' . (!empty($prov_bges_gap_all) ? $prov_bges_gap_all : "-") . '</td>
                    <td class="tg-' . (!empty($prov_bges_nfo_all) ? 'hjjl' : "hjjl") . '">' . (!empty($prov_bges_nfo_all) ? $prov_bges_nfo_all : "-") . '</td>
                    <td class="tg-hjjl">' . (!empty($prov_bges_isi_all) ? round($prov_bges_isi_all / $prov_bges_formasi_all * 100) : "0") . ' %</td>
                    <td class="tg-w4n1">' . (!empty($prov_wibs_formasi_all) ? $prov_wibs_formasi_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($prov_wibs_isi_all) ? $prov_wibs_isi_all : "-") . '</td>
                    <td class="tg-' . (!empty($prov_wibs_gap_all) ? 'w4n1' : "w4n1") . '">' . (!empty($prov_wibs_gap_all) ? $prov_wibs_gap_all : "-") . '</td>
                    <td class="tg-' . (!empty($prov_wibs_nfo_all) ? 'w4n1' : "w4n1") . '">' . (!empty($prov_wibs_nfo_all) ? $prov_wibs_nfo_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($prov_wibs_isi_all) ? round($prov_wibs_isi_all / $prov_wibs_formasi_all * 100) : "0") . ' %</td>
                    <td class="tg-hjjl">' . (!empty($sdi_formasi_all) ? $sdi_formasi_all : "-") . '</td>
                    <td class="tg-hjjl">' . (!empty($sdi_isi_all) ? $sdi_isi_all : "-") . '</td>
                    <td class="tg-' . (!empty($sdi_gap_all) ? 'hjjl' : "hjjl") . '">' . (!empty($sdi_gap_all) ? $sdi_gap_all : "-") . '</td>
                    <td class="tg-' . (!empty($sdi_nfo_all) ? 'hjjl' : "hjjl") . '">' . (!empty($sdi_nfo_all) ? $sdi_nfo_all : "-") . '</td>
                    <td class="tg-hjjl">' . (!empty($sdi_isi_all) ? round($sdi_isi_all / $sdi_formasi_all * 100) : "0") . ' %</td>
                    <td class="tg-w4n1">' . (!empty($tdm_formasi_all) ? $tdm_formasi_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($tdm_isi_all) ? $tdm_isi_all : "-") . '</td>
                    <td class="tg-' . (!empty($tdm_gap_all) ? 'w4n1' : "w4n1") . '">' . (!empty($tdm_gap_all) ? $tdm_gap_all : "-") . '</td>
                    <td class="tg-' . (!empty($tdm_nfo_all) ? 'w4n1' : "w4n1") . '">' . (!empty($tdm_nfo_all) ? $tdm_nfo_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($tdm_isi_all) ? round($tdm_isi_all / $tdm_formasi_all * 100) : "0") . ' %</td>
                    <td class="tg-hjjl">' . (!empty($tds_formasi_all) ? $tds_formasi_all : "-") . '</td>
                    <td class="tg-hjjl">' . (!empty($tds_isi_all) ? $tds_isi_all : "-") . '</td>
                    <td class="tg-' . (!empty($tds_gap_all) ? 'hjjl' : "hjjl") . '">' . (!empty($tds_gap_all) ? $tds_gap_all : "-") . '</td>
                    <td class="tg-' . (!empty($tds_nfo_all) ? 'hjjl' : "hjjl") . '">' . (!empty($tds_nfo_all) ? $tds_nfo_all : "-") . '</td>
                    <td class="tg-hjjl">' . (!empty($tds_isi_all) ? round($tds_isi_all / $tds_formasi_all * 100) : "0") . ' %</td>
                    <td class="tg-w4n1">' . (!empty($headcount_formasi_all) ? $headcount_formasi_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($headcount_isi_all) ? $headcount_isi_all : "-") . '</td>
                    <td class="tg-' . (!empty($headcount_gap_all) ? 'w4n1' : "w4n1") . '">' . (!empty($headcount_gap_all) ? $headcount_gap_all : "-") . '</td>
                    <td class="tg-' . (!empty($headcount_nfo_all) ? 'w4n1' : "w4n1") . '">' . (!empty($headcount_nfo_all) ? $headcount_nfo_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($headcount_isi_all) ? round($headcount_isi_all / $headcount_formasi_all * 100) : "0") . ' %</td>
                </tr>
            ';

            $data['td2'] .= '
                <tr>
                    <th href="#" class="tg-tilr">GRAND TOTAL</th>
                    <td class="tg-w4n1">' . (!empty($bod_formasi_all) ? $bod_formasi_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($bod_isi_all) ? $bod_isi_all : "-") . '</td>
                    <td class="tg-' . (!empty($bod_gap_all) ? 'w4n1' : "w4n1") . '">' . (!empty($bod_gap_all) ? $bod_gap_all : "-") . '</td>
                    <td class="tg-' . (!empty($bod_nfo_all) ? 'w4n1' : "w4n1") . '">' . (!empty($bod_nfo_all) ? $bod_nfo_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($bod_isi_all) ? round($bod_isi_all / $bod_formasi_all * 100) : "0") . ' %</td>
                    <td class="tg-hjjl">' . (!empty($corp_formasi_all) ? $corp_formasi_all : "-") . '</td>
                    <td class="tg-hjjl">' . (!empty($corp_isi_all) ? $corp_isi_all : "-") . '</td>
                    <td class="tg-' . (!empty($corp_gap_all) ? 'hjjl' : "hjjl") . '">' . (!empty($corp_gap_all) ? $corp_gap_all : "-") . '</td>
                    <td class="tg-' . (!empty($corp_nfo_all) ? 'hjjl' : "hjjl") . '">' . (!empty($corp_nfo_all) ? $corp_nfo_all : "-") . '</td>
                    <td class="tg-hjjl">' . (!empty($corp_isi_all) ? round($corp_isi_all / $corp_formasi_all * 100) : "0") . ' %</td>
                    <td class="tg-w4n1">' . (!empty($sqm_formasi_all) ? $sqm_formasi_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($sqm_isi_all) ? $sqm_isi_all : "-") . '</td>
                    <td class="tg-' . (!empty($sqm_gap_all) ? 'w4n1' : "w4n1") . '">' . (!empty($sqm_gap_all) ? $sqm_gap_all : "-") . '</td>
                    <td class="tg-' . (!empty($sqm_nfo_all) ? 'w4n1' : "w4n1") . '">' . (!empty($sqm_nfo_all) ? $sqm_nfo_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($sqm_isi_all) ? round($sqm_isi_all / $sqm_formasi_all * 100) : "0") . ' %</td>
                    <td class="tg-hjjl">' . (!empty($cons_formasi_all) ? $cons_formasi_all : "-") . '</td>
                    <td class="tg-hjjl">' . (!empty($cons_isi_all) ? $cons_isi_all : "-") . '</td>
                    <td class="tg-' . (!empty($cons_gap_all) ? 'hjjl' : "hjjl") . '">' . (!empty($cons_gap_all) ? $cons_gap_all : "-") . '</td>
                    <td class="tg-' . (!empty($cons_nfo_all) ? 'hjjl' : "hjjl") . '">' . (!empty($cons_nfo_all) ? $cons_nfo_all : "-") . '</td>
                    <td class="tg-hjjl">' . (!empty($cons_isi_all) ? round($cons_isi_all / $cons_formasi_all * 100) : "0") . ' %</td>
                    <td class="tg-w4n1">' . (!empty($fin_formasi_all) ? $fin_formasi_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($fin_isi_all) ? $fin_isi_all : "-") . '</td>
                    <td class="tg-' . (!empty($fin_gap_all) ? 'w4n1' : "w4n1") . '">' . (!empty($fin_gap_all) ? $fin_gap_all : "-") . '</td>
                    <td class="tg-' . (!empty($fin_nfo_all) ? 'w4n1' : "w4n1") . '">' . (!empty($fin_nfo_all) ? $fin_nfo_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($fin_isi_all) ? round($fin_isi_all / $fin_formasi_all * 100) : "0") . ' %</td>
                    <td class="tg-hjjl">' . (!empty($hcm_formasi_all) ? $hcm_formasi_all : "-") . '</td>
                    <td class="tg-hjjl">' . (!empty($hcm_isi_all) ? $hcm_isi_all : "-") . '</td>
                    <td class="tg-' . (!empty($hcm_gap_all) ? 'hjjl' : "hjjl") . '">' . (!empty($hcm_gap_all) ? $hcm_gap_all : "-") . '</td>
                    <td class="tg-' . (!empty($hcm_nfo_all) ? 'hjjl' : "hjjl") . '">' . (!empty($hcm_nfo_all) ? $hcm_nfo_all : "-") . '</td>
                    <td class="tg-hjjl">' . (!empty($hcm_isi_all) ? round($hcm_isi_all / $hcm_formasi_all * 100) : "0") . ' %</td>
                    <td class="tg-w4n1">' . (!empty($it_formasi_all) ? $it_formasi_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($it_isi_all) ? $it_isi_all : "-") . '</td>
                    <td class="tg-' . (!empty($it_gap_all) ? 'w4n1' : "w4n1") . '">' . (!empty($it_gap_all) ? $it_gap_all : "-") . '</td>
                    <td class="tg-' . (!empty($it_nfo_all) ? 'w4n1' : "w4n1") . '">' . (!empty($it_nfo_all) ? $it_nfo_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($it_isi_all) ? round($it_isi_all / $it_formasi_all * 100) : "0") . ' %</td>
                    <td class="tg-hjjl">' . (!empty($ops_formasi_all) ? $ops_formasi_all : "-") . '</td>
                    <td class="tg-hjjl">' . (!empty($ops_isi_all) ? $ops_isi_all : "-") . '</td>
                    <td class="tg-' . (!empty($ops_gap_all) ? 'hjjl' : "hjjl") . '">' . (!empty($ops_gap_all) ? $ops_gap_all : "-") . '</td>
                    <td class="tg-' . (!empty($ops_nfo_all) ? 'hjjl' : "hjjl") . '">' . (!empty($ops_nfo_all) ? $ops_nfo_all : "-") . '</td>
                    <td class="tg-hjjl">' . (!empty($ops_isi_all) ? round($ops_isi_all / $ops_formasi_all * 100) : "0") . ' %</td>
                    <td class="tg-w4n1">' . (!empty($prov_formasi_all) ? $prov_formasi_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($prov_isi_all) ? $prov_isi_all : "-") . '</td>
                    <td class="tg-' . (!empty($prov_gap_all) ? 'w4n1' : "w4n1") . '">' . (!empty($prov_gap_all) ? $prov_gap_all : "-") . '</td>
                    <td class="tg-' . (!empty($prov_nfo_all) ? 'w4n1' : "w4n1") . '">' . (!empty($prov_nfo_all) ? $prov_nfo_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($prov_isi_all) ? round($prov_isi_all / $prov_formasi_all * 100) : "0") . ' %</td>
                    <td class="tg-hjjl">' . (!empty($qe_formasi_all) ? $qe_formasi_all : "-") . '</td>
                    <td class="tg-hjjl">' . (!empty($qe_isi_all) ? $qe_isi_all : "-") . '</td>
                    <td class="tg-' . (!empty($qe_gap_all) ? 'hjjl' : "hjjl") . '">' . (!empty($qe_gap_all) ? $qe_gap_all : "-") . '</td>
                    <td class="tg-' . (!empty($qe_nfo_all) ? 'hjjl' : "hjjl") . '">' . (!empty($qe_nfo_all) ? $qe_nfo_all : "-") . '</td>
                    <td class="tg-hjjl">' . (!empty($qe_isi_all) ? round($qe_isi_all / $qe_formasi_all * 100) : "0") . ' %</td>
                    <td class="tg-w4n1">' . (!empty($snc_formasi_all) ? $snc_formasi_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($snc_isi_all) ? $snc_isi_all : "-") . '</td>
                    <td class="tg-' . (!empty($snc_gap_all) ? 'w4n1' : "w4n1") . '">' . (!empty($snc_gap_all) ? $snc_gap_all : "-") . '</td>
                    <td class="tg-' . (!empty($snc_nfo_all) ? 'w4n1' : "w4n1") . '">' . (!empty($snc_nfo_all) ? $snc_nfo_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($snc_isi_all) ? round($snc_isi_all / $snc_formasi_all * 100) : "0") . ' %</td>
                    <td class="tg-hjjl">' . (!empty($int_spbu_formasi_all) ? $int_spbu_formasi_all : "-") . '</td>
                    <td class="tg-hjjl">' . (!empty($int_spbu_isi_all) ? $int_spbu_isi_all : "-") . '</td>
                    <td class="tg-' . (!empty($int_spbu_gap_all) ? 'hjjl' : "hjjl") . '">' . (!empty($int_spbu_gap_all) ? $int_spbu_gap_all : "-") . '</td>
                    <td class="tg-' . (!empty($int_spbu_nfo_all) ? 'hjjl' : "hjjl") . '">' . (!empty($int_spbu_nfo_all) ? $int_spbu_nfo_all : "-") . '</td>
                    <td class="tg-hjjl">' . (!empty($int_spbu_isi_all) ? round($int_spbu_isi_all / $int_spbu_formasi_all * 100) : "0") . ' %</td>
                    <td class="tg-w4n1">' . (!empty($tds_2_formasi_all) ? $tds_2_formasi_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($tds_2_isi_all) ? $tds_2_isi_all : "-") . '</td>
                    <td class="tg-' . (!empty($tds_2_gap_all) ? 'w4n1' : "w4n1") . '">' . (!empty($tds_2_gap_all) ? $tds_2_gap_all : "-") . '</td>
                    <td class="tg-' . (!empty($tds_2_nfo_all) ? 'w4n1' : "w4n1") . '">' . (!empty($tds_2_nfo_all) ? $tds_2_nfo_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($tds_2_isi_all) ? round($tds_2_isi_all / $tds_2_formasi_all * 100) : "0") . ' %</td>
                    <td class="tg-hjjl">' . (!empty($non_headcount_formasi_all) ? $non_headcount_formasi_all : "-") . '</td>
                    <td class="tg-hjjl">' . (!empty($non_headcount_isi_all) ? $non_headcount_isi_all : "-") . '</td>
                    <td class="tg-' . (!empty($non_headcount_gap_all) ? 'hjjl' : "hjjl") . '">' . (!empty($non_headcount_gap_all) ? $non_headcount_gap_all : "-") . '</td>
                    <td class="tg-' . (!empty($non_headcount_nfo_all) ? 'hjjl' : "hjjl") . '">' . (!empty($non_headcount_nfo_all) ? $non_headcount_nfo_all : "-") . '</td>
                    <td class="tg-hjjl">' . (!empty($non_headcount_isi_all) ? round($non_headcount_isi_all / $non_headcount_formasi_all * 100) : "0") . ' %</td>
                </tr>
            ';

            $data['td3'] .= '
                <tr>
                    <th href="#" class="tg-tilr">GRAND TOTAL</th>
                    <td class="tg-w4n1">' . (!empty($headcount_formasi_all) ? $headcount_formasi_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($headcount_isi_all) ? $headcount_isi_all : "-") . '</td>
                    <td class="tg-' . (!empty($headcount_gap_all) ? 'w4n1' : "w4n1") . '">' . (!empty($headcount_gap_all) ? $headcount_gap_all : "-") . '</td>
                    <td class="tg-' . (!empty($headcount_nfo_all) ? 'w4n1' : "w4n1") . '">' . (!empty($headcount_nfo_all) ? $headcount_nfo_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($headcount_isi_all) ? round($headcount_isi_all / $headcount_formasi_all * 100) : "0") . ' %</td>
                    <td class="tg-hjjl">' . (!empty($non_headcount_formasi_all) ? $non_headcount_formasi_all : "-") . '</td>
                    <td class="tg-hjjl">' . (!empty($non_headcount_isi_all) ? $non_headcount_isi_all : "-") . '</td>
                    <td class="tg-' . (!empty($non_headcount_gap_all) ? 'hjjl' : "hjjl") . '">' . (!empty($non_headcount_gap_all) ? $non_headcount_gap_all : "-") . '</td>
                    <td class="tg-' . (!empty($non_headcount_nfo_all) ? 'hjjl' : "hjjl") . '">' . (!empty($non_headcount_nfo_all) ? $non_headcount_nfo_all : "-") . '</td>
                    <td class="tg-hjjl">' . (!empty($non_headcount_isi_all) ? round($non_headcount_isi_all / $non_headcount_formasi_all * 100) : "0") . ' %</td>
                    <td class="tg-w4n1">' . (!empty($all_formasi_all) ? $all_formasi_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($all_isi_all) ? $all_isi_all : "-") . '</td>
                    <td class="tg-' . (!empty($all_gap_all) ? 'w4n1' : "w4n1") . '">' . (!empty($all_gap_all) ? $all_gap_all : "-") . '</td>
                    <td class="tg-' . (!empty($all_nfo_all) ? 'w4n1' : "w4n1") . '">' . (!empty($all_nfo_all) ? $all_nfo_all : "-") . '</td>
                    <td class="tg-w4n1">' . (!empty($all_isi_all) ? round($all_isi_all / $all_formasi_all * 100) : "0") . ' %</td>
                </tr>
            ';
        }
        $data['javascript'] = $this->javascript();
        $this->load->view('template_bezetting', $data);
    }

    public function detil($kategori, $grup, $witel, $lvl){

        if ($lvl == 'bod1') {
            $map_lvl = "'GM/VP/PM', 'OSM'";
        } elseif ($lvl == 'mgr') {
            $map_lvl = "'Manager'";
        } elseif ($lvl == 'sm') {
            $map_lvl = "'Site Manager', 'Officer 1'";
        } elseif ($lvl == 'tl') {
            $map_lvl = "'Team Leader', 'Officer 2'";
        } elseif ($lvl == 'teknisi') {
            $map_lvl = "'Teknisi'";
        } elseif ($lvl == 'staff') {
            $map_lvl = "'Staff'";
        } elseif ($lvl == 'helpdesk') {
            $map_lvl = "'Helpdesk'";
        } elseif ($lvl == 'drafter') {
            $map_lvl = "'Drafter'";
        } elseif ($lvl == 'surveyor') {
            $map_lvl = "'Surveyor'";
        } elseif ($lvl == 'ALL') {
            $map_lvl = 'ALL';
        }



        $data['main_view'] = 'detil_bezetting';
        $data['page_title'] = 'Detil > '.ucwords($kategori).' > '.ucwords(urldecode($grup)).' > '.ucwords(urldecode($witel)).' > '.ucwords($lvl);
        $data['javascript'] = '';

        $data_detil = $this->Bezetting_m->get_detil($kategori, urldecode($grup), urldecode($witel), $map_lvl);

        $data['td'] = '';

        foreach ($data_detil as $key => $item) {
            $new_witel = $item->WITEL;
            $no = $key+1;
            $data['td'] .= '<tr>';
            $data['td'] .= '<td class="tg-2bvr">' . $no . '</td>';
            $data['td'] .= '<td class="tg-5h8a">' . $new_witel . '</td>';
            $data['td'] .= '<td class="tg-2bvr">' . $item->object_id . '</td>';
            $data['td'] .= '<td class="tg-x1q4">' . $item->nik . '</td>';
            $data['td'] .= '<td class="tg-2bvr">' . $item->name . '</td>';
            $data['td'] .= '<td class="tg-x1q4">' . $item->position_name . '</td>';
            $data['td'] .= '<td class="tg-2bvr">' . $item->position . '</td>';
            $data['td'] .= '<td class="tg-x1q4">' . $item->directorate . '</td>';
            $data['td'] .= '<td class="tg-x1q4">' . $item->unit . '</td>';
            $data['td'] .= '<td class="tg-2bvr">' . $item->sub_unit . '</td>';
        }
        $data['td'] .= '</tr>';

        $this->load->view('template_bezetting', $data);
    }

    public function javascript()
    {
        $raw_gap = $this->Bezetting_m->get_count_ket('GAP');
        $raw_nfo = $this->Bezetting_m->get_count_ket('NFO');
        $labels_gap = '[';
        $value_gap = '[';
        $labels_nfo = '[';
        $value_nfo = '[';
        foreach ($raw_gap as $key => $gap) {
            if ($key > 0) {
                $labels_gap .= ',';
                $value_gap .= ',';
            }
            $labels_gap .= "'" . $gap->group_fungsi_2 . "'";
            $value_gap .= $gap->GAP;
        }
        foreach ($raw_nfo as $key => $nfo) {
            if ($key > 0) {
                $labels_nfo .= ',';
                $value_nfo .= ',';
            }
            $labels_nfo .= "'" . $nfo->group_fungsi_2 . "'";
            $value_nfo .= $nfo->NFO;
        }
        $labels_gap .= ']';
        $value_gap .= ']';
        $labels_nfo .= ']';
        $value_nfo .= ']';

        $kode = "
    <script>
    gradientChartOptionsConfigurationWithTooltipPurple = {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
    
                tooltips: {
                    backgroundColor: '#f5f5f5',
                    titleFontColor: '#333',
                    bodyFontColor: '#666',
                    bodySpacing: 4,
                    xPadding: 12,
                    mode: 'nearest',
                    intersect: 0,
                    position: 'nearest'
                },
                responsive: true,
                scales: {
                    yAxes: [{
                        barPercentage: 1.6,
                        gridLines: {
                            drawBorder: false,
                            color: 'rgba(29,140,248,0.0)',
                            zeroLineColor: 'transparent',
                        },
                        ticks: {
                            suggestedMin: 60,
                            suggestedMax: 125,
                            padding: 20,
                            fontColor: '#9a9a9a'
                        }
                    }],
                    
                    xAxes: [{
                            barPercentage: 1.6,
                            gridLines: {
                                drawBorder: false,
                                color: 'rgba(225,78,202,0.1)',
                                zeroLineColor: 'transparent',
                            },
                            ticks: {
                                padding: 20,
                                fontColor: '#9a9a9a'
                            }
                        }]
                    }
            };
                
            gradientChartOptionsConfigurationWithTooltipGreen = {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        backgroundColor: '#f5f5f5',
                        titleFontColor: '#333',
                        bodyFontColor: '#666',
                        bodySpacing: 4,
                        xPadding: 12,
                        mode: 'nearest',
                        intersect: 0,
                        position: 'nearest'
                    },
                    responsive: true,
                    scales: {
                    yAxes: [{
                            barPercentage: 1.6,
                            gridLines: {
                                drawBorder: false,
                                color: 'rgba(29,140,248,0.0)',
                                zeroLineColor: 'transparent',
                            },
                            ticks: {
                                suggestedMin: 50,
                                suggestedMax: 125,
                                padding: 20,
                                fontColor: '#9e9e9e'
                            }
                    }],
               
                    xAxes: [{
                            barPercentage: 1.6,
                            gridLines: {
                                        drawBorder: false,
                                        color: 'rgba(0,242,195,0.1)',
                                        zeroLineColor: 'transparent',
                                        },
                            ticks:      {
                                        padding: 20,
                                        fontColor: '#9e9e9e'
                                    }
                            }]
                    }
            };
                
            var ctx = document.getElementById('chartLinePurple').getContext('2d');
            var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);
                
            gradientStroke.addColorStop(1, 'rgba(72,72,176,0.2)');
            gradientStroke.addColorStop(0.2, 'rgba(72,72,176,0.0)');
            gradientStroke.addColorStop(0, 'rgba(119,52,169,0)'); //purple colors
                
            var data = {
                labels: " . $labels_gap . ",
                datasets: [{
                    label: 'Data',
                    fill: true,
                    backgroundColor: gradientStroke,
                    borderColor: '#d048b6',
                    borderWidth: 2,
                    borderDash: [],
                    borderDashOffset: 0.0,
                    pointBackgroundColor: '#d048b6',
                    pointBorderColor: 'rgba(255,255,255,0)',
                    pointHoverBackgroundColor: '#d048b6',
                    pointBorderWidth: 20,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 15,
                    pointRadius: 4,
                    data: " . $value_gap . "
                }]
            };
                
            var myChart = new Chart(ctx, {
                type: 'line',
                data: data,
                options: gradientChartOptionsConfigurationWithTooltipPurple
            });
            var ctxGreen = document.getElementById('chartLineGreen').getContext('2d');
            var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);
                
            gradientStroke.addColorStop(1, 'rgba(72,72,176,0.2)');
            gradientStroke.addColorStop(0.2, 'rgba(72,72,176,0.0)');
            gradientStroke.addColorStop(0, 'rgba(119,52,169,0)'); //purple colors
                
            var data = {
                labels: " . $labels_nfo . ",
                datasets: [{
                    label: 'Data',
                    fill: true,
                    backgroundColor: gradientStroke,
                    borderColor: '#36a9f5',
                    borderWidth: 2,
                    borderDash: [],
                    borderDashOffset: 0.0,
                    pointBackgroundColor: '#36a9f5',
                    pointBorderColor: 'rgba(255,255,255,0)',
                    pointHoverBackgroundColor: '#36a9f5',
                    pointBorderWidth: 20,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 15,
                    pointRadius: 4,
                    data: " . $value_nfo . "
                }]
            };
    
            var myChart = new Chart(ctxGreen, {
                type: 'line',
                data: data,
                options: gradientChartOptionsConfigurationWithTooltipGreen
            });
    </script>
";
        return $kode;
    }
}
