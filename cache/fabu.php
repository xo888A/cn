<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>发布</title>
    <link rel="stylesheet" href="<?php echo CSS ?>/style.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/backstage.js"></script>
    <script>
        function fabu(){
            var post_flag = false; 
            if(post_flag) return; post_flag = true;
            data = $('.frmtable_content input,.frmtable_content textarea,.frmtable_content select').serialize();
            $.ajax({
        		type: "post",
        		url: "/webajax.php?mod=useraddvideo",
        		dataType: 'json',
        		data: data,
        		success: function(data){
                    //$('.message').remove();
                    //$('body').append(data); 
                    if(data.state=='success'){
                        alert(data.data);
                        location.reload();
                    }else{
                        alert(data.data);
                    }
                    
                    post_flag =false;
                },
        		error: function() {
                    post_flag =false;
                },
                beforeSend: function() {
                    
                }
           })
        }
    </script>
</head>

<body>
    <?php file::import("system-model-header"); ?>
    <div class="wrap2 overflow">

            <div class="">
                <div>
                    <p style="margin:20px 0;font-weight: bold;"><a style="color: #3FCF7F;" href="<?php echo INDEX ?>/index.php?mod=user"><< 返回会员中心</a></p>
                    <p style="width:100%;height:1px;background:#ccc;"></p>
                </div>
               <section class="public frmtable_content">
                   <table class="w100">
                            <tr>
                				<td>视频类型</td>
                				<td>
                				    <select name="vidtype">
                				        <option value='长视频'>长视频</option>
                				        <option value='短视频'>短视频</option>
                				    </select>
                				</td>
                			</tr>
                            <tr>
                				<td>视频标题</td>
                				<td><p><input name="title"  placeholder="不超过99个字符(33个字)" /></p></td>
                			</tr>
                	
                			<tr>
                				<td>分类选择</td>
                				<td>
                				    <select name="topic">
                				        <?php echo $this->vars["option"] ?>
                				    </select>
                				</td>
                			</tr>
                			<tr>
                				<td>视频封面</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><input name="file" type="file">选择</a>
                                		</p><input placeholder="请选择图片" class="css" mode="upload" name="videocover" >
                                		<a class="btn btn1 upload" href="javascript:;">上传</a>
                            		</form>
                				</td>
                			</tr>
                			<tr>
                				<td>视频地址</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">选择</a>
                                		</p><input placeholder="请上传视频或者填入远程视频链接" class="css" mode="upload" name="videourl" >
                                		<a class="btn btn1 upload" href="javascript:;">上传</a>
                            		</form>
                				</td>
                				
                			</tr>
                			
                			<!--<tr>-->
                			<!--	<td>视频时长</td>-->
                			<!--	<td><input name="addparam"  placeholder="视频时长 格式 00:00" /></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>视频大小</td>-->
                			<!--	<td><input name="addparam"  placeholder="格式: 12.5M" /></td>-->
                			<!--</tr>-->
                			<tr>
                				<td></td>
                				<td>
                				    <input name="userid" type="hidden" value="<?php echo $this->vars["tel"] ?>" />
                				    <a class="btn btn1" href="javascript:;" onclick="fabu()">立刻发布</a>
                				</td>
                			</tr>
                   </table>
               </section>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <?php file::import("system-model-footer"); ?>
</body>

</html>
