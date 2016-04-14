<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\admin\models\SubcategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Subcategories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subcategories-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Subcategories', ['value' => 'subcategories/create', 'class' => 'btn btn-success modalSubCreate']) ?>
    </p>
   <!--  <p>
       <?= Html::a('Create Subcategories', 'subcategories/create', ['id' => 'Update', 'data-target' => '#root']) ?>
   </p> -->

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



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'kv-grid-table table table-hover table-bordered table-condensed'],
        //'pjax'=>true, // pjax is set to always true for this demo
        
        //'bordered' => true,
       
        'rowOptions' => function($model){

                if ($model->active == '0'){
                    return ['class' => 'danger'];
                }else if($model->active == '1'){
                    return ['class' => 'success'];
                }
            },
            
        //'tableOptions' => ['class' => 'table table-striped table-bordered'],
        'columns' => [
            [
                'class'=>'kartik\grid\SerialColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'width'=>'36px',
                'header'=>'',
                'headerOptions'=>['class'=>'kartik-sheet-style']
            ],

           

            [
                'attribute' => 'categories_category_id',
                'value'     => 'categoriesCategory.category_name'
            ],
            [
                'class' => 'kartik\grid\BooleanColumn',
                'attribute' => 'active',
                'vAlign' => 'middle',
                'filter' => ['1'=>'Active', '0' => 'Inactive'],
            ],
            //'active',
            'date',
            'subcategories_name',

            ['class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'template' => '{update}{delete}',
                    'buttons' => [
                    /*Create modal window of click update*/
                    'update' => function($url){
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                        'class' => 'modalUpdate',
                                        'data-target' => '#root',
                                        'title' => Yii::t('app', 'Edit'),
                                        
                            ]);
                    }

                        //'update' => function ($url, $model){
                            
                            /*return Html::button('<span class="glyphicon glyphicon-edit"></span>',['value' =>$url, 'class' => 'modalSubUpdate',
                                    'title' => Yii::t('app', 'Edit')
                                ]);*/
                            /*return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to(['subcategories/create']),[
                                    'class' => 'activity-modal',
                                    'data-toggle' => 'modal',
                                    'data-target' => '#root'
                                ]);*/
                        //}
                    ],
                /*'urlCreator' => function ($action, $model, $key, $index){
                    if ($action == 'update'){
                        $url = Url::toRoute(['subcategories/update/'.$model->subcategories_id]);
                        return $url;
                    }
                }*/
            ],
        ],
    ]); ?>


 
</div>
