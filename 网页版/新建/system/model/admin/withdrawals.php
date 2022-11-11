<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    
    $keyword = CW('get/keyword');
    if($keyword){
        $tel = "tel like '%$keyword%' and ";
    }
    $wtype = CW('get/type');
    if($wtype){
        $wtypes = "wtype='{$wtype}' and ";
    }
    $where = $tel.$wtypes.' 1=1';
    $count = $db->get_count('withdrawals',$where,'id'); 
    $pagecount = ceil($count/PAGESIZE);
    $page = CW('get/page',1);
    
    $page = $page<=0 ? 1 : $page;
    $page = $page>=$pagecount ? $pagecount : $page;
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;
    
 
    $articles = $db->query('withdrawals','',$where,'id desc',"{$page},".PAGESIZE);

    $data = '';
    foreach($articles as $article){
        if($article['wtype']=='bank'){
            $wtype = '银行卡';
            $desc = $article['bankcardname'].'<br />'.$article['bankcard'].'<br />'.$article['bankcardtype'];
        }elseif ($article['wtype']=='number') {
            $wtype = '数字货币';
            $desc = $article['numberaddress'];
        }elseif ($article['wtype']=='alipay') {
            $wtype = '支付宝';
            $desc = $article['alipayname'].'<br />'.$article['alipay'];
        }
        if($article['state']){
            $state = "<p class='alw'>已打款</p>";
            $btn = '';
        }else{
            $state = "<p class='aly'>未打款</p>";
            $btn = "<a class='btn btn1' href='javascript:;' rel='setpay' id='{$article['id']}' tel='{$article['tel']}' money='{$article['money']}'><i class='fa fa-check-circle'></i>设置已打款</a>";
        }
    	$time = date('Y-m-d H:i:s',$article['ftime']);
    	$data .= "<tr>
    	            <td>{$article['tel']}</td>
    				<td>{$article['money']}</td>
                    <td>{$wtype}</td>
                    <td>{$desc}</td>
                    <td>{$time}</td>
                    <td>{$state}</td>
                    <td>
                        {$btn}
                        <a class='btn btn3 del' rel='withdrawals'  id='{$article['id']}' href='javascript:;' ><i class='fa fa-trash'></i>删除</a>
                    </td>
                </tr>";
    }

    $allurl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if(stripos($allurl ,"&page=")){
    	$nallurl = substr($allurl,0,stripos($allurl ,"&page="));
    }else{
    	$nallurl = $allurl;
    }
    $pageurl = $nallurl.'&page=';
    $page = functions::page($count,$pagecount,$pageurl);

    $tpl =  new Society();
    $tpl->assign('data',$data);
    $tpl->assign('page',$page);
    $tpl->compile('withdrawals','admin'); 
?>