<div class="blogCardBlackOverlay">
    <div class="col-span-1 shadow-2xl">
    <?php $thumb = get_the_post_thumbnail_url(); ?>
        <div class="relative blogPostCard rounded-2xl" style="background-image: linear-gradient(rgba(0,47,75,0.5) 0%, rgba(220, 66, 37, 0.3) 130%), url('<?php echo $thumb;?>')">
        <h1 class="blogPostCard_title font-sans text-white font-bold text-start"><?php the_title(); ?></h1>
        </div>
    </div>
</div>