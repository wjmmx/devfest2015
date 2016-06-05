<!DOCTYPE html>
<html lang="en">
<head>
    <title>SCRUM GATHERING CHINA 2016 | Registration Page</title>

    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!--Add description for SEO-->
    <meta property="og:title" content="SCRUM GATHERING CHINA 2016 | Registration Page" />
    <meta property="og:description" content="Scrum Gathering China 2016 will be held at Hangzhou city during October 21-22, 2016." />
    <!--Add image_src for the site-->
    <meta property="og:image" content="http://scrumgathering.io/upload/RSG.png" />
    <meta property="og:url" content="http://scrumgathering.io/" />

    <!-- Attaching Google Fonts -->
    <!--<link href='https://fonts.googleapis.com/css?family=Lato:300italic,400italic,600italic,700italic,800italic,400,800,700,600,300' rel='stylesheet' type='text/css'>-->
    <!--<link href='https://fonts.googleapis.com/css?family=Roboto:300,700,400' rel='stylesheet' type='text/css'>-->

    <!-- Attaching Css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/lightbox.min.css" />
    <link rel="stylesheet" href="../css/elegant-icons.css" />
    <link rel="stylesheet" href="../css/font-awesome.css" />
    <link rel="stylesheet" href="../css/rev-slider.css" />
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/spacings.css" />
    <link rel="stylesheet" href="../css/responsive.css" />
    <link rel="stylesheet" href="../css/animate.css" />

    <!-- And also favicons -->
    <link rel="shortcut icon" href="../upload/favicon.ico">
    <link rel="apple-touch-icon" href="../upload/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../upload/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../upload/apple-touch-icon-144x144.png">

    <!-- jQuery Scripts -->
    <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/canvas-vas.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/lightbox.min.js"></script>
    <script type="text/javascript" src="../js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="../js/jquery.appear.js"></script>
    <script type="text/javascript" src="../js/SmoothScroll.js"></script>
    <script type="text/javascript" src="../js/jquery.localScroll.min.js"></script>
    <script type="text/javascript" src="../js/jquery.scrollTo.min.js"></script>
    <script type="text/javascript" src="../js/jquery.simple-text-rotator.min.js"></script>
    <script type="text/javascript" src="../js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="../js/wow.min.js"></script>
    <!--script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script-->
    <script type="text/javascript" src="../js/jquery.gmap.js"></script>
    <script type="text/javascript" src="../js/scripts.js"></script>

    <!--Language Toggle-->
    <script src="../js/js.cookie.js" charset="utf-8" type="text/javascript"></script>
    <script src="../js/jquery-lang.js" charset="utf-8" type="text/javascript"></script>
    <!--<script src="../js/langpack/nonDynamic.js" charset="utf-8" type="text/javascript"></script>-->
    <script type="text/javascript">
        var lang = new Lang();
        lang.dynamic('ch', '../js/langpack/ch.json');
        lang.init({
            defaultLang: 'en'
        });
    </script>


    <script type="text/javascript">
        window.onload=function(){
            var form=document.getElementById('form');
            var v_rcvname=document.getElementById('v_rcvname');
            var v_amount=document.getElementById('v_amount');
            var v_rcvaddr=document.getElementById('v_rcvaddr');
            var v_rcvtel=document.getElementById('v_rcvtel');
            var v_rcvpost=document.getElementById('v_rcvpost');
            var v_email=document.getElementById('v_email');
            form.onsubmit=function(){
                if(v_rcvname.value=='')
                {
                    alert('姓名不能为空');
                    return false;
                }
                if(v_amount.value=='')
                {
                    alert('订单金额不能为空');
                    return false;
                }
                if(v_rcvaddr.value=='')

                if(v_rcvtel.value=='')
                {
                    alert('电话不能为空');
                    return false;
                }

                if(v_email.value=='')
                {
                    alert('邮箱不能为空');
                    return false;
                }
                return true;
            };
        };
    </script>

    <!--Baidu site statistics support-->
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "//hm.baidu.com/hm.js?3a28aacb8052d7210315f3ec6df77581";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>

</head>

<body data-spy="scroll" data-offset="80" data-target=".main-nav">

<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>

<header id="home">
    <div class="main-nav" role="navigation">

        <!--Language toggle-->
        <div class="lang-toggle">
            <a href="#" onclick="window.lang.change('en'); return false;">EN</a> | <a href="#" onclick="window.lang.change('ch'); return false;">中文</a>
        </div>

        <nav class="nav-hide">
            <ul class="nav local-scroll">
                <li><a lang="en" href="../index.html">HOMEPAGE</a></li>
            </ul>
        </nav>

        <div class="container clearfix">

            <!--<div class="logo-light local-scroll">-->
            <!--<a href="#home" class="logo">-->
            <!--<img src="upload/logo-light.png" alt="logo">-->
            <!--</a>-->
            <!--</div>-->

            <div class="navbar-toggle">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>

        </div> <!-- end container -->
    </div> <!-- end main nav -->
</header>

<div class="main-wrapper-onepage main oh">

    <!-- Page Title -->
    <section class="page-title text-center">
        <canvas id="spiders"></canvas>
        <div class="container relative clearfix">

            <h1 class="main-title" lang="en">REGISTRATION<br/></h1>

            <h1 class="color-white" >
                <span lang="en" class="original-price">Price: 3500 RMB</span><br/>
                <span lang="en">Early Bird Price</span>
                <span class="highlight-price"> 2016 </span>
                <span lang="en">RMB only before July 31!</span>
                <br/>
            </h1>
        </div> <!-- end container -->
    </section> <!-- end page title -->


    <!-- Blog Standard -->
    <section class="section-wrap blog-standard blog-article">
        <div class="container relative">
            <div class="row">

                <!-- content -->
                <div class="col-md-10 col-md-offset-1">
                    <form action="pay_ck.php" method="post" id="form">
                    <!-- gallery post -->
                    <div class="entry-item mb0">


                        <div class="entry">

                            <div class="entry-content">

                                <div class="form_li">
                                    <div class="label_l middle">
                                        <span> 报名信息 </span>

                                    </div>
                                </div>

                                    <table class="table table-hover">
                                    <tr>
                                        <td colspan="2" align="center" lang="en">Online payment</td>
                                    </tr>
                                    <tr>
                                        <td width="31%"><div align="left">姓名 * </div></td>
                                        <td width="69%"><input type="text" name="v_rcvname" id="v_rcvname"/></td>
                                    </tr>
                                        <tr>
                                            <td width="31%"><div align="left">电话 * </div></td>
                                            <td width="69%"><input type="text" name="v_rcvtel" id="v_rcvtel"/></td>
                                        </tr>
                                        <tr>
                                            <td width="31%"><div align="left">邮箱 * </div></td>
                                            <td width="69%"><input type="text" name="v_email" id="v_email"/></td>
                                        </tr>

                                    </table>

                            </div> <!-- end entry content -->

                            <div class="entry-content">


                                <div class="form_li">
                                    <div class="label_l middle">
                                        <span> 票价 </span>

                                    </div>
                                </div>

                                <table class="table table-hover">
                                    <tr>
                                        <td colspan="2" align="center" lang="en">Online payment</td>
                                    </tr>
                                    <tr>
                                        <td width="31%"><div align="left">原票价:</div></td>
                                        <td width="69%"><div align="left">3500 RMB:</div></td>
                                    </tr>
                                    <tr>
                                        <td width="31%"><div align="left">优惠券:</div></td>
                                        <td width="69%"><input type="text" name="promotion_code" id="promotion_code" readonly/>早鸟价</td>
                                    </tr>
                                    <tr>
                                        <td width="31%"><div align="left">实付金额:</div></td>
                                        <td width="69%"><input type="text" name="v_amount" id="v_amount"readonly/>2016</td>
                                    </tr>

                                </table>

                            </div> <!-- end entry content -->

                            <div class="entry-content">

                                <input type="radio" name="payment" value="pay_online" />
                                <label for="payment">线上支付</label> <br/>
                                    <div class="reveal-if-active">
                                        <input type="radio" name="payment_currency" value="pay_rmb" />
                                        <label for="payment">人民币支付</label> <br/>
                                        <input type="radio" name="payment_currency" value="pay_dollar" />
                                        <label for="payment">美元支付</label><br/>
                                    </div>
                                <input type="radio" name="payment" value="pay_offline" />
                                <label for="payment">线下转账</label><br/>
                                    <div class="reveal-if-active">

                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>项目</th>
                                        <th>内容</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>单位名称</td>
                                        <td>杭州浙大同力会展业管理有限公司</td>
                                    </tr>
                                    <tr>
                                        <td>银行账号</td>
                                        <td>1202024609914400145</td>
                                    </tr>
                                    <tr>
                                        <td>开户银行</td>
                                        <td>中国工商银行杭州浙大分理处</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <p>转账时请备注报名人姓名和手机号</p>
                                <p>转账后请将报名人姓名、公司、电子邮箱、手机号、转账截图以及是否需要发票（含抬头）邮件发送至<a href="mailto:sgorganizer@outlook.com?subject=Register Scrum Gathering China 2016">sgorganizer@outlook.com</a></p>
                                        </div>

                            </div> <!-- end entry content -->
                        </div> <!-- end entry -->
                    </div> <!-- end entry item -->

                        <table>
                        <tr>
                            <td colspan="2" align="right">
                                <input type="submit" name="submit" value="提交"/>
                            </td>
                        </tr>
                        </table>
                    </form>

                </div> <!-- end col -->

            </div> <!-- end row -->
        </div> <!-- end container -->
    </section> <!-- end blog single -->


    <!-- Footer -->
    <footer id="footer" class="minimal">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">

                    <!-- <div class="socials">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </div>  --><!-- end socials -->

							<span class="copyright text-center">
								©2016 杭州敏捷社区 版权所有 | 浙ICP备16015963号
							</span>

                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- end container -->
    </footer> <!-- end footer -->

    <div id="back-to-top">
        <a href="#top"><i class="arrow_carrot-up"></i></a>
    </div>

</div> <!-- end main-wrapper -->

</body>
</html>