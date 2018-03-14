<?php
//ajax send mail
function send_mail() {

	//this baby sets previously jQuery serializedArray to ${html input name} = ${html input value}
	foreach($_POST[data] as $data){
		$this_name = $data['name'];
		$this_value = $data['value'];
		eval('$'. $this_name . ' = "'. $this_value .'";');
	}

	$to = 'miguel.bengala@gfn.pt';
	$subject = 'Mensagem submetida através do site aapi';
	$body = 'De:' . $name . '<br />';
	$body .= 'Email: <a href="mailto:' . $email . '">' . $email . '</a><br />';
	$body .= 'Telefone: <a href="tel:' . $tel . '">' . $tel . '</a><br /><br />';
	$body .= 'Mensagem: <br />';
	$body .= $message . '<br /><br />';
	$body .= 'Este email foi submetido através da seguinte página:<br />';
	$body .= '<a href="'. $pagename .'">' . $pagename . '</a><br /><br />';
	$body .= 'ip do user: <a href="http://www.iptrackeronline.com/index.php?ip_address='. $user_ip .'">' . $user_ip . "</a>";
	$headers = array('Content-Type: text/html; charset=UTF-8');

	wp_mail( $to, $subject, $body, $headers );
	die();
}
add_action( 'wp_ajax_send_mail', 'send_mail' );
add_action('wp_ajax_nopriv_send_mail', 'send_mail' );
?>
