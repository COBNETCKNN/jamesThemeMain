<?php 

function get_post_content() {
    $post_id = $_POST['post_id'];
    $post_slug = $_POST['post_slug'];

    $args = array(
        'p' => $post_id,
        'post_type' => 'post',
    );

    $singlePostQuery = new WP_Query($args);

    if ($singlePostQuery->have_posts()) {
        while ($singlePostQuery->have_posts()) {
            $singlePostQuery->the_post(); 
            $thumb = get_the_post_thumbnail_url();
            ?>
            <div class="modalPost_wrapper mx-auto">
                <!-- Thumbnail section of modal -->
                <div class="relative modalPost_thumbnail__wrapper flex justify-center">
                    <div class="modalPost_thumbnail__blured" style="background-image: linear-gradient(rgba(66,32,6,0.7) 0%, rgb(134, 191, 255,0.3) 130%), url('<?php echo $thumb;?>')"></div>
                    <div class="relative modalPost_thumbnail mx-auto">
                        <?php 
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail( 'modal-thumbnail', array( 'class' => 'pb-5 mx-auto modal_post__thumbnail') );
                                }
                            ?>
                            <h1 class="blogPostCard_title__modal text-2xl font-sans text-white font-bold text-center"><?php the_title(); ?></h1>
                            <div class="">
                                <?php
                                $post_id = get_the_ID();
                                $terms = get_the_terms($post_id, 'acquisition');

                                if ($terms && !is_wp_error($terms)) {
                                    $first_term = reset($terms); ?>
                                    <span class="blogCard_taxonomy__item py-1 px-4 text-sm rounded-2xl absolute bottom-8 right-4 font-medium item-<?php echo $first_term->slug; ?>"><?php echo $first_term->name; ?></span>
                                <?php
                                }
                                ?>
                                <!-- Reading time -->
                                <div class="blogPost_readingTime__wrapper">
                                    <?php 
                                    $readingTime = get_field('reading_time');
                                    ?>
                                    <div class="blogPost_readingTime text-white text-avenir absolute bottom-8 left-4">
                                        <i class="fa-regular fa-lightbulb"></i>
                                        <span><?php echo $readingTime; ?></span>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <!-- Content section of modal -->
                <div class="modal_contentArea__wrapper px-20 py-10">
                    <?php 
                        echo the_content();
                    ?>
                <div class="modalContent_author py-10">
                    <span class="font-avenirLegit font-normal text-lg text-avenir italic">- <?php echo get_the_author(); ?></span>
                </div>
                </div>
            </div>
            <?php 
        }
    } else {
        // No posts found
        echo 'No posts found';
    }
    wp_die();

}
add_action('wp_ajax_get_post_content', 'get_post_content');
add_action('wp_ajax_nopriv_get_post_content', 'get_post_content');