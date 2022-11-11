<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();

    $vipcards = $db->query('vipcard','',$where,'id asc');
    $data = '';
    foreach ($vipcards as $vip){
		$data .= "<tr>
		            <td><input class='category_input' name='state' placeholder='开启或者关闭' value='{$vip['state']}'></td>
            		<td><input class='category_input' name='stit' placeholder='左上角宣传语,最多8字' value='{$vip['stit']}'></td>
            		<td><input class='category_input' name='btit' placeholder='会员卡名称,最多6字' value='{$vip['btit']}'></td>
            		<td><input class='category_input' name='oldprice' placeholder='原价' value='{$vip['oldprice']}'></td>
            		<td><input class='category_input' name='nowprice' placeholder='现价' value='{$vip['nowprice']}'></td>
            		<td><input class='category_input' name='ucard' placeholder='优惠券' value='{$vip['ucard']}'></td>
            		<td><input class='category_input' name='descs' placeholder='描述,最多12字' value='{$vip['descs']}'></td>
            		<td><input class='category_input' name='days' placeholder='VIP天数' value='{$vip['days']}'></td>
            		<td><input class='category_input' name='adddiam' placeholder='赠送钻石数' value='{$vip['adddiam']}'></td>
            		<td><input class='category_input' name='address1' placeholder='购买地址' value='{$vip['address1']}'></td>
            		<td><input class='category_input' name='address2' placeholder='优惠后的购买地址' value='{$vip['address2']}'></td>
                    <td><a class='btn btn2' rel='updatevip' vipcardid='{$vip['id']}' href='javascript:;'><i class='fa fa-edit'></i>更新</a></td>
                </tr>";
    }
    

    $pageurl = INDEX.'/admin.php?mod=setvip&page=';
    $page = functions::page($count,$pagecount,$pageurl);

    $tpl =  new Society();
    $tpl->assign('data',$data);
    $tpl->assign('page',$page);
    $tpl->compile('setvip','admin'); 
?>