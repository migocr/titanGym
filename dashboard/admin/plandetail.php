<?php
require '../../include/db_conn.php';
$pid=$_GET['q'];
$query="select * from plan where pid='".$pid."'";
$res=mysqli_query($con,$query);
if ($res){
	$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
	if ($row['planType'] == "d") {
		$planTypeString = "Dia";
		if($row['validity'] !== "1") {
			$planTypeString = "Dias";
		}
		
	}
	if ($row['planType'] == "m") {
		$planTypeString = "Mes";
		if($row['validity'] !== "1") {
			$planTypeString = "Meses";
		}
	}
	// echo "<tr><td>".$row['amount']."</td></tr>";
	echo "
		<div class='col-md-6'>
			<div class='form-group'>
				<label class='form-control-label'>Costo:</label>
				<input class='form-control'id='boxx' type='text' value='$".$row['amount']."' readonly></input>
			</div>
		</div>
		<div class='col-md-6'>
			<div class='form-group'>
				<label class='form-control-label'>Validez:</label>
				<input class='form-control' type='text' id='boxx' value='".$row['validity']." $planTypeString' readonly></input>
			</div>
		</div>
		
		
	";
}

?>