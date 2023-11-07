jQuery(document).ready(function($) {

    $('.view-post').click(function(e) {
        e.preventDefault();

        var postID = $(this).data('postid');
        var postSlug = $(this).data('slug');

        // changing URL based on the post slug
        window.history.pushState(null, null, postSlug);

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
    });

    $(window).click(function(event) {
        if (event.target == $('#modal')[0]) {
            $('#modal').hide();
        }
    });

});