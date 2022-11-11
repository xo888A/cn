<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title><?php echo TITLE ?></title>
    <link rel="stylesheet" href="<?php echo CSS ?>/backstage.css" />
    <link rel="stylesheet" href="<?php echo CSS ?>/font-awesome.min.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/backstage.js"></script>
    <style>
        .search select{
            width: 100%;
        }
    </style>
</head>
<body>
    <?php file::import("system-model-admin-header"); ?>
    <?php file::import("system-model-admin-aside"); ?>
    <div class="wrap">
        <div class="w100">
            <?php file::import("system-model-admin-tag"); ?>
            <div class="content">
                <div class="frame">
                    <p class="title">签到设置</p>
                    <div class="notice">
		                <div class="note-info">
		                    <p class="p1 btn3">温馨提示</p>
		                    <p class="pub">1. 第三天/第五天/第七天 奖励图标由系统强制固定设置 , 奖励内容由管理员设定的为准.</p>
		                    <p class="pub">2. 需连续签到,才会得到终极奖励, 断签将重新计算.</p>
		                    <a href="javascript:;" class="btn init" rel="initsignin">如果本页面无签到奖励数据,请点击本按钮初始化</a>  
		                </div>
		            </div>
                    <div class="frmtable">
                    <table class="w100 list">
                        <tr>
                            <th>天数</th>
                            <th>奖励类型</th>
                            <th>奖励内容</th>
                            <th>编辑</th>
                        </tr>
                        <?php echo $this->vars["data"] ?>
                    </table>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>
</body>
</html>