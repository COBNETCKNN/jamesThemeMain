jQuery(document).ready(function (jQuery) {
  jQuery('.cat-list_item').on('click', function () {
    jQuery('.cat-list_item').removeClass('active');
    jQuery(this).addClass('active');
    jQuery.ajax({
      type: 'POST',
      url: '/wp-admin/admin-ajax.php',
      dataType: 'html',
      data: {
        action: 'filter_projects',
        category: jQuery(this).data('slug')
      },
      success: function success(res) {
        jQuery('.project-tiles').html(res);
      }
    });
  });
});
