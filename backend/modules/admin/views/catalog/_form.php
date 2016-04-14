<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\admin\models\Categories;
use backend\modules\admin\models\Subcategories;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Catalog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catalog-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'categories_category_id')->dropDownList(
            ArrayHelper::map(Categories::find()->all(), 'category_id', 'category_name'),
            [
            'id' => 'changeCategory',
            'prompt' => 'Select Category ...',
                        ]

            
    ) ?>
    <?php 

        /* $name = Subcategories::findOne(2);
         var_dump($name->subcategories_name);
         exit;*/

    ?>
    <?= $form->field($model, 'subcategories_subcategory_id')->dropDownList(
           
        [  
            'id' => 'changeSubcategory',
            'prompt' => 'Select Category ...',
            
        ]
    ) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->dropDownList(['1' => 'Active', '0' => 'Inactive'], ['promt' => 'Status'])?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'doc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brend')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'size')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <?= $form->field($model, 'location')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$script = <<< JS



function funcSuccess(data){
    
    
    $('#changeSubcategory').html(data)
    
}

$('#changeCategory').change(function(){
    
    var id = $(this).val()
    
    $.ajax({
        url : "/store/backend/web/admin/subcategories/lists/",
        type : "GET",
        data : ({id : id}),
        success: funcSuccess
    });
})

/*$('#changeSubcategory').change(function(){
    var id = $(this).val()
    $.get("/store/backend/web/admin/subcategories/category-list", {id : id}, function(data){
        
        $('#changeCategory').html(data)
    })
})*/

JS;

$this->registerJs($script)


?>
