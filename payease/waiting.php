<?php session_start();
$v_oid = $_SESSION['v_oid'];

/*
   Update DB status
*/

include_once 'util/conn.php';
$v_pstatus = "waiting";
$v_paymentdate = date('Y-m-d H:i:s');
$sql_update = "update payeaseinfo set v_paymentdate='$v_paymentdate',v_pstatus='$v_pstatus' where v_oid='$v_oid'";

if ($con->query($sql_update) === TRUE) {
    echo "Order status updated successfully";
} else {
    echo "Error: " . $sql_update . "<br>" . $con->error;
}

/*
   Search user name and email
*/

$sql_waiting = "select v_rcvname,v_email from payeaseinfo where v_oid='$v_oid'";

if ($stmt = $con->prepare($sql_waiting)) {

    $stmt->execute();
    $stmt->bind_result($v_rcvname, $v_email);
    while ($stmt->fetch()) {
        printf("%s (%s)\n", $v_rcvname, $v_email);

        echo $v_rcvname . "(" . $v_email . ")" . ", your Order#��" . $v_oid . "<br>payment status��Waiting for operation.<br>";
    }
    $stmt->close();
} else {
    echo "Error: " . $sql_waiting . "<br>" . $con->error;
}

?>
