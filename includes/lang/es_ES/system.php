<?php

define ('SYSTEM_EMAIL_BGCOLOR','');  //TODO define
define ('SYSTEM_EMAIL_HEADCOLOR','');  //TODO define
define ('SYSTEM_EMAIL_BUTTONSCOLOR','');  //TODO define
define ('CONTACT_PHONENUMBER','');  //TODO define

	
	// Settings change Email minified
	define('SETTINGS_EMAIL_HEAD', '<table width="100%" height="100%" cellpadding="0" background="email-city.png" background-repeat="no-repeat" style="font-size:medium;font-family:Arial,Helvetica,sans-serif;padding:0px;background-repeat: repeat-x;background-color:#4E92F6;background-position: bottom;"><tbody background="http://okidoctor.com/public/img/email-clouds.png"style=" background-repeat:repeat-x;background-position:top;background-size: 100% 50%;"><img src="http://okidoctor.com/email/email-logo.png" alt="" style="margin: auto;display: table;background-color:transparent;position:absolute;left:0;top:60px;right:0;"><tr align="center"><td><table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="'.SYSTEM_EMAIL_HEADCOLOR.'" style="font-family:Arial,Helvetica,sans-serif;margin:40px 0px 0px;border-top-left-radius:6px;border-top-right-radius:6px;background-color: white;padding: 20px;padding-top: 35px;font-size: 22px;font-weight: bold;padding-bottom:15px;"><tbody><tr><td></td></tr></tbody></table><table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="font-family:Arial,Helvetica,sans-serif;padding:0px 20px"><tbody><tr><td width="575px" style=""><span style="letter-spacing:-0.5px;line-height:23px;font-family:Raleway,Arial,Helvetica,sans-serif;font-weight:normal;font-size:18px;color:#2c2d25">');
	define('SETTINGS_EMAIL_FOOTER', '</span></td></tr><tr><td style="padding-top:26px;border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;"><span>Saludos, <br><tt>El Equipo de Okidoc. </span></td></tr></tbody></table><table width="575px" height="20px" bgcolor="#FFF" style="padding-top:20px;margin-bottom:40px;border-bottom-left-radius:6px;border-bottom-right-radius: 6px;"><tbody></tr></tbody></table></td></tr></tbody></table>');
	
	//Sistem messages
	define ('ERROR_AUTHENTICATE_MESSAGE', 'Ha ocurrido un error. La cuenta no ha podido activarse. Por favor contacte al administrador' );
	define ('SYSTEM_EMAIL__YOUR_USER_IS_MESSAGE', 'Su usuario es: '); 
	define ('ACTIVATION_USER_SUBJECT', 'Activación de Usuario en ' . SITE_NAME );
	
		
	define ('SYSTEM_INVALID_PASSWORD','Contraseña incorrecta');
	define ('SYSTEM_PASSWORD_CHANGE','Cambio de Password realizado');
	
	
	//EMAIL Head & Footer minified
	define('SYSTEM_SIMPLE_EMAIL_HEAD', '<table width="100%" height="100%" cellpadding="0" background="email-city.png" background-repeat="no-repeat" style="font-size:medium;font-family:Arial,Helvetica,sans-serif;padding:0px;background-repeat: repeat-x;background-color:#4E92F6;background-position: bottom;"><tbody background="http://okidoctor.com/public/img/email-clouds.png"style=" background-repeat:repeat-x;background-position:top;background-size: 100% 50%;"><img src="http://okidoctor.com/public/img/email-logo.png" alt="" style="margin: auto;display: table;background-color:transparent;position:absolute;left:0;top:60px;right:0;"><tr align="center"><td><table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="'.SYSTEM_EMAIL_HEADCOLOR.'" style="font-family:Arial,Helvetica,sans-serif;margin:40px 0px 0px;border-top-left-radius:6px;border-top-right-radius:6px;background-color: white;padding: 20px;padding-top: 35px;font-size: 22px;font-weight: bold;padding-bottom:15px;"><tbody><tr><td></td></tr></tbody></table><table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="font-family:Arial,Helvetica,sans-serif;padding:0px 20px"><tbody><tr><td width="575px" style=""><span style="letter-spacing:-0.5px;line-height:23px;font-family:Raleway,Arial,Helvetica,sans-serif;font-weight:normal;font-size:18px;color:#2c2d25">');
				
	define('SYSTEM_SIMPLE_EMAIL_FOOTER', '</span></td></tr><tr><td style="padding-top:26px;border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;"><span>Saludos, <br><tt>Equipo de Okidoc. </span></td></tr></tbody></table><table width="575px" height="20px" bgcolor="#FFF" style="padding-top:20px;margin-bottom:40px;border-bottom-left-radius:6px;border-bottom-right-radius: 6px;"><tbody></tr></tbody></table></td></tr></tbody></table>');
		
	
	
	//EMAIL USER ACTIVATION
	define('SYSTEM_EMAIL__USER_ACTIVATION_MESSAGE_PART1', '<h2>Bienvenido al sistema '. SITE_NAME.'</h2>Gracias por registrarte.<br>						
						Para continuar y aprobar el proceso de activación debe hacer click en el siguiente link<br><br>' );

	define('SYSTEM_EMAIL__USER_ACTIVATION_MESSAGE_PART2', '<table cellspacing="0" cellpadding="0"> <tr><td align="center" width="130" height="40" bgcolor="'.SYSTEM_EMAIL_BUTTONSCOLOR.'" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color: #ffffff; display: block;">');
	define('SYSTEM_EMAIL__USER_ACTIVATION_MESSAGE_PART3', '</td></tr></table>');
	
	
	define('PASSWORD_RECOVERY_SUCCESS_RESPONSE', 'Hemos enviado un link a tu correo con instrucciones. Revisa tu bandeja de correo ');
	
	//EMAIL PASSWORD CHANGE				
	define('SYSTEM_EMAIL__PASSWORD_CHANGE', 'Este email es para notificarte que hubo un cambio en tu contraseña.<br><br>
					Si no solicitaste este cambio, contacta al administrador de la página<br><br>
					<table cellspacing="0" cellpadding="0"> <tr> 
					<td align="center" width="130" height="40" bgcolor="'.SYSTEM_EMAIL_BUTTONSCOLOR.'" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color: #ffffff; display: block;">
					<a href="'.URL .'" style="color: #ffffff; font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block">Ir al Sistema</a>
					</td></tr></table>');
?>