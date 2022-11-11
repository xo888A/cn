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
                    <p class="title">概要</p>
                    <div class="frmtable">
                    	<div class="notice">
			                <div class="note-info">
			                    <p class="p1 btn1">系统信息</p>
			                    <p class="pub">系统类型及版本号: <?php echo $this->vars["system"] ?></p>
			                    <p class="pub"><?php echo $this->vars["memory"] ?><br></p>
			                </div>
			            </div>
			            <div class="notice">
			                <div class="note-info">
			                    <p class="p1 btn1">统计信息</p>
			                </div>
			            </div>

			            <ul class="tags">
                            <li class="m l1">
                                <i class="fa fa-comments-o f"></i>
                                <div class="details abs">
                                    <div class="num"> <?php echo $this->vars["num1"] ?> </div>
                                    <div class="des"> 今日登录人数 </div>
                                </div>
                                <p class="abs w100"></p>
                            </li>
                            <li class="m l2">
                                <i class="fa fa-bar-chart f"></i>
                                <div class="details abs">
                                    <div class="num"> <?php echo $this->vars["num2"] ?> </div>
                                    <div class="des"> 昨日新增用户量 </div>
                                </div>
                                <p class="abs w100"></p>
                            </li>
                            <li class="m l3">
                                <i class="fa fa-pagelines f"></i>
                                <div class="details abs">
                                    <div class="num"> <?php echo $this->vars["num3"] ?> </div>
                                    <div class="des"> 总用户量 </div>
                                </div>
                                <p class="abs w100"></p>
                            </li>
                            <li class="l4">
                                <i class="fa fa-gitlab f"></i>
                                <div class="details abs">
                                    <div class="num" style="font-size:21px"> 查看 </div>
                                    <div class="des"> 手机型号  </div>
                                </div>
                                <p class="abs w100"><a href='<?php echo INDEX ?>/admin.php?mod=userlist' class=' block'>查看更多<i class='fa fa-arrow-circle-right'></i></a></p>
                            </li>
                            <p class="clear"></p>
                        </ul>
			            <div class="notice">
			                <div class="note-info">
			                    <p class="p1 btn1">安装统计</p>
			                    <!--<p class="pub">上一次登录时间 : <?php echo $this->vars["logtime"] ?></p>-->
			                    <!--<p class="pub">上一次登录IP : <?php echo $this->vars["ip"] ?></p>-->
			                    <!--<p class="pub">上一次登录地址 : <?php echo $this->vars["address"] ?></p>-->
			                </div>
			            </div>
			            <ul class="tags">
                            <li class="m l1">
                                <i class="fa fa-comments-o f"></i>
                                <div class="details abs">
                                    <div class="num"> <?php echo $this->vars["android"] ?> </div>
                                    <div class="des"> Android安装量 </div>
                                </div>
                                <p class="abs w100"></p>
                            </li>
                            <li class="m l2">
                                <i class="fa fa-bar-chart f"></i>
                                <div class="details abs">
                                    <div class="num"> <?php echo $this->vars["ios"] ?> </div>
                                    <div class="des"> IOS安装量 </div>
                                </div>
                                <p class="abs w100"></p>
                            </li>
                            <li class="m l3">
                                <i class="fa fa-pagelines f"></i>
                                <div class="details abs">
                                    <div class="num"> <?php echo $this->vars["all"] ?> </div>
                                    <div class="des"> 总量 </div>
                                </div>
                                <p class="abs w100"></p>
                            </li>
                            <p class="clear"></p>
                        </ul>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
</body>
</html>