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
                    <p class="title">应用添加</p>
                    <div class="frmtable_content">
                		<table class="w100 addtopic">
                			<tbody><tr>
                				<td>APP应用名称</td>
                				<td><input name="name" placeholder="最多8个汉字"></td>
                			</tr>
                			<tr>
                				<td>APP虚拟下载次数 </td>
                				<td><input name="num" placeholder="单位/万次"></td>
                			</tr>
                			<tr>
                				<td>简单一句话描述</td>
                				<td><input name="desces" placeholder="不超过12个汉字"></td>
                			</tr>
                			<tr>
                				<td>APP下载页面地址</td>
                				<td><input name="downloadurl" placeholder="填写下载页面连接,而不是下载连接"></td>
                			</tr>
                			<tr>
                				<td>APP应用图标(100*100)</td>
                				<td>
                				    <div class="upload">
                                		<form class="test" method="post" enctype="multipart/form-data">
                                    		<p>
                                    			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">选择</a>
                                    		</p><input placeholder="请选择图片" class="css" mode="upload" name="cover" value="">
                                    		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>上传</a>
                                		</form>
                                	</div>
                    	        </td>
                			</tr>
                			<tr>
                				<td></td>
                				<td><a href="javascript:;" class="btn1" rel="addapp"><i class="fa fa-plus-square-o"></i> 添加</a></td>
                			</tr>
                		</tbody></table>
                	</div>
                </div>
            </div>
            <div class="content">
                <div class="frame">
                    <p class="title">APP应用管理</p>
                    <div class="frmtable">
                    <table class="w100 list">
                        <?php echo $this->vars["data"] ?>
                    </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>