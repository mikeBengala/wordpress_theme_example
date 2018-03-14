Main.Sidebar = {
    init:function(){
        Main.Sidebar.set_mobile_show_hide_sidebar_events();
    },
    set_mobile_show_hide_sidebar_events:function(){
        $('.side_bar_toggle_button').click(function(){
            $('.side_bar').stop().slideToggle();
        });
    }
}
