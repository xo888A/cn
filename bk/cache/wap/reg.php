<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>注册</title>
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
            width:100%;
                object-fit: contain;
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

            <input class="fmbtn" name="tel" minlength="5" maxlength="20" placeholder="设置账号">
            <p class="ts3">可填写手机号或字母数字账号</p>
            <input type="hidden" name="card" value="<?php echo CW('get/card');  ?>"  />
            <input class="fmbtn" name="pass" minlength="5" maxlength="20" placeholder="设置密码">
            <input class="fmbtn" name="passt" minlength="5" maxlength="20" placeholder="确认密码">
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
            <p class="pubbtn" style="margin-top:0"><a href="javascript:;" class="_reg" rel="regs">注册</a></p>
            <p class="pubbtn"><a href="<?php echo INDEX ?>/login.html">登录</a></p>
            <div class="center2">
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
