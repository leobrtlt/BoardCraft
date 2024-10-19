<?php
/*
 ____   ___  _   _ _ _____ _____ ___  _   _  ____ _   _ _____ _   _ ___ ____
|  _ \ / _ \| \ | ( |_   _|_   _/ _ \| | | |/ ___| | | |_   _| | | |_ _/ ___|
| | | | | | |  \| |/  | |   | || | | | | | | |   | |_|   | | | |_| || |\___ \
| |_| | |_| | |\  |   | |   | || |_| | |_| | |___|  _    | | |  _  || | ___) |
|____/ \___/|_| \_|   |_|   |_| \___/ \___/ \____|_| |_  |_| |_| |_|___|____/

No support will be available if you edit this file.
*/

$config = file_get_contents("themes/boardcraft2/config.json");
$json_config = json_decode($config);

$themecolor = $json_config->theme->color;
$themedarkmode = $json_config->theme->darkmode;

$boxedlayout = $json_config->theme->boxed;
$specialname = $json_config->config->name;
$specialdesc = $json_config->config->description;


$theme = file_get_contents("themes/boardcraft2/theme.json");
$json_theme = json_decode($theme);