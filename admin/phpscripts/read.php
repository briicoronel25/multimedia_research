<?php
	//THIS FILE READ THE DATABASE
	//get all of something. code that will works to get something

	function getAll($tbl) {
		include("connect.php");
		$queryAll	 = "SELECT * FROM {$tbl}";  //query that can be used for a bunch of things
		$runAll = mysqli_query($link, $queryAll);
		//echo "$tbl";
			if($runAll){
					return $runAll;
			}else{
				$error = "There was an error accessing this infromation. Please contact your admin.";
				return $error;
			}
		mysqli_close($link);
	}

	function getSingle($tbl, $col, $id){
		include('connect.php');
		$querySingle = "SELECT * FROM {$tbl} WHERE {$col} = {$id}"; //this make it dynamic
		//echo $querySingle;
		$runSingle = mysqli_query($link, $querySingle);
		if($runSingle){
				return $runSingle;
		}else{
			$error = "There was an error accessing this infromation. Please contact your admin.";
			return $error;
		}
		mysqli_close($link);

	}

function filterType($tbl, $tbl2, $tbl3, $col, $col2, $col3, $filter){

		include('connect.php');
		$queryFilter = "SELECT * FROM {$tbl},{$tbl2}, {$tbl3}
		 WHERE {$tbl}.{$col} = {$tbl3}.{$col}
		 AND {$tbl2}.{$col2} = {$tbl3}.{$col2}
		 AND {$tbl2}.{$col3} = '{$filter}'";
		 //echo $queryFilter;
		 $runFilter = mysqli_query($link, $queryFilter);

		 if($runFilter){
			 return $runFilter;
		 }else{
			 $error = "There was an error accessing this infromation. Please contact your admin.";
			 return $error;
		 }
		 mysqli_close($link);
}
?>
