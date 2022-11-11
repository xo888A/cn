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
    <script>
        var inputs =  document.getElementsByTagName("input");
        function converSelectAll(){
            for(var i = 0;i<inputs.length;i++){
                if(inputs[i].checked){
                    inputs[i].checked = false;
                }else{
                    inputs[i].checked = true;
                }
            }
        }
        $(function(){
            $("select[name=ishow]").find("option[value='<?php echo CW('get/ishow');  ?>']").attr("selected",true);
        });
    </script>
</head>
<body>
    <?php file::import("system-model-admin-header"); ?>
    <?php file::import("system-model-admin-aside"); ?>
    <div class="wrap">
        <div class="w100">
            <?php file::import("system-model-admin-tag"); ?>
            <div class="content">
                <div class="frame">
                    <p class="title">搜索条件</p>
                    <div class="frmtable">
                        <form action="admin.php" method="get" class="search">
                            <input type="hidden" name="mod" value="userlist" />
                            <input style="width: auto;" type='checkbox' name="checkbox" <?php echo $this->vars["checkbox"] ?> /><span style="color: #999;font-size: 14px;margin: 0 5px;vertical-align: text-top;">是否开启精准搜索</span>
                            <input name="keyword" value="<?php echo CW('get/keyword')==='0' ? '' : CW('get/keyword');  ?>" placeholder="搜索账号,支持模糊检索" />
                            <input name="nickname" value="<?php echo CW('get/nickname')==='0' ? '' : CW('get/nickname');  ?>" placeholder="搜索昵称,支持模糊检索" />
                            <select name="addparam">
                                <option value="0">所有</option>
                                <option value="用户">用户</option>
                                <option value="作者">作者</option>
                                <option value="管理员">管理员</option>
                            </select>
                            <button type="submit" class="btn btn1"><i class="fa fa-search"></i>搜索</button>
                        </form>
                    </div>
                    
                </div>
                <div class="frame">
                    <p class="title">用户管理</p>
                    <div class="frmtable">
                    <table class="w100 list">
                        <tr>
                            <th>昵称</th>
                            <th>账号</th>
                            <!--<th>手机型号</th>-->
                            <th>邀请码</th>
                            <th>金币</th>
                            <th>钱包</th>
                            <th>性别</th>
                            <th>操作</th>
                        </tr>
                        <?php echo $this->vars["data"] ?>
                    </table>
                    </div>
                    <div class="fr pat30 w100">
                        <?php echo $this->vars["page"] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>