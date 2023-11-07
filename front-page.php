<?php get_header(); ?>


<div class="homeInner bg-white h-max container mx-auto">
    <div class="grid grid-cols-6 gap-1 h-max pb-10">
        <!-- LEFT SIDE -->
        <div class="col-span-1">
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
            <div class="customTaxonomyWrapper my-6">
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
                                        data-taxonomy="<?= $term->taxonomy?>"  data-slug="<?= $term->slug; ?>" class="js-filter-item w-fit block py-1 px-4 font-light text-md shadow-md acquisitionBackgroundItem-<?php echo $i; ?>" href="<?= $term->term_id; ?>" >
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
                                        data-taxonomy="<?=$term->taxonomy?>" data-slug="<?= $term->slug; ?>" class="js-filter-item w-fit block py-1 px-4 font-light text-md shadow-md conversionBackgroundItem-<?php echo $i; ?>" href="<?= $term->term_id; ?>" >
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
                                        data-taxonomy="<?=$term->taxonomy?>" data-slug="<?= $term->slug; ?>" class="js-filter-item w-fit block py-1 px-4 font-light text-md shadow-md moreBackgroundItem-<?php echo $i; ?>" href="<?= $term->term_id; ?>" >
                                    <?= $term->name; ?>
                            </a>
                            </li>
                            <?php $i++; ?>
                        <?php endforeach; endif; ?>
                        
                    </ul>
                </div>
             </div>
            <!-- Newsletter Sidebar -->
            <div class="customTaxonomyWrapper my-6">
                <h3 class="sidebarTitle p-1.5 w-fit bg-black text-white font-bold font-avenir uppercase text-sm italic">Newsletter</h3>
             </div>

        </div>
        <!-- RIGHT SIDE -->
        <div class="col-span-5">
            <div class="grid grid-cols-2 gap-4 h-20">
                <!-- Newsletter area -->
                <div class="flex justify-start items-center">
                    <div class="w-[450px]">
                        <form method="post" class="relative flex items-center text-sm">
                        <input type="email" name="email" id="email" placeholder="Get 5 new tips in your inbox every Monday" class="w-full bg-transparent py-2 pl-5 pr-20 border-2 border-solid border-gray-200 rounded-lg outline-none placeholder:text-black/50" required />
                        <button type="submit" class="absolute h-full rounded right-0 bg-black text-white px-4 flex items-center cursor-pointer">
                            <p class="hidden sm:block">Yes please :)</p>
                            <i class="bx bx-chevron-right text-2xl block sm:hidden"></i>
                        </button>
                        </form>
                    </div>
                </div>
                <!-- Pages and Social Media -->
                <div class="flex justify-between items-center">
                    <div class="menuItems">
                        <?php 
                        wp_nav_menu(
                            array(
                            'theme_location' => 'header-menu',
                            'container_class' => 'headerMenuWrapper font-avenir font-medium text-lg italic',
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
            <div id="response">
                <div class="blogPostsWrapper mt-10">
                    <div class="grid grid-cols-3 gap-4 mr-5">
                            <?php 

                            //query to load selected featured post on front page
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 12,
                            );

                            $blogPostQuery = new WP_Query($args);

                            while($blogPostQuery->have_posts()){
                                $blogPostQuery->the_post(); ?>

                                <div class="blogCardBlackOverlay">
                                    <div class="col-span-1 shadow-2xl">
                                    <?php $thumb = get_the_post_thumbnail_url(); ?>
                                        <div class="relative blogPostCard rounded-2xl" style="background-image: linear-gradient(rgba(66,32,6,0.7) 0%, rgb(134, 191, 255,0.3) 130%), url('<?php echo $thumb;?>')">
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
                            ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal" class="modal">
        <div class="p-5 modal-content">
            <div id="modal-content-placeholder"></div>
        </div>
    </div>
</div>

<?php get_footer(); ?>