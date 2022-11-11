<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>会员中心</title>
    <meta name="keywords" content="关键词" />
    <meta name="description" content="首页描述" />
    <link rel="stylesheet" href="<?php echo CSS ?>/style.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/index.js"></script>
</head>

<body>
    <?php file::import("system-model-header"); ?>
    <div class="wrap2 overflow">
        <div class="fl w100">
            <div class="fl fls phonehide">
                <p class="u"><img src="<?php echo $this->vars["avatar"] ?>" /></p>
                <p class="qiandao">签到赢金币</p>
                <ul class="fun">
                    <li class="selected"><a href="<?php echo INDEX ?>/index.php?mod=user"><img src="<?php echo TU ?>/u1_.png" />会员中心</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=edit"><img src="<?php echo TU ?>/u7.png" />作品管理</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=set"><img src="<?php echo TU ?>/u2.png" />账号设置</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=wallet"><img src="<?php echo TU ?>/u3.png" />我的钱包</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=vip"><img src="<?php echo TU ?>/u4.png" />充值会员</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=money"><img src="<?php echo TU ?>/u5.png" />充值金币</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=card"><img src="<?php echo TU ?>/u6.png" />卡密兑换</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=concern"><img src="<?php echo TU ?>/u7.png" />我的关注</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=albuy"><img src="<?php echo TU ?>/u8.png" />已购影片</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=customer"><img src="<?php echo TU ?>/u9.png" />客服中心</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=message"><img src="<?php echo TU ?>/u10.png" />消息中心</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=shares"><img src="<?php echo TU ?>/u11.png" />推广赚钱</a></li>
                    <li class="logout"><a href="<?php echo INDEX ?>/index.php?mod=logout "><img src="<?php echo TU ?>/u12.png" />退出账号</a></li>
                </ul>
            </div>
            <div class="fl flr">
                <div class="top rel phonehide">
                    <div>
                        <ul class="overflow userindex ">
                            <li>
                                <img src="<?php echo TU ?>/top1.png" />
                                <p class="p1"><?php echo $this->vars["username"] ?></p>
                                <p class="p2">我的账号</p>
                            </li>
                            <li>
                                <img src="<?php echo TU ?>/top2.png" />
                                <p class="p1">余额: <?php echo $this->vars["diam"] ?></p>
                                <p class="p2">我的金币</p>
                            </li>
                            <li>
                                <img src="<?php echo TU ?>/top3.png" />
                                <p class="p1"><?php echo $this->vars["mylevel"] ?></p>
                                <p class="p2">会员权限</p>
                            </li>
                        </ul>
                    </div>
                    <img class="abs" src="<?php echo TU ?>/vipbg.png" />
                </div>
                <ul class="adv overflow">
                    
                    <?php echo $this->vars["adv"] ?>
                </ul>
                <div class="pubtit">
                    <p class="selected" rel="u1"><span></span>我的喜欢</p>
                    <p rel="u2"><span></span><a href="<?php echo INDEX ?>/index.php?mod=look">观看记录</a></p>
                    <span class="fr clearred hide" >清除观看记录</span>
                </div>
                <section class="public">
            <ul class="useradd2 overflow width3 ul1 vimga">
                <?php echo $this->vars["likes"] ?>
            </ul>
            <?php echo $this->vars["page"] ?>
            <div class="clear"></div>
        </section>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <?php file::import("system-model-footer"); ?>
    <script>
        $(function(){
            
        });
    </script>
</body>

</html>
