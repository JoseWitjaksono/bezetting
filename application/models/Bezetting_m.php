<?php
Class Bezetting_m extends CI_Model {

	function __construct(){
		$this->load->database();
	}

	function get_bezetting_witel($witel){
		$query = $this->db->query("SELECT WITEL, REGIONAL, group_fungsi_2, FORMASI, ISI, GAP, NFO 
									FROM (
									SELECT grp2.witel AS WITEL, grp2.regional AS REGIONAL, grp2.group_fungsi_2,
									SUM(CASE WHEN grp2.psa = psa AND grp2.group_om ='-' THEN '1' ELSE '0' END) AS FORMASI,
									SUM(CASE WHEN grp2.psa = psa AND grp2.group_om ='-' AND grp2.nik IS NOT NULL THEN '1' ELSE '0' END) AS ISI,
									SUM(CASE WHEN grp2.psa = psa AND grp2.group_om ='-' AND grp2.nik IS NULL THEN '1' ELSE '0' END) AS GAP,
									SUM(CASE WHEN grp2.psa = psa AND grp2.nik IS NOT NULL AND grp2.group_om ='NFO' THEN '1' ELSE '0' END) AS NFO
									FROM (
									SELECT CONCAT(\"'\", A.object_id), D.nik, D.name,position_name, C.position, directorate, 
									sub_unit, unit, A.psa, B.bizpart, group_om, sub_group, group_fungsi,
									(SELECT parent FROM area_ta WHERE ta_area = A.psa AND level = '4') AS WITEL,
									(SELECT parent FROM area_ta WHERE ta_area = WITEL AND level = '3') AS TERITORI,
									(SELECT parent FROM area_ta WHERE ta_area = TERITORI AND level = '2') AS REGIONAL,
									CASE 
									WHEN sub_group = 'TDM' THEN 'TDM'
									WHEN sub_group = 'SQM' THEN 'SQM'
									WHEN sub_group = 'MO SPBU' THEN 'MO SPBU'
									WHEN sub_group = 'WIBS' AND group_fungsi = 'PROVISIONING' THEN 'PROVISIONING WIBS'
									WHEN sub_group = 'BGES' AND group_fungsi = 'PROVISIONING' THEN 'PROVISIONING BGES'
									WHEN sub_group = 'MS NTE' THEN 'MS NTE'
									WHEN sub_group = 'INTEGRASI SPBU' THEN 'INTEGRASI SPBU'
									WHEN sub_unit = 'Diagnostic & Surveilance' THEN 'TDS 1'
									WHEN sub_unit = 'Diagnostic' THEN 'TDS 1'
									WHEN sub_unit = 'Ability Enabler' THEN 'TDS 2'
									WHEN sub_unit = 'Command Center' THEN 'TDS 2'
									WHEN sub_unit = 'Data Processing' THEN 'TDS 2'
									WHEN sub_unit = 'Surveilance' THEN 'TDS 2'
									ELSE group_fungsi 
									END AS group_fungsi_2
									FROM master_om A 
									LEFT JOIN bizpart B ON A.bizpart_id = B.id 
									LEFT JOIN position_level C ON A.level_idx = C.id
									LEFT JOIN employee_mapping D ON A.object_id = D.object_id
									WHERE A.status = '1' AND status_obsolete = '1' AND B.bizpart != 'Regional') grp2
									GROUP BY PSA, group_fungsi_2
									
									UNION ALL
									
									SELECT CONCAT('Regional ', grp3.regional) AS WITEL, grp3.regional AS REGIONAL, grp3.group_fungsi_2,
									SUM(CASE WHEN grp3.psa = psa AND grp3.group_om ='-' THEN '1' ELSE '0' END) AS FORMASI,
									SUM(CASE WHEN grp3.psa = psa AND grp3.group_om ='-' AND grp3.nik IS NOT NULL THEN '1' ELSE '0' END) AS ISI,
									SUM(CASE WHEN grp3.psa = psa AND grp3.group_om ='-' AND grp3.nik IS NULL THEN '1' ELSE '0' END) AS GAP,
									SUM(CASE WHEN grp3.psa = psa AND grp3.nik IS NOT NULL AND grp3.group_om ='NFO' THEN '1' ELSE '0' END) AS NFO
									FROM (
									SELECT CONCAT(\"'\", A.object_id), D.nik, D.name,position_name, C.position, directorate, 
									sub_unit, unit, A.psa, B.bizpart, group_om, sub_group, group_fungsi,
									(SELECT parent FROM area_ta WHERE ta_area = A.psa AND level = '4') AS WITEL,
									(SELECT parent FROM area_ta WHERE ta_area = WITEL AND level = '3') AS TERITORI,
									(SELECT parent FROM area_ta WHERE ta_area = TERITORI AND level = '2') AS REGIONAL,
									CASE 
									WHEN sub_group = 'TDM' THEN 'TDM'
									WHEN sub_group = 'SQM' THEN 'SQM'
									WHEN sub_group = 'MO SPBU' THEN 'MO SPBU'
									WHEN sub_group = 'WIBS' AND group_fungsi = 'PROVISIONING' THEN 'PROVISIONING WIBS'
									WHEN sub_group = 'BGES' AND group_fungsi = 'PROVISIONING' THEN 'PROVISIONING BGES'
									WHEN sub_group = 'MS NTE' THEN 'MS NTE'
									WHEN sub_group = 'INTEGRASI SPBU' THEN 'INTEGRASI SPBU'
									WHEN sub_unit = 'Diagnostic & Surveilance' THEN 'TDS 1'
									WHEN sub_unit = 'Diagnostic' THEN 'TDS 1'
									WHEN sub_unit = 'Ability Enabler' THEN 'TDS 2'
									WHEN sub_unit = 'Command Center' THEN 'TDS 2'
									WHEN sub_unit = 'Data Processing' THEN 'TDS 2'
									WHEN sub_unit = 'Surveilance' THEN 'TDS 2'
									ELSE group_fungsi 
									END AS group_fungsi_2
									FROM master_om A 
									LEFT JOIN bizpart B ON A.bizpart_id = B.id 
									LEFT JOIN position_level C ON A.level_idx = C.id
									LEFT JOIN employee_mapping D ON A.object_id = D.object_id
									WHERE A.status = '1' AND status_obsolete = '1' AND B.bizpart = 'Regional') grp3
									GROUP BY REGIONAL, group_fungsi_2
									) x WHERE x.WITEL = '$witel' ORDER BY REGIONAL ASC, WITEL ASC");
		if ($query->num_rows() >= 1) {
			return $query->result();
		} else {
			return FALSE;
		}
	}

	function get_bezetting_witel_level($witel, $lvl){
		$query = $this->db->query("SELECT WITEL, REGIONAL, group_fungsi_2, FORMASI, ISI, GAP, NFO 
									FROM (
									SELECT grp2.witel AS WITEL, grp2.regional AS REGIONAL, grp2.group_fungsi_2,
									SUM(CASE WHEN grp2.psa = psa AND grp2.group_om ='-' THEN '1' ELSE '0' END) AS FORMASI,
									SUM(CASE WHEN grp2.psa = psa AND grp2.group_om ='-' AND grp2.nik IS NOT NULL THEN '1' ELSE '0' END) AS ISI,
									SUM(CASE WHEN grp2.psa = psa AND grp2.group_om ='-' AND grp2.nik IS NULL THEN '1' ELSE '0' END) AS GAP,
									SUM(CASE WHEN grp2.psa = psa AND grp2.nik IS NOT NULL AND grp2.group_om ='NFO' THEN '1' ELSE '0' END) AS NFO
									FROM (
									SELECT CONCAT(\"'\", A.object_id), D.nik, D.name,position_name, C.position, directorate, 
									sub_unit, unit, A.psa, B.bizpart, group_om, sub_group, group_fungsi,
									(SELECT parent FROM area_ta WHERE ta_area = A.psa AND level = '4') AS WITEL,
									(SELECT parent FROM area_ta WHERE ta_area = WITEL AND level = '3') AS TERITORI,
									(SELECT parent FROM area_ta WHERE ta_area = TERITORI AND level = '2') AS REGIONAL,
									CASE 
									WHEN sub_group = 'TDM' THEN 'TDM'
									WHEN sub_group = 'SQM' THEN 'SQM'
									WHEN sub_group = 'MO SPBU' THEN 'MO SPBU'
									WHEN sub_group = 'WIBS' AND group_fungsi = 'PROVISIONING' THEN 'PROVISIONING WIBS'
									WHEN sub_group = 'BGES' AND group_fungsi = 'PROVISIONING' THEN 'PROVISIONING BGES'
									WHEN sub_group = 'MS NTE' THEN 'MS NTE'
									WHEN sub_group = 'INTEGRASI SPBU' THEN 'INTEGRASI SPBU'
									WHEN sub_unit = 'Diagnostic & Surveilance' THEN 'TDS 1'
									WHEN sub_unit = 'Diagnostic' THEN 'TDS 1'
									WHEN sub_unit = 'Ability Enabler' THEN 'TDS 2'
									WHEN sub_unit = 'Command Center' THEN 'TDS 2'
									WHEN sub_unit = 'Data Processing' THEN 'TDS 2'
									WHEN sub_unit = 'Surveilance' THEN 'TDS 2'
									ELSE group_fungsi 
									END AS group_fungsi_2
									FROM master_om A 
									LEFT JOIN bizpart B ON A.bizpart_id = B.id 
									LEFT JOIN position_level C ON A.level_idx = C.id
									LEFT JOIN employee_mapping D ON A.object_id = D.object_id
									WHERE A.status = '1' AND status_obsolete = '1' AND B.bizpart != 'Regional' AND C.position IN ($lvl)) grp2
									GROUP BY PSA, group_fungsi_2
									
									UNION ALL
									
									SELECT CONCAT('Regional ', grp3.regional) AS WITEL, grp3.regional AS REGIONAL, grp3.group_fungsi_2,
									SUM(CASE WHEN grp3.psa = psa AND grp3.group_om ='-' THEN '1' ELSE '0' END) AS FORMASI,
									SUM(CASE WHEN grp3.psa = psa AND grp3.group_om ='-' AND grp3.nik IS NOT NULL THEN '1' ELSE '0' END) AS ISI,
									SUM(CASE WHEN grp3.psa = psa AND grp3.group_om ='-' AND grp3.nik IS NULL THEN '1' ELSE '0' END) AS GAP,
									SUM(CASE WHEN grp3.psa = psa AND grp3.nik IS NOT NULL AND grp3.group_om ='NFO' THEN '1' ELSE '0' END) AS NFO
									FROM (
									SELECT CONCAT(\"'\", A.object_id), D.nik, D.name,position_name, C.position, directorate, 
									sub_unit, unit, A.psa, B.bizpart, group_om, sub_group, group_fungsi,
									(SELECT parent FROM area_ta WHERE ta_area = A.psa AND level = '4') AS WITEL,
									(SELECT parent FROM area_ta WHERE ta_area = WITEL AND level = '3') AS TERITORI,
									(SELECT parent FROM area_ta WHERE ta_area = TERITORI AND level = '2') AS REGIONAL,
									CASE 
									WHEN sub_group = 'TDM' THEN 'TDM'
									WHEN sub_group = 'SQM' THEN 'SQM'
									WHEN sub_group = 'MO SPBU' THEN 'MO SPBU'
									WHEN sub_group = 'WIBS' AND group_fungsi = 'PROVISIONING' THEN 'PROVISIONING WIBS'
									WHEN sub_group = 'BGES' AND group_fungsi = 'PROVISIONING' THEN 'PROVISIONING BGES'
									WHEN sub_group = 'MS NTE' THEN 'MS NTE'
									WHEN sub_group = 'INTEGRASI SPBU' THEN 'INTEGRASI SPBU'
									WHEN sub_unit = 'Diagnostic & Surveilance' THEN 'TDS 1'
									WHEN sub_unit = 'Diagnostic' THEN 'TDS 1'
									WHEN sub_unit = 'Ability Enabler' THEN 'TDS 2'
									WHEN sub_unit = 'Command Center' THEN 'TDS 2'
									WHEN sub_unit = 'Data Processing' THEN 'TDS 2'
									WHEN sub_unit = 'Surveilance' THEN 'TDS 2'
									ELSE group_fungsi 
									END AS group_fungsi_2
									FROM master_om A 
									LEFT JOIN bizpart B ON A.bizpart_id = B.id 
									LEFT JOIN position_level C ON A.level_idx = C.id
									LEFT JOIN employee_mapping D ON A.object_id = D.object_id
									WHERE A.status = '1' AND status_obsolete = '1' AND B.bizpart = 'Regional' AND C.position IN ($lvl)) grp3
									GROUP BY REGIONAL, group_fungsi_2
									) x WHERE x.WITEL = '$witel' ORDER BY REGIONAL ASC, WITEL ASC");
		if ($query->num_rows() >= 1) {
			return $query->result();
		} else {
			return FALSE;
		}
	}

	function get_bezetting_regional($reg){
		$query = $this->db->query("SELECT CONCAT('Regional ', grp3.regional) AS WITEL, grp3.regional AS REGIONAL, grp3.group_fungsi_2,
									SUM(CASE WHEN grp3.psa = psa AND grp3.group_om ='-' THEN '1' ELSE '0' END) AS FORMASI,
									SUM(CASE WHEN grp3.psa = psa AND grp3.group_om ='-' AND grp3.nik IS NOT NULL THEN '1' ELSE '0' END) AS ISI,
									SUM(CASE WHEN grp3.psa = psa AND grp3.group_om ='-' AND grp3.nik IS NULL THEN '1' ELSE '0' END) AS GAP,
									SUM(CASE WHEN grp3.psa = psa AND grp3.nik IS NOT NULL AND grp3.group_om ='NFO' THEN '1' ELSE '0' END) AS NFO
									FROM (
									SELECT CONCAT(\"'\", A.object_id), D.nik, D.name,position_name, C.position, directorate, 
									sub_unit, unit, A.psa, B.bizpart, group_om, sub_group, group_fungsi,
									(SELECT parent FROM area_ta WHERE ta_area = A.psa AND level = '4') AS WITEL,
									(SELECT parent FROM area_ta WHERE ta_area = WITEL AND level = '3') AS TERITORI,
									(SELECT parent FROM area_ta WHERE ta_area = TERITORI AND level = '2') AS REGIONAL,
									CASE 
									WHEN sub_group = 'TDM' THEN 'TDM'
									WHEN sub_group = 'SQM' THEN 'SQM'
									WHEN sub_group = 'MO SPBU' THEN 'MO SPBU'
									WHEN sub_group = 'WIBS' AND group_fungsi = 'PROVISIONING' THEN 'PROVISIONING WIBS'
									WHEN sub_group = 'BGES' AND group_fungsi = 'PROVISIONING' THEN 'PROVISIONING BGES'
									WHEN sub_group = 'MS NTE' THEN 'MS NTE'
									WHEN sub_group = 'INTEGRASI SPBU' THEN 'INTEGRASI SPBU'
									WHEN sub_unit = 'Diagnostic & Surveilance' THEN 'TDS 1'
									WHEN sub_unit = 'Diagnostic' THEN 'TDS 1'
									WHEN sub_unit = 'Ability Enabler' THEN 'TDS 2'
									WHEN sub_unit = 'Command Center' THEN 'TDS 2'
									WHEN sub_unit = 'Data Processing' THEN 'TDS 2'
									WHEN sub_unit = 'Surveilance' THEN 'TDS 2'
									ELSE group_fungsi 
									END AS group_fungsi_2
									FROM master_om A 
									LEFT JOIN bizpart B ON A.bizpart_id = B.id 
									LEFT JOIN position_level C ON A.level_idx = C.id
									LEFT JOIN employee_mapping D ON A.object_id = D.object_id
									WHERE A.status = '1' AND status_obsolete = '1') grp3
									WHERE grp3.REGIONAL = '$reg' 
									GROUP BY REGIONAL, group_fungsi_2");
		if ($query->num_rows() >= 1) {
			return $query->result();
		} else {
			return FALSE;
		}
	}

	function get_bezetting_regional_level($reg, $lvl){
		$query = $this->db->query("SELECT CONCAT('Regional ', grp3.regional) AS WITEL, grp3.regional AS REGIONAL, grp3.group_fungsi_2,
									SUM(CASE WHEN grp3.psa = psa AND grp3.group_om ='-' THEN '1' ELSE '0' END) AS FORMASI,
									SUM(CASE WHEN grp3.psa = psa AND grp3.group_om ='-' AND grp3.nik IS NOT NULL THEN '1' ELSE '0' END) AS ISI,
									SUM(CASE WHEN grp3.psa = psa AND grp3.group_om ='-' AND grp3.nik IS NULL THEN '1' ELSE '0' END) AS GAP,
									SUM(CASE WHEN grp3.psa = psa AND grp3.nik IS NOT NULL AND grp3.group_om ='NFO' THEN '1' ELSE '0' END) AS NFO
									FROM (
									SELECT CONCAT(\"'\", A.object_id), D.nik, D.name,position_name, C.position, directorate, 
									sub_unit, unit, A.psa, B.bizpart, group_om, sub_group, group_fungsi,
									(SELECT parent FROM area_ta WHERE ta_area = A.psa AND level = '4') AS WITEL,
									(SELECT parent FROM area_ta WHERE ta_area = WITEL AND level = '3') AS TERITORI,
									(SELECT parent FROM area_ta WHERE ta_area = TERITORI AND level = '2') AS REGIONAL,
									CASE 
									WHEN sub_group = 'TDM' THEN 'TDM'
									WHEN sub_group = 'SQM' THEN 'SQM'
									WHEN sub_group = 'MO SPBU' THEN 'MO SPBU'
									WHEN sub_group = 'WIBS' AND group_fungsi = 'PROVISIONING' THEN 'PROVISIONING WIBS'
									WHEN sub_group = 'BGES' AND group_fungsi = 'PROVISIONING' THEN 'PROVISIONING BGES'
									WHEN sub_group = 'MS NTE' THEN 'MS NTE'
									WHEN sub_group = 'INTEGRASI SPBU' THEN 'INTEGRASI SPBU'
									WHEN sub_unit = 'Diagnostic & Surveilance' THEN 'TDS 1'
									WHEN sub_unit = 'Diagnostic' THEN 'TDS 1'
									WHEN sub_unit = 'Ability Enabler' THEN 'TDS 2'
									WHEN sub_unit = 'Command Center' THEN 'TDS 2'
									WHEN sub_unit = 'Data Processing' THEN 'TDS 2'
									WHEN sub_unit = 'Surveilance' THEN 'TDS 2'
									ELSE group_fungsi 
									END AS group_fungsi_2
									FROM master_om A 
									LEFT JOIN bizpart B ON A.bizpart_id = B.id 
									LEFT JOIN position_level C ON A.level_idx = C.id
									LEFT JOIN employee_mapping D ON A.object_id = D.object_id
									WHERE A.status = '1' AND status_obsolete = '1') grp3
									WHERE grp3.REGIONAL = '$reg' AND grp3.position IN ($lvl)
									GROUP BY REGIONAL, group_fungsi_2");
		if ($query->num_rows() >= 1) {
			return $query->result();
		} else {
			return FALSE;
		}
	}

	function get_detil($kategori, $grup, $witel, $lvl){
		$subquery  = '';
		$subquery2 = '';
		$subquery3 = '';
		$subquery4 = '';

		if($grup == 'HEADCOUNT'){
			$subquery4 = "AND x.group_fungsi_2 IN ('I-OAN', 'MO SPBU', 'MS NTE', 'PROVISIONING BGES', 'PROVISIONING WIBS', 'SDI', 'TDM', 'TDS')";
		}elseif ($grup == "NON HEADCOUNT"){
			$subquery4 = "AND x.group_fungsi_2 NOT IN ('I-OAN', 'MO SPBU', 'MS NTE', 'PROVISIONING BGES', 'PROVISIONING WIBS', 'SDI', 'TDM', 'TDS')";
		}elseif ($grup == "ALL"){
			$subquery4 = "";
		} else{
			$subquery4 = "AND x.group_fungsi_2 = '$grup'";
		}

		if($kategori == 'formasi'){
			$subquery = "x.group_om ='-'";
		}elseif ($kategori == 'isi'){
			$subquery = "x.group_om ='-' AND x.nik IS NOT NULL";
		}elseif ($kategori == 'gap'){
			$subquery = "x.group_om ='-' AND x.nik IS NULL";
		}elseif ($kategori == 'nfo'){
			$subquery = "x.nik IS NOT NULL AND x.group_om ='NFO'";
		}

		if($lvl != 'ALL'){
			$subquery2 = "AND x.position IN ($lvl)";
		}

		if(substr($witel,0,4) == 'REG '){
			$subquery3 = "AND x.REGIONAL = '".substr($witel,4)."'";
		}else{
			$subquery3 = "AND x.WITEL = '$witel'";
		}

		$query = $this->db->query("
								  	SELECT WITEL, REGIONAL, group_fungsi_2, object_id, nik, name, position_name, 
									position, directorate, sub_unit, unit, psa, bizpart, group_om, sub_group, group_fungsi
									FROM (
									SELECT grp2.witel AS WITEL, grp2.regional AS REGIONAL, grp2.group_fungsi_2,
									grp2.object_id, grp2.nik, grp2.name, grp2.position_name, grp2.position, grp2.directorate, grp2.sub_unit, 
									grp2.unit, grp2.psa, grp2.bizpart, grp2.group_om, grp2.sub_group, grp2.group_fungsi
									FROM (
									SELECT CONCAT(\"'\", A.object_id) AS object_id, D.nik, D.name,position_name, C.position, directorate, 
									sub_unit, unit, A.psa, B.bizpart, group_om, sub_group, group_fungsi,
									(SELECT parent FROM area_ta WHERE ta_area = A.psa AND level = '4') AS WITEL,
									(SELECT parent FROM area_ta WHERE ta_area = WITEL AND level = '3') AS TERITORI,
									(SELECT parent FROM area_ta WHERE ta_area = TERITORI AND level = '2') AS REGIONAL,
									CASE 
									WHEN sub_group = 'TDM' THEN 'TDM'
									WHEN sub_group = 'SQM' THEN 'SQM'
									WHEN sub_group = 'MO SPBU' THEN 'MO SPBU'
									WHEN sub_group = 'WIBS' AND group_fungsi = 'PROVISIONING' THEN 'PROVISIONING WIBS'
									WHEN sub_group = 'BGES' AND group_fungsi = 'PROVISIONING' THEN 'PROVISIONING BGES'
									WHEN sub_group = 'MS NTE' THEN 'MS NTE'
									WHEN sub_group = 'INTEGRASI SPBU' THEN 'INTEGRASI SPBU'
									WHEN sub_unit = 'Diagnostic & Surveilance' THEN 'TDS 1'
									WHEN sub_unit = 'Diagnostic' THEN 'TDS 1'
									WHEN sub_unit = 'Ability Enabler' THEN 'TDS 2'
									WHEN sub_unit = 'Command Center' THEN 'TDS 2'
									WHEN sub_unit = 'Data Processing' THEN 'TDS 2'
									WHEN sub_unit = 'Surveilance' THEN 'TDS 2'
									ELSE group_fungsi 
									END AS group_fungsi_2
									FROM master_om A 
									LEFT JOIN bizpart B ON A.bizpart_id = B.id 
									LEFT JOIN position_level C ON A.level_idx = C.id
									LEFT JOIN employee_mapping D ON A.object_id = D.object_id
									WHERE A.status = '1' AND status_obsolete = '1' AND B.bizpart != 'Regional') grp2
									
									UNION ALL
									
									SELECT CONCAT('Regional ', grp3.regional) AS WITEL, grp3.regional AS REGIONAL, grp3.group_fungsi_2,
									grp3.object_id ,grp3.nik, grp3.name, grp3.position_name, grp3.position, grp3.directorate, grp3.sub_unit, 
									grp3.unit, grp3.psa, grp3.bizpart, grp3.group_om, grp3.sub_group, grp3.group_fungsi
									FROM (
									SELECT CONCAT(\"'\", A.object_id) AS object_id, D.nik, D.name,position_name, C.position, directorate, 
									sub_unit, unit, A.psa, B.bizpart, group_om, sub_group, group_fungsi,
									(SELECT parent FROM area_ta WHERE ta_area = A.psa AND level = '4') AS WITEL,
									(SELECT parent FROM area_ta WHERE ta_area = WITEL AND level = '3') AS TERITORI,
									(SELECT parent FROM area_ta WHERE ta_area = TERITORI AND level = '2') AS REGIONAL,
									CASE 
									WHEN sub_group = 'TDM' THEN 'TDM'
									WHEN sub_group = 'SQM' THEN 'SQM'
									WHEN sub_group = 'MO SPBU' THEN 'MO SPBU'
									WHEN sub_group = 'WIBS' AND group_fungsi = 'PROVISIONING' THEN 'PROVISIONING WIBS'
									WHEN sub_group = 'BGES' AND group_fungsi = 'PROVISIONING' THEN 'PROVISIONING BGES'
									WHEN sub_group = 'MS NTE' THEN 'MS NTE'
									WHEN sub_group = 'INTEGRASI SPBU' THEN 'INTEGRASI SPBU'
									WHEN sub_unit = 'Diagnostic & Surveilance' THEN 'TDS 1'
									WHEN sub_unit = 'Diagnostic' THEN 'TDS 1'
									WHEN sub_unit = 'Ability Enabler' THEN 'TDS 2'
									WHEN sub_unit = 'Command Center' THEN 'TDS 2'
									WHEN sub_unit = 'Data Processing' THEN 'TDS 2'
									WHEN sub_unit = 'Surveilance' THEN 'TDS 2'
									ELSE group_fungsi 
									END AS group_fungsi_2
									FROM master_om A 
									LEFT JOIN bizpart B ON A.bizpart_id = B.id 
									LEFT JOIN position_level C ON A.level_idx = C.id
									LEFT JOIN employee_mapping D ON A.object_id = D.object_id
									WHERE A.status = '1' AND status_obsolete = '1' AND B.bizpart = 'Regional') grp3
									) x WHERE $subquery $subquery4 $subquery3 $subquery2 ORDER BY WITEL ASC, group_fungsi_2 ASC");
		if ($query->num_rows() >= 1) {
			return $query->result();
		} else {
			return FALSE;
		}
	}

	function get_count_ket($ket){
		$query = $this->db->query("SELECT group_fungsi_2, FORMASI, ISI, GAP, NFO FROM (
									SELECT grp3.group_fungsi_2,
									SUM(CASE WHEN grp3.psa = psa AND grp3.group_om ='-' THEN '1' ELSE '0' END) AS FORMASI,
									SUM(CASE WHEN grp3.psa = psa AND grp3.group_om ='-' AND grp3.nik IS NOT NULL THEN '1' ELSE '0' END) AS ISI,
									SUM(CASE WHEN grp3.psa = psa AND grp3.group_om ='-' AND grp3.nik IS NULL THEN '1' ELSE '0' END) AS GAP,
									SUM(CASE WHEN grp3.psa = psa AND grp3.nik IS NOT NULL AND grp3.group_om ='NFO' THEN '1' ELSE '0' END) AS NFO
									FROM (
									SELECT CONCAT(\"'\", A.object_id), D.nik, D.name,position_name, C.position, directorate, 
									sub_unit, unit, A.psa, B.bizpart, group_om, sub_group, group_fungsi,
									(SELECT parent FROM area_ta WHERE ta_area = A.psa AND level = '4') AS WITEL,
									(SELECT parent FROM area_ta WHERE ta_area = WITEL AND level = '3') AS TERITORI,
									(SELECT parent FROM area_ta WHERE ta_area = TERITORI AND level = '2') AS REGIONAL,
									CASE 
									WHEN sub_group = 'TDM' THEN 'TDM'
									WHEN sub_group = 'SQM' THEN 'SQM'
									WHEN sub_group = 'MO SPBU' THEN 'MO SPBU'
									WHEN sub_group = 'WIBS' AND group_fungsi = 'PROVISIONING' THEN 'PROVISIONING WIBS'
									WHEN sub_group = 'BGES' AND group_fungsi = 'PROVISIONING' THEN 'PROVISIONING BGES'
									WHEN sub_group = 'MS NTE' THEN 'MS NTE'
									WHEN sub_group = 'INTEGRASI SPBU' THEN 'INTEGRASI SPBU'
									WHEN sub_unit = 'Diagnostic & Surveilance' THEN 'TDS 1'
									WHEN sub_unit = 'Diagnostic' THEN 'TDS 1'
									WHEN sub_unit = 'Ability Enabler' THEN 'TDS 2'
									WHEN sub_unit = 'Command Center' THEN 'TDS 2'
									WHEN sub_unit = 'Data Processing' THEN 'TDS 2'
									WHEN sub_unit = 'Surveilance' THEN 'TDS 2'
									ELSE group_fungsi 
									END AS group_fungsi_2
									FROM master_om A 
									LEFT JOIN bizpart B ON A.bizpart_id = B.id 
									LEFT JOIN position_level C ON A.level_idx = C.id
									LEFT JOIN employee_mapping D ON A.object_id = D.object_id
									WHERE A.status = '1' AND status_obsolete = '1') grp3
									GROUP BY group_fungsi_2 ORDER BY $ket DESC LIMIT 5) grp4
									ORDER BY FORMASI DESC");
		if ($query->num_rows() >= 1) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
}


?>
