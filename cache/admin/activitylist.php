<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>消息模块</title>
    <link rel="stylesheet" href="<?php echo CSS ?>/backstage.css" />
    <link rel="stylesheet" href="<?php echo CSS ?>/font-awesome.min.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/backstage.js"></script>
</head>
<body>
    <?php file::import("system-model-admin-header"); ?>
    <?php file::import("system-model-admin-aside"); ?>
    <div class="wrap">
        <div class="w100">
            <?php file::import("system-model-admin-tag"); ?>
            <div class="content">
                <div class="frame">
                    <p class="title">搜索条件</p>
                    <div class="frmtable">
                        <form action="admin.php" method="get" class="search">
                            <input type="hidden" name="mod" value="activitylist" />
                            <input name="keyword" value="<?php echo CW('get/keyword')==='0' ? '' : CW('get/keyword');  ?>" placeholder="搜索活动标题,支持模糊检索" />
                            <button type="submit" class="btn btn1"><i class="fa fa-search"></i>搜索</button>
                        </form>
                    </div>
                    
                </div>
                <div class="frame">
                    <p class="title">活动管理</p>
                    <div class="frmtable">
                    <table class="w100 list">
                        <tr>
                            <th>活动标题</th>
                            <th>活动封面</th>
                            <th>活动时间</th>
                            <th>发布时间</th>
                            <th>操作</th>
                        </tr>
                        <?php echo $this->vars["data"] ?>
                    </table>
                    </div>
                    <div class="fr pat30">
                        <?php echo $this->vars["page"] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>