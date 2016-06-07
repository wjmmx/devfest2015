(SELECT
   'v_oid',
   'v_orderdate',
   'v_paymentdate',
   'v_amount',
   'v_moneytype',
   'v_pstatus',
   'v_rcvname',
   'v_rcvaddr',
   'v_rcvtel',
   'v_rcvpost',
   'v_email',
   'v_promotion')
UNION
(SELECT
   `v_oid`,
   `v_orderdate`,
   `v_paymentdate`,
   `v_amount`,
   `v_moneytype`,
   `v_pstatus`,
   `v_rcvname`,
   `v_rcvaddr`,
   `v_rcvtel`,
   `v_rcvpost`,
   `v_email`,
   `v_promotion`
 FROM payeaseinfo
 INTO OUTFILE '/tmp/RSG2016-Registration.csv'
      CHARACTER SET 'utf8'
      FIELDS ENCLOSED BY '"' TERMINATED BY ',' ESCAPED BY '"'
 LINES TERMINATED BY '\r\n');