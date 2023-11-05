<?php get_header(); ?>


<div class="homeInner bg-white h-screen container mx-auto">
    <div class="grid grid-cols-5 gap-1 h-screen">
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
            <?php 
            global $post;

            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish'
            );
            $postQuery = new WP_Query( $args );
                if ( $postQuery->have_posts() ) {
                while ($postQuery->have_posts()) {
                    $postQuery->the_post();

            ?>
            <!-- Acquisition Custom Taxonomy Sidebar -->
            <div class="customTaxonomyWrapper my-6">
                <h3 class="sidebarTitle p-1.5 w-fit bg-black text-white font-bold font-avenir uppercase text-sm italic">Acquisition</h3>
                <div class="customTaxonomyTerms flex grid grid-cols-2 w-8/12 border-solid border-2 border-gray-100 rounded-lg shadow-md font-avenir">
                <?php 
                    $terms = get_terms( 'acquisition' );
                    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                        $i = 0;
                        foreach ( $terms as $term ) {
                            echo '<div class="py-2">';
                            echo '<span class="acquisitionBackgroundItem-'.$i.' w-fit block py-1 px-4 font-light text-md shadow-md">' . $term->name . '</span>';
                            echo '</div>';
                            $i++;
                        }
                    }
                ?>
                </div>
            </div>
            <!-- Conversion Custom Taxonomy Sidebar -->
            <div class="customTaxonomyWrapper my-6">
                <h3 class="sidebarTitle p-1.5 w-fit bg-black text-white font-bold font-avenir uppercase text-sm italic">Conversion</h3>
                <div class="customTaxonomyTerms w-8/12 border-solid border-2 border-gray-100 rounded-lg shadow-md font-avenir">
                <?php 
                    $terms = get_terms( 'conversion' );
                    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                        $i = 0;
                        foreach ( $terms as $term ) {
                            echo '<div class="py-2">';
                            echo '<span class="conversionBackgroundItem-'.$i.' w-fit block py-1 px-4 font-light text-md shadow-md">' . $term->name . '</span>';
                            echo '</div>';
                            $i++;
                        }
                    }
                ?>
                </div>
            </div>
            <!-- More Custom Taxonomy Sidebar -->
            <div class="customTaxonomyWrapper my-6">
                <h3 class="sidebarTitle p-1.5 w-fit bg-black text-white font-bold font-avenir uppercase text-sm italic">More</h3>
                <div class="customTaxonomyTerms flex grid grid-cols-2 w-8/12 border-solid border-2 border-gray-100 rounded-lg shadow-md font-avenir">
                <?php 
                    $terms = get_terms( 'more' );
                    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                        $i = 0;
                        foreach ( $terms as $term ) {
                            echo '<div class="py-2">';
                            echo '<span class="moreBackgroundItem-'.$i.' w-fit block py-1 px-4 font-light text-md shadow-md">' . $term->name . '</span>';
                            echo '</div>';
                            $i++;
                        }
                    }
                ?>
                </div>
             </div>
            <!-- Newsletter Sidebar -->
            <div class="customTaxonomyWrapper my-6">
                <h3 class="sidebarTitle p-1.5 w-fit bg-black text-white font-bold font-avenir uppercase text-sm italic">Newsletter</h3>
             </div>
        <?php 
            }
        }
        ?>

        </div>
        <!-- RIGHT SIDE -->
        <div class="col-span-4">
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
        </div>
    </div>
</div>




<?php get_footer(); ?>