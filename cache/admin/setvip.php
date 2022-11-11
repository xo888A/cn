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
        .category_input{
            width:100% !important
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
                    <p class="title">会员设置</p>
                    <div class="notice">
		                <div class="note-info">
		                    <p class="p1 btn3">温馨提示</p>
		                    <p class="pub">如果需要显示24小时促销卡, 请到 APP内部设置-我的-系统设置 里开启</p>
		                    <p class="pub" style="color:#f00;font-weight:bold">VIP卡第一项填写值: 开启  或者  关闭 不可填其他值</p>
		                    <a href="javascript:;" class="btn init" rel="initvips">如果本页面无会员卡选项数据,请点击本按钮初始化</a>  
		                </div>
		            </div>
                    <div class="frmtable">
                    <table class="w100 list">
                        <tr>
                            <th>开启/关闭</th>
                            <th>左上角宣传语</th>
                            <th>会员卡名称</th>
                            <th>原价</th>
                            <th>现价</th>
                            <th>优惠券</th>
                            <th>会员卡描述</th>
                            <th>会员天数</th>
                            <th>赠送钻石数</th>
                            <th>购买地址</th>
                            <th>优惠后地址</th>
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