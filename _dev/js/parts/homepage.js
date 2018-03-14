Main.Homepage = {
    init:function(){
        Main.Homepage.setMap();
        Main.window_height('.the_map_wrap, .map_zoom_wrap', $('header').height()+1);
        Main.window_height('.window_height, .welcome_video_popup_wrap');
        Main.Homepage.set_pais_popup_events();
        Main.Homepage.start_owl_carousel_agenda();
        Main.Homepage.start_owl_carousel_associados();
        Main.Homepage.welcome_popup_sizes();
        Main.Homepage.animate_clouds();
        Main.Homepage.set_close_welcome_popup_events();
        Main.Homepage.set_video_welcome_popup_events();
    },
    load_stuff:function(){
        Main.Homepage.welcome_popup_sizes();
        Main.Homepage.vertical_align_map();
    },
    resize_stuff:function(){
        Main.Homepage.vertical_align_map();
        Main.window_height('.window_height, .welcome_video_popup_wrap');
        Main.window_height('.the_map_wrap, .map_zoom_wrap', $('header').height()+1);
        Main.window_height('.document_height');
        Main.Homepage.welcome_popup_sizes();
    },
    set_video_welcome_popup_events:function(){
        var welcome_video = $('.welcome_video_popup_wrap');
        welcome_video.click(function(){
            welcome_video.fadeOut('slow', function(){
                welcome_video.remove();
            });
        });
        $('.welcome_video_popup_wrap .inner_welcome_wrap').click(function(e){
            e.stopPropagation();
        });
        $('.view_site').click(function(){
            welcome_video.fadeOut('slow', function(){
                welcome_video.remove();
            });
        });
    },
    set_close_welcome_popup_events:function(){
        $('.view_map').click(function(){
            $('.welcome_popup_wrap').fadeOut(1000);

            setTimeout(function(){
                $('.location').each(function(i){
                    var $this = $(this);
                    $this.delay(i * 300).queue(function() {
                      $this.addClass("active").dequeue();
                    });
                });
            }, 1000);
        });
    },
    animate_clouds:function(){
        var translateX = 0,
            clouds = $('.welcome_popup_wrap'),
            cloud_animation = setInterval(transition, 50);
        function transition() {
            translateX ++;
            clouds.css("background-position" , "-"+ translateX +"px center");
        }
    },
    welcome_popup_sizes:function(){
        Main.window_height('.welcome_popup_wrap', $('header').height()+1);
        $('.welcome_popup_wrap').css('top',$('header').height()+1);
    },
    vertical_align_map:function(){
        var map_height = $('.map').height(),
            window_height = $(window).height()-$('header').height(),
            margin = (window_height - map_height)/2;

        $('.map_inner_wrap').css({'marginTop':margin, 'marginBottom':margin});
    },
    scale : 1,
    setMap:function(){
        //iniciar jquery ui draggable
        $('.map_inner_wrap').draggable();

        $('.map_inner_wrap').css({'width':$('.map').width(), 'height':$('.map').height()});
        //evento de zoom in no mapa
        $('.map_controls .icon-more').click(function(){
            if(Main.Homepage.scale < 3){
              Main.Homepage.scale = Main.Homepage.scale + 0.2;
              Main.Homepage.map_scale(Main.Homepage.scale);
            }
        });

        //evento zoom out no mapa
        $('.map_controls .icon-less').click(function(){
            if(Main.Homepage.scale > 0.3){
              Main.Homepage.scale = Main.Homepage.scale - 0.2;
              Main.Homepage.map_scale(Main.Homepage.scale);
            }
        });
    },
    map_scale:function(scale){
        $('.map_zoom_wrap').css({
            '-webkit-transform' : 'scale(' + Main.Homepage.scale + ')',
            '-moz-transform'    : 'scale(' + Main.Homepage.scale + ')',
            '-ms-transform'     : 'scale(' + Main.Homepage.scale + ')',
            '-o-transform'      : 'scale(' + Main.Homepage.scale + ')',
            'transform'         : 'scale(' + Main.Homepage.scale + ')'
        });
    },
    set_pais_popup_events:function(){
        //open popup envent
        $('.the_map_wrap .location').click(function(){
            var post_id = $(this).attr('id');
            post_id = post_id.replace('post_id_', '');
            Main.Homepage.open_pais_popup(post_id);
        });

        //close popup event
        $('.close_popup').click(function(){
            Main.Homepage.close_pais_popup();
        });
    },
    open_pais_popup:function(post_id){
        $('html, body').css({overflow: 'hidden', height: '100%'});
        $.ajax({
            url: ajaxurl,
            data: {
                'action':'get_single_post',
                'id' : post_id
            },
            success:function(data) {
                //Em caso de sucesso a var data contém o seguinte como string { title : titulo do post , content : conteudo do post }
                //JSON parse transforma a string recolhida em JSON
                var response = JSON.parse(data);

                //espeta o título no frontend
                $('.popup_content h3 span').html(response["title"]);

                //espeta o conteúdo no frontend
                $('.popup_text').html(response["content"]);

                //espeta o thumbnail como background
                if(response["thumbnail"]){
                    $('.popup_background').css('background-image', 'url(' + response["thumbnail"] + ')');
                }
                $('.pais_popup_wrap').fadeIn(200);
                $('.popup_content, .popup_background').addClass('active');
                $('.popup_content, .pais_popup_wrap').scrollTop(0);
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        });
    },
    close_pais_popup:function(){
        $('html, body').css({
            overflow: 'auto',
            height: 'auto'
        });
        $('.popup_content, .popup_background').removeClass('active');
        $('.pais_popup_wrap').fadeOut(800, function(){
            //apaga o título no frontend
            $('.popup_content h3 span').html('');

            //apaga o conteúdo no frontend
            $('.popup_text').html('');

            //remove a background image
            $('.popup_background').css('background-image', '');
        });
    },
    start_owl_carousel_agenda:function(){
        $(".agenda .owl-carousel-1").owlCarousel({
            navigation:true,
            paginationSpeed : 1000,
            navText: ['<span class="icon-prev"></span>','<span class="icon-next"></span>'],
            margin:0,
            responsiveClass:true,
            responsive: {
                0 : {
                    items: 1
                },
                768 : {
                    items: 2
                }
            }
        });
    },
    start_owl_carousel_associados:function(){
        $(".associados .owl-carousel-2").owlCarousel({
            loop: true,
            autoplay:true,
            autoplayTimeout:5000,
            navigation:true,
            pagination: false,
            navText: ['<span class="icon-prev"></span>','<span class="icon-next"></span>'],
            margin:12,
            responsiveClass:true,
            responsive: {
                0 : {
                    items: 2
                },
                401 : {
                    items: 3
                },
                768 : {
                    items: 5
                },
                1025 : {
                    items: 6
                }
            }
        });
    },
}

$(window).on('resize',function(){
    Main.Homepage.resize_stuff();
});
$(window).on('load', function(){
    Main.Homepage.load_stuff();
});
