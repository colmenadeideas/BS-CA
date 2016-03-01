<!DOCTYPE html>
<html lang="es">
<head>	
	<meta charset="<?php echo DB_ENCODE; ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Besign Colmena de ideas - besign.com.ve">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favico.png">
    
    <title><?php echo $this->title; ?></title>
	
	<link href="<?php echo CSS; ?>bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo CSS; ?>fullcalendar.css" rel="stylesheet">
	<link href="<?php echo CSS; ?>font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo CSS; ?>all.css" rel="stylesheet">
	<link href="<?php echo CSS; ?>bootstrap-datetimepicker-v4.css" rel="stylesheet">
	<link href="<?php echo CSS; ?>panel.css" rel="stylesheet">
	<link href="<?php echo CSS; ?>e0979temp.css" rel="stylesheet">
	<link href="<?php echo CSS; ?>cesar.css" rel="stylesheet">
	
	<?php echo GOOGLE_FONTS; ?>
	<?php echo GOOGLE_ANALYTICS; ?>
	
	<!--script src="<?php //echo JS; ?>config.js"></script-->
    
    <script data-main="<?php echo JS;?>main-panel" src="<?php echo JS; ?>assets/require.js"></script>
    
</head>
<body>
	<input type="hidden" name="OKey" id="<?php echo $_SESSION['randomkey']; ?>" value="<?php echo $_SESSION['OKey']; ?>">
	<div class="container-fluid">
    		<div class="row">