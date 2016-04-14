<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Subcategories */

$this->title = $model->subcategories_id;
$this->params['breadcrumbs'][] = ['label' => 'Subcategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subcategories-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->subcategories_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->subcategories_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'subcategories_id',
            'categories_category_id',
            'subcategories_name',
        ],
    ]) ?>

</div>
