<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\CatalogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catalog-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'catalog_id') ?>

    <?= $form->field($model, 'categories_category_id') ?>

    <?= $form->field($model, 'subcategories_subcategory_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'doc') ?>

    <?php // echo $form->field($model, 'brend') ?>

    <?php // echo $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'count') ?>

    <?php // echo $form->field($model, 'location') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
