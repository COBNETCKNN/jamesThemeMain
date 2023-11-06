<?php
// =============================================================
// AJAX CALLBACK FOR CONVERSION TAXONOMY
// =============================================================

add_action('wp_ajax_nopriv_filterterm', 'conversion_filter');
add_action('wp_ajax_filterterm', 'conversion_filter');

function conversion_filter(){

	$category = $_POST['category'];

	$args = array(
		'post_type' => $_POST['post'], 
		'posts_per_page' => -1, 
		'orderby'	=> 'NAME', 
		'order' => 'ASC'
	);

	if ($category !== null && isset($category) && $category !== '' && !empty($category)) {
		$args['tax_query'] = 
			array( 
				array( 
						'taxonomy' => $_POST['taxonomy'], 
						'field' => 'id', 
						'terms' => array((int)$category) 
					) 
			); 
	} else {
		$all_terms = get_terms(array('taxonomy' => 'conversion', 'fields' => 'slugs'));
		$args['tax_query'][] = [
			'taxonomy' => 'conversion',
			'field'    => 'slug',
			'terms'    => $all_terms
		];
	}


	$the_query = new WP_Query( $args ); ?>
	
    <div class="blogPostsWrapper mt-16">
        <div class="grid grid-cols-3 gap-4 mr-5">

            <?php if ( $the_query->have_posts() ) : 
                while ( $the_query->have_posts() ) : $the_query->the_post(); 
                
                $category = get_the_category(); ?>

                <?php get_template_part( 'partials/blog', 'card' ); ?>
        
            <?php endwhile; endif; ?>
        </div>
    </div>
<?php

	die();
}