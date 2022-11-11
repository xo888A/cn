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
        $(function(){
            $("select[name=wtype]").find("option[value='<?php echo $this->vars["wtype"] ?>']").attr("selected",true);
        });
    </script>
    <style>
        .category_input{
            width:100%
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
                    <p class="title">问题添加</p>
                    <div class="frmtable_content">
                		<table class="w100 addtopic">
                			<tbody><tr>
                				<td>问题标题</td>
                				<td><input name="title" placeholder="" value="<?php echo $this->vars["title"] ?>"></td>
                			</tr>
                			<tr>
                				<td>问题内容</td>
                				<td><input name="content" placeholder="" value="<?php echo $this->vars["content"] ?>"></td>
                			</tr>
                			<tr>
                				<td>问题类型</td>
                				<td class="search">
                				    <select name="wtype">
                                        <option value="VIP模块">VIP模块</option>
                                        <option value="金币模块">金币模块</option>
                                        <option value="客服问答模块">客服问答模块</option>
                                        <input type="hidden" name="id" value="<?php echo $this->vars["id"] ?>" />
                                    </select>
                                </td>
                			</tr>
                			<tr>
                				<td></td>
                				<td><?php echo $this->vars["btn"] ?></td>
                			</tr>
                		</tbody></table>
                	</div>
                </div>
            </div>
           
        </div>
    </div>
</body>
</html>