<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>登录</title>
    <link rel="stylesheet" href="<?php echo CSS ?>/style.css?ver=1.14" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/index.js?ver=1.14"></script>
    <script src="<?php echo JS ?>/captcha.js"></script>
</head>

<body onload="generatec()">
    <?php file::import("system-model-header"); ?>
    <div class="wrap">
        <div class="fm">
            <p class="center">登录</p>
            <input class="fmbtn" name="tel" minlength="5" maxlength="20" placeholder="账号" value="" />
            <input class="fmbtn" value="" name="pass" minlength="5" maxlength="20" placeholder="密码" />
            
            <div>
                <div id="user-input" style="width: 67%;" class="inline">
                    <input type="text" class="fmbtn" id="submit-cap"
                        placeholder="验证码" />
                </div>
             <div class="inline"  onclick="generatec()">
                    <div id="image-cap" class="" selectable="False">
                </div>
                
                </div>
            </div>
            <!--<p class="right"><a href="<?php echo INDEX ?>/findpass.html">忘记密码?</a></p>-->
            <p class="pubbtn"><a href="javascript:;" class="lgin">登录</a></p>
            <p class="pubbtn" style="background:#F0ABA6"><a href="<?php echo INDEX ?>/reg.html">10秒快捷注册</a></p>
            <div class="center2">
                <div>
                    <a href="<?php echo INDEX ?>/index.php?mod=customer">
                    <img src="<?php echo TU ?>/form1.png" />
                    <span>客服中心</span>
                    </a>
                </div>
                <div>
                    <a href="<?php echo INDEX ?>/download.html">
                    <img src="<?php echo TU ?>/form2.png" />
                    <span>APP下载</span>
                    </a>
                </div>
                <div>
                    <a href="<?php echo $this->vars["tougao"] ?>" target="_blank">
                    <img src="<?php echo TU ?>/form3.png" />
                    <span>投稿赚钱</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>
