<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>已购影片</title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/api.js"></script>
</head>

<body>
   <?php file::import("system-model-top"); ?>
    <div class="wrap  mt70">
        <div class="public mt15"  style="border:0">
            <ul class="overflow">
                <?php echo $this->vars["data"] ?>
            </ul>
            <?php echo $this->vars["page"] ?>
        </div>
    </div>
</body>

</html>
