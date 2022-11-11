<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>app</title>
    <link rel="stylesheet" href="<?php echo CSS ?>/style.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/index.js"></script>
</head>

<body>
    <?php file::import("system-model-header"); ?>
    <div class="wrap2 overflow">
        <div class="fl w100">
            <div class="fl fls">
                <p class="u"><img src="<?php echo $this->vars["avatar"] ?>" /></p>
                <p class="qiandao">签到赢金币</p>
                <ul class="fun">
                    <li><a href="<?php echo INDEX ?>/index.php?mod=user"><img src="<?php echo TU ?>/u1.png" />会员中心</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=edit"><img src="<?php echo TU ?>/u7.png" />作品管理</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=set"><img src="<?php echo TU ?>/u2.png" />账号设置</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=wallet"><img src="<?php echo TU ?>/u3.png" />我的钱包</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=vip"><img src="<?php echo TU ?>/u4.png" />充值会员</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=money"><img src="<?php echo TU ?>/u5.png" />充值金币</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=card"><img src="<?php echo TU ?>/u6.png" />卡密兑换</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=concern"><img src="<?php echo TU ?>/u7.png" />我的关注</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=albuy"><img src="<?php echo TU ?>/u8.png" />已购影片</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=customer"><img src="<?php echo TU ?>/u9.png" />客服中心</a></li>
                    <li  class="selected"><a href="<?php echo INDEX ?>/index.php?mod=message"><img src="<?php echo TU ?>/u10_.png" />消息中心</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=shares"><img src="<?php echo TU ?>/u11.png" />推广赚钱</a></li>
                    <li class="logout"><a href="<?php echo INDEX ?>/index.php?mod=logout "><img src="<?php echo TU ?>/u12.png" />退出账号</a></li>
                </ul>
            </div>
           
            <div class="fl flr">
                <ul class="overflow message width1">
                    <li>
                        <a href="<?php echo INDEX ?>/index.php?mod=message&type=平台通知">
                        <img src="<?php echo TU ?>/msg1.png" />
                        <p>平台通知</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo INDEX ?>/index.php?mod=message&type=官方消息">
                        <img src="<?php echo TU ?>/msg2.png" />
                        <p>官方消息</p>
                        </a>
                    </li>
  
                    <li>
                        <a href="<?php echo INDEX ?>/index.php?mod=activity">
                        <img src="<?php echo TU ?>/msg4.png" />
                        <p>官方活动</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo INDEX ?>/index.php?mod=app">
                        <img src="<?php echo TU ?>/msg5.png" />
                        <p>推荐APP</p>
                        </a>
                    </li>
                </ul>
                <ul class="overflow app">
                    <?php echo $this->vars["data"] ?>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <?php file::import("system-model-footer"); ?>
</body>

</html>
