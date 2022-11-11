<?php
    $index = INDEX;
    $i = IMG;
     $newadd = "<div class='newadddata overflow wrap' onclick='openwin(\"login\")'>
        <div class='div1'>
                       
                        <p class='p1'>原创社区</p>
                        <p class='p2'>平台耗资百万签约原创达人</p>
                        <img src='{$i}/md1.png' />
                      
                    </div>
                    <div class='div2'>
                      
                        <p class='p1'>匠心打造</p>
                        <p class='p2'>手机电脑APP三端在线观看</p>
                        <img src='{$i}/md2.png' />
                       
                    </div>
                    <div class='div3'>
                      
                        <p class='p1'>模特云集</p>
                        <p class='p2'>百位福利姬入驻原创更新中</p>
                        <img src='{$i}/md3.png' />
                        
                    </div>
                    <div class='div4'>
                       
                        <p class='p1'>VIP特权</p>
                        <p class='p2'>赞助VIP全网视频图片无限看</p>
                        <img src='{$i}/md4.png' />
                       
                    </div>
    </div>";
    echo json_encode(array(
        'state'=>1,
        'data'=>$newadd
    ));
?>