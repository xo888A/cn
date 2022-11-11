<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>推广赚钱</title>
    <meta name="keywords" content="关键词" />
    <meta name="description" content="首页描述" />
    <link rel="stylesheet" href="<?php echo CSS ?>/style.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/index.js"></script>
    <script src="<?php echo JS ?>/copy.js"></script>
    <style>
        .fenhong_download .a{
            width: 100%;
            text-align: center;
            font-size: 18px;
            margin: 20px 0;
        }
        .fenhong_download .b{ 
            cursor: pointer;
            background: #FF7AA5;
            color: #fff;
            width: 30%;
            margin: 0 auto;
            text-align: center;
            line-height: 55px;
            font-size: 18px;
            border-radius: 6px;
        }
        .share2 p.button{
            margin-top: 0;
            margin-bottom: 25px;
        }
        .tui1{
            margin-top:15px;
            margin-bottom:3px;
        }
        .tui1 span{
            color:#FF7AA5;
        }
    </style>
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
                    <li><a href="<?php echo INDEX ?>/index.php?mod=message"><img src="<?php echo TU ?>/u10.png" />消息中心</a></li>
                    <li  class="selected"><a href="<?php echo INDEX ?>/index.php?mod=shares"><img src="<?php echo TU ?>/u11_.png" />推广赚钱</a></li>
                    <li class="logout"><a href="<?php echo INDEX ?>/index.php?mod=logout "><img src="<?php echo TU ?>/u12.png" />退出账号</a></li>
                </ul>
            </div>
            <div class="fl flr">
               <ul class="overflow width3 share">
                   <li>
                       <p class="p1"><span>¥</span><?php echo $this->vars["num1"] ?></p>
                       <p class="p2">历史总收入</p>
                       <img src="<?php echo TU ?>/sh1.png" />
                   </li>
                   <li>
                       <p class="p1"><?php echo $this->vars["num2"] ?></p>
                       <p class="p2">历史总注册</p>
                       <img src="<?php echo TU ?>/sh2.png" />
                   </li>
                   <li>
                       <p class="p1"><?php echo $this->vars["num5"] ?></p>
                       <p class="p2">历史总下载</p>
                       <img src="<?php echo TU ?>/sh3.png" />
                   </li>
                   <li>
                       <p class="p1"><span>¥</span><?php echo $this->vars["num3"] ?></p>
                       <p class="p2">今日收入</p>
                       <img src="<?php echo TU ?>/sh4.png" />
                   </li>
                   <li>
                       <p class="p1"><?php echo $this->vars["num4"] ?></p>
                       <p class="p2">今日注册</p>
                       <img src="<?php echo TU ?>/sh5.png" />
                   </li><li>
                       <p class="p1"><?php echo $this->vars["num6"] ?></p>
                       <p class="p2">今日下载</p>
                       <img src="<?php echo TU ?>/sh6.png" />
                   </li>
               </ul>
               <script>
                    $(function(){
                        $('.pubtit p').click(function(){
                            var rel = $(this).attr("rel");
                            $('.pubtit p').attr('class','');
                            $(this).attr('class','selected');
                            if(rel=="u1"){
                                $('.part1').show();
                                $('.part2,.part3').hide();
                            }else if(rel=="u2"){
                                $('.part2').show();
                                $('.part1,.part3').hide();
                            }else{
                                $('.part3').show();
                                $('.part1,.part2').hide();
                            }
                        });
                        $('.tx li').click(function(){
                            $('.tx li').attr('class','');
                            $(this).attr('class','selected');
                        });
                    });
                </script>
                <div class="pubtit">
                    <p class="selected" rel="u1"><span></span>开始推广</p>
                    <p rel="u2"><span></span>收益报表</p>
                    <p rel="u3"><span></span>注册报表</p>
                 
                </div>
                <div class="part1 part share2 ">
                    <p class="bdesc">温馨提示: 通过以下推广链接或者二维码进来消费的会员都会统计收益！报表真实有效，通过你的链接进来即可绑定推荐关系，一旦注册将永久绑定推荐ID，会员任何时候购买都会统计你名下，享受永久二次消费收益分成。</p>
                    <p class="tui1"><span>推广链接1:</span> 进入网站首页(通用链接)</p>
                    <p class="button"><input readonly="readonly" value="<?php echo $this->vars["url"] ?>"><a href="javascript:;" class="urls">复制</a></p>
                    <p class="tui1"><span>推广链接2:</span> 进入APP下载页面(特约代理专用)</p>
                    <p class="button"><input readonly="readonly" value="<?php echo $this->vars["url2"] ?>"><a href="javascript:;" class="urls2">复制</a></p>
                    <p class="tui1"><span>推广二维码</span> </p>
                    <p style="margin: 10px 0 40px;"><img src="<?php echo INDEX ?>/index.php?mod=qrcode&card=<?php echo $this->vars["card"] ?>" /></p>
                    <div class="rel">
                        <p class="abs"></p>
                        <p><strong>1</strong><span>第一步: </span>复制任意推广链接/二维码</p>
                        <p class="ti"><strong>2</strong><span>第二步: </span>将推广链接通过各种渠道发送出去，平常使用的社交软件交流群等。</p>
                        <p class="t2"><img src="<?php echo TU ?>/tg.png" /></p>
                        <p><strong>3</strong><span>第三步: </span>被邀请的用户通过你的分享链接进来，即可绑定推荐关系，一旦注册将永久绑定推荐ID，享受会员二次升级消费收益分成！满100元即可提现！</p>
                    </div>
                </div>
                <div class="part2 hide">
                    <p class="bigtit overflow">
                        <span class="fl">被邀请用户行为</span>
                        <span class="fr">分成金额</span>
                    </p>
                    <ul class="overflow ulli2">
                        <?php echo $this->vars["fenhong"] ?>
                    </ul>
                </div>
                <div class="part3 hide">
                    <p class="bigtit overflow">
                        <span class="fl">被邀请用户</span>
                        <span class="fr"></span>
                    </p>
                    <ul class="overflow ulli2">
                        <?php echo $this->vars["users"] ?>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <?php file::import("system-model-footer"); ?>
    <script>
        var clipboard = new Clipboard('.urls', {
        text: function() {
            return '<?php echo $this->vars["url"] ?>';
        }
    });
    clipboard.on('success',
    function(e) {
        alert('复制成功!');
    });
    var clipboard2 = new Clipboard('.urls2', {
        text: function() {
            return '<?php echo $this->vars["url2"] ?>';
        }
    });
    clipboard2.on('success',
    function(e) {
        alert('复制成功!');
    });
    $(function(){
        $('.shouyidw').click(function(){
            if(confirm('确定要下载收益报表吗?')){
                window.open("<?php echo INDEX ?>/webajax.php?mod=txt&id=1");
            }
        });
        $('.userdw').click(function(){
            if(confirm('确定要下载注册报表吗?')){
                window.open("<?php echo INDEX ?>/webajax.php?mod=txt&id=2");
            }
        });
    });
    </script>
</body>

</html>
