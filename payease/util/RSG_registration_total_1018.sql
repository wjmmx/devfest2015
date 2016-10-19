/*
Below records are mapping to new added tickets
 */
INSERT INTO payease.payeaseinfo (v_oid, v_orderdate, v_paymentdate, v_amount, v_moneytype, v_pstatus, v_rcvname, v_rcvaddr, v_rcvtel, v_rcvpost, v_email, v_promotion, qr, qr_is_sent, rsg_role, checkin) VALUES ('1003779300', '201609180000', '201609220000', '3500', '人民币', 'Paid', 'Julien Mazloum', null, '13240986803', null, 'julien.mazloum@outsofting.com', null, 'JNEOQyeNwsYGmOWi', 1, '参会者', 0);
INSERT INTO payease.payeaseinfo (v_oid, v_orderdate, v_paymentdate, v_amount, v_moneytype, v_pstatus, v_rcvname, v_rcvaddr, v_rcvtel, v_rcvpost, v_email, v_promotion, qr, qr_is_sent, rsg_role, checkin) VALUES ('', '201609180000', '201609220000', '', '人民币', 'Paid', '周建成', null, '123456789', null, 'Zjc0617@msn.com', null, 'rVARIOHepFRWuNBV', 1, '组织者', 0);
INSERT INTO payease.payeaseinfo (v_oid, v_orderdate, v_paymentdate, v_amount, v_moneytype, v_pstatus, v_rcvname, v_rcvaddr, v_rcvtel, v_rcvpost, v_email, v_promotion, qr, qr_is_sent, rsg_role, checkin) VALUES ('', '201609180000', '201609220000', '', '人民币', 'Paid', '闻金水', null, '123456789', null, 'tophor@126.com', null, 'NQJwxcsOEOcBLAHj', 1, '组织者', 0);

/*
Below records are mapping to ticket transferring
 */
INSERT INTO payease.payeaseinfo (v_oid, v_orderdate, v_paymentdate, v_amount, v_moneytype, v_pstatus, v_rcvname, v_rcvaddr, v_rcvtel, v_rcvpost, v_email, v_promotion, qr, qr_is_sent, rsg_role, checkin) VALUES ('1003409207', '201609180000', '201609220000', '2016', '人民币', 'Paid', '罗亚丽', null, '18108046108', null, 'luo.yali1@zte.com.cn', null, 'oSghNXjNzjKjwEmF', 1, '参会者', 0);
INSERT INTO payease.payeaseinfo (v_oid, v_orderdate, v_paymentdate, v_amount, v_moneytype, v_pstatus, v_rcvname, v_rcvaddr, v_rcvtel, v_rcvpost, v_email, v_promotion, qr, qr_is_sent, rsg_role, checkin) VALUES ('1003406806', '201609190000', '201609220000', '2016', '人民币', 'Paid', '戴蓓琪', null, '18616130606', null, 'beiqi.dai@cn.bosch.com', null, 'QNNjsiZlOWtofgin', 1, '参会者', 0);
INSERT INTO payease.payeaseinfo (v_oid, v_orderdate, v_paymentdate, v_amount, v_moneytype, v_pstatus, v_rcvname, v_rcvaddr, v_rcvtel, v_rcvpost, v_email, v_promotion, qr, qr_is_sent, rsg_role, checkin) VALUES ('1003404068', '201609180000', '201609220000', '2016', '人民币', 'Paid', '李沛', null, '18611709575', null, 'wangkai@cybersoftek.com', null, 'UbrUkRHSYEYQEDgu', 1, '参会者', 0);
INSERT INTO payease.payeaseinfo (v_oid, v_orderdate, v_paymentdate, v_amount, v_moneytype, v_pstatus, v_rcvname, v_rcvaddr, v_rcvtel, v_rcvpost, v_email, v_promotion, qr, qr_is_sent, rsg_role, checkin) VALUES ('1003382277', '201609180000', '201609220000', '2016', '人民币', 'Paid', '余兆成', null, '13705715877', null, 'yuzhaocheng@chinamobile.com', null, 'SFhGenpueKtqqdpj', 1, '参会者', 0);
UPDATE payeaseinfo set v_oid='转让', v_rcvaddr='InsZdCrRdmHigSOW', qr='', qr_is_sent=4 WHERE v_rcvname = '李朝峰' AND v_email='wangkai@cybersoftek.com';
UPDATE payeaseinfo set v_oid='转让', v_rcvaddr='tHKrcFKdgVYVxwmU', qr='', qr_is_sent=4 WHERE v_rcvname = '伍云飞' AND v_email='yunfei.wu@nokia.com';
UPDATE payeaseinfo set v_oid='转让', v_rcvaddr='RrSbOapvrwsMtWiF', qr='', qr_is_sent=4 WHERE v_rcvname = '何留留' AND v_email='1002723576@qq.com';
UPDATE payeaseinfo set v_oid='转让', v_rcvaddr='dLRJCkdicbxctewR', qr='', qr_is_sent=4 WHERE v_rcvname = '徐莉' AND v_email='xuli@cybersoftek.com';