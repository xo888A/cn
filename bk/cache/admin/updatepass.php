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
</head>
<body>
    <?php file::import("system-model-admin-header"); ?>
    <?php file::import("system-model-admin-aside"); ?>
    <div class="wrap">
        <div class="w100">
            <?php file::import("system-model-admin-tag"); ?>
            <div class="content">
        		<div class="frame">
                    <p class="title">后台管理员密码修改</p>
                    <div class="frmtable_content">
                		<table class="w100">
                			<tbody><tr>
                				<td>管理员账号</td>
                				<td><input name="username" placeholder="支持重置"></td>
                			</tr>
                			<tr>
                				<td>管理员旧密码</td>
                				<td><input name="oldpass" placeholder=""></td>
                			</tr>
                			<tr>
                				<td>管理员新密码</td>
                				<td><input name="newpass" placeholder=""></td>
                			</tr>
                			<tr>
                				<td>管理员新二级密码</td>
                				<td><input name="newpass2" placeholder=""></td>
                			</tr>
                			<tr>
                				<td></td>
                				<td><a href="javascript:;" class="btn submit" rel="updatepass"><i class="fa fa-edit"></i>更新</a></td>
                			</tr>
                		</tbody></table>
                	</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>