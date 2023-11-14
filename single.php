<?php get_header(); ?>


<div class="homeInner bg-white h-fit min-h-screen container mx-auto">
    <a href="<?php echo home_url(); ?>" class="modalRedirect_close__button cursor-pointer lg:block;">
        <i class="fa-solid fa-x absolute top-8 right-10 text-2xl z-10"></i>
    </a>
    <div class="grid md:grid-cols-6 gap-1 h-max pb-10">
        <!-- LEFT SIDE -->
        <div class="hidden md:block col-span-1">
            <div class="leftSidebar">
                <!-- Logo -->
                <div class="logoWrapper">
                    <a href="<?php echo site_url(); ?>">
                        <?php 
                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                            $logo = wp_get_attachment_image_src( $custom_logo_id , 'logo-size' );
                            if ( has_custom_logo() ) {
                                echo '<img class="logo" src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                            } else {
                                echo '<h1>' . get_bloginfo('name') . '</h1>';
                            }
                        ?>
                    </a>
                </div>
                <!-- Custom Taxonomies -->
                <!-- Acquisition Custom Taxonomy Sidebar -->
                <div class="customTaxonomyWrapper mb-6 mt-2">
                    <h3 class="sidebarTitle p-1.5 w-fit bg-black text-white font-bold font-avenir uppercase text-sm italic">Acquisition</h3>
                    <div class="customTaxonomyTerms w-10/12 border-solid border-2 border-gray-100 rounded-lg shadow-md font-avenir">
                        <ul class="categories-filter flex grid grid-cols-2" name="categoryfilter">
                            <?php
                            if( $terms = get_terms( array( 
                                'taxonomy' => 'acquisition' ) ) ) : 

                                $i = 0;
                                foreach ( $terms as $term ) :
                                
                                ?>
                                <li class="py-2">
                                    <a type="button"  data-category="<?= $term->term_id; ?>" 
                                        data-posttype="<?= $term->taxonomy?>" 
                                            data-taxonomy="<?= $term->taxonomy?>"  data-slug="<?= $term->slug; ?>" class="js-filter-item w-fit block py-1 px-4 font-light text-base shadow-md acquisitionBackgroundItem-<?php echo $i; ?>" href="<?= $term->term_id; ?>" >
                                        <?= $term->name; ?>
                                </a>
                                </li>
                                <?php $i++; ?>
                            <?php endforeach; endif; ?>
                            
                        </ul>
                    </div>
                </div>
                <!-- Conversion Custom Taxonomy Sidebar -->
                <div class="customTaxonomyWrapper my-6">
                    <h3 class="sidebarTitle p-1.5 w-fit bg-black text-white font-bold font-avenir uppercase text-sm italic">Conversion</h3>
                    <div class="customTaxonomyTerms w-8/12 border-solid border-2 border-gray-100 rounded-lg shadow-md font-avenir">
                        <ul class="categories-filter" name="categoryfilter">
                            <?php
                            if( $terms = get_terms( array( 
                                'taxonomy' => 'conversion' ) ) ) : 

                                $i = 0;
                                foreach ( $terms as $term ) :
                                
                                ?>
                                <li class="py-2">
                                    <a type="button" data-category="<?= $term->term_id; ?>" 
                                        data-posttype="<?=$term->taxonomy?>" 
                                            data-taxonomy="<?=$term->taxonomy?>" data-slug="<?= $term->slug; ?>" class="js-filter-item w-fit block py-1 px-4 font-light text-base shadow-md conversionBackgroundItem-<?php echo $i; ?>" href="<?= $term->term_id; ?>" >
                                        <?= $term->name; ?>
                                </a>
                                </li>
                                <?php $i++; ?>
                            <?php endforeach; endif; ?>
                            
                        </ul>
                    </div>
                </div>
                <!-- More Custom Taxonomy Sidebar -->
                <div class="customTaxonomyWrapper my-6">
                    <h3 class="sidebarTitle p-1.5 w-fit bg-black text-white font-bold font-avenir uppercase text-sm italic">More</h3>
                    <div class="customTaxonomyTerms w-10/12 border-solid border-2 border-gray-100 rounded-lg shadow-md font-avenir">
                        <ul class="categories-filter flex grid grid-cols-2" name="categoryfilter">
                            <?php
                            if( $terms = get_terms( array( 
                                'taxonomy' => 'more' ) ) ) : 

                                $i = 0;
                                foreach ( $terms as $term ) :
                                
                                ?>
                                <li class="py-2">
                                    <a type="button" data-category="<?= $term->term_id; ?>" 
                                        data-posttype="<?=$term->taxonomy?>" 
                                            data-taxonomy="<?=$term->taxonomy?>" data-slug="<?= $term->slug; ?>" class="js-filter-item w-fit block py-1 px-4 font-light text-base shadow-md moreBackgroundItem-<?php echo $i; ?>" href="<?= $term->term_id; ?>" >
                                        <?= $term->name; ?>
                                </a>
                                </li>
                                <?php $i++; ?>
                            <?php endforeach; endif; ?>
                            
                        </ul>
                    </div>
                </div>
                <!-- Newsletter Sidebar -->
                <?php get_template_part( 'partials/newsletter', 'sidebar' ); ?>
            </div>
        </div>
        <!-- RIGHT SIDE -->
        <div class="md:col-span-5 lg:col-span-5">
            <div class="hidden md:grid md:grid-cols-1 lg:grid-cols-2 gap-4 h-20">
                <!-- Newsletter area -->
                <div class="flex justify-start items-center hidden xl:block">
                    <?php 
                        $shortcode = get_field('newsletter_shortcode', 214);
                        echo do_shortcode($shortcode);
                    ?>
                </div>
                <!-- Pages and Social Media -->
                <div class="flex md:justify-end xl:justify-between items-center">
                    <div class="menuItems">
                        <?php 
                        wp_nav_menu(
                            array(
                            'theme_location' => 'header-menu',
                            'container_class' => 'headerMenuWrapper font-avenir font-medium md:text-sm lg:text-base tracking-wide italic',
                            )
                        );
                        ?>
                    </div>
                    <div class="socialMediaIcons flex justify-center items-center mr-3">
                        <?php 
                        $args = array(
                            'page_id' => 44,
                        );

                        $socialMediaButtonsQuery = new WP_Query($args);

                        while($socialMediaButtonsQuery->have_posts()){
                            $socialMediaButtonsQuery->the_post(); ?>

                        <?php 
                        // Check rows exists.
                        if( have_rows('social_media_buttons') ):

                            // Loop through rows.
                            while( have_rows('social_media_buttons') ) : the_row();

                                // Load sub field value.
                                $socialMediaImage = get_sub_field('social_media_icon');
                                $socialMediaLink = get_sub_field('social_media_link');

                                echo "<a href='".$socialMediaLink."'>";
                                 echo wp_get_attachment_image( $socialMediaImage, 'social-media-icons' ); 
                                echo "</a>";
                                ?>
                                     
                                <?php
                            endwhile;
                        endif;

                        ?>
                        <?php } 
                            wp_reset_postdata();
                        ?>

                    </div>

                </div>
            </div>
            <!-- Blog posts -->
            <div id="response"  class="ajax-posts">
                <div class="blogPostsWrapper md:mt-10">
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 md:mr-5 mx-3 md:mx-0">
                            <?php 

                            //query to load selected featured post on front page
                            $postsPerPage = 12;
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => $postsPerPage,
                            );

                            $blogPostQuery = new WP_Query($args);

                            while($blogPostQuery->have_posts()){
                                $blogPostQuery->the_post(); ?>

                                <div class="blogCardBlackOverlay">
                                    <div class="col-span-1 shadow-2xl">
                                    <?php $thumb = get_the_post_thumbnail_url(); ?>
                                        <div class="relative blogPostCard rounded-xl" style="background-image: linear-gradient(rgba(66,32,6,0.7) 0%, rgb(134, 191, 255,0.3) 130%), url('<?php echo $thumb;?>')">
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
                            <?php
                            }
                            wp_reset_postdata();
                            ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="<?php echo home_url(); ?>" class="modalRedirect bg-transparent"></a>
    <div class="singleModal visible">
        <div class="modalClose_wrapper p-2 md:hidden absolute z-10 top-3 right-3">
            <a href="<?php echo home_url(); ?>" class="modalPost_close">
                <i class="fa-solid fa-x text-lg text-white text-2xl"></i>
            </a>
        </div>
        <div class="singleModal_content">
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
                <div class="modal_contentArea__wrapper px-4 md:px-20 py-10">
                        <?php 
                            echo the_content();
                        ?>
                    <div class="modalContent_author py-5">
                        <span class="font-avenirLegit font-normal text-lg text-avenir italic">- <?php echo get_the_author(); ?></span>
                    </div>
                </div>
                <!-- Social media sharing icons -->
                <?php get_template_part('partials/social', 'share'); ?>
            </div>
        </div>

    </div>
    <!-- Newsletter modal -->
    <?php get_template_part('partials/newsletter', 'modal'); ?>

</div>

<?php get_footer(); ?>