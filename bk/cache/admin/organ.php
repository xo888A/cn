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
    <link rel="stylesheet" href="<?php echo PLUGINS ?>/themes/default/default.css" />
	<link rel="stylesheet" href="<?php echo PLUGINS ?>/plugins/code/prettify.css" />
	<script charset="utf-8" src="<?php echo PLUGINS ?>/kindeditor.js"></script>
	<script charset="utf-8" src="<?php echo PLUGINS ?>/lang/zh-CN.js"></script>
	<script charset="utf-8" src="<?php echo PLUGINS ?>/plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea', {
				cssPath : '<?php echo PLUGINS ?>/plugins/code/prettify.css',
				uploadJson : '<?php echo PLUGINS ?>/php/upload_json.php',
				fileManagerJson : '<?php echo PLUGINS ?>/php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
				    this.sync();
				},
				afterBlur:function(){
				    this.sync();
				}
			});
			prettyPrint();
		});
	</script>
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
                				<td><p><input name="userid" value="<?php echo $this->vars["userid"] ?>" placeholder="用户ID" /></p></td>
                				<input type="hidden" name="id" value="<?php echo CW('get/id');  ?>" />
                			</tr>
                			<tr>
                				<td>标题</td>
                				<td><p><input name="title" value="<?php echo $this->vars["title"] ?>" placeholder="不超过99个字符(33个字)" /></p></td>
                			</tr>
                            <tr>
                				<td>发布时间</td>
                				<td><p><input name="ftime" value="<?php echo $this->vars["ftime"] ?>" placeholder="发布时间,可不填,格式 2022-02-02 15:15:15" /></p></td>
                			</tr>
                			<tr>
                				<td>封面</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">选择</a>
                                		</p><input placeholder="请选择图片" class="css" mode="upload" name="organcover" value="<?php echo $this->vars["organcover"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>上传</a>
                            		</form>
                				</td>
                			</tr>
                			<tr>
                				<td>图1封面</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">选择</a>
                                		</p><input placeholder="请选择图片" class="css" mode="upload" name="img1" value="<?php echo $this->vars["img1"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>上传</a>
                            		</form>
                				</td>
                			</tr>
                			<tr>
                				<td>图2封面</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">选择</a>
                                		</p><input placeholder="请选择图片" class="css" mode="upload" name="img2" value="<?php echo $this->vars["img2"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>上传</a>
                            		</form>
                				</td>
                			</tr>
                            <tr>
                				<td>图3封面</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">选择</a>
                                		</p><input placeholder="请选择图片" class="css" mode="upload" name="img3" value="<?php echo $this->vars["img3"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>上传</a>
                            		</form>
                				</td>
                			</tr>
                			<tr>
                				<td>图4封面</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">选择</a>
                                		</p><input placeholder="请选择图片" class="css" mode="upload" name="img4" value="<?php echo $this->vars["img4"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>上传</a>
                            		</form>
                				</td>
                			</tr>
                			<tr>
                				<td>图5封面</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">选择</a>
                                		</p><input placeholder="请选择图片" class="css" mode="upload" name="img5" value="<?php echo $this->vars["img5"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>上传</a>
                            		</form>
                				</td>
                			</tr>
                			<tr>
                				<td>图6封面</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">选择</a>
                                		</p><input placeholder="请选择图片" class="css" mode="upload" name="img6" value="<?php echo $this->vars["img6"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>上传</a>
                            		</form>
                				</td>
                			</tr>
                			
                			<tr>
                				<td>图片列表</td>
                				<td><textarea name="imgcontent" placeholder=""><?php echo $this->vars["imgcontent"] ?></textarea></td>
                			</tr>
                			<tr>
                				<td>试看6图</td>
                				<td><p><input name="shikan" value="<?php echo $this->vars["shikan"] ?>" placeholder="格式: http://www.a.com/1.jpg|http://www.a.com/2.jpg" /></p></td>
        
                			</tr>
                			<!--<tr>-->
                			<!--	<td>图7</td>-->
                			<!--	<td class="upload">-->
                			<!--	    <form class="test" method="post" enctype="multipart/form-data">-->
                   <!--             		<p>-->
                   <!--             			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">选择</a>-->
                   <!--             		</p><input placeholder="请选择图片" class="css" mode="upload" name="img7" value="<?php echo $this->vars["img7"] ?>">-->
                   <!--             		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>上传</a>-->
                   <!--         		</form>-->
                			<!--	</td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>图8</td>-->
                			<!--	<td class="upload">-->
                			<!--	    <form class="test" method="post" enctype="multipart/form-data">-->
                   <!--             		<p>-->
                   <!--             			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">选择</a>-->
                   <!--             		</p><input placeholder="请选择图片" class="css" mode="upload" name="img8" value="<?php echo $this->vars["img8"] ?>">-->
                   <!--             		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>上传</a>-->
                   <!--         		</form>-->
                			<!--	</td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>图9</td>-->
                			<!--	<td class="upload">-->
                			<!--	    <form class="test" method="post" enctype="multipart/form-data">-->
                   <!--             		<p>-->
                   <!--             			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">选择</a>-->
                   <!--             		</p><input placeholder="请选择图片" class="css" mode="upload" name="img9" value="<?php echo $this->vars["img9"] ?>">-->
                   <!--             		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>上传</a>-->
                   <!--         		</form>-->
                			<!--	</td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>钻石价格</td>-->
                			<!--	<td><input name="diamond" value="<?php echo $this->vars["diamond"] ?>" placeholder="单位:钻石" /></td>-->
                			<!--</tr>-->
                			<tr>
                				<td>图片个数</td>
                				<td><input name="addparam" value="<?php echo $this->vars["addparam"] ?>" placeholder="图片个数" /></td>
                			</tr>
                            <tr>
                				<td>普通用户钻石价格</td>
                				<td><input name="diamond" value="<?php echo $this->vars["diamond"] ?>" placeholder="单位:钻石 填写0代表免费" /></td>
                			</tr>
                			<tr>
                				<td>VIP用户钻石价格</td>
                				<td><input name="vipdiam" value="<?php echo $this->vars["vipdiam"] ?>" placeholder="单位:钻石 填写0并且普通用户钻石价格不为0的情况下 代表VIP用户免费" /></td>
                			</tr>
                			<!--<tr>-->
                			<!--	<td>下载地址</td>-->
                			<!--	<td><input name="downloadurl" value="<?php echo $this->vars["downloadurl"] ?>" placeholder="下载地址" /></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>下载权限</td>-->
                			<!--	<td>-->
                			<!--	    <ul class="adv_ul">-->
                			<!--	        <li><input name="lv0" <?php echo $this->vars["l0"] ?> type="checkbox" />普通会员</li>-->
                			<!--	        <li><input name="lv1" <?php echo $this->vars["l1"] ?> type="checkbox" />LV1会员</li>-->
                			<!--	        <li><input name="lv2" <?php echo $this->vars["l2"] ?> type="checkbox" />LV2会员</li>-->
                			<!--	        <li><input name="lv3" <?php echo $this->vars["l3"] ?> type="checkbox" />LV3会员</li>-->
                			<!--	        <li><input name="lv4" <?php echo $this->vars["l4"] ?> type="checkbox" />LV4会员</li>-->
                			<!--	        <li><input name="lv5" <?php echo $this->vars["l5"] ?> type="checkbox" />LV5会员</li>-->
                			<!--	        <li><input name="lv6" <?php echo $this->vars["l6"] ?> type="checkbox" />LV6会员</li>-->
                			<!--	    </ul>-->
                			<!--	</td>-->
                			<!--</tr>-->
                			<tr>
                				<td>压缩包大小</td>
                				<td><input name="filesize" value="<?php echo $this->vars["filesize"] ?>" placeholder="压缩包大小" /></td>
                			</tr>
                			<tr>
                				<td>热度(阅读量)</td>
                				<td><input name="hot" value="<?php echo $this->vars["hot"] ?>" placeholder="" /></td>
                			</tr>
                			<tr>
                				<td>喜欢(人数)</td>
                				<td><input name="like" value="<?php echo $this->vars["like"] ?>" placeholder="系统自动计算, 可不填" /></td>
                			</tr>
                			<tr>
                				<td>话题</td>
                				<td class="rel">
                					<input  value="<?php echo $this->vars["topic"] ?>" class="_topic_select" name="topic" placeholder="多个话题用|隔开,填写的话题如不存在系统将自动添加" />
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
                				<td>是否推荐</td>
                				<td class="rel">
                					<input readonly="true" value="<?php echo $this->vars["istuijian"] ?>" class="pub_select" name="istuijian" placeholder="点击选择状态" />
                					<ul class="abs hide">
                					    <li>是</li>
                					    <li>否</li>
                					</ul>
                				</td>
                			</tr>
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