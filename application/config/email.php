<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| SendGrid Setup
|--------------------------------------------------------------------------
|
| All we have to do is configure CodeIgniter to send using the SendGrid
| SMTP relay:
*/
$config['protocol']	= 'smtp';
$config['smtp_port'] = 587;
$config['smtp_host'] = 'smtp.sendgrid.net';
$config['smtp_user'] = getenv('SENDGRID_USERNAME');
$config['smtp_pass'] = getenv('SENDGRID_PASSWORD');
$config['mailtype']	= 'html';
$config['crlf']	= "\r\n";
$config['newline']	= "\r\n";