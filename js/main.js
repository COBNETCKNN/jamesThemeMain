jQuery(document).ready((function(e){e("#modal").modal().on("shown",(function(){e("body").css("overflow","hidden")})).on("hidden",(function(){e("body").css("overflow","auto")})),e(".examplePosts_grid").masonry({itemSelector:".imageContent",columnWidth:50,isResizable:!0}),e(".modal_wrapper").click((function(){e("#modal").removeClass("modal"),e("body").css("overflow","auto"),e(".modal_wrapper").addClass("modal_wrapper__hide")})),e(document).click((function(o){e(o.target).closest(".singleModal").length||e("body").find(".singleModal").removeClass("visible")})),e(".newsletterModal_open").click((function(){e(".newsletterModal").addClass("visible"),e("body").css("overflow","hidden")})),e(".newsletterModal_close").click((function(){e(".newsletterModal").removeClass("visible"),e("body").css("overflow","auto")})),e(".hamburger-wrapper").on("click",(function(){e(".hamburger-menu").toggleClass("animate"),e(".mobile-menu-overlay").toggleClass("visible"),e(".blogPostsWrapper").addClass("nonvisible"),e(".hamburger-wrapper").addClass("nonvisible"),e(".copywritingExamplesAjax-posts").addClass("nonvisible")})),e(".mobile-menu-overlay > ul > li > a").on("click",(function(){e(".hamburger-menu").removeClass("animate"),e(".mobile-menu-overlay").removeClass("visible"),e(".blogPostsWrapper").removeClass("nonvisible"),e(".hamburger-wrapper").removeClass("nonvisible")})),e(".closeHamburger").on("click",(function(){e(".hamburger-menu").removeClass("animate"),e(".mobile-menu-overlay").removeClass("visible"),e(".blogPostsWrapper").removeClass("nonvisible"),e(".hamburger-wrapper").removeClass("nonvisible"),e(".copywritingExamplesAjax-posts").removeClass("nonvisible")})),e(".categories_icon").on("click",(function(){e(".mobileCategories_wrapper").toggleClass("visible"),e(".examplesMobileCategories_wrapper").toggleClass("visible"),e("body").css("overflow","hidden")})),e(".close_mobileCategories__wrapper").on("click",(function(){e(".mobileCategories_wrapper").removeClass("visible"),e(".examplesMobileCategories_wrapper").removeClass("visible"),e("body").css("overflow","auto")})),e(".modalPost_close").on("click",(function(){e("#modal").hide(),e("body").css("overflow","auto")})),e(".js-filter-item").on("click",(function(){e(".mobileCategories_wrapper").removeClass("visible"),e("body").css("overflow","auto")})),e(".cat-list_item").on("click",(function(){e(".examplesMobileCategories_wrapper").removeClass("visible"),e("body").css("overflow","auto")}))}));
