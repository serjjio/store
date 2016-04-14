<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Subcategories */

$this->title = 'Edit Subcategories';
$this->params['breadcrumbs'][] = ['label' => 'Subcategories', 'url' => ['index']];

$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="subcategories-update">

    

    <?= $this->renderAjax('_form', [
        'model' => $model,
    ]) ?>

</div>
