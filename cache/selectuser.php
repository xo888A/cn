<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>精选萌主</title>
    <link rel="stylesheet" href="<?php echo CSS ?>/style.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/index.js"></script>
    <style>
        .selectuser{
            margin-top: 50px;
        }
        .selectuser li{
            float:left;
            margin-right:1.715%;
            width:11%;
            text-align: center;
            margin-bottom: 15px;
        }
        .selectuser li:nth-child(8n){
            margin-right:0;
        }
        .selectuser li img{
            width:120px;
            margin:0 auto;
            height:120px;
            border-radius: 50%;
        }
        .selectuser li p{
            font-size:16px;
            margin-top:5px;
            padding: 0 15px;
        }
    </style>
</head>

<body>
    <?php file::import("system-model-header"); ?>
    <div class="wrap">
        <div class="section3">
        <div class="flex">
                <ul class=" margin ranksoll">
                    <li class="selected"><p class="abs"></p><a href="<?php echo INDEX ?>/index.php?mod=selectuser">精选萌主</a></li>
                    <li class=""><p class="abs"></p><a href="<?php echo INDEX ?>/index.php?mod=typelist">专题归档</a></li>
                    <li class=""><p class="abs"></p><a href="<?php echo INDEX ?>/index.php?mod=playlist">选择玩法</a></li>                </ul>
            </div>
        </div>
        <ul class="overflow selectuser">
            <?php echo $this->vars["data"] ?>
        </ul>
       
    </div>
    <?php file::import("system-model-footer"); ?>

</body>

</html>
