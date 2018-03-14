<?php
/******************************************************
get_partners() function returns all the:
'associados', 'regiao_associados', 'sector_associados'
like the following object Array

return (object) array(
    'associados' => array() with all partners,
    'regioes' => array() with all regiao_associados,
    'sectores' => array() with all sector_associados
);
******************************************************/
$data = get_partners();
?>

<section data-page="associados" class="associados_archive grid-100 grid-parent">

    <?php //Page simple illustration and sidebar----->?>
    <div class="grid-25 grid-parent side_bar_parent tablet-grid-35">

        <?php //ilustration-------------------------->?>
        <img class="page_illustration grid-100 grid-parent" alt="AAPI simple Logo" src="<?=get_template_directory_uri()?>/img/page_illustration.png">
        <?php //end ilustration---------------------->?>

        <?php //mobile toogle button to show/hide filt?>
        <div class="side_bar_toggle_button">MAIS OPÇÔES <span class="icon-more"></span></div>
        <?php //end mobile toogle button to show/hide ?>

        <?php //side bar wrap------------------------>?>
        <div class="grid-90 prefix-10 filter_side_bar side_bar mobile-grid-100">

            <?php //filter block--------------------->?>
            <div class="filter_wrap">
                <h3>Filtrar por Região</h3>
                <select name="regiao">
                    <option value="all" selected>Todas as Regiões</option>
                    <?php foreach($data->regioes as $name => $slug){?>
                        <option value="<?=$slug?>"><?=$name?></option>
                    <?php }?>
                </select>
            </div>
            <?php //end filter block----------------->?>

            <?php //filter block--------------------->?>
            <div class="filter_wrap">
                <h3>Filtrar por Sector de Actividade</h3>
                <select name="sector">
                    <option value="all" selected>Todos os Sectores</option>
                    <?php foreach($data->sectores as $name => $slug){?>
                        <option value="<?=$slug?>"><?=$name?></option>
                    <?php }?>
                </select>
            </div>
            <?php //end filter block----------------->?>

            <?php //filter block--------------------->?>
            <div class="filter_wrap">
                <h3>Pesquisa Por Nome</h3>
                <input type="text" class="partner_name" name="partner_name">
            </div>
            <?php //end filter block----------------->?>

        </div>
        <?php //end side bar wrap-------------------->?>

    </div>
    <?php //end Page simple illustration and sidebar->?>

    <?php //Page content----------------------------->?>
    <div class="grid-60 prefix-5 page_content_wrap">

        <?php //archive title------------------------>?>
        <div class="grid-100">
            <h2>Diretório de Associados</h2>
        </div>
        <?php //end archive title-------------------->?>

        <?php //post loop wrap----------------------->?>
        <div class="grid-100 grid-parent">
            <?php foreach($data->associados as $partner){?>
                <div title="associado <?=$partner->title?> " id="associado-<?=$partner->id?>" data-regiao="<?=$partner->regiao_slugs?> all" data-sector="<?=$partner->sector_slugs?> all" class="visible associado_archive_wrap grid-25 tablet-grid-50">
                    <div class="associado_archive_inner_wrap">
                        <img src="<?=$partner->thumbnail?>">
                    </div>
                </div>
            <?php }?>
        </div>
        <?php //end loop wrap------------------------>?>

    </div>
    <?php //end Page content------------------------->?>

</section>
