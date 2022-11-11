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
    <script src="<?php echo JS ?>/captcha.js"></script>
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
                #image-cap {
            box-shadow: 1px 1px 4px 0px grey;
            padding: 12px 25px 15px 25px;
            font-weight: 400;
            user-select: none;
            font-style: italic;
            font-size: x-large;
            margin-left: 12px;
            background: url(../../static/img/captcha-bg5.png) ;
            background-size: 100% 100%;
            color: deeppink;
            min-width: 67px;
            vertical-align: middle;
        }
    </style>
</head>

<body onload="generatec()">
    <?php file::import("system-model-top"); ?>
   

   
    <div class="wrap" style="margin-top:100px">
        <div class="fm">
            <input value="" class="fmbtn" name="tel" minlength="5" maxlength="11" placeholder="账号">
            <input value="" class="fmbtn" name="pass" minlength="5" maxlength="11" placeholder="密码">
<!--            <input value="18888888888" class="fmbtn" name="tel" minlength="5" maxlength="11" placeholder="账号">
            <input value="123456" class="fmbtn" name="pass" minlength="5" maxlength="11" placeholder="密码">-->
            <div>
                <div id="user-input"  style="width: 65%;" class="inline">
                    <input type="text" class="fmbtn" id="submit-cap"
                        placeholder="验证码" />
                </div>
            
          
                <div class="inline"  onclick="generatec()">
                      <div id="image-cap" style="width: auto;"  class="inline" selectable="False">
                     </div>
                </div>
              
            </div>
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
