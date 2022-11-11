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
    <link rel="stylesheet" href="<?php echo PLUGINS ?>/themes/default/default.css" />
	<link rel="stylesheet" href="<?php echo PLUGINS ?>/plugins/code/prettify.css" />
	<script charset="utf-8" src="<?php echo PLUGINS ?>/kindeditor-all.js"></script>
	<script charset="utf-8" src="<?php echo PLUGINS ?>/lang/zh-CN.js"></script>
	<script charset="utf-8" src="<?php echo PLUGINS ?>/plugins/code/prettify.js"></script>
    <script type="text/javascript">
        $(function(){
            $("select[name=greenhorn]").find("option[value='<?php echo $this->vars["greenhorn"] ?>']").attr("selected",true);
            $("select[name=customer]").find("option[value='<?php echo $this->vars["customer"] ?>']").attr("selected",true);
            $("select[name=onlyvip]").find("option[value='<?php echo $this->vars["onlyvip"] ?>']").attr("selected",true);
            $("select[name=vipcomments]").find("option[value='<?php echo $this->vars["vipcomments"] ?>']").attr("selected",true);
            $("select[name=scaletype]").find("option[value='<?php echo $this->vars["scaletype"] ?>']").attr("selected",true);
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
        });
    </script>
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
            			    <!--<tr>-->
                			<!--	<td>每日免费观影次数</td>-->
                			<!--	<td><input value="<?php echo $this->vars["look"] ?>" name="look" placeholder="填写0代表可以无限观看"></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>是否开启新注册24小时限时卡</td>-->
                			<!--	<td class="search">-->
                			<!--	    <select name="greenhorn">-->
                   <!--                     <option value="1">开启</option>-->
                   <!--                     <option value="0">不开启</option>-->
                   <!--                 </select>-->
                   <!--             </td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>是否开启在线客服</td>-->
                			<!--	<td class="search">-->
                			<!--	    <select name="customer">-->
                   <!--                     <option value="1">开启</option>-->
                   <!--                     <option value="0">关闭</option>-->
                   <!--                 </select>-->
                   <!--             </td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>用户最低提现金额</td>-->
                			<!--	<td><input value="<?php echo $this->vars["withdrawals"] ?>" name="withdrawals" placeholder="单位:元 需输入整数,不含小数点"></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>用户提现至少充值多少</td>-->
                			<!--	<td><input value="<?php echo $this->vars["pay"] ?>" name="pay" placeholder="单位:元 需输入整数,不含小数点"></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>钻石兑换现金手续费</td>-->
                			<!--	<td><input value="<?php echo $this->vars["diamcharge"] ?>" name="diamcharge" placeholder="单位:钻石 需输入整数,不含小数点"></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>是否VIP用户才能发布社区</td>-->
                			<!--	<td class="search">-->
                			<!--	    <select name="onlyvip">-->
                   <!--                     <option value="1">是</option>-->
                   <!--                     <option value="0">否</option>-->
                   <!--                 </select>-->
                   <!--             </td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>是否VIP用户才能发布评论</td>-->
                			<!--	<td class="search">-->
                			<!--	    <select name="vipcomments">-->
                   <!--                     <option value="1">是</option>-->
                   <!--                     <option value="0">否</option>-->
                   <!--                 </select>-->
                   <!--             </td>-->
                			<!--</tr>-->
                			<tr>
                				<td>不同级别用户反额比</td>
                				<td class="r">
                				    <input value="<?php echo $this->vars["r1"] ?>" name="r1" placeholder="1级代理反额比">
                				    <!--<input value="<?php echo $this->vars["r2"] ?>" name="r2" placeholder="2级代理反额比">-->
                				    <!--<input value="<?php echo $this->vars["r3"] ?>" name="r3" placeholder="3级代理反额比">-->
                                </td>
                			</tr>
                			<!--<tr>-->
                			<!--	<td>总业绩返利比(业绩范围/返利比)</td>-->
                			<!--	<td class="r">-->
                			<!--	    <input value="<?php echo $this->vars["p1"] ?>" name="p1" placeholder="开始金额">-->
                			<!--	    <input value="<?php echo $this->vars["p2"] ?>" name="p2" placeholder="结束金额">-->
                			<!--	    <input value="<?php echo $this->vars["f1"] ?>" name="f1" placeholder="返利比">-->
                   <!--             </td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>总业绩返利比(业绩范围/返利比)</td>-->
                			<!--	<td class="r">-->
                			<!--	    <input value="<?php echo $this->vars["p3"] ?>" name="p3" placeholder="开始金额">-->
                			<!--	    <input value="<?php echo $this->vars["p4"] ?>" name="p4" placeholder="结束金额">-->
                			<!--	    <input value="<?php echo $this->vars["f2"] ?>" name="f2" placeholder="返利比">-->
                   <!--             </td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>总业绩返利比(业绩范围/返利比)</td>-->
                			<!--	<td class="r">-->
                			<!--	    <input value="<?php echo $this->vars["p5"] ?>" name="p5" placeholder="开始金额">-->
                			<!--	    <input value="<?php echo $this->vars["f3"] ?>" name="f3" placeholder="返利比">-->
                   <!--             </td>-->
                			<!--</tr>-->
                			<tr>
                				<td>邀请送VIP</td>
                				<td class="r">
                				    邀请 <input value="<?php echo $this->vars["inviteuser1"] ?>" name="inviteuser1" placeholder="人数"> 人
                				    送 <input value="<?php echo $this->vars["inviteday1"] ?>" name="inviteday1" placeholder="天数"> VIP
                                </td>
                			</tr>
                			<tr>
                				<td></td>
                				<td class="r">
                				    邀请 <input value="<?php echo $this->vars["inviteuser2"] ?>" name="inviteuser2" placeholder="人数"> 人
                				    送 <input value="<?php echo $this->vars["inviteday2"] ?>" name="inviteday2" placeholder="天数"> VIP
                                </td>
                			</tr>
                			<tr>
                				<td></td>
                				<td class="r">
                				    邀请 <input value="<?php echo $this->vars["inviteuser3"] ?>" name="inviteuser3" placeholder="人数"> 人
                				    送 <input value="<?php echo $this->vars["inviteday3"] ?>" name="inviteday3" placeholder="天数"> VIP
                                </td>
                			</tr>
                			<tr>
                				<td></td>
                				<td class="r">
                				    邀请 <input value="<?php echo $this->vars["inviteuser4"] ?>" name="inviteuser4" placeholder="人数"> 人
                				    送 <input value="<?php echo $this->vars["inviteday4"] ?>" name="inviteday4" placeholder="天数"> VIP
                                </td>
                			</tr>
                			<!--<tr>-->
                			<!--	<td>播放器播放模式</td>-->
                			<!--	<td class="search">-->
                			<!--	    <select name="scaletype">-->
                   <!--                     <option value="自适应">自适应</option>-->
                   <!--                     <option value="全屏">全屏</option>-->
                   <!--                 </select>-->
                   <!--             </td>-->
                			<!--</tr>-->
                			<tr>
                				<td>关键词列表</td>
                				<td><input value="<?php echo $this->vars["keywordslist"] ?>" name="keywordslist" placeholder="关键词用(,)隔开"></td>
                			</tr>
                			<tr>
                				<td>违禁词列表</td>
                				<td><input value="<?php echo $this->vars["weijinci"] ?>" name="weijinci" placeholder="违禁词用(,)隔开"></td>
                			</tr>
                			<tr>
                				<td>搜索页面推荐ID</td>
                				<td><input value="<?php echo $this->vars["tuijianid"] ?>" name="tuijianid" placeholder="ID用(,)隔开"></td>
                			</tr>
                			<tr>
                				<td>精选萌主</td>
                				<td><input value="<?php echo $this->vars["selectuser"] ?>" name="selectuser" placeholder="用户名列表用(,)隔开"></td>
                			</tr>
                			<!--<tr>-->
                			<!--	<td>备用域名</td>-->
                			<!--	<td><input value="<?php echo $this->vars["geturl"] ?>" name="geturl" placeholder=""></td>-->
                			<!--</tr>-->
                			<tr>
                				<td>IOS下载地址</td>
                				<td><input value="<?php echo $this->vars["ios"] ?>" name="ios" placeholder="完整下载链接"></td>
                			</tr>
                			<tr>
                				<td>Android下载地址</td>
                				<td><input value="<?php echo $this->vars["android"] ?>" name="android" placeholder="完整下载链接"></td>
                			</tr>
                			
                			<tr>
                				<td>客服链接</td>
                				<td><input value="<?php echo $this->vars["kefu1"] ?>" name="kefu1" placeholder=""></td>
                			</tr>
                			<tr>
                				<td>备用客服链接</td>
                				<td><input value="<?php echo $this->vars["kefu2"] ?>" name="kefu2" placeholder=""></td>
                			</tr>
                			<tr>
                				<td>IOS下载描述</td>
                				<td>
                				    <textarea name="iosdesc"><?php echo $this->vars["iosdesc"] ?></textarea>
                				    
                				</td>
                			</tr>
                			<tr>
                				<td>Android下载描述</td>
                				<td>
                				    <textarea name="androiddesc"><?php echo $this->vars["androiddesc"] ?></textarea>
                				</td>
                			</tr>
                			<!--<tr>-->
                			<!--	<td>SMTP服务器</td>-->
                			<!--	<td><input value="<?php echo $this->vars["smtp1"] ?>" name="smtp1" placeholder=""></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>SMTP用户名</td>-->
                			<!--	<td><input value="<?php echo $this->vars["smtp2"] ?>" name="smtp2" placeholder=""></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>密码或授权码</td>-->
                			<!--	<td><input value="<?php echo $this->vars["smtp3"] ?>" name="smtp3" placeholder=""></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>端口</td>-->
                			<!--	<td><input value="<?php echo $this->vars["smtp4"] ?>" name="smtp4" placeholder=""></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>发件人</td>-->
                			<!--	<td><input value="<?php echo $this->vars["smtp5"] ?>" name="smtp5" placeholder=""></td>-->
                			<!--</tr>-->
                			
                			
                			<tr>
                				<td>投稿链接</td>
                				<td><input value="<?php echo $this->vars["tougao"] ?>" name="tougao" placeholder=""></td>
                			</tr>
                			<tr>
                				<td>购买必读(会员)</td>
                				<td><input value="<?php echo $this->vars["miaoshu1"] ?>" name="miaoshu1" placeholder=""></td>
                			</tr>
                			<tr>
                				<td>购买必读(金币)</td>
                				<td><input value="<?php echo $this->vars["miaoshu2"] ?>" name="miaoshu2" placeholder=""></td>
                			</tr>
                			<tr>
                				<td>解压教程链接</td>
                				<td><input value="<?php echo $this->vars["jiaocheng"] ?>" name="jiaocheng" placeholder=""></td>
                			</tr>
                			
                			<tr>
                				<td>版权信息</td>
                				<td><input value="<?php echo $this->vars["hl1"] ?>" name="hl1" placeholder=""></td>
                			</tr>
                			<tr>
                				<td>统计代码</td>
                				<td><input value="<?php echo $this->vars["hl2"] ?>" name="hl2" placeholder=""></td>
                			</tr>
                			
                			<tr>
                				<td></td>
                				<td><a href="javascript:;" class="btn submit" rel="updatesys"><i class="fa fa-edit"></i>设置</a></td>
                			</tr>
                		
                		
                		</tbody></table>
                	</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>