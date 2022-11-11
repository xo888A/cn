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
	<script>
		
		$(function(){
		    $("select[name=content4]").find("option[value='<?php echo $this->vars["content4"] ?>']").attr("selected",true);
		    $("select[name=position]").find("option[value='<?php echo $this->vars["position"] ?>']").attr("selected",true);
            $("select[name=positionabs]").find("option[value='<?php echo $this->vars["positionabs"] ?>']").attr("selected",true);
            
            $('.position').change(function(data){
                var value = $(".position option:selected").attr("value");
                $('.search div.mr20').addClass('hide');
                $('.search div.mr20').attr('style','');
                if(value=='noselect'){
                    return;
                }else if(value=='视频帖子ID' || value=='社区帖子ID'|| value=='单页帖子ID' || value=='通用链接'|| value=='推荐用户ID'|| value=='推荐话题名称'){
                    $('.pos1').removeClass('hide');
                }else{
                    $('.pos5').text("当前选项为 : "+value);
                    $('.pos5').removeClass('hide');
                }
                
            });
            
        });
	</script>
    <style>
        .search input{
            width: 70%;
        }
        .ke-container{
            width: 75% !important;
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
                    <p class="title">广告添加</p>
                    <div class="notice">
		                <div class="note-info">
		                    <p class="p1 btn3">温馨提示</p>
		                    <p class="pub">1. 广告为文字时,具体内容需在广告备注里写,广告效果为通用链接.</p>
		                  
		               </div>
		            </div>
                	<div class="frmtable_content">
                		<table class="w100">
                		    <tr>
                				<td>广告位置</td>
                				<td class="search">
            						<select name="positionabs" class="positionabs">
            						    <option value="noselect">--请选择广告位置--</option>
                                       
                                        <!--<option value="首页-推荐">首页-推荐</option>-->
                                        <!--<option value="首页-话题">首页-话题</option>-->
                                        <!--<option value="社区-最新">社区-最新</option>-->
                                        <!--<option value="社区-推荐">社区-推荐</option>-->
                                        <!--<option value="noselect">----分割线请勿选择 前台模块----</option>-->

                                        <option value="首页移动-文字广告">首页移动-文字广告</option>
                                     
                                        <option value="首页-轮播图">首页-轮播图</option>
                                       
                                        <option value="推荐-轮播图">推荐-轮播图</option>
                                       
                                        <option value="话题-轮播图">话题-轮播图</option>
                                     
                                        <option value="视频-轮播图">视频-轮播图</option>
                                     
                                        <option value="社区-轮播图">社区-轮播图</option>
                                     
                                        <option value="排行榜-轮播图">排行榜-轮播图</option>
                                    
                                      
                                    </select>
                                   
           
                				</td>
                			</tr>
                		    <tr>
                				<td>广告效果</td>
                				<td class="search">
            						<select name="position" class="position">
            						    <option value="noselect">--APP常规页面--</option>
            						     <option value="通用链接">通用链接</option>
                                        <option value="视频帖子ID">视频帖子ID</option>
                                        <option value="社区帖子ID">社区帖子ID</option>
                                        <option value="单页帖子ID">单页帖子ID</option>
                                        <option value="推荐话题名称">推荐话题名称</option>
                                        <option value="推荐用户ID">推荐用户ID</option>
                                        <option value="社区页">社区页</option>
                                        <option value="视频页">视频页</option>
                                        <option value="排行榜页">排行榜页</option>
                                        <option value="推荐页">推荐页</option>
                                        <option value="话题页">话题页</option>
                                        <option value="所有话题列表页">所有话题列表页</option>
                                        <option value="所有用户列表页">所有用户列表页</option>
                                        <option value="精选萌主">精选萌主</option>
                                        <option value="专题归档">专题归档</option>
                                        <option value="选择玩法">选择玩法</option>
                                        <option value="noselect">----APP会员中心页面----</option>
                                         <option value="账号设置">账号设置</option>
                                         <option value="我的钱包">我的钱包</option>
                                         <option value="充值VIP">充值VIP</option>
                                         <option value="充值金币">充值金币</option>
                                         <option value="卡密兑换">卡密兑换</option>
                                         <option value="我的关注">我的关注</option>
                                         <option value="客服中心">客服中心</option>
                                         <option value="消息中心">消息中心</option>
                                         <option value="推广赚钱">推广赚钱</option>
                                         <option value="官方活动">官方活动</option>
                                         <option value="推荐APP">推荐APP</option>
                                    </select>
                                    <div class="hide mr20 pos1" <?php echo $this->vars["pos1"] ?>>
                                        <input name="postid" value="<?php echo $this->vars["postid"] ?>" placeholder="在此填入相关信息" /></div>
                                    
                                    <div class="hide mr20 pos5" <?php echo $this->vars["pos5"] ?>></div>
                                   
                                    
           
                				</td>
                			</tr>
                			<tr>
                				<td>广告备注</td>
                				<td><p><input name="remarks" value="<?php echo $this->vars["remarks"] ?>" placeholder="" /></p></td>
                			</tr>
                			<tr>
                				<td>广告权限</td>
                				<td>
                				    <ul class="adv_ul">
                				        <li><input name="lv0" <?php echo $this->vars["l0"] ?> type="checkbox" />普通会员</li>
                				        <li><input name="lv1" <?php echo $this->vars["l1"] ?> type="checkbox" />LV1会员</li>
                				        <li><input name="lv2" <?php echo $this->vars["l2"] ?> type="checkbox" />LV2会员</li>
                				        <li><input name="lv3" <?php echo $this->vars["l3"] ?> type="checkbox" />LV3会员</li>
                				        <li><input name="lv4" <?php echo $this->vars["l4"] ?> type="checkbox" />LV4会员</li>
                				        <li><input name="lv5" <?php echo $this->vars["l5"] ?> type="checkbox" />LV5会员</li>
                				        <li><input name="lv6" <?php echo $this->vars["l6"] ?> type="checkbox" />LV6会员</li>
                				    </ul>
                				</td>
                			</tr>
                   <!--         <tr>-->
                			<!--	<td>所属商家</td>-->
                			<!--	<td><p><input name="tel" value="<?php echo $this->vars["tel"] ?>" placeholder="请填写用户手机号码,不填则属于运营者" /></p></td>-->
                			<!--</tr>-->
                			<tr>
                				<td>广告封面</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">选择</a>
                                		</p><input placeholder="请选择图片" class="css" mode="upload" name="imgcover" value="<?php echo $this->vars["imgcover"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>上传</a>
                            		</form>
                				</td>
                			</tr>
                			<!--<tr>-->
                			<!--	<td>广告到期时间</td>-->
                			<!--	<td><p><input id="time" name="endtime" value="<?php echo $this->vars["endtime"] ?>" placeholder="点击选择到期时间, 不填代表永不过期" /></p></td>-->
                			<!--</tr>-->
                			<tr>
                				<!--<td>广告点击效果</td>-->
                				<!--<td class="search selectdiv">-->
                				<!--    <select name="select" class="select">-->
                				<!--        <option value="noselect">--请选择点击效果--</option>-->
                    <!--                    <option value="跳出APP到浏览器">跳出APP到浏览器</option>-->
                    <!--                    <option value="本APP内打开外链">本APP内打开外链</option>-->
                    <!--                    <option value="跳到APP内某个帖子">跳到APP内某个帖子</option>-->
                    <!--                    <option value="跳到APP功能项">跳到APP功能项</option>-->
                    <!--                    <option value="跳到APP专题页">跳到APP专题页</option>-->
                    <!--                </select>-->
                    <!--                <div class=" mt20 div1"><input name="content1" value="<?php echo $this->vars["content1"] ?>" placeholder="请输入链接" /></div>-->
                    <!--                <div class="hide mt20 div2"><input name="content2" value="<?php echo $this->vars["content2"] ?>" placeholder="请输入链接" /></div>-->
                    <!--                <div class="hide mt20 div3"><input name="content3" value="<?php echo $this->vars["content3"] ?>" placeholder="请输入帖子ID,可前往视频/社区管理页面查看" /></div>-->
                                <!--    <div class="hide mt20 div4">-->
                                <!--        <select name="content4">-->
                                <!--            <option value="0">--请选择功能项--</option>-->
                    				        <!--<option value="VIP会员充值">VIP会员充值</option>-->
                                <!--            <option value="钻石充值">钻石充值</option>-->
                                <!--            <option value="兑换中心">兑换中心</option>-->
                                <!--            <option value="客服中心">客服中心</option>-->
                                <!--            <option value="我的收益">我的收益</option>-->
                                <!--            <option value="钻石兑换现金">钻石兑换现金</option>-->
                                <!--            <option value="提现">提现</option>-->
                                <!--            <option value="商家入驻">商家入驻</option>-->
                                <!--            <option value="如何赚钱">如何赚钱</option>-->
                                <!--            <option value="分享推广">分享推广</option>-->
                                <!--            <option value="应用推广中心">应用推广中心</option>-->
                                <!--            <option value="发布页面">发布页面</option>-->
                                <!--            <option value="设置">设置</option>-->
                                <!--            <option value="关注与粉丝">关注与粉丝</option>-->
                                <!--            <option value="我的邀请">我的邀请</option>-->
                                <!--            <option value="充值记录">充值记录</option>-->
                                <!--            <option value="发布管理">发布管理</option>-->
                                <!--        </select>-->
                                <!--    </div>-->
                                    <!--<div class="hide mt20 div5">-->
                                    <!--    <textarea name="content5" placeholder=""><?php echo $this->vars["content5"] ?></textarea>-->
                                    <!--</div>-->
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