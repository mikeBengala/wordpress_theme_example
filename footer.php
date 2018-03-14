<?php
/*quick var settings ----------------------------------------------------->*/
$address = get_theme_mod( 'address_setting' );
$address = wpautop($address);
$google_maps = get_theme_mod( 'address_maps_setting' );
$google_maps = esc_url($google_maps);
$phones = get_theme_mod('phone_setting');
$phones = wpautop($phones, true);
$phones = str_replace(  array("<p>","</p>")   ,   array("","")    ,   $phones);
$phones = explode('<br />',$phones);

$emails = get_theme_mod('email_setting');
$emails = wpautop($emails, true);
$emails = str_replace(  array("<p>","</p>")   ,   array("","")    ,   $emails);
$emails = explode('<br />',$emails);
/*end quick var settings ------------------------------------------------->*/
?>

    <?php // Footer------------------------------------------------------->?>
    <footer class="footer grid-100 grid-parent">
        <div class="grid-container grid-parent">
            <div class="grid-20 tablet-grid-33 footer-section">
                <h5>
                    Morada
                </h5>
                <?php if($google_maps){?>
                    <a href="<?=$google_maps?>" target="_blank">
                        <?=$address?>
                    </a>
                <?php }else{?>
                    <?=$address?>
                <?php }?>
            </div>
            <div class="grid-20 tablet-grid-33 footer-section">
                <h5>
                    Tel.
                </h5>

                <p>
                    <?php foreach($phones as $phone){?>
                        <a href="tel:<?=str_replace(" ", "", $phone)?>" target="_blank"><?=$phone?></a><br />
                    <?php }?>
                </p>
                <h5>
                    <a href="mailto:info@aapi.pt" target="_blank">email</a>
                </h5>
                <p>
                    <?php foreach($emails as $email){?>
                        <a href="mailto:<?=str_replace(" ", "", $email)?>" target="_blank"><?=$email?></a><br />
                    <?php }?>
                </p>
            </div>
            <div class="grid-20 prefix-40 tablet-grid-20 tablet-prefix-10">
                <a href="http://bidaempresa.pt/AAPi/pt" target="_blank"><img src="<?=get_template_directory_uri()?>/img/diretorio.png"></a>
            </div>
        </div>
    </footer>
    <?php // end Footer--------------------------------------------------->?>

    <?php // credits------------------------------------------------------>?>
    <div class="credits grid-100 grid-parent">
        <div class="grid-container">
            <a href="http://gfn.pt/" target="_blank">
                <img class="hide-on-mobile" src="<?=get_template_directory_uri()?>/img/gfn.png" alt="GFN">
                <img class="hide-on-tablet hide-on-desktop" src="<?=get_template_directory_uri()?>/img/gfn_mobile.png" alt="GFN">
            </a>
        </div>
    </div>
    <?php // end credits-------------------------------------------------->?>

    <?php // back to top button------------------------------------------->?>
    <div class="back_to_top"><span class="icon-back-to-top"></span></div>
    <?php // end back to top button--------------------------------------->?>

<?php //close .all-that---------------------------------------------->?>
</div>
<?php //end close .all-that------------------------------------------>?>
<?php wp_footer();?>
</body>
</html>
