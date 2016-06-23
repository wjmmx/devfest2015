<?php session_start();
$v_oid=$_SESSION['v_oid'];
//echo "$v_oid<br>";
//$v_email = $_SESSION['$v_email'];
//echo "$v_email<br>";
//$v_attendee_name = $_SESSION['$v_attendee_name'];
//echo "$v_attendee_name<br>";

/*
   Update DB status
   Send email to register
*/
include_once 'util/conn.php';

$v_pstatus="paid";
$v_paymentdate=date('Y-m-d H:i:s');
//echo "$v_paymentdate<br>";
$sql_update= "update payeaseinfo set v_paymentdate='$v_paymentdate',v_pstatus='$v_pstatus' where v_oid='$v_oid'";

if ($con->query($sql_update) === TRUE) {

    echo "You just bought the ticket successfully.\n";
    echo "Please remember your OrderNO: " . $v_oid . "\n";
    echo "The system will redirect you to the homepage in 10 seconds.\n";

    header("refresh:10;url=$domain_name");

} else {
    echo "Encounter DB issue! Please contact website administrator.\n";
    echo "Error: " . $sql_update . "<br>" . $con->error;
}
?>
