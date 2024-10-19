<?php 
if(Yii::app()->user->name == "Guest" || !Yii::app()->user->isSuperuser()){
?>
<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Well..</h4>
  <p>You try to access in the Theme Configuration, but you can't, you need to be a staff !</p>
  <hr>
  <p class="mb-0">Don't Forget, the bad way is not a good way &mdash; Léo</p>
</div>
<?php
}else{
$this->pageTitle=Yii::app()->name . ' - '.Yii::t('mc', 'BoardCraft Theme Configuration');
$this->breadcrumbs=array(
    Yii::t('mc', 'BoardCraft Theme Configuration'),
);
$this->menu = array(
    array(
        'label'=>Yii::t('mc', 'Back'),
        'url'=>array('site/page', 'view'=>'home'),
        'icon'=>'back',
    )
);
?>

<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading" style="color:black!important;">Well done!</h4>
  <p style="color:black!important;">Aww yeah, you successfully install BoardCraft ! Thank's a lot for buying ! You can edit some setting here. If you want to see something in my theme, come on github :) (Link below this page)</p>
  <hr>
  <p class="mb-0" style="color:black!important;">Github: https://github.com/leobrtlt/BoardCraft</p>
</div> 


<?php include('themes/boardcraft2/functions.php');
?>
<div class="accordion" id="accordionExample">
<div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#MainConf" aria-expanded="false" aria-controls="MainConf">
                Main Configuration
              </button>
            </h2>
          </div>

          <div id="MainConf" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">


<?php
/* Get Theme Configuration */
$config = file_get_contents("themes/boardcraft2/config.json");
$json_config = json_decode($config);

/* Get Color Configuration */
$theme = file_get_contents("themes/boardcraft2/theme.json");
$json_theme = json_decode($theme);

/* Get Custom CSS Configuration */
$customcss = file_get_contents("themes/boardcraft2/css/custom.css");

if(isset($_POST['submit'])){

	// Base JSON file in an array to convert after.
	$newJSON = array(
		'theme' => array(
			'color' => $_POST['ThemeColor'],
			'darkmode' => $_POST['Themedarkmode'],
			'boxed' => $_POST['Themeboxed']
		),
		'config' => array(
			'name' => $_POST['Themename'],
			'description' => $_POST['Themedescription'],
      'custombackground' => $_POST['Themecustombackground'],
      'themeversion' => $json_config->config->themeversion
		)
	);

	$jsondata = json_encode($newJSON, JSON_PRETTY_PRINT);
	// Debug mode only : print_r($jsondata);

	if(file_put_contents('themes/boardcraft2/config.json', $jsondata)){
		echo "Saving..<meta http-equiv='refresh' content='0'>";
	}else{
		echo "An error occured by trying to save configuration";
	}
}

?>

<form autocomplete="off" id="config-form" action="" method="post">
	<input type="hidden" name="<?= Yii::app()->getRequest()->csrfTokenName; ?>" value="<?= Yii::app()->getRequest()->getCsrfToken(); ?>" />
    <table class="detail-view" id="yw0">
        <tbody>
            <tr class="odd">
                <th>Boardcraft <?= $json_config->config->themeversion; ?> </th>
                <td>Created by Léo Berteloot</td>
            </tr>

            <tr class="even">
                <th><label for="Theme_color">Base Theme Color</label></th>
                 <td><input name="ThemeColor" id="Theme_color" type="text" maxlength="255" value="<?= $json_config->theme->color; ?>" class="form-control"> </td>
                <td class="hintRow"></td>
            </tr>

            <tr class="odd">
                <th><label for="Theme_darkmode">Dark Mode</label></th>
                <td><select name="Themedarkmode" id="Theme_darkmode" class="form-control">
				<option value="false" <?php if($json_config->theme->darkmode == "false"){ echo "selected"; } ?>>No</option>
				<option value="true" <?php if($json_config->theme->darkmode == "true"){ echo "selected"; } ?>>Yes</option>
				</select> </td>
                <td class="hintRow"></td>
            </tr>
            <tr class="odd">
                <th><label for="Theme_boxed">Boxed Layout</label></th>
                <td><select name="Themeboxed" id="Theme_boxed" class="form-control">
				<option value="false" <?php if($json_config->theme->boxed == "false"){ echo "selected"; } ?>>No</option>
				<option value="true" <?php if($json_config->theme->boxed == "true"){ echo "selected"; } ?>>Yes</option>
				</select> </td>
                <td class="hintRow"></td>
            </tr>
            <tr class="even">
                <th><label for="Theme_name" class="required">Website Name</label></th>
                <td><input name="Themename" id="Theme_name" type="text" maxlength="255" value="<?= $json_config->config->name; ?>" class="form-control"> </td>
                <td class="hintRow"></td>
            </tr>
            <tr class="odd">
                <th><label for="description">Website Description</label></th>
                <td><input type="text" value="<?= $json_config->config->description; ?>" maxlength="255" name="Themedescription" id="description" class="form-control"> </td>
                <td class="hintRow"></td>
            </tr>
            <tr class="odd">
                <th><label for="Themecustombackground">Custom Login Background URL*</label></th>
                <td><input type="text" value="<?= $json_config->config->custombackground; ?>" maxlength="255" name="Themecustombackground" id="Themecustombackground" class="form-control"> </td>
                <td class="hintRow"></td>
            </tr>
            <tr class="even">
                <th></th>
                <td><input type="submit" class="btn btn-primary btn-block" name="submit" value="Save"></td>
                <td class="hintRow"></td>
            </tr>
        </tbody>
    </table>
    <p>*If empty the default background will be used</p>
</form>

            </div>
          </div>
        </div>




<div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#ColorConf" aria-expanded="false" aria-controls="ColorConf">
                Color Configuration
              </button>
            </h2>
          </div>

          <div id="ColorConf" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
<?php 
if(isset($_POST['resetcolor'])){
		// Base JSON file in an array to convert after.
	$resetcolorJSON = array(
		'color_customization' => array(
			'backgroundcolor' => '',
	           'textcolor' => '',
	           'headercolor' => '',
	           'cardbodycolor' => '',
	           'sidebarcolor' => '',
	           'linkcolor' => '',
	           'linkhovercolor' => '',
	           'buttoncolor' => '',
	           'buttonhovercolor' => '',
	           'inputcolor' => '',
	           'footercolor' => ''
		)
	);

	$jsondatarcolor = json_encode($resetcolorJSON, JSON_PRETTY_PRINT);
	// Debug mode only : print_r($jsondata);

	if(file_put_contents('themes/boardcraft2/theme.json', $jsondatarcolor)){
		echo "Saving..<meta http-equiv='refresh' content='0'>";
	}else{
		echo "An error occured by trying to save configuration";
	}
}

if(isset($_POST['submitcolor'])){

	if($_POST['BackgroundColor'] == "#000000"){ $_POST['BackgroundColor'] = ''; }
	if($_POST['TextColor'] == "#000000"){ $_POST['TextColor'] = ''; }
	if($_POST['HeaderColor'] == "#000000"){ $_POST['HeaderColor'] = ''; }
	if($_POST['cardbodycolor'] == "#000000"){ $_POST['cardbodycolor'] = ''; }
	if($_POST['sidebarColor'] == "#000000"){ $_POST['sidebarColor'] = ''; }
	if($_POST['linkcolor'] == "#000000"){ $_POST['linkcolor'] = ''; }
	if($_POST['linkhovercolor'] == "#000000"){ $_POST['linkhovercolor'] = ''; }
	if($_POST['buttoncolor'] == "#000000"){ $_POST['buttoncolor'] = ''; }
	if($_POST['buttonhovercolor'] == "#000000"){ $_POST['buttonhovercolor'] = ''; }
	if($_POST['inputcolor'] == "#000000"){ $_POST['inputcolor'] = ''; }
	if($_POST['footercolor'] == "#000000"){ $_POST['footercolor'] = ''; }

	// Base JSON file in an array to convert after.
	$newcolorJSON = array(
		'color_customization' => array(
			'backgroundcolor' => $_POST['BackgroundColor'],
	           'textcolor' => $_POST['TextColor'],
	           'headercolor' => $_POST['HeaderColor'],
	           'cardbodycolor'=> $_POST['cardbodycolor'],
	           'sidebarcolor' => $_POST['sidebarColor'],
	           'linkcolor' => $_POST['linkcolor'],
	           'linkhovercolor' => $_POST['linkhovercolor'],
	           'buttoncolor' => $_POST['buttoncolor'],
	           'buttonhovercolor' => $_POST['buttonhovercolor'],
	           'inputcolor' => $_POST['inputcolor'],
	           'footercolor' => $_POST['footercolor']
		)
	);

	$jsondatacolor = json_encode($newcolorJSON, JSON_PRETTY_PRINT);
	// Debug mode only : print_r($jsondata);

	if(file_put_contents('themes/boardcraft2/theme.json', $jsondatacolor)){
		echo "Saving..<meta http-equiv='refresh' content='0'>";
	}else{
		echo "An error occured by trying to save configuration";
	}
}

?>


<form autocomplete="off" id="config-form" action="" method="post">
	<input type="hidden" name="<?= Yii::app()->getRequest()->csrfTokenName; ?>" value="<?= Yii::app()->getRequest()->getCsrfToken(); ?>" />
    <table class="detail-view" id="yw0">
        <tbody>
            <hr>
            <tr class="even">
            	<th><h2 style="color:#ff707d">Color Customization</h2></th>
            	<td>You can edit some theme color, the changes made here go over to the "Base theme color" and Darkmode | RGB with "0 0 0" equals no custom color used</td>
        	</tr>
            <tr class="even">
                <th><label for="BackgroundColor">Background Color**</label></th>
                 <td><input name="BackgroundColor" id="BackgroundColor" type="color" maxlength="255" value="<?= $json_theme->color_customization->backgroundcolor; ?>" class="form-control"> </td>
                <td class="hintRow"></td>
            </tr>
            <tr class="even">
                <th><label for="TextColor">Text Color</label></th>
                 <td><input name="TextColor" id="TextColor" type="color" maxlength="255" value="<?= $json_theme->color_customization->textcolor; ?>" class="form-control"> </td>
                <td class="hintRow"></td>
            </tr>
            <tr class="even">
                <th><label for="HeaderColor">Header Color</label></th>
                 <td><input name="HeaderColor" id="HeaderColor" type="color" maxlength="255" value="<?= $json_theme->color_customization->headercolor; ?>" class="form-control"> </td>
                <td class="hintRow"></td>
            </tr>
            <tr class="even">
                <th><label for="cardbodycolor">Card Body Color</label></th>
                 <td><input name="cardbodycolor" id="cardbodycolor" type="color" maxlength="255" value="<?= $json_theme->color_customization->cardbodycolor; ?>" class="form-control"> </td>
                <td class="hintRow"></td>
            </tr>
            <tr class="even">
                <th><label for="sidebarColor">Sidebar Color</label></th>
                 <td><input name="sidebarColor" id="sidebarColor" type="color" maxlength="255" value="<?= $json_theme->color_customization->sidebarcolor; ?>" class="form-control"> </td>
                <td class="hintRow"></td>
            </tr>
            <tr class="even">
                <th><label for="linkcolor">Link Color</label></th>
                 <td><input name="linkcolor" id="linkcolor" type="color" maxlength="255" value="<?= $json_theme->color_customization->linkcolor; ?>" class="form-control"> </td>
                <td class="hintRow"></td>
            </tr>
            <tr class="even">
                <th><label for="linkhovercolor">Link Hover Color</label></th>
                 <td><input name="linkhovercolor" id="linkhovercolor" type="color" maxlength="255" value="<?= $json_theme->color_customization->linkhovercolor; ?>" class="form-control"> </td>
                <td class="hintRow"></td>
            </tr>
            <tr class="even">
                <th><label for="buttoncolor">Button Color</label></th>
                 <td><input name="buttoncolor" id="buttoncolor" type="color" maxlength="255" value="<?= $json_theme->color_customization->buttoncolor; ?>" class="form-control"> </td>
                <td class="hintRow"></td>
            </tr>

            <tr class="even">
                <th><label for="buttonhovercolor">Button Hover Color</label></th>
                 <td><input name="buttonhovercolor" id="buttonhovercolor" type="color" maxlength="255" value="<?= $json_theme->color_customization->buttonhovercolor; ?>" class="form-control"> </td>
                <td class="hintRow"></td>
            </tr>
            <tr class="even">
                <th><label for="inputcolor">Input Color</label></th>
                 <td><input name="inputcolor" id="inputcolor" type="color" maxlength="255" value="<?= $json_theme->color_customization->inputcolor; ?>" class="form-control"> </td>
                <td class="hintRow"></td>
            </tr>
            <tr class="even">
                <th><label for="footercolor">Footer Color</label></th>
                 <td><input name="footercolor" id="footercolor" type="color" maxlength="255" value="<?= $json_theme->color_customization->footercolor; ?>" class="form-control"> </td>
                <td class="hintRow"></td>
            </tr>

            <tr class="even">
                <th></th>
                <td><input type="submit" class="btn btn-primary btn-block" name="submitcolor" value="Save Color"></td>
                <td class="hintRow"></td>
            </tr>
            <tr class="even">
                <th></th>
                <td><input type="submit" class="btn btn-primary btn-block" name="resetcolor" value="Reset Color"></td>
                <td class="hintRow"></td>
            </tr>
        </tbody>
    </table>
    <p>**Work only if Boxed Layout are active</p>
</form>
        </div>
    </div>
</div>

<div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#CustomCSSConf" aria-expanded="false" aria-controls="CustomCSSConf">
                Custom CSS
              </button>
            </h2>
          </div>

          <div id="CustomCSSConf" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
<?php 
if(isset($_POST['submitcustomcss'])){

	if(empty($_POST['customCSS'])){ echo "An error occured by trying to save configuration"; }else{

	// Base JSON file in an array to convert after.
	$jsoncss = array(
		'customcss' => $_POST['customCSS']
		);

	$jsondatacss = json_encode($jsoncss, JSON_PRETTY_PRINT);
	// Debug mode only : print_r($jsondata);

	if(file_put_contents('themes/boardcraft2/css/custom.css', $_POST['customCSS'])){
		echo "Saving..<meta http-equiv='refresh' content='0'>";
	}else{
		echo "An error occured by trying to save configuration";
	}
	}
}

?>
                <form autocomplete="off" id="config-form" action="" method="post">
                    <input type="hidden" name="<?= Yii::app()->getRequest()->csrfTokenName; ?>" value="<?= Yii::app()->getRequest()->getCsrfToken(); ?>" />
                    <table class="detail-view" id="yw0">
                        <tbody>
                            <hr>
                            <h2 style="color:#ff707d">You can add custom CSS here</h2>
                            <tr class="even">
                                 <textarea name="customCSS" id="customCSS" type="color" maxlength="255" value="" class="form-control" style="min-height: 500px;max-height: 500px;height: 502px;background: white !important;color: rgb(0, 0, 0) !important;"><?= $customcss; ?></textarea>
                            </tr>
                            <tr class="even">
                                <input type="submit" class="btn btn-primary btn-block" name="submitcustomcss" value="Save Custom CSS">
                            </tr>
                        </tbody>
                    </table>
                </form> 
        </div>
    </div>
</div>
</div>
<hr>



<?php } ?>
