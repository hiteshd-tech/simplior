jQuery(document).ready(function () {
    /*jQuery('.footer-bg-map').snowfall({deviceorientation : true, round : true, minSize: 1, maxSize:8,  flakeCount : 100});
    jQuery('.home .service-banner .section-bg').snowfall({deviceorientation : true, round : true, minSize: 1, maxSize:8,  flakeCount : 250});
    jQuery('.home.page-template .header-bg-color.fill').snowfall({deviceorientation : true, round : true, minSize: 1, maxSize:8,  flakeCount : 20});*/

    jQuery('select.filter-nav').on('change', function () {
        if (this.value == '*') {
            jQuery('.portfolio-element-wrapper > .row ').isotope({ filter: '*' });
        } else {
            jQuery('.portfolio-element-wrapper > .row').isotope({ filter: '.' + this.value });
        }
    });

    jQuery(document).on('gform_post_render', function (event, form_id, current_page) {
        setTimeout(function () {
            if (jQuery('.ginput_container').hasClass('ginput_container_fileupload')) {
                jQuery('.ginput_container_fileupload').append('<span class="contact_filename">No file chosen</span>');
            }

            jQuery('.ginput_container_fileupload input[type="file"]').change(function (e) {
                var fileName = e.target.files[0].name;
                jQuery('.ginput_container_fileupload .contact_filename').replaceWith('<span class="contact_filename">' + fileName + '</span>');
            });
        }, 500);
    });
    if (jQuery('.left-part-sticky').length != 0) {
        jQuery(".toc-wrp a").click(function (e) {
            e.preventDefault();
            var destination_div = jQuery(this).attr('href');
            jQuery('html, body').animate({
                scrollTop: jQuery(destination_div).offset().top - 30
            }, 300);
        });

        jQuery(window).scroll(sticky_relocate);

        var lastId,
            topMenu = jQuery(".blog-wrapper .left-part .toc-wrp"),
            topMenuHeight = topMenu.outerHeight() + 15,
            menuItems = topMenu.find("a"),
            scrollItems = menuItems.map(function () {
                var item = jQuery(jQuery(this).attr("href"));
                if (item.length) { return item; }
            });

        jQuery(window).scroll(function () {

            // Get container scroll position
            var fromTop = jQuery(this).scrollTop() + topMenuHeight;

            // Get id of current scroll item
            var cur = scrollItems.map(function () {
                if (jQuery(this).offset().top < fromTop)
                    return this;
            });

            // Get the id of the current element
            cur = cur[cur.length - 1];
            var id = cur && cur.length ? cur[0].id : "";

            if (lastId !== id) {
                lastId = id;
                // Set/remove active class
                menuItems.removeClass('active');
                menuItems.parent().end().filter("[href='#" + id + "']").addClass("active");
            }
        });

        var div_top = jQuery('.blog-wrapper .left-part .left-part-sticky').offset().top;
        var toc_height = jQuery('.blog-wrapper .left-part .left-part-sticky').height() - (jQuery('header').height() + jQuery('.blog-wrapper .post-thumbnail').height());
        var toc_width = jQuery('.blog-wrapper .left-part .left-part-sticky').outerWidth();
        var final_toc_height = (jQuery(window).height() - jQuery('.blog-wrapper .left-part .left-part-sticky').height());
        //final_toc_height = final_toc_height/2;
        var final_toc_width = (jQuery(window).width() - jQuery('.blog-wrapper > .row').width());
        final_toc_width = final_toc_width / 2;
        var i = 0;
        var right_height;
        function sticky_relocate() {

            if (jQuery(window).width() > 850) {
                var window_top = jQuery(window).scrollTop();
                //var footer_top = jQuery('.blog-wrapper .right-part').height() - toc_height - 60;
                var footer_top = jQuery('.related-posts').offset().top - jQuery('.blog-wrapper .left-part .left-part-sticky').height();
                var right_part_height = footer_top - (jQuery('header').height() + jQuery('.blog-wrapper .post-thumbnail').height() + 60);
                //console.log(window_top+'=='+footer_top);
                if (window_top >= div_top && window_top <= footer_top) {
                    jQuery('.blog-wrapper .left-part .left-part-sticky').addClass('stick');
                    jQuery('.blog-wrapper .left-part .left-part-sticky').css({ "top": "0px", "width": toc_width + "px" });
                } else if (window_top >= div_top && window_top >= footer_top) {
                    i = i + 1;
                    if (i == 1) {
                        right_height = right_part_height;
                    }
                    jQuery('.blog-wrapper .left-part .left-part-sticky').removeClass('stick');
                    jQuery('.blog-wrapper .left-part .left-part-sticky').css({ "top": right_height + "px", "width": toc_width + "px" });
                } else {
                    jQuery('.blog-wrapper .left-part .left-part-sticky').removeClass('stick');
                }
            }
        }
    }
    jQuery('#masthead .header-nav-main .menu-item-has-children').bind('mousewheel DOMMouseScroll', function (e) {
        var scrollTo = null;

        if (e.type == 'mousewheel') {
            scrollTo = (e.originalEvent.wheelDelta * -1);
        }
        else if (e.type == 'DOMMouseScroll') {
            scrollTo = 0 * e.originalEvent.detail;
        }

        if (scrollTo) {
            e.preventDefault();
            jQuery(this).scrollTop(scrollTo + jQuery(this).scrollTop());
        }
    });
    jQuery('.mobile-toggle-bar').bind('mousewheel DOMMouseScroll', function (e) {
        var scrollTo = null;

        if (e.type == 'mousewheel') {
            scrollTo = (e.originalEvent.wheelDelta * -1);
        }
        else if (e.type == 'DOMMouseScroll') {
            scrollTo = 0 * e.originalEvent.detail;
        }

        if (scrollTo) {
            e.preventDefault();
            jQuery(this).scrollTop(scrollTo + jQuery(this).scrollTop());
        }
    });

    /*if (jQuery('.ginput_container').hasClass('ginput_container_fileupload')) {
        jQuery('.ginput_container_fileupload').append('<span class="contact_filename">No file chosen</span>');
    }

    jQuery('.ginput_container_fileupload input[type="file"]').change(function (e) {
        var fileName = e.target.files[0].name;
        jQuery('.ginput_container_fileupload .contact_filename').replaceWith('<span class="contact_filename">' + fileName + '</span>');
    });*/

    jQuery('.header-contact-toggle').on('click', function (e) {
        e.preventDefault();
        if (jQuery('.mobile-toggle-bar').hasClass('show')) {
            jQuery('.mobile-toggle-bar').removeClass('show');
            jQuery('body').removeClass('st-modal-open');
        } else {
            jQuery('.mobile-toggle-bar').addClass('show');
            jQuery('body').addClass('st-modal-open');
        }
    });
    jQuery('.industries-we-serve-icon-box').on('click', function (e) {
        e.preventDefault();
        var content = jQuery(this).data('content');
        var getText = jQuery(content).html();
        jQuery('.industries-we-serve-icon-box-wrap').removeClass('active');
        jQuery(this).parent().addClass('active');
        if( jQuery(window).width() <= 991 ){
        	var position = jQuery('.industries-we-serve-content-box-left').offset().top - 30;
	        jQuery("html, body").animate({
	            scrollTop: position
	        }, 500);
        }
        //jQuery('.industries-we-serve-content-box-left').text(getText).fadeIn();
        jQuery('.industries-we-serve-content-box-left').fadeOut('fast', function() {
          jQuery(this).html(getText).fadeIn('fast');
        });
    });

    jQuery('body').on('click', '.mobile-toggle-bar', function (e) {
        var target = jQuery(e.target);
        if (typeof target.attr('class') != 'undefined') {
            if (target.hasClass('custom-html-widget') || target.parents().hasClass('custom-html-widget')) {
                return;
            } else {
                if (jQuery('.mobile-toggle-bar').hasClass('show')) {
                    jQuery('.mobile-toggle-bar').removeClass('show');
                    jQuery('body').removeClass('st-modal-open');
                }
            }
        }
    });

    jQuery('.career-posts select').on('change', function (e) {
        e.preventDefault();
        var post_id = jQuery(this).val();
        jQuery.ajax({
            url: custom_js.ajaxurl,
            type: 'post',
            data: {
                action: 'career_redirect',
                post_id: post_id
            },
            success: function (response) {
                if (response) {
                    window.location.href = response;
                }
            }
        });
    });

    jQuery(".main-list-wrap .list .title").click(function(){
        jQuery(this).parent().toggleClass("active");
    });

    // if(jQuery('.blog-wrapper .left-part .toc-wrp .main-list-wrap .list .sub-list h3 a.active')){
    //     jQuery('.blog-wrapper .left-part .toc-wrp .main-list-wrap .list .sub-list h3 a.active').closest('div.sub-list').addClass('bbbbb');
    // }

    jQuery('.category-filter').on('click', function (e) {
        
        e.preventDefault();
        jQuery('.category-filter').removeClass('active');
        jQuery(this).addClass('active');
        var category = jQuery(this).find('a.cat-list_item').data('slug');
        // alert(category);
        // jQuery('.post').fadeOut();
        jQuery('.post-item').hide();
        jQuery.ajax({
          type: 'POST',
          url: custom_js.ajaxurl,
          data: {
            action: 'filter_posts',
            category: category
          },
          success: function(response) {
            // jQuery('.post-wrapper').html(response).find('.post').hide().fadeIn();
            jQuery('.blog-list-col').html(response).find('.post-item').show();
          }
        });
    });
});

document.addEventListener('wpcf7mailsent', function (event) {
    location = '/thank-you/';
}, false);


