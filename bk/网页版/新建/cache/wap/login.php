<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>登录</title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />
    <link rel="stylesheet" type="text/css" href="../css/swiper.css" />
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/api.js"></script>
    <script type="text/javascript" src="<?php echo JS ?>/index.js"></script>
    <script type="text/javascript" src="../script/swiper.js"></script>
    <style>
        .bg-roll{
            overflow: hidden;
        }
        .bg-roll img{
            height:200px;
             width:100%;    object-fit: contain;
        }
        .fm{
            margin-top:2px;
        }
    </style>
</head>

<body>
    <?php file::import("system-model-top"); ?>
   

   
    <div class="wrap" style="margin-top:100px">
        <div class="fm">
            <input value="18888888888" class="fmbtn" name="tel" minlength="5" maxlength="11" placeholder="账号">
            <input value="123456" class="fmbtn" name="pass" minlength="5" maxlength="11" placeholder="密码">
            <!--<p class="right"><a href="<?php echo INDEX ?>/findpass.html">忘记密码?</a></p>-->
            <p class="pubbtn"><a href="javascript:;" class="lgin">登录</a></p>
            <p class="pubbtn" style="background:#F0ABA6"><a href="<?php echo INDEX ?>/reg.html">10秒快捷注册</a></p>
            <div class="center2 overflow">
                <div>
                    <a href="<?php echo INDEX ?>/index.php?mod=customer">
                    <img src="<?php echo INDEX ?>/static/img/web/form1.png">
                    <span>客服中心</span>
                    </a>
                </div>
                <div>
                    <a href="<?php echo INDEX ?>/download.html">
                    <img src="<?php echo INDEX ?>/static/img/web/form2.png">
                    <span>APP下载</span>
                    </a>
                </div>
                <div>
                    <a href="<?php echo $this->vars["tougao"] ?>" target="_blank">
                    <img src="<?php echo INDEX ?>/static/img/web/form3.png">
                    <span>投稿赚钱</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <p class="botom"></p>
</body>

</html>
