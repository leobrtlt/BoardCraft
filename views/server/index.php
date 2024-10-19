<?php include('themes/boardcraft2/functions.php'); ?>
              <?php
if(Yii::app()->user->name == "Guest"){
    header('Location:index.php?r=site/login');
}

echo CHtml::script('
    imgOpen = "'.Theme::themeFile('images/icons/open.png').'";
    imgClosed = "'.Theme::themeFile('images/icons/closed.png').'";
    menuShown = {}
    function showSub(name)
    {
        menuShown[name] = !menuShown[name];
        $("#"+name+"_main").children("img").attr("src", !menuShown[name] ? imgClosed : imgOpen);
        $("#"+name).stop(true, true).slideToggle(menuShown[name]);
    }
');
if (!!Yii::app()->params['ajax_serverlist'])
    echo CHtml::script('
    function get_status(server)
    {
        '.CHtml::ajax(array(
            'type'=>'POST',
            'dataType'=>'json',
            'data'=>array(
                'ajax'=>'get_status',
                'server'=>'js:server',
                Yii::app()->request->csrfTokenName=>Yii::app()->request->csrfToken,
                ),
            'success'=>'status_response'
            )).'
    }
    function status_response(data)
    {
        id = parseInt(data["id"]);
        pl = parseInt(data["pl"]);
        img = pl >= 0 ? \''.Theme::img('online.png').'\' : \''.Theme::img('offline.png').'\';
        $("#sv_icon_"+id).html(img);
        if (pl >= 0)
        {
            str = pl;
            $("#sv_maxplr_"+id).show();
            $("#sv_chatlink_"+id).show();
        }
        else
        {
            str = "'.Yii::t('mc', 'Offline').'" + (pl == -2 ? " ('.Yii::t('mc', 'error').')" : "");
        }
        $("#sv_status_"+id).html(str);
    }
');
?>

<?php $this->widget('zii.widgets.CListView', array(
    'emptyText'=>'<br/>'.Yii::t('mc', 'Your own servers and other servers you have access to will be listed here.'),
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'ajaxUpdate'=>false,
    'sortableAttributes'=>array(
        'name'=>Yii::t('mc', 'Name'),
    ),
));
?>