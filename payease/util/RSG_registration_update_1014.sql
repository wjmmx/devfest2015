/*
These records corresponding people mailbox was wrong which led to mail post error
 */
UPDATE payeaseinfo SET v_email = '304749248@qq.com', v_rcvname = '周梅莲', qr_is_sent = 1 WHERE qr='xsvFmMNcJvMudxXk';
UPDATE payeaseinfo SET v_email = 'miaoruijing@163.com', v_rcvname = '钱晨', qr_is_sent = 1 WHERE qr='JNetCjPMwTUBJEfp';
UPDATE payeaseinfo SET v_email = 'XZhang210dc2@StateStreet.com', v_rcvname = '张晓辉', qr_is_sent = 1 WHERE qr='dDfqLAlUrxuHznzZ';
UPDATE payeaseinfo SET v_email = 'wchen2@StateStreet.com', v_rcvname = '陈伟', qr_is_sent = 1 WHERE qr='aSUICgYobgemdJLz';
UPDATE payeaseinfo SET v_email = 'lilizhan@cisco.com', v_rcvname = '张丽丽', qr_is_sent = 1 WHERE qr='pgzseVcTFArDfbuG';

/*
Below records are mapping to ticket
 */
UPDATE payeaseinfo set v_oid='被彭欣华替换', v_rcvaddr='vNMKsSEsgotEwUHu', qr='', qr_is_sent=4 WHERE v_email='liaowm@cmbchina.com';
INSERT INTO payease.payeaseinfo (v_oid, v_orderdate, v_paymentdate, v_amount, v_moneytype, v_pstatus, v_rcvname, v_rcvaddr, v_rcvtel, v_rcvpost, v_email, v_promotion, qr, qr_is_sent, rsg_role, checkin) VALUES ('替换廖为民', '201609140000', '201609220000', '2250', '人民币', 'Paid', '彭欣华', null, '136-3296-5779', null, 'joeyxhpeng@cmbchina.com', null, 'XZVmqnOzvdCXipoD', 1, '参会者', 0);