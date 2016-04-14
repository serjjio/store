<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

    

                <!-- Messages: style can be found in dropdown.less-->
                
                <!-- User Account: style can be found in dropdown.less -->
                    
            
        <div class="container">
     
            <div class="navbar-collapse collapse">
         
            <?php
              echo Nav::widget([
                    'options' => ['class' => 'nav navbar-nav navbar-right'],
                    'items' => [
                        ['label' => 'Contact', 'url' => ['contact']],
                        ['label' => 'Profile', 'url' => ['profile']],

                        ['label' => 'Logout', 
                                  'url' => ['/site/logout'],
                                  'linkOptions' => ['data-method' => 'post'] ,
                                  //'visible' => Yii::$app->user->isGuest,
                        ],

                        /*'<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    '<h>Logout</h>',
                    ['class' => 'btn btn-link nvbtn']
                )
                . Html::endForm()
                . '</li>'*/
                    ]
                    ])

            ?>

            </div><!--/.nav-collapse -->
      
        </div>
            
  
                    
                        <!-- User image -->

                        <!-- Menu Footer-->
                      <!--   <li class="user-footer">
                          <div class="pull-left">
                              <a href="#" class="btn btn-default btn-flat">Profile</a>
                          </div>
                          <div class="pull-right">
                              <?= Html::a(
                                  'Sign out',
                                  ['/site/logout'],
                                  ['data-method' => 'post']
                              ) ?>
                          </div>
                      </li> -->
                    
                

                <!-- User Account: style can be found in dropdown.less -->
                
        
        
    </nav>
</header>
