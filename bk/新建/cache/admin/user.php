<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title><?php echo TITLE ?></title>
    <link rel="stylesheet" href="<?php echo CSS ?>/backstage.css" />
    <link rel="stylesheet" href="<?php echo CSS ?>/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo CSS ?>/time.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/backstage.js"></script>
    <script src="<?php echo JS ?>/time.js"></script>
</head>
<body>
    <?php file::import("system-model-admin-header"); ?>
    <?php file::import("system-model-admin-aside"); ?>
    <div class="wrap">
        <div class="w100">
            <?php file::import("system-model-admin-tag"); ?>
            <div class="content">
                <div class="frame">
                	<p class="title">用户信息</p>
                	<div class="frmtable_content">
                		<table class="w100">
                			<tr>
                				<td>用户昵称</td>
                				<td><p><input name="nickname" value="<?php echo $this->vars["nickname"] ?>" placeholder="" /></p></td>
                			</tr>
                			<tr>
                				<td>用户组</td>
                				<td class="rel">
                					<input readonly="true" value="<?php echo $this->vars["addparam"] ?>" class="pub_select" name="addparam" placeholder="点击选择用户组" />
                					<ul class="abs hide">
                					    <li>用户</li>
                					    <li>作者</li>
                					    <li>管理员</li>
                					</ul>
                				</td>
                			</tr>
                			<tr>
                				<td>账号</td>
                				<td><input name="tel" value="<?php echo $this->vars["tel"] ?>" placeholder="用户绑定的电话号码" /></td>
                			</tr>
                			<tr>
                				<td>用户密码</td>
                				<td><input name="password" value="<?php echo $this->vars["password"] ?>" placeholder="用户密码" /></td>
                			</tr>
                			<tr>
                				<td>邮箱</td>
                				<td><input name="email" value="<?php echo $this->vars["email"] ?>" placeholder="用户密码" /></td>
                			</tr>
                			<tr>
                				<td>邀请码</td>
                				<td><input name="card" value="<?php echo $this->vars["card"] ?>" placeholder="邀请码" /></td>
                			</tr>
                			<tr>
                				<td>用户小描述</td>
                				<td><input name="miaoshu" value="<?php echo $this->vars["miaoshu"] ?>" placeholder="小描述" /></td>
                			</tr>
                			<tr>
                				<td>金币</td>
                				<td><input name="diam" value="<?php echo $this->vars["diam"] ?>" placeholder="钻石数" /></td>
                			</tr>
                			<tr>
                				<td>钱包</td>
                				<td><input name="money" value="<?php echo $this->vars["money"] ?>" placeholder="用户拥有的金额" /></td>
                			</tr>
                			<tr>
                				<td>粉丝</td>
                				<td><input name="flonum" value="<?php echo $this->vars["flonum"] ?>" placeholder="粉丝" /></td>
                			</tr>
                			<tr>
                				<td>VIP到期时间</td>
                				<td><input id="time" name="viptime" value="<?php echo $this->vars["viptime"] ?>" placeholder="VIP到期时间" /></td>
                			</tr>
                			<tr>
                				<td>性别</td>
                				<td class="rel">
                					<input readonly="true" value="<?php echo $this->vars["sex"] ?>" class="pub_select" name="sex" placeholder="点击选择性别" />
                					<ul class="abs hide">
                					    <li>男</li>
                					    <li>女</li>
                					</ul>
                				</td>
                			</tr>
                			<tr>
                				<td>交易密码</td>
                				<td><input name="withdrawalspass" value="<?php echo $this->vars["withdrawalspass"] ?>" placeholder="交易密码" /></td>
                			</tr>
                			<!--<tr>-->
                			<!--	<td>锁屏密码</td>-->
                			<!--	<td><input name="lockpass" value="<?php echo $this->vars["lockpass"] ?>" placeholder="锁屏密码" /></td>-->
                			<!--</tr>-->
                			<tr>
                				<td>个性签名</td>
                				<td><input name="descs" value="<?php echo $this->vars["descs"] ?>" placeholder="不得超过255个字符" /></td>
                			</tr>
                			<tr>
                				<td>每满X个</td>
                				<td><input name="man" value="<?php echo $this->vars["man"] ?>" placeholder="量" /></td>
                			</tr>
                			<tr>
                				<td>扣X个</td>
                				<td><input name="kouliang" value="<?php echo $this->vars["kouliang"] ?>" placeholder="" /></td>
                			</tr>
                			<tr>
                				<td>头像</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">选择</a>
                                		</p><input placeholder="请选择图片" class="css" mode="upload" name="avatar" value="<?php echo $this->vars["avatar"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>上传</a>
                            		</form>
                				</td>
                			</tr>
                			<tr>
                				<td>背景图</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">选择</a>
                                		</p><input placeholder="请选择图片" class="css" mode="upload" name="cover" value="<?php echo $this->vars["cover"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>上传</a>
                            		</form>
                				</td>
                			</tr>
                			
                			<tr>
                				<td>连续签到天数</td>
                				<td><input name="days" value="<?php echo $this->vars["days"] ?>" placeholder="" /></td>
                			</tr>
                			<tr>
                				<td>是否冻结</td>
                				<td class="rel">
                					<input readonly="true" value="<?php echo $this->vars["freeze"] ?>" class="pub_select" name="freeze" placeholder="点击选择状态" />
                					<ul class="abs hide">
                					    <li>冻结</li>
                					    <li>正常</li>
                					</ul>
                				</td>
                			</tr>
                			<tr>
                				<td>星标</td>
                				<td class="rel">
                					<input  value="<?php echo $this->vars["mylevel"] ?>"  name="mylevel" placeholder="多个星标用英文(,)隔开, 最多填写2个星标, 例如 1,2" />
                					<div class="xb">
                					    <p>1. <img src='<?php echo TU ?>/1.png' /></p>
                					    <p>2. <img src='<?php echo TU ?>/2.png' /></p>
                					    <p>3. <img src='<?php echo TU ?>/3.png' /></p>
                					    <p>4. <img src='<?php echo TU ?>/4.png' /></p>
                					    <p>5. <img src='<?php echo TU ?>/5.png' /></p>
                					    <p>6. <img src='<?php echo TU ?>/6.png' /></p>
                					</div>

                					<div class="xb">注意: 星标1234567 只能出现一个, 否则将引起业务类显示错误</div>
                				</td>
                			</tr>
                			<input type="hidden" name="id" value="<?php echo CW('get/id');  ?>" />
                			<tr>
                				<td></td>
                				<td><?php echo $this->vars["button"] ?></td>
                			</tr>
                		</table>
                	</div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var opts1={
            'targetId':'time',//时间写入对象的id
            'hms':'on',
            'format':'-',
            'min':'2021-08-30 00:00:00',
            'max':'2099-10-30 00:00:00'
        };

    xvDate(opts1);

</script>
</body>
</html>