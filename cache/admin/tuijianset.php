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
   
    <style>
        .frmtable_content td.r input{
            margin-bottom:5px;width:10%
        }
        td.r{
            font-size:14px;
            color:#888;
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
                    <p class="title">系统设置</p>
                    <div class="frmtable_content">
                		<table class="w100">
                			<tbody>
            			    
                			<tr>
                				<td>【首页】模块推荐(不限个数)</td>
                				<td><input value="<?php echo $this->vars["tja"] ?>" name="tja" placeholder="多个话题间用英文逗号(,)隔开"></td>
                			</tr>
                			<!--<tr>-->
                			<!--	<td>【首页】右侧推荐(4个)</td>-->
                			<!--	<td><input value="<?php echo $this->vars["tjb"] ?>" name="tjb" placeholder="多个话题间用英文逗号(,)隔开"></td>-->
                			<!--</tr>-->
                		    <tr>
                				<td>【推荐】右侧推荐(9个)</td>
                				<td><input value="<?php echo $this->vars["tjc"] ?>" name="tjc" placeholder="多个用户间用英文逗号(,)隔开"></td>
                			</tr>
                		    <tr>
                				<td>【话题】模块推荐(不限个数)</td>
                				<td><input value="<?php echo $this->vars["tjd"] ?>" name="tjd" placeholder="多个话题间用英文逗号(,)隔开"></td>
                			</tr>
                			<tr>
                				<td>【话题】右侧推荐(9个)</td>
                				<td><input value="<?php echo $this->vars["tje"] ?>" name="tje" placeholder="多个话题间用英文逗号(,)隔开"></td>
                			</tr>
                			
                			
                			<!--<tr>-->
                			<!--	<td>【视频】右侧推荐(4个)</td>-->
                			<!--	<td><input value="<?php echo $this->vars["tjf"] ?>" name="tjf" placeholder="多个话题间用英文逗号(,)隔开"></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>【社区】右侧推荐(4个)</td>-->
                			<!--	<td><input value="<?php echo $this->vars["tjg"] ?>" name="tjg" placeholder="多个话题间用英文逗号(,)隔开"></td>-->
                			<!--</tr>-->
                			<tr>
                				<td>【排行榜】右侧推荐(9个)</td>
                				<td><input value="<?php echo $this->vars["tjh"] ?>" name="tjh" placeholder="多个用户间用英文逗号(,)隔开"></td>
                			</tr>
                			<tr>
                				<td>推荐大模块-分类推荐(30个)</td>
                				<td><input value="<?php echo $this->vars["tuijianlist"] ?>" name="tuijianlist" placeholder="多个分类用英文逗号(,)隔开"></td>
                			</tr>
                		    
                		    
                		    <tr>
                				<td>视频主页顶部滑动分类(无限个)</td>
                				<td><input value="<?php echo $this->vars["vlist"] ?>" name="vlist" placeholder="多个分类用英文逗号(,)隔开"></td>
                			</tr>
                			<tr>
                				<td>社区主页顶部滑动分类(无限个)</td>
                				<td><input value="<?php echo $this->vars["ilist"] ?>" name="ilist" placeholder="多个分类用英文逗号(,)隔开"></td>
                			</tr>
                			
                			
                			<tr>
                				<td>首页-猜你喜欢(无限个)</td>
                				<td><input value="<?php echo $this->vars["add1"] ?>" name="add1" placeholder="多个id用英文逗号(,)隔开"></td>
                			</tr>
                			<tr>
                				<td>视频页相关推荐(无限个)</td>
                				<td><input value="<?php echo $this->vars["add2"] ?>" name="add2" placeholder="多个id用英文逗号(,)隔开"></td>
                			</tr>
                			<tr>
                				<td>社区相关推荐(无限个)</td>
                				<td><input value="<?php echo $this->vars["add3"] ?>" name="add3" placeholder="多个id用英文逗号(,)隔开"></td>
                			</tr>
                			
                			
                			<tr>
                				<td></td>
                				<td><a href="javascript:;" class="btn submit" rel="updatetuijian"><i class="fa fa-edit"></i>设置</a></td>
                			</tr>
                			
                		</tbody></table>
                	</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>