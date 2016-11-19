<?php
use kulyk\yii\modules\novaposhta\widgets\novaposhta\NovaposhtaAsset;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Button;

NovaposhtaAsset::register($this);
$this->registerJs("

    ",  \yii\web\View::POS_READY);
//var_dump($this->context->cart);die;
?>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
<div class="novaposhta">
    <div class="np-title">
        Рассчитать стоимость доставки
    </div>
    <div class="np-cost">
     <span>Оценочная стоимость груза:</span>   <span class="assessedCost"></span>
        <br/>
        <span>Стоимость доставки груза:</span> <span class="cost"></span>
    </div>
<?php $form = ActiveForm::begin(['action'=>['/'.$this->context->module->id.'/get-cargo-cost'],
'options'=>['id'=>'novaposhta-form']]);?>
<?php echo $form->field($cargoCost,'citySender')->dropDownList($this->context->cities,
    ['disabled'=>'disabled']);?>
<?php echo $form->field($cargoCost,'cityRecipient')->dropDownList($this->context->cities);?>
<?php echo $form->field($cargoCost,'serviceType')
    ->dropDownList(ArrayHelper::map($cargoCost->serviceTypes,'Ref','Description'));?>
<?php echo $form->field($cargoCost,'cost')->input('text');?>
<?php echo $form->field($cargoCost,'weight')->input('text');?>
<?php echo Button::widget(['label'=>Yii::t('np','Get Cost of Delivery'),
'options'=>['class'=>'btn btn-danger']]);?>
<?php ActiveForm::end();?>
</div>
</div>

       
           
      

    