
    <header class="wrap">
        <div class="top">
            <form onclick="openform()">
            <input type="hidden" name="mod" value="search">
            <a href="<?php echo INDEX ?>"><img class="logo" src="../image/logo.png" /></a>
            <input name="keyword" placeholder="搜索/影片" />
            <img class="search" src="../image/search.png">
            <?php echo $this->vars["ttt"] ?>
            </form>
        </div>
        <ul class="nav">
            <li class="<?php echo $this->vars["a"] ?>"><span></span><a href="<?php echo INDEX ?>">首页</a></li>
            <li class="<?php echo $this->vars["c"] ?>"><span></span><a href="<?php echo INDEX ?>/index.php?mod=recommend">推荐</a></li>
            <li class="<?php echo $this->vars["e"] ?>"><span></span><a href="<?php echo INDEX ?>/index.php?mod=userlist">萌主</a></li>
            <li class="<?php echo $this->vars["f"] ?>"><span></span><a href="<?php echo INDEX ?>/index.php?mod=videolist">视频</a></li>
            <li class="<?php echo $this->vars["g"] ?>"><span></span><a href="<?php echo INDEX ?>/index.php?mod=organlist">社区</a></li>
            <li><img class="menu" src="<?php echo IMG ?>/menu.png"></li>
            <div class="clear"></div>
        </ul>
        <div class="list hide">
            <p class="category">分类菜单</p>
            <img src="../image/close.png" class="closecategory" />
            <ul class="overflow">
                <?php echo $this->vars["topic"] ?>
            </ul>
        </div>
    </header>
    <script>
        function openform(){
            window.location.href= window.location.protocol+"//"+window.location.host+"/searchs.html";
        }
    </script>