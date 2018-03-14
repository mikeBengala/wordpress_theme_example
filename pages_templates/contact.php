<section data-page="contacts" class="contacts_page grid-100 grid-parent">

    <?php //Page simple illustration and sidebar----->?>
    <div class="grid-25 grid-parent side_bar_parent tablet-grid-35">

        <?php //ilustration-------------------------->?>
        <img class="page_illustration grid-100 grid-parent" alt="AAPI simple Logo" src="<?=get_template_directory_uri()?>/img/page_illustration.png">
        <?php //end ilustration---------------------->?>

        <?php //mobile toogle button to show/hide filt?>
        <div class="side_bar_toggle_button">Enviar mensagem <span class="icon-more"></span></div>
        <?php //end mobile toogle button to show/hide ?>

        <?php //side bar wrap------------------------>?>
        <div class="grid-90 prefix-10 contact_side_bar side_bar mobile-grid-100">

            <?php //contact form--------------------->?>
            <div class="contact_wrap">
                <h3>Enviar Mensagem</h3>
                <form id="contact_form" action="<?= esc_url( admin_url('admin-post.php') ); ?>">
                    <input type="text" class="page_title hidden message_field" name="pagename">
                    <input type="text" class="user_ip hidden message_field" name="user_ip">
                    <input type="text" class="message_field" name="name" placeholder="Nome">
                    <input type="email" class="message_field" name="email" placeholder="email">
                    <input type="tel" class="message_field" name="tel" placeholder="tel">
                    <textarea class="message_field" name="message" placeholder="Mensagem"></textarea>
                    <div class="g-recaptcha" data-sitekey="6LeqViYUAAAAALye2gppyzN8MoHBGvZLBShSxkfa"></div>
                    <input type="submit" value="Enviar">
                </form>
            </div>
            <?php //end contact form----------------->?>

        </div>
        <?php //end side bar wrap-------------------->?>

    </div>
    <?php //end Page simple illustration and sidebar->?>

    <?php //Page content----------------------------->?>
    <div class="grid-60 prefix-5 tablet-grid-50 page_content_wrap">
        <?php if ( have_posts() ){while ( have_posts() ){the_post(); ?>

            <?php //page content wrap-------------------->?>
            <div class="grid-100 grid-parent">
                <h2><?php the_title();?></h2>
                <div class="page_content"><?php the_content();?></div>
            </div>
            <?php //page content wrap-------------------->?>

        <?php }}?>
    </div>
    <?php //end Page content------------------------->?>

</section>
