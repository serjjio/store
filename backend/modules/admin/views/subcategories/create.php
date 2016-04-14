<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Subcategories */


$this->params['breadcrumbs'][] = ['label' => 'Subcategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subcategories-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
