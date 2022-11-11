<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>活动</title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/api.js"></script>
</head>

<body>
    <?php file::import("system-model-top"); ?>
    <div class="wrap  mt70">
        <ul class="overflow message width1">
            <li>
                <a href="<?php echo INDEX ?>/index.php?mod=message&type=平台通知">
                <img src="<?php echo INDEX ?>/static/img/web/msg1.png">
                <p>平台通知</p>
                </a>
            </li>
            <li>
                <a href="<?php echo INDEX ?>/index.php?mod=message&type=官方消息">
                <img src="<?php echo INDEX ?>/static/img/web/msg2.png">
                <p>官方消息</p>
                </a>
            </li>

            <li>
                <a href="<?php echo INDEX ?>/index.php?mod=activity">
                <img src="<?php echo INDEX ?>/static/img/web/msg4.png">
                <p>官方活动</p>
                </a>
            </li>
            <li>
                <a href="<?php echo INDEX ?>/index.php?mod=app">
                <img src="<?php echo INDEX ?>/static/img/web/msg5.png">
                <p>推荐APP</p>
                </a>
            </li>
        </ul>
        <ul class="overflow activity center">
            <?php echo $this->vars["data"] ?></ul>
    </div>
    <p class="botom"></p>
</body>

</html>
