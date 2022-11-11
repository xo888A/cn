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
                    <p class="title">提示</p>
                    <div class="notice">
		                <div class="note-info">
		                    <p class="p1 btn3">温馨提示</p>
		                    <p class="pub">1. 如果 普通用户钻石价格 和 VIP用户钻石价格 都填写0代表本影片免费</p>
		                    <p class="pub">2. 如果 普通用户钻石价格>0  VIP用户钻石价格=0 代表本影片是VIP用户专属,免费</p>
		                    <p class="pub">3. 如果 普通用户钻石价格>VIP用户钻石价格 且都不可为0 代表本影片是高质量影片都将根据设置收取相应的钻石费用</p>

		                </div>
		            </div>
                	<p class="title">视频添加</p>
                	<div class="frmtable_content">
                		<table class="w100">
                		    <tr>
                				<td>用户名</td>
                				<td><p><input name="userid" value="<?php echo $this->vars["userid"] ?>" placeholder="用户ID"  /></p></td>
                			</tr>
                			<tr>
                				<td>视频标题</td>
                				<td><p><input name="title" value="<?php echo $this->vars["title"] ?>" placeholder="不超过99个字符(33个字)" /></p></td>
                			</tr>
                            <tr>
                				<td>发布时间</td>
                				<td><p><input name="ftime" value="<?php echo $this->vars["ftime"] ?>" placeholder="发布时间,可不填,格式 2022-02-02 15:15:15" /></p></td>
                			</tr>
                			<tr>
                				<td>视频封面</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">选择</a>
                                		</p><input placeholder="请选择图片" class="css" mode="upload" name="videocover" value="<?php echo $this->vars["videocover"] ?>">
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
                                		</p><input placeholder="请选择图片" class="css" mode="upload" name="videourl" value="<?php echo $this->vars["videourl"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>上传</a>
                            		</form>
                				</td>
                				
                			</tr>
                			
                			<tr>
                				<td>视频时长</td>
                				<td><input name="addparam" value="<?php echo $this->vars["addparam"] ?>" placeholder="视频时长 格式 00:00" /></td>
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
                				<td>普通用户钻石价格</td>
                				<td><input name="diamond" value="<?php echo $this->vars["diamond"] ?>" placeholder="单位:钻石 填写0代表免费" /></td>
                			</tr>
                			<tr>
                				<td>VIP用户钻石价格</td>
                				<td><input name="vipdiam" value="<?php echo $this->vars["vipdiam"] ?>" placeholder="单位:钻石 填写0并且普通用户钻石价格不为0的情况下 代表VIP用户免费" /></td>
                			</tr>
                			<tr>
                				<td>热度(阅读量)</td>
                				<td><input name="hot" value="<?php echo $this->vars["hot"] ?>" placeholder="12580" /></td>
                			</tr>
                			<tr>
                				<td>喜欢(人数)</td>
                				<td><input name="like" value="<?php echo $this->vars["like"] ?>" placeholder="系统自动计算, 可不填" /></td>
                			</tr>
                			<!--<tr>-->
                			<!--	<td>属性</td>-->
                			<!--	<td class="rel">-->
                			<!--		<input  value="<?php echo $this->vars["flag"] ?>" class="flag_select" name="flag" placeholder="点击选择属性" />-->
                			<!--		<ul class="abs hide">-->
                			<!--		    <li>热门</li>-->
                			<!--		    <li>精品优选</li>-->
                			<!--		    <li>大V推荐</li>-->
                			<!--		    <li>热搜</li>-->
                			<!--		    <li>推荐</li>-->
                			<!--		    <li>置顶</li>-->
                			<!--		    <li>VIP精选</li>-->
                			<!--		    <li>VIP Heaven7</li>-->
                			<!--		    <li>VIP推荐</li>-->
                			<!--		    <li>VIP热播</li>-->
                			<!--		    <li>钻石精选</li>-->
                			<!--		    <li>钻石地表最强推荐</li>-->
                			<!--		    <li>钻石福利</li>-->
                			<!--		</ul>-->
                			<!--	</td>-->
                			<!--</tr>-->
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