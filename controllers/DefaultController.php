<?php

namespace kulyk\yii\modules\novaposhta\controllers;

use Yii;
use yii\web\Controller;
use kulyk\novaposhta\Novaposhta as NP;
use kulyk\yii\modules\novaposhta\models\CargoCost;
use kulyk\yii\modules\novaposhta\models\City;
use yii\helpers\Json;

/**
 * Default controller for the `novaposhta` module
 */
class DefaultController extends Controller
{
    public $layout =  "@app/views/layouts/default";

    public $poshta;

    public function init()
    {
        $module = Yii::$app->getModule('novayapochta');
        $this->poshta = new NP(['apiKey'=>$module->apiKey]);
        parent::init(); // TODO: Change the autogenerated stub
    }/**/

    public function beforeAction($action)
    {
     //   var_dump(Yii::$app->view->theme);die;
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }/**/

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }/**/

    public function actionGetCargoCost(){
        $model = new CargoCost;
        if ($model->load(Yii::$app->request->post())){
         
            if ($model->validate()){

              $costData = $this->poshta->getDocumentPrice($this->prepareData($model));
                if ($costData['success']) {
                    $data = ['AssessedCost' => $costData['data'][0]['AssessedCost'],
                        'Cost' => $costData['data'][0]['Cost']];
                return Json::encode($data);
                }
            } else{
                var_dump($model->getErrors());
            }
        }


    }/**/

    private function prepareData($model){
        $citySender = City::find()->select('Ref')
            ->where(['CityID'=>$model->citySender])->asArray()->one();
        $cityRecipient = City::find()->select('Ref')
            ->where(['CityID'=>$model->cityRecipient])->asArray()->one();
        $data = [
            'Weight'=>$model->weight,
            'Cost'=>$model->cost,
            'ServiceType'=>$model->serviceType,
            'CitySender'=>$citySender['Ref'],
            'CityRecipient'=>$cityRecipient['Ref']
        ];

        return $data;
    }/**/

}/**/