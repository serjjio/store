<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Subcategories */
//
$this->title = 'Create Root';

$this->params['breadcrumbs'][] = ['label' => 'Root', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="root-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
