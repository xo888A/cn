<header class="public ls">
        <img class="abs left back" src="../image/left_.png" />
        <img class="abs right menu" src="../image/menu.png" />
        <p class="center"><?php echo $this->vars["tname"] ?></p>
        <div class="list hide">
            <p class="category">分类菜单</p>
            <img src="../image/close.png" class="closecategory" />
            <ul class="overflow">
                <?php echo $this->vars["topic"] ?>
            </ul>
        </div>
</header>
<?php echo $this->vars["sw"] ?>