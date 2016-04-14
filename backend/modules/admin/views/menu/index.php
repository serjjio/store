<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Menu;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SubcategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menu';
$this->params['breadcrumbs'][] = $this->title
?>
<div class="subcategories-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="btn-group">
    <p>
        <?= Html::button('<i class="glyphicon glyphicon-plus"></i> Create Category', [/*'value' => 'menu/create'*/ 'class' => 'btn-xs btn-info', 'id'=>'modalButton']) ?>
        <?= Html::button('<i class="glyphicon glyphicon-plus"></i> Create SubCategory', ['value' => 'subcategories/create-menu', 'class' => 'btn-xs btn-success modalSubCreate']) ?>
    </p>
    </div>

   <?php
    Modal::begin([
                'header' => '<h4>Create SubCategory</h4>',
                'id' => 'root',
                'size' => 'modal-sm',
                'options' => ['tabindex' => false]
            ]);
        echo "<div id='modalContent'></div>";
        //echo $this->render('update', ['model' => $model]);
    Modal::end();


        Modal::begin([
                'header' => '<h4>Create Category</h4>',
                'id' => 'modal',
                'size' => 'modal-sm',
            ]);
        //echo "<div id='modalContent'></div>";

    $form = ActiveForm::begin(['id' => 'root-form']); ?>


    <?= $form->field($model, 'category_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end();

        Modal::end();

    ?>

    <?= Menu::widget([
            'items' => $data,
            //'activateParents' => true,
            'itemOptions' => ['class' => 'nav nav-list']


        ]); ?>

</div>
