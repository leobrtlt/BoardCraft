<?php include('themes/boardcraft2/functions.php');  ?>
<!doctype html>
<html lang="en">
<head>
    <meta content="initial-scale=1.0, width=device-width, user-scalable=yes" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <link rev="made" href="mailto:info@multicraft.org">
    <meta name="description" content="Multicraft: The Minecraft server control panel">
    <meta name="keywords" content="Multicraft, Minecraft, server, management, control panel, hosting">
    <meta name="author" content="xhost.ch GmbH">
    <meta charset="UTF-8" />
    <link rel="shortcut icon" href="<?php echo  Yii::app()->request->baseUrl; ?>/favicon.ico" />

    <link rel="stylesheet" type="text/css" href="<?php echo Theme::css('custom.css') ?>" media="screen, projection" />
    <?php if($themedarkmode == 'true'){ ?>
    <link rel="stylesheet" type="text/css" href="<?php echo Theme::css('darkmode.css') ?>" media="screen, projection" />
    <?php } ?>
    <link rel="stylesheet" type="text/css" href="<?php echo Theme::css('style.css') ?>" media="screen, projection" />

    <link rel="stylesheet" type="text/css" href="<?php echo Theme::css('nucleo.css') ?>" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Theme::css('/bootstrap/bootstrap.css') ?>" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Theme::css('color/'.$themecolor.'.css') ?>" media="screen, projection" />

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

<style>
body{background-color: <?= $json_theme->color_customization->backgroundcolor; ?>!important;}.main-content {background: <?= $json_theme->color_customization->backgroundcolor; ?>!important;}input[type=email], input[type=password], input[type=text], textarea {background: 0 0!important;background-color: transparent!important;border: 1px solid <?= $json_theme->color_customization->inputcolor; ?>!important;}p,h1,h2,h3,h4,h5,h6{color:<?= $json_theme->color_customization->textcolor; ?>!important;}a{color:<?= $json_theme->color_customization->linkcolor; ?>!important;}a:hover{color:<?= $json_theme->color_customization->linkhovercolor; ?>!important;text-decoration: none!important;}.btn-primary {color: #fff;border-color: <?= $json_theme->color_customization->buttoncolor; ?>!important;background-color: <?= $json_theme->color_customization->buttoncolor; ?>!important;}.btn-primary:hover {: #fff;border-color: <?= $json_theme->color_customization->buttonhovercolor; ?>!important;background-color: <?= $json_theme->color_customization->buttonhovercolor; ?>!important;}footer {background: <?= $json_theme->color_customization->footercolor; ?>!important;}nav.sidenav.navbar.navbar-vertical {background-color: <?= $json_theme->color_customization->sidebarcolor; ?>!important;}.card-body {
    background: <?= $json_theme->color_customization->cardbodycolor; ?>!important;color: #fff!important;}
</style>

</head>
<body>
<div id="page"<?php if($boxedlayout == 'true'){ echo ' class="boxed-layout"'; } ?>>
