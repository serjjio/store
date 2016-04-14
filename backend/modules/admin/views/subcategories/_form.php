<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\admin\models\Categories;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Subcategories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subcategories-form">

    <?php $form = ActiveForm::begin(['id' => 'subcategories']); ?>

   <!--  <?= $form->field($model, 'categories_category_id')->dropDownList(
   		ArrayHelper::map(Categories::find()->all(), 'category_id', 'category_name'),
   		['prompt' => 'Select Category']
   ) ?> -->
	
	<?= $form->field($model, 'categories_category_id')->widget(Select2::classname(), [
		    'data' => ArrayHelper::map(Categories::find()->all(), 'category_id', 'category_name'),
		    'language' => 'ru',
		    'options' => ['placeholder' => 'Select Category ...'],
		    'pluginOptions' => [
		        'allowClear' => true
		    ],
			]	);
	?>

	<?= $form->field($model, 'active')->dropDownList([ '1' => 'Active', '0' => 'Inactive', ], ['prompt' => 'Status']) ?>

    <?= $form->field($model, 'subcategories_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
