<?php
Class userinfo {
	public function fetchData_users($one,$secend) {
		$users_array = array();
		$query_users = "SELECT * FROM users where super_admin='0'";
		include('resources/views/panels/prem_users.php');
							$table_users =  DB::select(DB::raw($query_users)); 
							foreach($table_users as  $user ){
							$users_array[] = array(  
													"id" => $user->id,
													"id_number" => $user->id_number,
													"is_admin" => $user->is_admin,
													"marital_status" => $user->marital_status,
													"status" => $user->status,
													"name" => $user->name,
													"name_ar" => $user->name_ar,
													"username" => $user->username,
													"department" => $user->department,
													"position_ar" => $user->position_ar,
													"section" => $user->section,
													"ntq" => $user->ntq,
													"location" => $user->location,
													"related" => $user->related,
								 );
							}
					return $users_array;
	}
}

$info = new userinfo();
$one='';
$secend='';
$table_cl_users= $info->fetchData_users($one,$secend); 






Class cl_nnnnnnn {
	public function fetchData_nnnnnnn($checkIn1,$checkout1) {
    $nnnnn_array = array();
	$sqls_nnnnnnn = "SELECT * FROM nnnnnnn  where (date >= '$checkIn1' AND date <= '$checkout1')  and hide!='1' ";
	include('resources/views/panels/prem_nnnnnnn.php');	

	$sqls_nnnnnnn =  DB::select(DB::raw($sqls_nnnnnnn)); 
	foreach($sqls_nnnnnnn as  $r_nnn ){

		$datedate = date('Y/m/d', strtotime($r_nnn->date));	
			if( $r_nnn->time_in !='') {
				$nnnnn_array[] = array(  		
					"id" => $r_nnn->id,
					"m1" => $r_nnn->m1,
					"m2" => $r_nnn->m2.$datedate,
					"m9" => $r_nnn->m9,
					"m13" => $r_nnn->m13,
					"time_in" => $r_nnn->time_in,
					"time_out" => $r_nnn->time_out,
					"location" => $r_nnn->location,
					"related" => $r_nnn->related,
					"date" => $r_nnn->date,
				 );	 
			}

	}
    return $nnnnn_array;
	}
}

$info = new cl_nnnnnnn();
$table_cl_nnnnnnn= $info->fetchData_nnnnnnn($checkIn1,$checkout1); 



?>