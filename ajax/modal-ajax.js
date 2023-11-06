jQuery(function($) {

    // Get the current URL
    var currentUrl = window.location.href;

    $('body').on('click', '.view-post', function() {
        var data = {
            'action': 'load_post_by_ajax',
            'id': $(this).data('id'),
            'security': blog.security
        };
 
        $.post(blog.ajaxurl, data, function(response) {
            response = JSON.parse(response);
            $('#postModal h5#postModalLabel').text(response.title);
            $('#postModal .modal-body').html(response.content);
            var postSlug = response.post_slug;
            var customTaxonomy = response.custom_taxonomy;
 
            var postModal = new bootstrap.Modal(document.getElementById('postModal'));
            postModal.show();

            window.history.pushState(null, null, postSlug);

        });
    });
});



