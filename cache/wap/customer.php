<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>客服中心</title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/api.js"></script>
</head>

<body>
    <?php file::import("system-model-top"); ?>
    <div class="wrap  mt70">
        <div class="customer rel">
            <img class="customer" src="<?php echo TU ?>/customer.png">
            <div>
                <p class="p1">客服中心</p>
                <p class="p2">嘿，朋友！您遇到问题了吗？请与我们的专业客服团队联系，我们有备而来训练有素，在您使用本站服务遇到的任何问题，可为您提供全程指导直至成功解决！</p>
                
            </div>
        </div>
        <p class="cutbtn overflow"><a href="<?php echo $this->vars["kefu1"] ?>" target="_blank"  class="fl">在线客服</a><a href="<?php echo $this->vars["kefu2"] ?>" target="_blank" class="fr">备用客服</a></p>
    </div>
    <div class="wrap">
        <ul class="answerlist overflow  w100">
            <?php echo $this->vars["data"] ?></ul>
    </div>
</body>

</html>
