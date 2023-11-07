<div class="blogCardBlackOverlay">
    <div class="col-span-1 shadow-2xl">
    <?php $thumb = get_the_post_thumbnail_url(); ?>
        <div class="relative blogPostCard rounded-2xl" style="background-image: linear-gradient(rgba(0,47,75,0.5) 0%, rgba(220, 66, 37, 0.3) 130%), url('<?php echo $thumb;?>')">
            <h1 class="blogPostCard_title font-sans text-white font-bold text-start"><?php the_title(); ?></h1>
            <!-- Gettng custom taxonomies associate with teh post -->
            <?php
                $post_id = get_the_ID();
                $terms = get_the_terms($post_id, 'acquisition');

                if ($terms && !is_wp_error($terms)) {
                    $first_term = reset($terms); ?>
                    <span class="blogCard_taxonomy__item py-1 px-4 text-sm rounded-2xl absolute bottom-4 right-4 font-medium item-<?php echo $first_term->slug; ?>"><?php echo $first_term->name; ?></span>
                <?php
                }
            ?>
            <!-- Reading time -->
            <div class="blogPost_readingTime__wrapper">
                <?php 
                $readingTime = get_field('reading_time');
                ?>
                <div class="blogPost_readingTime text-white text-avenir absolute bottom-4 left-4">
                    <i class="fa-regular fa-lightbulb"></i>
                    <span><?php echo $readingTime; ?></span>
                </div>
            </div>
                <a href="#" type="button" class="view-post" data-postid="<?php the_ID(); ?>" data-slug="<?php echo get_post_field('post_name', $post_id); ?>"></a>
        </div>
    </div>
</div>