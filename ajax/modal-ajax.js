jQuery(document).ready(function($) {

    $(document).on('click', '.view-post', function(e){
        e.preventDefault();

        var postID = $(this).data('postid');
        var postSlug = $(this).data('slug');

        // changing URL based on the post slug
        window.history.pushState(null, null, postSlug);

        $('body').css('overflow', 'hidden');

        $.ajax({
            url: wpAjax.ajaxUrl, // WordPress AJAX endpoint
            type: 'post',
            data: {
                action: 'get_post_content',
                post_id: postID,
            },
            success: function(response) {
                $('#modal-content-placeholder').html(response);
                $('#modal').show();
            }
        });
    });

    $('.homeInner').click(function() {
        $('#modal').hide();
        $('body').css('overflow', 'auto');
    });

    $(window).click(function(event) {
        if (event.target == $('#modal')[0]) {
            $('#modal').hide();
        }
    });

});