(function($){

    $(document).ready(function(){
        $(document).on('click', '.js-filter-item', function(event){
            (event).preventDefault();

            var category = $(this).data('category');

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