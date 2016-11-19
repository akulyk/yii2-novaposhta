<?php

namespace kulyk\yii\modules\novaposhta\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "{{%cities}}".
 *
 * @property integer $CityID
 * @property string $Ref
 * @property string $Description
 * @property string $DescriptionRu
 * @property integer $Delivery1
 * @property integer $Delivery2
 * @property integer $Delivery3
 * @property integer $Delivery4
 * @property integer $Delivery5
 * @property integer $Delivery6
 * @property integer $Delivery7
 * @property string $Area
 * @property string $Conglomerates
 * @property integer $created
 * @property integer $updated
 * @property integer $created_by
 * @property integer $updated_by
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cities}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Delivery1', 'Delivery2', 'Delivery3', 'Delivery4', 'Delivery5', 'Delivery6', 'Delivery7', 'created', 'updated', 'created_by', 'updated_by'], 'integer'],
            [['Ref', 'Area'], 'string', 'max' => 36],
            [['Description', 'DescriptionRu'], 'string', 'max' => 50],
            [['Conglomerates'], 'string', 'max' => 255],
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
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CityID' => Yii::t('app', 'City ID'),
            'Ref' => Yii::t('app', 'Ref'),
            'Description' => Yii::t('app', 'Description'),
            'DescriptionRu' => Yii::t('app', 'Description Ru'),
            'Delivery1' => Yii::t('app', 'Delivery1'),
            'Delivery2' => Yii::t('app', 'Delivery2'),
            'Delivery3' => Yii::t('app', 'Delivery3'),
            'Delivery4' => Yii::t('app', 'Delivery4'),
            'Delivery5' => Yii::t('app', 'Delivery5'),
            'Delivery6' => Yii::t('app', 'Delivery6'),
            'Delivery7' => Yii::t('app', 'Delivery7'),
            'Area' => Yii::t('app', 'Area'),
            'Conglomerates' => Yii::t('app', 'Conglomerates'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }/**/

    public function getWarehouses(){
        return $this->hasMany(Warehouse::className(),['CityRef'=>'Ref'] );
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


}/* end of Model */
