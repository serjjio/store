<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <div  class="navbar navbar-inverse">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

            
            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#responsive-menu">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand visible-xs" href="#">
                    <span class="sr-only">Toggle navigation</span>
                </a> -->
                 <div class=" visible-xs"  style="float:right">

                <ul class="nav">
                
                <li class="dropdown messages-menu " >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                   
                
                </li>
            </ul>
        </div>

            </div>

            <div class="navbar-collapse collapse" id="responsive-menu" style="float:right">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                
                <li class="dropdown messages-menu hidden-xs" >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                   
                
                </li>

                <li >
                    <a href="#"  >Contact</a>
                    
                </li>
               <li >
                    <a href="#"  >Profile</a>
                    
                </li>

                <li >
                    <?= Html::a('Logout('.Yii::$app->user->identity->username.')', Url::to(['/site/logout']),
                        [
                            'data-method' => 'post'
                        ]
                    )?>
                    
                </li>
                <!-- User Account: style can be found in dropdown.less -->

               

                <!-- User Account: style can be found in dropdown.less -->
                
                
            </ul>
        </div>
       
       
    </div>
</header>
