<?php get_header(); ?>


<div class="homeInner bg-white container mx-auto">
    <div class="grid md:grid-cols-6 gap-1 pb-10">
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
                <div class="customTaxonomyWrapper my-6">
                    <div class="customTaxonomyTerms w-11/12 border-solid border-2 border-gray-100 rounded-lg shadow-md font-avenir py-2">
                        <ul class="categories-filter flex flex-wrap" name="categoryfilter">
                            <?php 
                            $cat_args = get_terms(array(
                                'taxonomy' => 'category',
                            ));

                            $categories = $cat_args;
                            $i = 0;

                            foreach($categories as $term) : ?>
                                <li class="py-2 mx-1 w-fit">
                                <a class="cat-list_item w-fit block py-1 px-4 font-light text-base shadow-md acquisitionBackgroundItem-<?php echo $i; ?>" href="#!" data-slug="<?= $term->slug; ?>">
                                    <?= $term->name; ?>
                                </a>
                                </li>
                            <?php 
                                $i++;
                                endforeach; 
                            ?>
                        </ul>
                    </div>
                </div>
                <!-- Newsletter Sidebar -->
                <?php get_template_part( 'partials/newsletter', 'sidebar' ); ?>
            </div>
        </div>
        <!-- RIGHT SIDE -->
        <div class="col-span-5">
            <div class="hidden md:grid grid-cols-2 gap-4 h-20">
                <!-- Newsletter area -->
                <?php 
                    $shortcode = get_field('newsletter_shortcode', 214);
                    echo do_shortcode($shortcode);
                ?>
                <!-- Pages and Social Media -->
                <div class="flex justify-between items-center">
                    <div class="menuItems">
                        <?php 
                        wp_nav_menu(
                            array(
                            'theme_location' => 'header-menu',
                            'container_class' => 'headerMenuWrapper font-avenir font-medium text-base tracking-wide italic',
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
            <div id="copywritingExamples_response"  class="copywritingExamplesAjax-posts md:mx-0">
                <div class="examplesPosts_wrapper mt-24 md:mt-10">
                    <div class="examplePosts_grid mx-3 md:mx-0">
                            <?php
                            $args = array(
                                'post_type'      => 'program', 
                                'posts_per_page' => -1, 
                            );

                            $exampleQuery = new WP_Query( $args );

                            if ( $exampleQuery->have_posts() ) {
                                while ( $exampleQuery->have_posts() ) {
                                    $exampleQuery->the_post(); ?>

                                    <div class="imageContent relative grid-item examplesPost_post__wrapper block h-auto max-w-full">
                                        <?php $thumb = get_the_post_thumbnail_url(); ?> 
                                        <img src="<?php echo $thumb; ?>" alt="">
                                        <div class="imageContent_layer text-center px-5">
                                            <?php the_content(); ?>
                                        </div>  
                                        <!-- Link -->
                                        <?php $copywritingExamplesLink = get_field('copywriting_examples_link'); ?>
                                        <a class="imageContent_link" target=”_blank” href="<?php echo $copywritingExamplesLink; ?>">
                                        <i class="fa-solid fa-link"></i>
                                        </a>
                                    </div>




                            <?php
                                }
                                wp_reset_postdata();
                            } else {
                                echo 'No posts found';
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter modal -->
    <?php get_template_part('partials/newsletter', 'modal'); ?>
    <!-- Mobile categories -->
    <div class="examplesMobileCategories_wrapper hidden w-full h-fit bg-white absolute bottom-0 right-0">
        <div class="">
        <a href="#" class="close_mobileCategories__wrapper absolute top-6 right-5">
            <i class="fa-solid fa-x text-2xl text-black"></i>
        </a>
        </div>
        <!-- Custom Taxonomies -->
        <div class="customTaxonomyWrapper my-6">
            <div class="customTaxonomyTerms font-avenir py-2">
                <ul class="categories-filter flex flex-wrap" name="categoryfilter">
                    <?php 
                    $cat_args = get_terms(array(
                        'taxonomy' => 'category',
                    ));

                    $categories = $cat_args;
                    $i = 0;

                    foreach($categories as $term) : ?>
                        <li class="py-2 mx-1 w-fit">
                        <a class="cat-list_item w-fit block py-1 px-4 font-light text-base shadow-md acquisitionBackgroundItem-<?php echo $i; ?>" href="#!" data-slug="<?= $term->slug; ?>">
                            <?= $term->name; ?>
                        </a>
                        </li>
                    <?php 
                        $i++;
                        endforeach; 
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>