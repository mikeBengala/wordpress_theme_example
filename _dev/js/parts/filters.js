Main.Filters = {
    init:function(){
        Main.Filters.set_select_menu($('select[name="regiao"]'));
        Main.Filters.set_select_menu($('select[name="sector"]'));
        Main.Filters.set_text_input($('.partner_name'));

        Main.Filters.go_filters();
    },
    set_select_menu:function(filter_menu_name){
        filter_menu_name.change(function(){
            Main.Filters.go_filters();
        });
    },
    set_text_input:function(text_input_name){
        text_input_name.keydown(function(){
            Main.Filters.go_filters();
        });
    },
    go_filters:function(){
        var regiao = $('select[name="regiao"]').find(":selected").attr('value'),
            sector = $('select[name="sector"]').find(":selected").attr('value'),
            name = $('.partner_name').val();
            if(name == undefined){
                name = "associado";
            }

        $('.associado_archive_wrap').each(function(){
            var $this = $(this),
                this_regiao = $this.attr('data-regiao'),
                this_sector = $this.attr('data-sector'),
                this_name = $this.attr('title'),
                occurrence_regiao = Main.Filters.check_occurrence(this_regiao, regiao),
                occurrence_sector = Main.Filters.check_occurrence(this_sector, sector);
                occurrence_name = Main.Filters.check_occurrence(this_name, name);

                $this.removeClass('visible').addClass('hidden');

                if(occurrence_regiao !== null && occurrence_sector !== null && occurrence_name !== null){
                    $this.removeClass('hidden').addClass('visible');
                }

        });
    },
    check_occurrence:function(string, filter){
        var res = new RegExp(filter, 'gi'),
            occurrence = string.match(res);
            return occurrence;
    }
}
