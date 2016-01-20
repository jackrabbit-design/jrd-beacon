/* ========================================================================= */
/* BE SURE TO COMMENT CODE/IDENTIFY PER PLUGIN CALL */
/* ========================================================================= */

jQuery(function($){

    $('#home-banner .close').click(function(){
        $('.shade').toggleClass('x').slideToggle(150);
    });

    $('#form label').inFieldLabels();

    $('select').easyDropDown();


    $('.iform .left').wrapAll("<li><ul class=\"if-left\"></ul></li>");
    $('.iform .mid').wrapAll("<li><ul class=\"if-mid\"></ul></li>");
    $('.iform .right').wrapAll("<li><ul class=\"if-right\"></ul></li>");

    function nestedInit(){
        var winW = $(window).width();
        if (winW > 560) {
            $('#portfolio').nested({
                minWidth: 235,
                gutter: 5,
                animationOptions: {
                    speed:0,
                    duration:150
                }
//                centered: true,
//                resizeToFit: false
            });
        }else{
            $('#portfolio').nested({
                minWidth: 139,
                gutter: 2,
                centered:true,
                resizeToFit: false
            });
        }
        if(window.location.hash){
            var h = window.location.hash;
            h = h.substr(1);
            $('.box[data-id=' + h + '] .lb-trigger').trigger('click');
        }
    }

    $('.types span').click(function(){
        $(this).toggleClass('on');
        var mar = $('.types .mar').hasClass('on');
        var sub = $('.types .sub').hasClass('on');
        var sen = $('.types .sen').hasClass('on');
        $('#portfolio>div').removeClass('box');
        if(mar){
            $('#portfolio .mar').addClass('box');
        }
        if(sub){
            $('#portfolio .sub').addClass('box');
        }
        if(sen){
            $('#portfolio .sen').addClass('box');
        }
        $('#portfolio').nested('refresh');

    });

    function teamResize(){
        var w = $('#team li:first').width();
        var winW = $(window).width();
        if(winW > 639){
            $('#team li').height(w);
        }
    }

    $('#team ul li div').bind('click',function(){
        var thref = $('a', this).attr('href');
        window.location.href = thref;
    })

/*
    function homeBanner(){
        var winW = $(window).width() - 20;
        var myW;
        if(winW > 980){
            myW = 940;
        }else{
            myW = winW - 40;
        }
        if($('.shade').length > 0){
            $('.shade p').width(myW - $('.shade h2').outerWidth() - 2);
        }else{
            $('#title p').width(myW - $('#title h2').outerWidth());
        }
    }
*/

    function boxSize(){
        var winW = $(window).width();
        var me = $('.boxes ul li');
        var w = me.width();
        if(winW > 640){
            me.height(Math.ceil(w*219/300));
        }else{
            me.height(Math.ceil(w / 1.7 + 124));
        }
    }

    function vtResize(){
        var winW = $(window).width();
        var me = $('#home-content .vt');
        var meW = $(me).width();
        if(winW < 1000){
            $(me).height(meW * 161 / 300);
        }else{
            $(me).height(161);
        }
    }

    $('.pf-toggle').click(function(){
        $('#pf-sort').toggleClass('off');
    });

    $('.touch #portfolio .box').bind('click',function(){
        $('#portfolio .box.clicked').removeClass('clicked');
        $(this).toggleClass('clicked');
    });

    $('#portfolio .lb-trigger').colorbox({
        inline: true,
        opacity:'0.95',
//        height:'100%',
        width:'100%',
        maxWidth:640,
        onComplete: function(){
            window.location.hash = $(this).closest('.box').data('id');

            $('#cboxLoadedContent .amenities>ul').easyListSplitter({
                    colNumber: 3,
                    direction: 'horizontal'
            });


            return false;
        }
    });

    function yt(){
        $(".lb-youtube").colorbox({
            iframe:true,
            innerWidth:640,
            innerHeight:390,
            opacity: '0.95',
            className: 'cbvideo'
        });
    };

    $('.re-activate').bind('click', function(){
        $(this).toggleClass('active');
        $('#main-nav').toggleClass('off');
    });

    vtResize();
//    homeBanner();

    var t;
    $(window).resize(function(){
        clearTimeout(t);
        t = setTimeout(jrdInits, 200);
        vtResize();
//        homeBanner();
        sliderHeight();
    });

    function jrdInits(){
        teamResize();
        boxSize();
        nestedInit();
        teamSide();
    }

    jrdInits();


    function teamSide(){
        var teamh = $('#sidebar #team-side ul li').height();
        $('#sidebar #team-side ul li a span').each(function(){
            var thish = $(this).height();
            var leftover = teamh - thish;
            var p = leftover / 2;
            $(this).css({
                "padding-top" : p,
                "padding-bottom" : p
            })
        })
    }
/*

    $('#pf-sort').click(function(){
        $('#portfolio>div:not(.ma.sub.sen)').toggleClass('box');
        $('#portfolio').nested('refresh');
    });

*/

    $('#state-dd').change(function(){
        window.location.href = $(this).val();
    });

    $('#news ul li:nth-child(-n+2)').addClass('row1');

    /* Ajax load more Pagination */
    $('.load-more a').on('click', function(e)  {
        e.preventDefault();
       // $('.text_holder').append("<div class=\"loader\">&nbsp;</div>");
        $(this).parent().addClass('loading');
        var link = jQuery(this).attr('href');

        var $content = '.query-results';
        var $anchor = '.load-more a';
        var $next_href = $($anchor).attr('href'); // Get URL for the next set of posts

        $.get(link+'', function(data){
            var $new_content = $($content, data).wrapInner('').html(); // Grab just the content
          //  $('.blogPostsWrapper .loader').remove();
            $next_href = $($anchor, data).attr('href'); // Get the new href
            $('.query-results li:last-child').after($new_content); // Append the new content
           // $('#rtz-' + $timestamp).hide().fadeIn('slow'); // Animate load
            $('.load-more a').attr('href', $next_href); // Change the next URL
            //$('.team li:last').remove(); // Remove the original navigation
            var nlink = $('.load-more a').attr('href');
            if(nlink === link){ $('.load-more a').hide(1); }

        }).done(function(){
            $('.load-more.loading').removeClass('loading');
            yt();
            // Other scripts called after loading finishes
        });
    });


	sliderHeight();
	newsCarousel();
	showSearch();
	_mobilemenu();
});

function sliderHeight(){
	var wh	= $(window).outerHeight();
	$('#slider > li').height(wh);
}

function newsCarousel(){
	$("#hm-news ul").owlCarousel({
		items : 3,
		itemsCustom : false,
		margin:20,
		itemsDesktop : [1199,3],
		itemsDesktopSmall : [980,3],
		itemsTablet: [768,2],
		itemsTabletSmall: false,
		itemsMobile : [680,1],
		singleItem : false,
		itemsScaleUp : false,
		mouseDrag	:	true,

		//Basic Speeds
		slideSpeed : 200,
		paginationSpeed : 800,
		rewindSpeed : 1000,

		//Autoplay
		autoPlay : true,
		stopOnHover : false,

		 //Auto height
    	autoHeight : false,
	});
}

function showSearch(){
	$('.search-icon').click( function(){
		$('.s-from-wrap').fadeToggle();
	});
}

(function($) {

  /**
   * Copyright 2012, Digital Fusion
   * Licensed under the MIT license.
   * http://teamdf.com/jquery-plugins/license/
   *
   * @author Sam Sehnert
   * @desc A small plugin that checks whether elements are within
   *     the user visible viewport of a web browser.
   *     only accounts for vertical position, not horizontal.
   */

  $.fn.visible = function(partial) {

      var $t            = $(this),
          $w            = $(window),
          viewTop       = $w.scrollTop(),
          viewBottom    = viewTop + $w.height(),
          _top          = $t.offset().top,
          _bottom       = _top + $t.height(),
          compareTop    = partial === true ? _bottom : _top,
          compareBottom = partial === true ? _top : _bottom;

    return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

  };

  $('.boxes li[data-cs]').click(function(){
      $.colorbox({
          inline: true,
          href: $(this).data('cs'),
          opacity:'0.95',
          width:'100%',
          maxWidth:640
      })
  })

})(jQuery);

var win = $(window);
var allMods = $("section");
win.scroll(function(event) {

  allMods.each(function(i, el) {
    var el = $(el);
    if (el.visible(true)) {
      el.addClass("come-in");
    }
  });

});


function _mobilemenu(){
	var menubox 	= $('#nav');//main menu wrap
	var menu_btn	= $("#toggle_menu_btn"); // menu btn

	// toggle menu arrow
	var dropDownicon	= 	"theme-arrow-head-down";
	var dropUpicon		= 	"theme-arrow-head-up";
	var arrowClass		=	dropDownicon+" dropdwn-btn";

	function hidesub_menu(){
		$('#nav ul li').each(function() {
			$(this).children( "ul" ).hide().removeClass("active-submenu");
			$(this).children( "span" ).addClass(dropDownicon).removeClass(dropUpicon);
		});
	}

	menu_btn.click(function(e){
		$(this).toggleClass("active");
		hidesub_menu();
		e.stopImmediatePropagation();
		menubox.slideToggle();
		menubox.toggleClass('opened');
	});

	menubox.click(function(e){
		e.stopImmediatePropagation();
	});

	$( 'html,body' ).click(function(e){
		menu_btn.removeClass("active");
		if(menubox.hasClass('opened')){
			hidesub_menu();
			menubox.removeClass('opened');
			menubox.slideToggle();
		}
	});

	//click inner links

	$( "#nav ul li" ).each(function() {
		$(this).has( "ul" ).addClass( "menu-parent" ).append("<span class='dropdwn-btn'></span>" );
		var sub_menu	=	$(this).children( "ul" );
		$(this).children( 'span' ).click(function(event){
			var current_submenu	=	$(this).parent().children( "ul" );
			var sub_menu		=	$( ".menu-parent ul" );
			$(".dropdwn-btn").addClass(dropDownicon).removeClass(dropUpicon);

			if( current_submenu.hasClass("active-submenu") ){
				$(this).removeClass(dropUpicon).addClass(dropDownicon);
				sub_menu.slideUp();
				sub_menu.removeClass("active-submenu");
			} else {
				$(this).removeClass(dropDownicon).addClass(dropUpicon);
				sub_menu.removeClass("active-submenu");
				$(this).parent().children( "ul" ).addClass("active-submenu");
				sub_menu.slideUp();
				current_submenu.slideDown();
			}
		});

	});
}

$(window).resize(function(){
	if( $(window).innerWidth() > 767 ){
		$("#nav").removeAttr("style");
		$("#nav > ul > li > ul").removeAttr("style");
	}
});
