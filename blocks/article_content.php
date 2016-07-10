<div id="main_content">
    <h2>Статьи</h2>

    <? if($article): ?>
            <h3> <?=$article['title']?> </h3>
            <p> <?=$article['full_article']?> </p>
            <input type="hidden" class = "article_id" value="<?=$article['id'];?>">
            <p class = "icon_like"><img src="http://<?=SITE_NAME;?>/images/like.png" class="like_img" alt = 'like'>
                <span class = "count_likes"><?=$count_likes;?></span>
            </p>
    <? else: ?>

        <p> Статья  не найдена!!! </p>

    <? endif; ?>

</div> <!-- end div main_contnet -->
<div class="clear"></div>
</div><!-- end div wrapper -->