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
                	<p class="title">视频添加</p>
                	<div class="frmtable_content">
                		<table class="w100">
                		    <tr>
                				<td>用户名</td>
                				<td><p><input name="tel" value="<?php echo $this->vars["tel"] ?>" placeholder="11位的手机号码" /></p></td>
                			</tr>
                			<tr>
                				<td>短视频标题</td>
                				<td><p><input name="title" value="<?php echo $this->vars["title"] ?>" placeholder="不超过60个字符(20个字)" /></p></td>
                			</tr>
                            <tr>
                				<td>发布时间</td>
                				<td><p><input name="ftime" value="<?php echo $this->vars["ftime"] ?>" placeholder="发布时间" /></p></td>
                			</tr>
                			<tr>
                				<td>短视频封面</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">选择</a>
                                		</p><input placeholder="请选择图片" class="css" mode="upload" name="shortvidcover" value="<?php echo $this->vars["shortvidcover"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>上传</a>
                            		</form>
                				</td>
                			</tr>
                			<tr>
                				<td>视频地址</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">选择</a>
                                		</p><input placeholder="请选择图片" class="css" mode="upload" name="shortvidurl" value="<?php echo $this->vars["shortvidurl"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>上传</a>
                            		</form>
                				</td>
                				
                			</tr>
                			<tr>
                				<td>喜欢(人数)</td>
                				<td><input name="likes" value="<?php echo $this->vars["likes"] ?>" placeholder="系统自动计算, 可不填" /></td>
                			</tr>
                			<tr>
                				<td>分类</td>
                				<td class="rel">
                					<input  value="<?php echo $this->vars["topic"] ?>" class="" name="topic" placeholder="点击选择话题" />
                					<ul class="abs hide">
                					    <?php echo $this->vars["data"] ?>
                					</ul>
                				</td>
                			</tr>
                			<tr>
                				<td>发布状态</td>
                				<td class="rel">
                					<input readonly="true" value="<?php echo $this->vars["ishow"] ?>" class="pub_select" name="ishow" placeholder="点击选择状态" />
                					<ul class="abs hide">
                					    <li>公开</li>
                					    <li>审核</li>
                					</ul>
                				</td>
                			</tr>
                			<tr>
                				<td>是否VIP专属</td>
                				<td class="rel">
                					<input readonly="true" value="<?php echo $this->vars["diamond"] ?>" class="pub_select" name="diamond" placeholder="点击选择状态" />
                					<ul class="abs hide">
                					    <li>VIP</li>
                					    <li>免费</li>
                					</ul>
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
</body>
</html>