<?php
// =============================================================
// AJAX CALLBACK FOR ACQUISITION TAXONOMY
// =============================================================

add_action('wp_ajax_nopriv_filterterm', 'filter_ajax_term');
add_action('wp_ajax_filterterm', 'filter_ajax_term');

function filter_ajax_term(){

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
		$all_terms = get_terms(array('taxonomy' => 'acquisition', 'fields' => 'slugs'));
		$args['tax_query'][] = [
			'taxonomy' => 'acquisition',
			'field'    => 'slug',
			'terms'    => $all_terms
		];
	}


	$the_query = new WP_Query( $args ); ?>
	
    <div class="blogPostsWrapper mt-24 md:mt-10">
        <div class="grid md:grid-cols-3 gap-4 md:mr-5 mx-3">

            <?php if ( $the_query->have_posts() ) : 
                while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

				<?php get_template_part( 'partials/blog', 'card' ); ?>
        
            <?php endwhile; endif; ?>
        </div>
    </div>
<?php

	die();
}

?>