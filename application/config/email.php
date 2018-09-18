<?php if (! defined('BASEPATH')) exit ('No direct access allowed');
/*
 | -------------------------------------------------------------------
 | EMAIL CONFING
 | -------------------------------------------------------------------
 | Configuration of outgoing mail server.
 | */ 

	$config['protocol']      = 'smtp';
	$config['smtp_host']     = 'mail.dominio.com';
	$config['smtp_port']     = 25;
	$config['smtp_user']     = 'user@dominio.com';
	$config['smtp_pass']     = 'password';
	$config['mailtype']      = 'html';
	$config['charset']       = 'utf-8';
	$config['newline']       = "\r\n";
	$config['wordwrap']      = TRUE;

 /* End of file email.php */
 /* Location application/config/email.php */

 ?>