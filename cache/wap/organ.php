<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title><?php echo $this->vars["title"] ?></title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />
    <link rel="stylesheet" type="text/css" href="../css/swiper.css" />
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/api.js"></script>
    <script type="text/javascript" src="../script/swiper.js"></script>
    <script type="text/javascript" src="<?php echo JS ?>/index.js"></script>
    <script type="text/javascript" src="<?php echo JS ?>/copy.js"></script>
    <style>
        ._index{
            position: fixed;top:0;left:0;width:100%;background: #fff;z-index: 99999;
        }
        .title {
            margin-top: 65px;
        }
        .guanzhu{
            right: -13% !important;
        }
        .bts div{
            width:33.3333%;
        }
         .fs,.nfs{
            display: none;
        }
    </style>
</head>

<body>
    <div class="rel _index">
        <img src="../image/left_.png" class="abs left_ back" />
        
    
        <div class="user rel wrap speuser">
            <a href="<?php echo INDEX ?>/index.php?mod=author&id=<?php echo $this->vars["usertel"] ?>"><img class="avatar" src="<?php echo $this->vars["user_avatar"] ?>"></a>
            <p class="abs nicknames"><a href="<?php echo INDEX ?>/index.php?mod=author&id=<?php echo $this->vars["usertel"] ?>"><?php echo $this->vars["user_nickname"] ?></a><span class="fs"><?php echo $this->vars["user_follow"] ?></span><span class="nfs">粉丝</span></p>
            <p class="m abs"><span><?php echo $this->vars["user_descs"] ?></span></p>
            <p class="abs guanzhu"><?php echo $this->vars["guanzhu"] ?></p>
        </div>
    </div>
    <!--<div class="list hide">-->
    <!--        <p class="category">分类菜单</p>-->
    <!--        <img src="../image/close.png" class="closecategory" />-->
    <!--        <ul class="overflow">-->
    <!--            <?php echo $this->vars["topic"] ?>-->
    <!--        </ul>-->
    <!--    </div>-->
    <div class="title wrap rel">
       
        <p><?php echo $this->vars["title"] ?></p>
    </div>
    <div class="wrap">
        <div class="video"><p class="ts"><img src="<?php echo TU ?>/a.png" /><?php echo $this->vars["time"] ?><img src="<?php echo TU ?>/b.png" class="b" /><?php echo $this->vars["look"] ?><img class="c" src="<?php echo TU ?>/c.png" /><?php echo $this->vars["like"] ?></p></div>
        <ul class="categorys overflow">
            <li class="a"><img src="../image/category.png">话题</li>
            <?php echo $this->vars["topic"] ?></ul>
    </div>
    <div class="imglist">
        <?php echo $this->vars["imgcontent"] ?>
    </div>
    <div class="rel gl center">
        <div class="lines"></div>
        <p>喜欢请点赞关注鼓励鼓励吧!</p>
    </div>
    <div class="bts overflow wrap">
        <div><?php echo $this->vars["liked"] ?></div>
      
        <div><a href="<?php echo INDEX ?>/index.php?mod=shares"><img class="m3" src="<?php echo TU ?>/m3.png"><span>推广赚钱</span></a></div>
        <div><a href="<?php echo INDEX ?>/index.php?mod=shares"><img class="m4" src="<?php echo TU ?>/m4.png"><span>分享送VIP</span></a></div>
    </div>
    <p class="line"></p>
    <div class="wrap swiper">
        <p class="tit mt15"><img src="../image/xianguang.png" width="25" height="25" style="width: 25px; height: 25px;"/>相关推荐<span class="fr resh"><img src="../image/resh.png" />换一批</span></span></p>
        <div class="publicswiper swiper">
            <div class="swiper-wrapper reshcontent">
                <?php echo $this->vars["data"] ?>
            </div>
        </div>
    </div>
    <p class="line"></p>
    <div class="wrap">
        <p class="tit mt15"><img src="../image/hot.png" width="25" height="25" style="width: 25px; height: 25px;"/>热门推荐<span class="fr"><a href="<?php echo INDEX ?>/index.php?mod=recommend">更多</a><img src="../image/right.png" /></span></span></p>
        <ul class="rpart overflow">
            <?php echo $this->vars["adv1"] ?>
            <?php echo $this->vars["data2"] ?> 
        </ul>
    </div>
    <p class="line"></p>
    <div class="wrap">
        <p class="ptit">全部评论<span><?php echo $this->vars["pinglun"] ?></span></p>
        <div class="pinglun">
            <?php echo $this->vars["cms"] ?>
        </div>
    </div>
    <p class="botom"></p>
    <div class='fix win hide'>
                <div class='w rel'>
                    <img src='<?php echo TU ?>/close.png' class='closealert abs' />
                    <div class='padding'>
                        <p class='t'>每日看片额度说明</p>
                        <table class="ntable">
                            <?php echo $this->vars["table"] ?>
                        </table>
                        <a href='<?php echo INDEX ?>/index.php?mod=vip' class='d' style="margin:15px auto 0">升级VIP等级</a>
                    </div>
                </div>
            </div>
            
             <div class='fix win2 hide'>
                <div class='w rel'>
                    <img src='<?php echo TU ?>/close.png' class='closealert abs' />
                    <div class='padding'>
                        <p class='t'>每日下载额度说明</p>
                        <table class="ntable">
                            <?php echo $this->vars["table2"] ?>
                        </table>
                        <a href='<?php echo INDEX ?>/index.php?mod=vip' class='d' style="margin:15px auto 0">升级VIP等级</a>
                    </div>
                </div>
            </div>
    <footer class="fix w100  phonefix" >
        <div contentEditable="<?php echo $this->vars["notlogins"] ?>"  name="textarea" class="textarea">
            <?php echo $this->vars["notlogin"] ?>
        </div>
        <div class="bq ">
                <div><p class="control" rel="1"><img class="b c" src="<?php echo TU ?>/b1.png" /></p><a postid='<?php echo $this->vars["id"] ?>' class="fr fabiao" href="javascript:;" tel2='' commentid=''>发表评论</a></div>
            </div>
    </footer>
    <div class="biaoqing hide">
        <p class="biaoqingindex" style="margin-bottom: 4px;"><a class="biaoqing1" href="javascript:;">表情</a></p>
        <ul class="overflow biaoqing2">
            <?php echo $this->vars["biaoqing"] ?>
        </ul>
       
    </div>
    <?php echo $this->vars["js"] ?>
    <script>
        var swiper = new Swiper(".publicswiper", {
            slidesPerView: 'auto',
            grid: {
                rows: 2,
            },
            observer:true,
            observeParents:true,
            freeMode : true,
            freeModeFluid : true,
            spaceBetween: 10,
         });
         $(function(){
             $('.title img.abs').click(function(){
                var src = $(this).attr('src');
                if(src=="../image/x.png"){
                    $(this).attr('src',"../image/s.png");
                    $('.title p').attr('style',"");
                }else{
                    $(this).attr('src',"../image/x.png");
                    $('.title p').attr('style',"height:auto");
                }
                 
             });
             $('.openinstro').click(function(){
                $('.win').show();
            });
            $('.control').click(function(){
                var rel = $(this).attr('rel');
                rel = parseInt(rel);
                if(rel==1){
                    $('.c.b').attr('src',"<?php echo TU ?>/b2.png");
                    $('.biaoqing').show();
                    $(this).attr('rel',0);
                }else{
                    $('.c.b').attr('src',"<?php echo TU ?>/b1.png");
                    $('.biaoqing').hide();
                    $(this).attr('rel',1);
                }
            });
              $('.resh').click(function(){
                $.ajax({url:"<?php echo INDEX ?>/webajax.php?mod=resh&type=phone&t=organ",success:function(data){
                    $(".reshcontent").html(data);
                }});
            });

         });
         
    </script>
</body>

</html>
