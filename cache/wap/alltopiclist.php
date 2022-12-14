<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>话题板块</title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />
    <link rel="stylesheet" type="text/css" href="../css/swiper.css" />
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/api.js"></script>
    <script type="text/javascript" src="../script/swiper.js"></script>
</head>

<body>
    <header class="public">
        <img class="abs left back" src="../image/left_.png" />
        <img class="abs right menu" src="../image/menu.png" />
        <p class="center">全部话题</p>
        
    </header>
    <div class="list hide">
            <p class="category">分类菜单</p>
            <img src="../image/close.png" class="closecategory" />
            <ul class="overflow">
                <?php echo $this->vars["topic"] ?>
            </ul>
        </div>
    <div class="wrap">
        <ul class="overflow allt" style="margin-top: 55px !important;">
            <?php echo $this->vars["data"] ?>
        </ul>
        <?php echo $this->vars["page"] ?>
        <p style="height:30px"></p>
    </div>
</body>

</html>
