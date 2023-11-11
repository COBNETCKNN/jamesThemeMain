<div class="customTaxonomyWrapper my-6">
    <h3 class="sidebarTitle p-1.5 w-fit bg-black text-white font-bold font-avenir uppercase text-sm italic">Newsletter</h3>
    <div class="contentWrapper w-10/12 border-solid border-2 border-gray-100 rounded-lg shadow-md pb-4">
    <?php 
        $args = array(
            'page_id' => 214,
        );

        $newsletterPageQuery = new WP_Query($args);

        while($newsletterPageQuery->have_posts()){
            $newsletterPageQuery->the_post(); ?> 
                <!-- Newsletter image -->
                <div class="newsletterImage_wrapper flex justify-center my-5">
                <?php
                    $post_thumbnail = get_the_post_thumbnail(get_the_ID(), 'thumbnail');

                    if ($post_thumbnail) {
                    echo $post_thumbnail;
                }
                
                ?>

                </div>
                <!-- Newsletter button -->
                <div class="newsletter_button__wrapper flex justify-center -mt-8">
                    <a href="#" class="newsletterModal_open text-avenir text-xs bg-transparent border-dashed border border-avenir font-medium py-2 px-6 rounded">Tell me more</a>
                </div>
            <?php } 
                wp_reset_postdata();
            ?>
    </div>
</div>