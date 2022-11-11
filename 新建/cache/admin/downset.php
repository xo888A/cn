<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>会员设置</title>
    <link rel="stylesheet" href="<?php echo CSS ?>/backstage.css" />
    <link rel="stylesheet" href="<?php echo CSS ?>/font-awesome.min.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/backstage.js"></script>
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
                    
                	<p class="title">各种级别的会员每天观看视频/社区数量(短视频不受限制)</p>
                    <div class="frmtable_content">
                		<table class="w100">
                			<tbody>
                			<tr>
                				<td>LV1会员每日看片次数</td>
                				<td><input value="<?php echo $this->vars["lv1"] ?>" name="lv1" placeholder=""></td>
                			</tr>
                			<tr>
                				<td>LV2会员每日看片次数</td>
                				<td><input value="<?php echo $this->vars["lv2"] ?>" name="lv2" placeholder=""></td>
                			</tr><tr>
                				<td>LV3会员每日看片次数</td>
                				<td><input value="<?php echo $this->vars["lv3"] ?>" name="lv3" placeholder=""></td>
                			</tr>
                			<tr>
                				<td>LV4会员每日看片次数</td>
                				<td><input value="<?php echo $this->vars["lv4"] ?>" name="lv4" placeholder=""></td>
                			</tr>
                			<tr>
                				<td>LV5会员每日看片次数</td>
                				<td><input value="<?php echo $this->vars["lv5"] ?>" name="lv5" placeholder=""></td>
                			</tr>
                			<tr>
                				<td>LV6会员每日看片次数</td>
                				<td><input value="<?php echo $this->vars["lv6"] ?>" name="lv6" placeholder=""></td>
                			</tr>
                				<td><a href="javascript:;" class="btn submit" rel="updatevipset"><i class="fa fa-edit"></i>保存</a></td>
                		</tbody></table>
                	</div>
                	
                	
                	<!--<p class="title">各种级别会员设计每天下载数量</p>-->
                 <!--   <div class="frmtable_content">-->
                	<!--	<table class="w100">-->
                	<!--		<tbody>-->
                			<!--<tr>-->
                			<!--	<td>LV1会员每日下载次数</td>-->
                			<!--	<td><input value="<?php echo $this->vars["downlv1"] ?>" name="downlv1" placeholder=""></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>LV2会员每日下载次数</td>-->
                			<!--	<td><input value="<?php echo $this->vars["downlv2"] ?>" name="downlv2" placeholder=""></td>-->
                			<!--</tr><tr>-->
                			<!--	<td>LV3会员每日下载次数</td>-->
                			<!--	<td><input value="<?php echo $this->vars["downlv3"] ?>" name="downlv3" placeholder=""></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>LV4会员每日下载次数</td>-->
                			<!--	<td><input value="<?php echo $this->vars["downlv4"] ?>" name="downlv4" placeholder=""></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>LV5会员每日下载次数</td>-->
                			<!--	<td><input value="<?php echo $this->vars["downlv5"] ?>" name="downlv5" placeholder=""></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>LV6会员每日下载次数</td>-->
                			<!--	<td><input value="<?php echo $this->vars["downlv6"] ?>" name="downlv6" placeholder=""></td>-->
                			<!--</tr>-->
                			
                	<!--		<tr>-->
                	<!--			<td></td>-->
                			
                	<!--		</tr>-->
                	<!--	</tbody></table>-->
                	<!--</div>-->
                	
                	
                </div>
            </div>
        </div>
    </div>
</body>
</html>