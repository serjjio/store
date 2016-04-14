<?php

namespace app\modules\admin\controllers;

use Yii;
use backend\modules\admin\models\Subcategories;
use backend\modules\admin\models\Categories;
use backend\modules\admin\models\SubcategoriesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;

/**
 * SubcategoriesController implements the CRUD actions for Subcategories model.
 */
class MenuController extends Controller
{
    //public $layout = 'main';
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Subcategories models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Categories();

        if ($model->load(Yii::$app->request->post())){
            $model->save();
            return $this->redirect('menu');
        }

        //$menu
            
       $categories = Categories::find()->orderBy('category_name')->all();



        $cat = [];
        
        foreach ($categories as $category){

            $sub = $category->getSubcategories()->where(['active' =>1])->orderBy('subcategories_name')->asArray()->all();
             if (count($sub) > 0){
                $arr = [];
                for ($i=0; $i<count($sub); $i++){
                    $arr[] = [
                        'label' => $sub[$i]['subcategories_name'],
                        //'options' => ['class' => 'dropdown'],
                        'url' => 'catalog/'.$sub[$i]['subcategories_id'],

                    ];

                }
                
                $cat[] = [
                    'label' => $category['category_name'],
                    'url' => '#',
                    'items' => $arr,
                    //glyphicon glyphicon-folder-open
                    //'linkOptions' => ['class' => 'glyphicon glyphicon-folder-open'],
                    'options' => ['class' => 'list-group-item']
                    
                ];

             }else{
                /*$cat[] = [
                    'label' => 'Edit',
                    'options' => ['class' => 'btn btn-success btn-xs btn-edit'],


                    
                    
                ];*/
                 $cat[] = [

                    'label' => $category['category_name'],
                    'url' => '#',
                    'options' => ['class' => 'list-group-item'],
                    

                    
                    
                ];
             }
            
            
        }

            return $this->render('index', ['data' => $cat, 'model' => $model]);
    }

    /**
     * Displays a single Subcategories model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Subcategories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*public function actionCreate()
    {
        $this->layout = 'main-login';
        $model = new Categories();

        if ($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect('index');
        }else{
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        
    }*/

    /**
     * Updates an existing Subcategories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->subcategories_id]);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Subcategories model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Subcategories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Subcategories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Subcategories::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
