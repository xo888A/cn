<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>设置</title>
    <link rel="stylesheet" href="<?php echo CSS ?>/backstage.css" />
    <link rel="stylesheet" href="<?php echo CSS ?>/font-awesome.min.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/backstage.js"></script>
    <script type="text/javascript">
        $(function(){
            $("select[name=greenhorn]").find("option[value='<?php echo $this->vars["greenhorn"] ?>']").attr("selected",true);
            $("select[name=customer]").find("option[value='<?php echo $this->vars["customer"] ?>']").attr("selected",true);
            $("select[name=onlyvip]").find("option[value='<?php echo $this->vars["onlyvip"] ?>']").attr("selected",true);
        });
    </script>
    <style>
        .frmtable_content td.r input{
            margin-bottom:5px;width:10%
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
                    <p class="title">用户信息设置</p>
                    <div class="frmtable_content">
                		<table class="w100">
                			<tbody><tr>
                				<td>默认用户名(系统随机取)</td>
                				<td><input value="<?php echo $this->vars["nickname"] ?>" name="nickname" placeholder="用户默认昵称,用户竖线隔开,每个名字不得超过6个汉字或18个字符 例: 安琪拉|大乔|孙尚香"></td>
                			</tr>
                			<tr>
                				<td>用户默认个性签名</td>
                				<td><input value="<?php echo $this->vars["desces"] ?>" name="desces" placeholder="10-20个字最佳"></td>
                			</tr>
                			
                			<tr>
                				<td></td>
                				<td><a href="javascript:;" class="btn submit" rel="updateuserset"><i class="fa fa-edit"></i>设置</a></td>
                			</tr>
                		</tbody></table>
                	</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>