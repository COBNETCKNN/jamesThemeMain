jQuery(document).ready(function(jQuery){

    jQuery('#modal').modal().on('shown', function(){
        jQuery('body').css('overflow', 'hidden');
    }).on('hidden', function(){
        jQuery('body').css('overflow', 'auto');
    })

    jQuery('.examplePosts_grid').masonry({
        // options
        itemSelector: '.grid-item',
        columnWidth: 200
      });
    
});