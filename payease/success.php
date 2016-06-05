<?php session_start();
$v_oid=$_SESSION['v_oid'];
//echo "$v_oid<br>";

/*
   Update DB status
*/
include_once 'util/conn.php';

$v_pstatus="paid";
$v_paymentdate=date('Y-m-d H:i:s');
//echo "$v_paymentdate<br>";
$sql_update= "update payeaseinfo set v_paymentdate='$v_paymentdate',v_pstatus='$v_pstatus' where v_oid='$v_oid'";

if ($con->query($sql_update) === TRUE) {
    echo '<script>alert("You just bought the ticket successfully.\\n The system will redirect you to the homepage in 5 seconds...");</script>';

    header("refresh:5;url=$domain_name");

} else {
    echo "Error: " . $sql_update . "<br>" . $con->error;
}
?>
