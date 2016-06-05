DROP DATABASE IF EXISTS `payease`;
CREATE DATABASE payease CHARACTER SET utf8;

USE payease;
DROP TABLE IF EXISTS `payeaseinfo`;
CREATE TABLE `payeaseinfo`(
  `v_oid` varchar(50) NOT NULL,
  `v_orderdate` varchar(30) NOT NULL,
  `v_paymentdate` varchar(30) NOT NULL,
  `v_amount` varchar(5) NOT NULL,
  `v_moneytype` varchar(10) NOT NULL,
  `v_pstatus` varchar(10) NOT NULL,
  `v_rcvname` varchar(20) NOT NULL,
  `v_rcvaddr` varchar(200) DEFAULT NULL,
  `v_rcvtel` varchar(20) NOT NULL,
  `v_rcvpost` varchar(10) DEFAULT NULL,
  `v_email` varchar(50) NOT NULL,
  `v_promotion` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;