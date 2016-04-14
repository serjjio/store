<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\admin\models\CatalogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Catalogs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-index">
    
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Catalog', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
        Modal::begin([
            'header' => '<h4>Subcategory</h4>',
            'id' => 'root',
            'size' => 'modal-sm',
            'options' => ['tabindex' => false]
        ]);
        echo "<div id='modalContent'></div>";
        //echo $this->render('update', ['model' => $model]);
        Modal::end();
    ?>


    <?php
        $columns = [
             [
                'class'=>'kartik\grid\SerialColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'width'=>'36px',
                'header'=>'',
                'headerOptions'=>['class'=>'kartik-sheet-style']
            ],

        

            [
                
                'attribute' => 'categories_category_id',
                'value' => 'categoriesCategory.category_name',
            ],

            [
                'attribute' => 'subcategories_subcategory_id',
                'value' => 'subcategoriesSubcategory.subcategories_name',
            ],

            'name',
            
            [
                'class' => 'kartik\grid\BooleanColumn',
                'attribute' => 'active',
                'vAlign' => 'middle',
                
            ],

            'foto',
             'doc',
             'brend',
             'size',
             'count',
             'location',

            ['class' => 'yii\grid\ActionColumn'],
        ]
    ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'mytable kv-grid-table table table-hover table-bordered table-condensed'],
        'columns' => $columns,
        
        'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'bordered' => true,
        
        'pjax' => true,
        //'striped' => true,
        

        

        'rowOptions' => function($model){
            if($model->active == '0')
                return ['class' => 'danger'];
            elseif($model->active =='1')
                return ['class' => 'success'];
        },
        'responsive' => true,
        'hover' => true,
        
        

        'toolbar'=> [
            ['content'=>
                Html::button('<i class="glyphicon glyphicon-plus"></i>', ['value' => 'catalog/create', 'title'=>Yii::t('kvgrid', 'Add Book', 'ru'), 'class'=>'btn btn-success']) . ' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>Yii::t('kvgrid', 'Reset Grid', 'ru')])
            ],
            '{export}',
            
        ] ,
        'export' => ['fontAwesome' => true],

        'persistResize'=>false,
        
        'panel' => [

            'type' => GridView::TYPE_DEFAULT

        ],

        

        

    ]); ?>

</div>
