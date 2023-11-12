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

      jQuery('.modal_wrapper').click(function() {
        jQuery('#modal').removeClass('modal');
        jQuery('body').css('overflow', 'auto');
        jQuery('.modal_wrapper').addClass('modal_wrapper__hide');
    });

    jQuery(document).click(function(event) {
        var url = '<?php echo home_url(); ?>';
        //if you click on anything except the modal itself or the "open modal" link, close the modal
        if (!jQuery(event.target).closest(".singleModal").length) {
          jQuery("body").find(".singleModal").removeClass("visible");
        }
    });

    /* Newsletter modal */
    jQuery(".newsletterModal_open").click(function(){
        jQuery(".newsletterModal").addClass("visible");
        jQuery('body').css('overflow', 'hidden');
        });
        
    jQuery(".newsletterModal_close").click(function(){
        jQuery(".newsletterModal").removeClass("visible");
        jQuery('body').css('overflow', 'auto');
    });

    // hamburger menu for mobile
    (function (event) {
        jQuery('.hamburger-wrapper').on('click', function() {
            jQuery('.hamburger-menu').toggleClass('animate');
            jQuery('.mobile-menu-overlay').toggleClass('visible');
            jQuery('.blogPostsWrapper').addClass('nonvisible');
            jQuery('.hamburger-wrapper').addClass('nonvisible');
        })
        jQuery('.mobile-menu-overlay > ul > li > a').on('click', function () {
            jQuery('.hamburger-menu').removeClass('animate');
            jQuery('.mobile-menu-overlay').removeClass('visible');
            jQuery('.blogPostsWrapper').removeClass('nonvisible');
            jQuery('.hamburger-wrapper').removeClass('nonvisible');
        })

        jQuery('.closeHamburger').on('click', function(){
            jQuery('.hamburger-menu').removeClass('animate');
            jQuery('.mobile-menu-overlay').removeClass('visible');
            jQuery('.blogPostsWrapper').removeClass('nonvisible');
            jQuery('.hamburger-wrapper').removeClass('nonvisible');
        })

        jQuery('.categories_icon').on('click', function(){
            jQuery('.mobileCategories_wrapper').toggleClass('visible');
            jQuery('body').css('overflow', 'hidden');
        });

        jQuery('.close_mobileCategories__wrapper').on('click', function(){
            jQuery('.mobileCategories_wrapper').removeClass('visible');
            jQuery('body').css('overflow', 'auto');
        });

        jQuery('.modalPost_close').on('click', function(){
            jQuery('#modal').hide();
        });
    })();
    
    
});