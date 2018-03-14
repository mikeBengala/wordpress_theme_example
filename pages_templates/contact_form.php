<div class="footer_contact_form grid-100 grid-parent" style="background-image:url('<?=get_template_directory_uri()?>/img/contact_form_ilustration.png');">
    <div class="grid-container grid-parent">
        <form id="contact_form">
            <div class="grid-100">
                <h4>Fale Connosco</h4>
            </div>
            <div class="grid-50">
                <input type="text" class="page_title hidden message_field" name="pagename">
                <input type="text" class="user_ip hidden message_field" name="user_ip">
                <input type="text" class="message_field" name="name" placeholder="Nome">
                <input type="email" class="message_field" name="email" placeholder="email">
                <input type="tel" class="message_field" name="tel" placeholder="tel">
            </div>
            <div class="grid-50">
                <textarea class="message_field" name="message" placeholder="Mensagem"></textarea>
                <div class="g-recaptcha" data-sitekey="6LeqViYUAAAAALye2gppyzN8MoHBGvZLBShSxkfa"></div>
                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>
</div>
