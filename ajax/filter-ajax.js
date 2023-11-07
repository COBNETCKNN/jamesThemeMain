(function($){

    $(document).ready(function(){
        $(document).on('click', '.js-filter-item', function(event){
            (event).preventDefault();

            var category = $(this).data('category');
            var categorySlug = $(this).data('slug');

            // changing URL based on the category slug
            window.history.pushState(null, null, categorySlug);

            $.ajax({
                url: wpAjax.ajaxUrl,
                data: { 
	                action: 'filterterm', 
	                category: category, 
	                taxonomy:  $(this).data('taxonomy'),
	                posttype:  $(this).data('posttype')
	                },
                type: 'post',
                success: function(result){
                    $('#response').html(result);
                },
                error: function(result){
                    console.warn(result);
                }
            });
        });
    });
})(jQuery);