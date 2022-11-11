<header class="wrap rel phonehide">
        <img class="logo fl" src="<?php echo TU ?>/logo.png" />
        <ul class="overflow fl">
            <li class="<?php echo $this->vars["a"] ?>"><span></span><a href="<?php echo INDEX ?>">首页</a></li>
            <li class="show"><span></span><span></span><a href="javascript:;">分类</a></li>
            <li class="<?php echo $this->vars["c"] ?>"><span></span><a href="<?php echo INDEX ?>/index.php?mod=recommend">推荐</a></li>
            <li class="<?php echo $this->vars["d"] ?>"><span></span><a href="<?php echo INDEX ?>/index.php?mod=type">话题</a></li>
            <li class="<?php echo $this->vars["e"] ?>"><span></span><a href="<?php echo INDEX ?>/index.php?mod=userlist">萌主</a></li>
            <li class="<?php echo $this->vars["f"] ?>"><span></span><a href="<?php echo INDEX ?>/index.php?mod=videolist">视频</a></li>
            <li class="<?php echo $this->vars["g"] ?>"><span></span><a href="<?php echo INDEX ?>/index.php?mod=organlist">社区</a></li>
            <li class="<?php echo $this->vars["h"] ?>"><span></span><a href="<?php echo INDEX ?>/index.php?mod=rank">排行榜</a></li>
        </ul>
        <p class="download fl rel <?php echo $this->vars["i"] ?>"><span></span><img src="<?php echo TU ?>/download.png" /><a href="<?php echo INDEX ?>/index.php?mod=download">下载APP</a></p>
        <form class="fl" action="<?php echo INDEX ?>/index.php"><img class="abs search" src="<?php echo TU ?>/search.png"><input type="hidden" name="mod" value="search" /><div class='mysearch-wrap'><input class="input fl mysearch" name="keyword" placeholder="搜索/影片" /><button class="submit" type="submit">搜索</button></div></form>
        <p class="fr reg"><?php echo $this->vars["usermsg"] ?></p>
        <ul class="type overflow abs hide">
            <?php echo $this->vars["topic"] ?>
        </ul>
        <div class="clear"></div>
</header>
<?php echo $this->vars["sw"] ?>

<script>
    $(function(){
        $('.menu').click(function(){
            $('.mask').show();
        });
        $('.mask .cs').click(function(){
            $('.mask').hide();
        });
        $('.mysearch,.submit').focus(function(){
          $('.mysearch').attr('style',"border:2px solid #FF7BA6");
          $('.submit').show();
        });
        
    });
</script>

