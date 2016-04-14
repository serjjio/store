<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

//if (Yii::$app->user->isGuest) { 
/**
 * Do not use this code in your template. Remove it. 
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */  /*echo Yii::$app->getResponse()->redirect(Yii::$app->getHomeUrl());*/
 //   echo Yii::$app->runAction('site/login');

   //echo $this->redirect(['site/login']);
//} else {

    AppAsset::register($this);
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::$app->request->baseUrl;?>/favicon.ico">
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <?php

        NavBar::begin([
            'brandLabel' => Html::img('@web/images/logo.png'),
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-default navbar-fixed-top',
            ],
        ]);
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
        ];
        if (Yii::$app->user->isGuest) {

            $menuLogin[] = ['label' => 'Login', 'url' => ['/site/login']];
        } else {

            $menuLogin[] = '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>';
            $menuItems[] = ['label' => 'Admin', 'url' => ['/admin/']];
        }
        echo Nav::widget([
            'options' => ['class' => 'nav navbar-nav'],
            'items' => $menuItems,
        ]);
        echo Nav::widget([
            'options' => ['class' => 'nav navbar-nav navbar-right'],
            'items' => $menuLogin,
        ]);
        NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Project <?= date('Y') ?></p>

            <!-- <p class="pull-right"><?= Yii::powered() ?></p> -->
        </div>
    </footer>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php //}?>
