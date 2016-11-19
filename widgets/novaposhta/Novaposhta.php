<?php namespace kulyk\yii\modules\novaposhta\widgets\novaposhta;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use frontend\widgets\price\Price;
use kulyk\yii\modules\novaposhta\models\City;
use kulyk\yii\modules\novaposhta\models\Warehouse;
use kulyk\yii\modules\novaposhta\models\CargoCost;


class Novaposhta extends Widget
{

    public $module;
    public $view = 'index';
    public $weight;
    public $cost;
    public $fromCity;
    public $toCity;
    public $poshta;
    public $cities = [];
    
   

    public function init()
    {
        $this->module = Yii::$app->getModule('novayapochta');

        $city =  City::find()->where(['Ref'=>$this->module->cityRef])->one();
        if($city !== Null) {
            $this->fromCity = $city->CityID;
        }
     //   $this->poshta = new NP(['apiKey'=>'aceb1d852476f4a7fc87bfb8430d7360']);
        $this->getCities();
      
        parent::init();
        
    }

    public function run()
    {
        $data = [];
        $cargoCost = new CargoCost;
        $cargoCost->citySender = $this->fromCity;
        $cargoCost->serviceType = 'WarehouseWarehouse';
        if($this->weight){
            $cargoCost->weight = $this->weight;
        }
        if($this->cost){
            $cargoCost->cost = (int)preg_replace("/\s/u","",
                substr($this->cost, 0, strrpos($this->cost, ' ГРН')));
        }
        $data['cargoCost'] = & $cargoCost;
      //  $data['items'] = count($this->cart);
       
        return $this->render($this->view,$data);
    }/**/

    public function getCities()
    {
        $cities = City::getDb()->cache(function ($db) {
            return City::find()->select(['CityID', 'DescriptionRu'])->orderBy('DescriptionRu ASC')->all();
        });

        if (count($cities) > 0) {

        $this->cities = ArrayHelper::map($cities, 'CityID', 'DescriptionRu');
        return $this->cities;
    }
    }/**/
    
    
  
    
}/* end of Widget*/
