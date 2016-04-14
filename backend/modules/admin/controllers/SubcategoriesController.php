<?php

namespace app\modules\admin\controllers;

use Yii;
use backend\modules\admin\models\Subcategories;
use backend\modules\admin\models\SubcategoriesSearch;
use backend\modules\admin\models\Categories;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * SubcategoriesController implements the CRUD actions for Subcategories model.
 */
class SubcategoriesController extends Controller
{
   
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

       

        $searchModel = new SubcategoriesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Subcategories model.
     * @param integer $id
     * @return mixed
     */
   /* public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }*/

    /**
     * Creates a new Subcategories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateMenu()
    {
        //$this->layout = 'main-login';
        $model = new Subcategories();

        if ($model->load(Yii::$app->request->post())){
            $model->date = date('Y-m-d h:i:s');
            $model->save();
            Yii::$app->response->redirect(['admin/menu']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

      public function actionCreate()
    {
        //$this->layout = 'main-login';
        $model = new Subcategories();

        if ($model->load(Yii::$app->request->post())){
            $model->date = date('Y-m-d h:i:s');
            $model->save();
            Yii::$app->response->redirect(['admin/subcategories']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Subcategories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        //$this->layout = 'main';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->response->redirect(['admin/subcategories']);
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

       Yii::$app->response->redirect(['admin/subcategories']);
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

    public function actionLists($id){

        $countSub = Subcategories::find()
                    ->where(['categories_category_id' => $id])
                    ->count();
        $Subcats = Subcategories::find()
                    ->where(['categories_category_id' => $id])
                    ->all();

        
        if($countSub > 0){
            foreach($Subcats as $Subcat){
                echo "<option value='".$Subcat->subcategories_id."'>".$Subcat->subcategories_name."</option>";
            }
        }else{
            echo "<option> - </option>";
        }
        
    }
    public function actionCategoryList($id){

        $categories_category_id = Subcategories::findOne($id)->categories_category_id;
        
        $category = Categories::findOne($categories_category_id);

        if($category){
            echo "<option value='".$category->category_id."'>".$category->category_name."</option>";
        }else{
            echo "<option> - </option>";
        }
    }
}
