<?php

namespace kulyk\yii\modules\novaposhta\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "{{%warehouses}}".
 *
 * @property integer $id
 * @property string $SiteKey
 * @property string $Description
 * @property string $DescriptionRu
 * @property string $TypeOfWarehouse
 * @property string $Ref
 * @property integer $Number
 * @property string $CityRef
 * @property string $CityDescription
 * @property string $CityDescriptionRu
 * @property integer $TotalMaxWeightAllowed
 * @property integer $PlaceMaxWeightAllowed
 * @property string $Reception_Monday
 * @property string $Reception_Tuesday
 * @property string $Reception_Wednesday
 * @property string $Reception_Thursday
 * @property string $Reception_Friday
 * @property string $Reception_Saturday
 * @property string $Reception_Sunday
 * @property string $Delivery_Monday
 * @property string $Delivery_Tuesday
 * @property string $Delivery_Wednesday
 * @property string $Delivery_Thursday
 * @property string $Delivery_Friday
 * @property string $Delivery_Saturday
 * @property string $Delivery_Sunday
 * @property string $Schedule_Monday
 * @property string $Schedule_Tuesday
 * @property string $Schedule_Wednesday
 * @property string $Schedule_Thursday
 * @property string $Schedule_Friday
 * @property string $Schedule_Saturday
 * @property string $Schedule_Sunday
 * @property integer $created
 * @property integer $updated
 * @property integer $created_by
 * @property integer $updated_by
 */
class Warehouse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%warehouses}}';
    }/**/
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SiteKey'], 'number'],
            [['Number', 'TotalMaxWeightAllowed', 'PlaceMaxWeightAllowed', 'created', 'updated', 'created_by', 'updated_by'], 'integer'],
            [['Description', 'DescriptionRu'], 'string', 'max' => 99],
            [['TypeOfWarehouse', 'Ref', 'CityRef', 'Reception_Monday', 'Reception_Tuesday', 'Reception_Wednesday', 'Reception_Thursday', 'Reception_Friday', 'Reception_Saturday', 'Reception_Sunday', 'Delivery_Monday', 'Delivery_Tuesday', 'Delivery_Wednesday', 'Delivery_Thursday', 'Delivery_Friday', 'Delivery_Saturday', 'Delivery_Sunday', 'Schedule_Monday', 'Schedule_Tuesday', 'Schedule_Wednesday', 'Schedule_Thursday', 'Schedule_Friday', 'Schedule_Saturday', 'Schedule_Sunday'], 'string', 'max' => 36],
            [['CityDescription', 'CityDescriptionRu'], 'string', 'max' => 50],
        ];
    }/**/

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created',
                'updatedAtAttribute' => 'updated',
            ],


        ];
    }/**/
    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'SiteKey' => Yii::t('app', 'Site Key'),
            'Description' => Yii::t('app', 'Description'),
            'DescriptionRu' => Yii::t('app', 'Description Ru'),
            'TypeOfWarehouse' => Yii::t('app', 'Type Of Warehouse'),
            'Ref' => Yii::t('app', 'Ref'),
            'Number' => Yii::t('app', 'Number'),
            'CityRef' => Yii::t('app', 'City Ref'),
            'CityDescription' => Yii::t('app', 'City Description'),
            'CityDescriptionRu' => Yii::t('app', 'City Description Ru'),
            'TotalMaxWeightAllowed' => Yii::t('app', 'Total Max Weight Allowed'),
            'PlaceMaxWeightAllowed' => Yii::t('app', 'Place Max Weight Allowed'),
            'Reception_Monday' => Yii::t('app', 'Reception  Monday'),
            'Reception_Tuesday' => Yii::t('app', 'Reception  Tuesday'),
            'Reception_Wednesday' => Yii::t('app', 'Reception  Wednesday'),
            'Reception_Thursday' => Yii::t('app', 'Reception  Thursday'),
            'Reception_Friday' => Yii::t('app', 'Reception  Friday'),
            'Reception_Saturday' => Yii::t('app', 'Reception  Saturday'),
            'Reception_Sunday' => Yii::t('app', 'Reception  Sunday'),
            'Delivery_Monday' => Yii::t('app', 'Delivery  Monday'),
            'Delivery_Tuesday' => Yii::t('app', 'Delivery  Tuesday'),
            'Delivery_Wednesday' => Yii::t('app', 'Delivery  Wednesday'),
            'Delivery_Thursday' => Yii::t('app', 'Delivery  Thursday'),
            'Delivery_Friday' => Yii::t('app', 'Delivery  Friday'),
            'Delivery_Saturday' => Yii::t('app', 'Delivery  Saturday'),
            'Delivery_Sunday' => Yii::t('app', 'Delivery  Sunday'),
            'Schedule_Monday' => Yii::t('app', 'Schedule  Monday'),
            'Schedule_Tuesday' => Yii::t('app', 'Schedule  Tuesday'),
            'Schedule_Wednesday' => Yii::t('app', 'Schedule  Wednesday'),
            'Schedule_Thursday' => Yii::t('app', 'Schedule  Thursday'),
            'Schedule_Friday' => Yii::t('app', 'Schedule  Friday'),
            'Schedule_Saturday' => Yii::t('app', 'Schedule  Saturday'),
            'Schedule_Sunday' => Yii::t('app', 'Schedule  Sunday'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }/**/

    public function getCity(){
        return $this->hasOne(City::className(),['Ref'=>'CityRef'] );
    }

    public function beforeValidate() {

        if (Yii::$app instanceof \yii\console\Application){
            $this->attachBehavior('Blameable',[
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ]);
        }

        return parent::beforeValidate();
    }/**/
    
}/**/
