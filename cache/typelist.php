<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>专题归档</title>
    <link rel="stylesheet" href="<?php echo CSS ?>/style.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/index.js"></script>
    <style>
        .typelist{
            margin-top: 50px;
        }
        .typelist li{
            float: left;
            width:32%;
            margin-right: 2%;
            margin-bottom: 20px;
        }
        .typelist li img{
            height:220px;
            width:100%;
            border-radius: 4px 4px 0 0;
        }
        .typelist li:nth-child(3n){
            margin-right:0;
        }
        .typelist li p{
            padding: 10px;
            background: #F9F9F9;
            border-radius:0 0 4px 4px;
            font-size: 15px;
        }
    </style>
</head>

<body>
    <?php file::import("system-model-header"); ?>
    <div class="wrap">
        <div class="section3">
        <div class="flex">
                <ul class=" margin ranksoll">
                    <li class=""><p class="abs"></p><a href="<?php echo INDEX ?>/index.php?mod=selectuser">精选萌主</a></li>
                    <li class="selected"><p class="abs"></p><a href="<?php echo INDEX ?>/index.php?mod=typelist">专题归档</a></li>
                    <li class=""><p class="abs"></p><a href="<?php echo INDEX ?>/index.php?mod=playlist">选择玩法</a></li>                </ul>
            </div>
        </div>
        <ul class="overflow typelist">
            <?php echo $this->vars["data"] ?>
        </ul>
       
    </div>
    <?php file::import("system-model-footer"); ?>

</body>

</html>
