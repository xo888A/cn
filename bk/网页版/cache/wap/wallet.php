<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>我的钱包</title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/api.js"></script>
    <script type="text/javascript" src="<?php echo JS ?>/index.js"></script>
</head>

<body>
    <?php file::import("system-model-top"); ?>
    <div class="wrap">
        <div class="top rel newtop2 mt70 ">
            <div>
                <ul class="overflow ">
                    <li>
                        <img src="<?php echo TU ?>/top1.png">
                        <p class="p1">人民币(元)</p>
                        <p class="p2">余额: <?php echo $this->vars["money"] ?></p>
                    </li>
                    <li>
                        <img src="<?php echo TU ?>/top2.png">
                        <p class="p1">我的金币</p>
                        <p class="p2">余额: <?php echo $this->vars["diam"] ?></p>
                    </li>
                </ul>
            </div>
            <img class="abs" src="<?php echo TU ?>/moneybg.png">
        </div>
        <div class="pubtit ">
            <p class="selected" rel="u1"><span></span>申请提现</p>
            <p rel="u2" class=""><span></span>提现记录</p>
        </div>
        <div class="part3 part overflow  part1" style="display: block;">
            <p class="notice" style="font-size:16px">请输入提现金额</p>
            <p class="button button2 s"><input name="wallet" class="w89" placeholder="输入金额"></p>
            <p class="notice notice2">当前余额: <span class="nowmoney"><?php echo $this->vars["money"] ?></span>元<span class="fr alltixian">全部提现</span></p>
            <ul class="overflow tx">
                <li class="selected" rel="npart1"><p class="abs"><img class="r" src="/static/img/web/select.png"></p><div><img class="z" src="./static/img/web/tx1.png"><span>银行卡</span></div></li>
                <li rel="npart2"><p class="abs"><img class="r" src="/static/img/web/select.png"></p><div><img class="z" src="/static/img/web/tx2.png"><span>支付宝</span></div></li>
                <li rel="npart3"><p class="abs"><img class="r" src="/static/img/web/select.png"></p><div><img class="z" src="/static/img/web/tx3.png"><span>USDT</span></div></li>
            </ul>
            <input type="hidden" name="wtype" value="bank">
            <div class="_public npart1">
                <p class="button button2 s"><input class="w89" name="bankcard" placeholder="银行卡号"></p>
                <p class="button button2 s"><input class="w89" name="bankcardname" placeholder="开户人姓名"></p>
                <p class="button button2 s"><input class="w89" name="bankcardtype" placeholder="开户行名称"></p>
            </div>
            <div class="_public npart2 hide">
                <p class="button button2 s"><input class="w89" name="alipay" placeholder="真实姓名"></p>
                <p class="button button2 s"><input class="w89" name="alipayname" placeholder="支付宝号"></p>
            </div>
            <div class="_public npart3 hide">
                <p class="button button2 s"><input class="w89" name="numberaddress" placeholder="货币地址(仅限USDT-TRC20)"></p>
            </div>
            <p class="button button2 s"><input name="pass" class="w89" placeholder="提现密码"></p>
            <p class="notice notice2">提现将在24小时内到账, 如未到账, 请联系客服</p>
            <p class="pubbtn wallettixian">立即提现</p>
        </div>
        <div class="part2 _part2 hide">
            <ul><?php echo $this->vars["w"] ?></ul>
        </div>
    </div>
    <p class="botom"></p>
    <script>
        $(function(){
            $('.pubtit p').click(function(){
                var rel = $(this).attr("rel");
                $('.pubtit p').attr('class','');
                $(this).attr('class','selected');
                if(rel=="u1"){
                    $('.part1').show();
                    $('.part2').hide();
                }else{
                    $('.part2').show();
                    $('.part1').hide();
                }
            });
            $('.tx li').click(function(){
                $('.tx li').attr('class','');
                $('._public').attr('style','display:none');
                var rel = $(this).attr('rel');
                rel = "."+rel;
                $(this).attr('class','selected');
                $(rel).attr('style','display:block');
                if(rel=='.npart1'){
                    $("input[name=wtype]").val("bank")
                }else if(rel=='.npart2'){
                    $("input[name=wtype]").val("alipay")
                }else if(rel=='.npart3'){
                    $("input[name=wtype]").val("number")
                }
            });
        });
    </script>

</body>

</html>
