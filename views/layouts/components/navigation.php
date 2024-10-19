<?php include('themes/boardcraft2/functions.php'); ?>
 <nav class="sidenav navbar navbar-vertical  <?php if($boxedlayout == 'false'){ echo 'fixed-left'; } ?>  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <h6><?php if(empty($specialname)){ echo CHtml::encode(Yii::app()->name); }else{ echo $specialname; } ?><br><small><?php if(empty($specialdesc)){ echo Yii::t('mc', 'Minecraft Server Manager'); }else{ echo $specialdesc; } ?></small></h6>
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
 <?php
                $items = array();

                $simple = (Yii::app()->theme && in_array(Yii::app()->theme->name, array('simple', 'mobile', 'platform')));
                $items[] = array('label'=>Yii::t('mc', 'Home'), 'url'=>array('/site/page', 'view'=>'home'),'itemOptions'=>array('style'=>'float: right;padding-left: 55px;', 'class'=>'nav-link nav-ico-home'),);
                if (@Yii::app()->params['installer'] !== 'show')
                {
                  /* Servers */
                  if(substr(Yii::app()->request->getQuery('r'), 0, strlen('server')) == "server"){
                     if(empty($this->menu)){
                      $showpage = array('0' => array('label' => "Create Server",'url' => array('0' => 'server/create')));
                     }else{
                      $showpage = $this->menu;
                     }
                    $items[] = array(
                        'label'=>Yii::t('mc', 'Servers'),
                        'url'=>array('/server/index', 'my'=>1),
                        'visible'=>(!Yii::app()->user->isGuest || Yii::app()->user->showList),
                        'itemOptions'=>array('style'=>'float: right;padding-left: 55px;', 'class'=>'nav-link nav-ico-servers'),
                        'items'=>$showpage,

                    );
                  }else{
                    $items[] = array(
                        'label'=>Yii::t('mc', 'Servers'),
                        'url'=>array('/server/index', 'my'=>1),
                        'visible'=>(!Yii::app()->user->isGuest || Yii::app()->user->showList),
                        'itemOptions'=>array('style'=>'float: right;padding-left: 55px;', 'class'=>'nav-link nav-ico-servers'),
                    );
                  }

                  /* Users */
                    if(substr(Yii::app()->request->getQuery('r'), 0, strlen('user')) == "user"){
                      $items[] = array(
                          'label'=>Yii::t('mc', 'Users'),
                          'url'=>array('/user/index'),
                          'visible'=>(Yii::app()->user->isStaff()
                              || !(Yii::app()->user->isGuest || (Yii::app()->params['hide_userlist'] === true) || $simple)),
                          'itemOptions'=>array('style'=>'float: right;padding-left: 55px;', 'class'=>'nav-link nav-ico-users'),
                          'items'=>$this->menu,
                      );
                    }else{
                      $items[] = array(
                          'label'=>Yii::t('mc', 'Users'),
                          'url'=>array('/user/index'),
                          'visible'=>(Yii::app()->user->isStaff()
                              || !(Yii::app()->user->isGuest || (Yii::app()->params['hide_userlist'] === true) || $simple)),
                          'itemOptions'=>array('style'=>'float: right;padding-left: 55px;', 'class'=>'nav-link nav-ico-users'),
                      );
                    }


                    /* Profile */
                    $items[] = array(
                        'label'=>Yii::t('mc', 'Profile'),
                        'url'=>array('/user/view', 'id'=>Yii::app()->user->id),
                        'visible'=>(!Yii::app()->user->isStaff() && !Yii::app()->user->isGuest
                            && ((Yii::app()->params['hide_userlist'] === true) || $simple)),
                        'itemOptions'=>array('style'=>'float: right;padding-left: 55px;', 'class'=>'nav-link nav-ico-profile'),
                    );

                    if(substr(Yii::app()->request->getQuery('r'), 0, strlen('daemon')) == "daemon"){
                      $items[] = array(
                          'label'=>Yii::t('mc', 'Settings'),
                          'url'=>array('/daemon/index'),
                          'visible'=>Yii::app()->user->isSuperuser(),
                          'itemOptions'=>array('style'=>'float: right;padding-left: 55px;', 'class'=>'nav-link nav-ico-settings'),
                          'items'=>$this->menu,
                      );
                    }else{
                      $items[] = array(
                          'label'=>Yii::t('mc', 'Settings'),
                          'url'=>array('/daemon/index'),
                          'visible'=>Yii::app()->user->isSuperuser(),
                          'itemOptions'=>array('style'=>'float: right;padding-left: 55px;', 'class'=>'nav-link nav-ico-settings'),
                      );
                    }
                    /* Theme Configuration: Not Available in the base of multicraft, created only for BoardCraft */
                    $items[] = array(
                        'label'=>Yii::t('mc', 'Theme Configuration'),
                        'url'=>array('/site/page', 'view'=>'config'),
                        'visible'=>Yii::app()->user->isSuperuser(),
                        'itemOptions'=>array('style'=>'float: right;padding-left: 55px;', 'class'=>'nav-link nav-ico-theme-configuration'),
                    );
                    
                    if (!empty(Yii::app()->params['support_url']))
                    {
                        $items[] = array(
                            'label'=>Yii::t('mc', 'Support'),
                            'url'=>Yii::app()->params['support_url'],
                            'itemOptions'=>array('style'=>'float: right;padding-left: 55px;', 'class'=>'nav-link nav-ico-support'),
                        );
                    }
                    else
                    {
                        $items[] = array(
                            'label'=>Yii::t('mc', 'Support'),
                            'url'=>array('/site/report'),
                            'visible'=>!empty(Yii::app()->params['admin_email']),
                            'itemOptions'=>array('style'=>'float: right;padding-left: 55px;', 'class'=>'nav-link nav-ico-support'),
                        );
                    }
                }
                if (Yii::app()->user->isGuest)
                {
                    $items[] = array(
                        'label'=>Yii::t('mc', 'Login'),
                        'url'=>array('/site/login'),
                        'itemOptions'=>array('style'=>'float: right;padding-left: 55px;', 'class'=>'nav-link nav-ico-login'),
                    );
                }
                else
                {
                    $items[] = array(
                        'label'=>Yii::t('mc', 'Logout'),
                        'url'=>array('/site/logout'),
                        'itemOptions'=>array('style'=>'float: right;padding-left: 55px;', 'class'=>'nav-link nav-ico-logout'),
                    );
                }
                
                $this->widget('zii.widgets.CMenu', array(
                    'items'=>$items,
                    'htmlOptions'=>array('class' => 'navbar-nav')
                ));


                ?>
    <?php if(!empty($this->notice)){ ?><div class="notice"><?php echo $this->notice ?></div><?php } ?>
        </div>
      </div>
    </div>
  </nav>
<div class="main-content" id="panel">


<div class="d-xl-none mobile-navigation-bar">
      <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
             </div>
             <h6><?php if(empty($specialname)){ echo CHtml::encode(Yii::app()->name); }else{ echo $specialname; } ?><br><small><?php if(empty($specialdesc)){ echo Yii::t('mc', 'Minecraft Server Manager'); }else{ echo $specialdesc; } ?></small></h6>
</div>