<?php
//$con=mysql_connect('localhost','root','') or die(mysql_error());
//mysql_select_db('payease',$con);
//mysql_query('set names utf8',$con);

date_default_timezone_set("Asia/Shanghai");

$domain_name="http://scrumgathering.io:5786";
//$domain_name="http://sg.dev";

$con = new mysqli("localhost", "rsg", "qyWfS%xL", "payeaseQA");
//$con = new mysqli("localhost", "root", "", "payease");

// Oh no! A connect_errno exists so the connection attempt failed!
if ($con->connect_errno) {
    // The connection failed. What do you want to do?
    // You could contact yourself (email?), log the error, show a nice page, etc.
    // You do not want to reveal sensitive information

    // Let's try this:
    echo "Sorry, this website is experiencing problems.";

    // Something you should not do on a public site, but this example will show you
    // anyways, is print out MySQL error related information -- you might log this
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $con->connect_errno . "\n";
    echo "Error: " . $con->connect_error . "\n";

    // You might want to show them something nice, but we will simply exit
    exit;
}

//printf("Initial character set: %s\n", $con->character_set_name());

/* change character set to gb2312 */
if (!$con->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $con->error);
    exit();
} else {
//    printf("Current character set: %s\n", $con->character_set_name());
}

//echo "Connection success"

?>