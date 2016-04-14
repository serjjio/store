<?php

namespace app\modules\admin;

use Yii;
use yii\web\NotFoundHttpException;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\admin\controllers';

    public function init()
    {
        parent::init();

        $this->setLayoutPath('@app/views/yii2-advanced-app/layouts');
        $this->layout = 'main';
        /*$this->setViewPath('@app/views/yii2-advanced-app');*/

        $url = Yii::$app->request->absoluteUrl;
        
        if (strpos($url, 'index') ==!false){
        	throw new NotFoundHttpException('Page not found.');
        }

/*        $bad_url_array = ['index', 'subcategories/create'];

        for ($i=0; $i<count($bad_url_array); $i++){
        	$find_str = $bad_url_array[$i];
	        if(strpos($url, $find_str) !==false){
	        	throw new NotFoundHttpException('Xui');
         

        // custom initialization code goes here
        	}
        }
*/
    }
}
