<?php	//this is "process_Inv.php"
 $page_title = "You added a Invaction";
	include('header.php');	
//oracle: $conn = oci_connect("system", "1234", "localhost/XE");
require_once('inc_OnlineStoreDB.php');//mysql connection and database selection
?>



<?php
$Cust_No = 0;
$CustNo = '';
$InvDate = '';
/*$AmtPaid = '';
$Notes ='';
$CustSDR ='';
$TMethod = '';
*/

$CustNo = $_POST['CustNo'];
$Cust_No = $_POST['CustNo'];
//$AmtPaid = $_POST['AmtPaid'];
//$Notes = $_POST['Notes'];
//$CustSDR = $_POST['CustSDR'];
//$TMethod = $_POST['TMethod'];




echo "You deleted the customer: ".$Cust_No." ".$CustNo ." ".$CustNo ."."  ;

$Cust_NoInt = intval($Cust_No);
$query="delete from customer where CustNo = $Cust_NoInt";
//oracle: $query="update Invaction set Invfn = '$CustNo', Invln ='$TransDate', Transtel = '$AmtPaid', Transcell= '$Notes', Transemail = '$TMethod', Transaddr = '$InvNoA', distance = '$InvNoAincl' where Transno = :Trans_NoInt";
echo '</br></br></br></br></br></br></br>';

mysqli_query($DBConnect, $query);
printf("Affected rows (UPDATE): %d\n", mysqli_affected_rows($DBConnect));
echo $query;

echo ";<br>";
$file = "FileWriting/logEditCust.php";
include("FileWriting/FileWriting.php");
//$open = fopen($file, "a+"); //open the file, (e.g.log.htm).
//fwrite($open, "<br><br><b>Register:</b> " .$query . "<br/>"); 
//fwrite($open, "<b>Date & Time:</b>". date("d/m/Y"). "<br/>"); //print / write the date and time they viewed the log.
//fclose($open); // you must ALWAYS close the opened file once you have finished.
//echo "<br /><br />Check log file: <a href = '.$file.'><br />";

echo "<a href = 'view_cust_all.php'>view_cust_all.php</a></a><br>";



echo '</br>';echo '</br>';
//php to sql does not understand semicolon. remove the semicolon!!!
$CustInt = intval($Cust_NoInt);
$SQLString = "SELECT * FROM customer WHERE CustNo = $CustInt";
//$SQLString = "SELECT * FROM Invaction WHERE WHERE CustNo = $item2;
?>
<b><font size = "4" type="arial">Del Cust</b></font>
</br>
</br>
<?php
if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
$item2 =  $row["CustNo"];
/*$CustInt =  $row["CustNo"];
$item3 = $row["InvDate"];
$item4 = $row["AmtPaid"];
$item5 = $row["Notes"];
$item6 = $row["CustSDR"];
$item7 = $row["TMethod"];
$item8 = $row["InvNoA"];
$item9 = $row["InvNoAincl"];
$item10 = $row["Priority"];*/
print "$item1";
print "_".$item2;
/*print "_".$item3;
print "_R".$item4;
print "_".$item5;
print "_".$item6;
print "_".$item7;
print "_".$item8;
print "_".$item9;
print "_".$item10;*/
}
$result->free();
}	echo "<br>";
//$mysqli->close();
?>


<!--
//$query="insert into Invaction values(5, 'Jn', 'VM', '65', '084', 'johnATv', 'USA', 55)";
//php to sql does not understand semicolon. remove the semicolon!!!
//$stmt = oci_parse($conn,$query);

//$rc=oci_execute($stmt);-->
<?php
/*
//oracle: 
if(!$rc)
{
$e=oci_error($stmt);
var_dump($e);
}

oci_commit($conn);

oci_free_statement($stmt);
oci_close($conn);
//}
*/
?>

