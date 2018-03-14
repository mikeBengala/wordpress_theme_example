var Main = {
    init:function(){
        Main.set_menu_events();
        Main.set_back_to_top_button();
        Main.set_href_click_event();
        Main.window_height('.the_menu_wrap');
        // validar em que página nos encontramos de forma a inicializar o Objecto correspondente
        var current_page = $("section").attr("data-page");
        if(current_page){
              if(current_page == "homepage"){
                  Main.Homepage.init();
              }
              if(current_page == "associados"){
                  Main.Sidebar.init();
                  Main.Filters.init();
              }
              if(current_page == "contacts"){
                  Main.Sidebar.init();
              }
              if($('#contact_form').length){
                  Main.Contact.init();
              }
        }
    },
    resize_stuff:function(){
        Main.copy_master_element_height();
        Main.window_height('.the_menu_wrap');
    },
    load_stuff:function(){
        Main.check_if_in_view('.fade_in');
        Main.copy_master_element_height();
        Main.page_fade_in();
    },
    scroll_stuff:function(){
        Main.show_hide_back_to_top_button();
        Main.check_if_in_view('.fade_in');
    },
    set_href_click_event:function(){
        $('a').click(function(e){
            var clicked = $(this),
                target = clicked.attr('target'),
                has_class = clicked.parent().hasClass('menu-item-has-children'),
                href = clicked.attr('href');

            if(target !== '_blank' && has_class == false){
                e.preventDefault();
                Main.page_fade_out(href);
            }
        });
    },
    page_fade_in:function(){
        $('.all-that').addClass('active');
    },
    page_fade_out:function(next_href){
        $('.all-that').removeClass('active');
        setTimeout(function(){
            window.location = next_href;
        }, 500);
    },
    check_if_in_view:function(element_class){

        var windowTop = $(window).scrollTop(),
            windowBottom = windowTop + $(window).height();

        $(element_class).each(function(){
            var $this = $(this),
                this_top = $this.offset().top+20,
                this_bottom = this_top + $this.height()-100;

            if(windowTop < this_top && windowBottom > this_top){
                $this.removeClass('before after');
                $this.addClass('active');
            }
            // }else if(windowBottom < this_top){
            //     $this.removeClass('active after');
            //     $this.addClass('before');
            // }else if(windowTop > this_bottom){
            //     $this.removeClass('active before');
            //     $this.addClass('after');
            // }
        });

    },
    set_menu_events:function(){
        //menu open / close
        var menu = $('.the_menu_wrap');
        $('.menuToggle').click(function(){
            $('.all-that').addClass("fixedPosition");
            menu.fadeIn(500);
            setTimeout(function(){menu.addClass('active')}, 400);
            $(window).scrollTop(0);
        });
        $('.the_menu_wrap, .menu_close').click(function(){
            $('.all-that').removeClass("fixedPosition");
            menu.removeClass('active');
            setTimeout(function(){menu.fadeOut('500');}, 400);
        });

        //stop close menu propagation
        $('.inner_menu_wrap').click(function(e){
            e.stopPropagation();
        });

        $('.menu-item-has-children').click(function(e){
            e.preventDefault();;
            $(this).find('.sub-menu').stop().slideToggle("5000");
        });
    },
    window_height:function(the_class, minus){
        var wH = $(window).height();
        var div = $(the_class);
        if(minus){
            div.height(wH - minus);
        }else{
            div.height(wH);
        }
    },
    set_back_to_top_button:function(){
        $('.back_to_top').click(function(){
            $('html, body').animate({'scrollTop':0}, 800);
        });
    },
    show_hide_back_to_top_button:function(){
        var $window = $(window),
            window_height = $window.height(),
            window_position = $window.scrollTop();
        if(window_position > window_height){
            $('.back_to_top').stop().fadeIn();
        }else{
            $('.back_to_top').stop().fadeOut();
        }
    },
    copy_master_element_height:function(){
        var master_height = $('.master_height').outerHeight();

        $('.copy_master_height').height(master_height);
    }
};

var $ = jQuery;
$(window).on('resize',function(){
    Main.resize_stuff();
});
$(window).on('load', function(){
    Main.load_stuff();
});
$(window).on('scroll', function(){
    Main.scroll_stuff();
});
$(function(){
	Main.init();
});
