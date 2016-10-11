DROP DATABASE IF EXISTS `payease`;
CREATE DATABASE payease CHARACTER SET utf8;

USE payease;
DROP TABLE IF EXISTS `payeaseinfo`;
CREATE TABLE payeaseinfo (
  v_oid VARCHAR(50) NOT NULL,
  v_orderdate VARCHAR(30) NOT NULL,
  v_paymentdate VARCHAR(30) NOT NULL,
  v_amount VARCHAR(5) NOT NULL,
  v_moneytype VARCHAR(10) NOT NULL,
  v_pstatus VARCHAR(10) NOT NULL,
  v_rcvname VARCHAR(20) NOT NULL,
  v_rcvaddr VARCHAR(200),
  v_rcvtel VARCHAR(20) NOT NULL,
  v_rcvpost VARCHAR(10),
  v_email VARCHAR(50) NOT NULL,
  v_promotion VARCHAR(10),
  qr VARCHAR(16) DEFAULT '' NOT NULL,
  qr_is_sent INT(11) DEFAULT '0',
  rsg_role VARCHAR(10),
  checkin INT(11) DEFAULT '0' NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;