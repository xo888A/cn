<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>观看记录</title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />
    <link rel="stylesheet" type="text/css" href="../css/swiper.css" />
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/api.js"></script>
    <script type="text/javascript" src="../script/swiper.js"></script>
    <script type="text/javascript" src="<?php echo JS ?>/index.js"></script>
</head>

<body>
    <?php file::import("system-model-top"); ?>
    <div class="wrap users mt70">
        <div class="rel">
            <p class="rel"><a href="<?php echo INDEX ?>/index.php?mod=set"><?php echo $this->vars["levelavatar"] ?><img class="avatar" src="<?php echo $this->vars["avatar"] ?>" /></a></p>
            <div class="u abs">
                <p><?php echo $this->vars["username"] ?><span><img class="i1" src="../image/<?php echo $this->vars["level"] ?>.png" /></span></p>
                <p class="p"><?php echo $this->vars["nick"] ?><span><img class="i2" src="../image/<?php echo $this->vars["sex"] ?>.png" /></span><span ><a class="co" href="<?php echo INDEX ?>/index.php?mod=set">设置<img class="i3" src="../image/u.png" /></a></span></p>
            </div>
        </div>
        <ul class="s overflow">
            <li>
                <div>
                    <img class="p" src="../image/profile_vip_bg.png" />
                    <img class="abs" src="../image/o1.png"  />
                    <p class="p1 abs">会员</p>
                    <p class="p2 abs"><?php echo $this->vars["mylevel"] ?></p>
                    <p class="p3 abs"><a href="<?php echo INDEX ?>/index.php?mod=vip">充值VIP</a></p>
                </div>
            </li>
            <li>
                <div>
                    <img class="p" src="../image/profile_chongzhi_bg.png" />
                    <img class="abs" src="../image/o2.png"  />
                    <p class="p1 abs">金币</p>
                    <p class="p2 abs">余额:<?php echo $this->vars["diam"] ?></p>
                    <p class="p3 abs"><a href="<?php echo INDEX ?>/index.php?mod=money">充值金币</a></p>
                </div>
            </li>
            <li>
                <div>
                    <img class="p" src="../image/profile_packet_bg.png" />
                    <img class="abs" src="../image/o3.png"  />
                    <p class="p1 abs">钱包</p>
                    <p class="p2 abs">余额:<?php echo $this->vars["money"] ?>元</p>
                    <p class="p3 abs"><a href="<?php echo INDEX ?>/index.php?mod=wallet">打开钱包</a></p>
                </div>
            </li>
        </ul>
        <p class="user_user"  style='<?php echo $this->vars["isshow"] ?>'><a href="<?php echo INDEX ?>/index.php?mod=vip"><img src="../image/users.png" /></a></p>
        <ul class="overflow tool">
            <li><a href="<?php echo INDEX ?>/index.php?mod=user">
                <img src="../image/k1.png" />
                <p>会员中心</p></a>
            </li>
            <li><a href="<?php echo INDEX ?>/index.php?mod=set">
                <img src="../image/k2.png" />
                <p>账号设置</p></a>
            </li>
            <li><a href="<?php echo INDEX ?>/index.php?mod=wallet">
                <img src="../image/k3.png" />
                <p>我的钱包</p></a>
            </li>
            <li><a href="<?php echo INDEX ?>/index.php?mod=vip">
                <img src="../image/k4.png" />
                <p>充值VIP</p></a>
            </li>
            <li><a href="<?php echo INDEX ?>/index.php?mod=money">
                <img src="../image/k5.png" />
                <p>充值金币</p></a>
            </li>
            <li><a href="<?php echo INDEX ?>/index.php?mod=card">
                <img src="../image/k6.png" />
                <p>卡密兑换</p></a>
            </li>
            <li><a href="<?php echo INDEX ?>/index.php?mod=concern">
                <img src="../image/k7.png" />
                <p>我的关注</p></a>
            </li>
            <li><a href="<?php echo INDEX ?>/index.php?mod=albuy">
                <img src="../image/k8.png" />
                <p>已购影片</p></a>
            </li>
            <li><a href="<?php echo INDEX ?>/index.php?mod=customer">
                <img src="../image/k9.png" />
                <p>客服中心</p></a>
            </li>
            <li><a href="<?php echo INDEX ?>/index.php?mod=message">
                <img src="../image/k10.png" />
                <p>消息中心</p></a>
            </li>
            <li class="qiandao">
                <img src="../image/k11.png" />
                <p>签到赢金币</p>
            </li>
            <li><a href="<?php echo INDEX ?>/index.php?mod=shares">
                <img src="../image/k12.png" />
                <p>推广赚钱</p></a>
            </li>
            <li><a href="<?php echo INDEX ?>/index.php?mod=activity">
                <img src="../image/k13.png" />
                <p>官方活动</p></a>
            </li>
            <li><a href="<?php echo INDEX ?>/index.php?mod=app">
                <img src="../image/k14.png" />
                <p>推荐APP</p></a>
            </li>
            <li class="mbtn2 logout">
                <img src="../image/k15.png" />
                <p>退出账号</p>
            </li>
        </ul>
    
        <div class="pubtit">
            <p rel="u1"><span></span><a href="<?php echo INDEX ?>/index.php?mod=user">我的喜欢</a></p>
            <p class="selected" rel="u2"><span></span>观看记录</p>
            <span class="fr clearred ">清除观看记录</span>
        </div>
        <div class="public mt15  ">
            <ul class="overflow">
                 <?php echo $this->vars["data"] ?>
            </ul>
            <?php echo $this->vars["page"] ?>
        </div>
        <p class="line"></p>
    </div>
    <p class="botom"></p>
    <?php file::import("system-model-footer"); ?>
    <script>
        var swiper = new Swiper(".indexadv", {
            observer:true,
             observeParents:true,
             slidesPerView: 'auto',
             freeMode : true,
             freeModeFluid : true,
             spaceBetween: 10,
         });
    </script>
</body>

</html>
