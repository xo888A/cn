<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>账号设置</title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/api.js"></script>
    <script type="text/javascript" src="<?php echo JS ?>/index.js"></script>
    <script>
        $(function(){
            $('.listavatar p').click(function(){
                $('.listavatar p').attr('class','');
                $(this).addClass('selected');
                var index = parseInt($(this).index())+1;
                var ele = ".o"+index;
                $('.public_o').hide();
                $(ele).show();
            });
        });
    </script>
</head>

<body>
    <?php file::import("system-model-top"); ?>
    <div class="wrap set">
        <div class="pubtit">
            <p class="selected" rel="u1"><span></span>个人资料</p>
          
            <p rel="u3"><span></span>账号密码</p>
            <p rel="u4"><span></span>提现密码</p>
        </div>
    </div>
    <div class="wrap h100">
        <div class="part1 part msg overflow rel h100">
            <input type="hidden" name="simg" value="">
           
            <form id="files" class="test" method="post" enctype="multipart/form-data" style="margin-top: 10px;">
            <p class="avatar fl"><img src="<?php echo $this->vars["avatar"] ?>"></p>
            <p class="des">选择一个你喜欢得头像吧(*^_^*)</p>
            <p class="btn">
                
             <a href="javascript:;" class="tj" style="margin-right:0">设置头像</a>
            </p>
            </form>
            
            
            
            <div class="listavatar hide">
                        <p class="selected"><span></span>经典头像</p>
                      
                        <div class="clear"></div>
                    </div>
                    <div class="btnimg list_avatar hide">
                        <ul class="o1 overflow public_o">
                            <?php echo $this->vars["li1"] ?>
                        </ul>
                       
                    </div>
            
            
            
            
            <p class="button" style="margin-top: 25px;"><input placeholder="昵称" name="nickname" value="<?php echo $this->vars["nickname"] ?>"><a href="javascript:;" class="nickname">保存</a></p>
            <p class="notice">昵称不得超过10个汉字或者字符</p>
           
        </div>
        <div class="part2 part overflow hide" >
            <?php echo $this->vars["html2"] ?>
                    <div <?php echo $this->vars["ishide2"] ?>>
                    <p class="button button2 s"><input name="email" placeholder="邮箱" /></p>
                    <p class="notice">提示: 邮箱一经设置不允许修改</p>
                    
                    <p class="pubbtn sendemail">立即绑定</p>
                    </div>
        </div>
        <div class="part3 part overflow hide" >
            <p class="notice" >会员账号密码修改</p>
            <p class="button button2 s"><input name="pass1" class="w89" placeholder="输入旧密码"></p>
            <p class="button button2 s"><input name="pass2" class="w89" placeholder="新密码"></p>
            <p class="notice">密码仅限字母/数字不支持特殊字符</p>
            <p class="button button2 s"><input name="pass3" class="w89" placeholder="确认新密码"></p>
            <p class="pubbtn updatepassword">确认修改密码</p>
        </div>
        <div class="part4 part3 part overflow hide" >
            <?php echo $this->vars["html"] ?>
                    <div <?php echo $this->vars["ishide"] ?>>
<p class="notice">设置提现密码</p>
<p class="button button2 s"><input class="w89" placeholder="输入6位数密码" name="withdrawalspass"></p>
<p class="notice">提示: 提现密码一经设置不允许修改</p>
<p class="pubbtn withdrawalspass">保存</p>
</div>
</div>
    </div>
    <p class="botom"></p>
    <script>
        $(function(){
            $('.selectsex').click(function(){
                $('.mysex').toggle();
            });
            $('.mysex a').click(function(){
                $('.selectsex').val($(this).text());
                $('.mysex').hide();
            });
            $('.pubtit p').click(function(){
                var rel = $(this).attr("rel");
                $('.pubtit p').attr('class','');
                $(this).attr('class','selected');
                if(rel=="u1"){
                    $('.part1').show();
                    $('.part2').hide();
                    $('.part3').hide();
                    $('.part4').hide();
                }else if(rel=="u2"){
                    $('.part1').hide();
                    $('.part2').show();
                    $('.part3').hide();
                    $('.part4').hide();
                }else if(rel=="u3"){
                    $('.part1').hide();
                    $('.part2').hide();
                    $('.part3').show();
                    $('.part4').hide();
                }else if(rel=="u4"){
                    $('.part1').hide();
                    $('.part2').hide();
                    $('.part3').hide();
                    $('.part4').show();
                }
            });
            $('.tj').click(function(){
                $('.list_avatar,.listavatar').toggle();
            });
            $('.list_avatar img').click(function(){
                //$('.list_avatar').hide();
                var img = $(this).attr('src');
                $('.avatar.fl img').attr('src',img);
                $('input[name=simg]').val(img);
                
                var img = $('input[name=simg]').val();
                ajax('webupdateusers');
                
            });
        });
        $("input[type=file]").change(function(e){
        　　var imgBox = e.target;
        　　uploadImg($('.avatar.fl img'), imgBox)
        });

    </script>
</body>

</html>
