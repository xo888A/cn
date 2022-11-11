<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>全部视频</title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />
    <link rel="stylesheet" type="text/css" href="../css/swiper.css" />
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/api.js"></script>
    <script type="text/javascript" src="../script/swiper.js"></script>
    
</head>

<body>
    <?php file::import("system-model-header"); ?>
    <div class="swiper wrap overflow  swiperlbss">
        <div class="swiper-wrapper">
            
            <?php echo $this->vars["vlist"] ?>
        </div>
    </div>
    <div class="index  wrap overflow swiper">
        <div class="swiper-wrapper">
            <?php echo $this->vars["adv1"] ?>
        </div>
        <div class="i swiper-pagination"></div>
    </div>
    
    <div class="wrap" style="margin-top:20px">
        <div class="index-adv  overflow adv3" style="margin-top:0">
            <p>
                <a href='<?php echo INDEX ?>/index.php?mod=userlist'><img src='../image/jinpaizuozhe.jpg' /></a>
                <span>金牌萌主</span>
            </p><p>
                <a href='<?php echo INDEX ?>/index.php?mod=vip' ><img src='../image/xuanzewanfa.jpg' /></a>
                <span>充值VIP</span>
            </p><p>
                <a href='<?php echo INDEX ?>/index.php?mod=message&type=平台通知'><img src='../image/zhuantiguidang.jpg' /></a>
                <span>平台通知</span>
            </p><p>
                <a href='<?php echo INDEX ?>/index.php?mod=app'><img src='../image/tuijianapp.jpg' /></a>
                <span>推荐APP</span>
            </p>
        </div>
    </div>
    <p class="line"></p>


    <ul class="publicul  mt15">
        <?php echo $this->vars["data"] ?>
        
    </ul>
    <?php echo $this->vars["page"] ?>
    <p class="botom"></p>
    <?php file::import("system-model-footer"); ?>
    <script>
        var swiper = new Swiper('.index', {
          pagination: {
            el: '.i.swiper-pagination',
          },
          direction:'horizontal',
          loop: true,
          autoplay:true,
          speed:1000,
        });
        var swiper = new Swiper(".indexadv", {
            observer:true,
             observeParents:true,
             slidesPerView: 'auto',
             freeMode : true,
             freeModeFluid : true,
             spaceBetween: 10,
         });
         var swiper = new Swiper(".swiperlbss", {
            slidesPerView: 'auto',
            observer:true,
            observeParents:true,
            freeMode : true,
            freeModeFluid : true,
            spaceBetween: 10,
         });

    </script>
</body>

</html>
