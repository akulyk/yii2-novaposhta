<?php

use yii\db\Migration;

/**
 * Handles the creation of table `warehouses`.
 */
class m161117_153547_create_warehouses_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%warehouses}}', [
            'id' => $this->primaryKey(),
            'SiteKey'=>$this->decimal(11),
            'Description'=>$this->string(99),
            'DescriptionRu'=>$this->string(99),
            'TypeOfWarehouse'=>$this->string(36),
            'Ref'=>$this->string(36),
            'Number'=>$this->integer(5),
            'CityRef'=>$this->string(36),
            'CityDescription'=>$this->string(50),
            'CityDescriptionRu'=>$this->string(50),
            'TotalMaxWeightAllowed'=>$this->integer(11),
            'PlaceMaxWeightAllowed'=>$this->integer(11),
            'Reception_Monday'=>$this->string(36),
            'Reception_Tuesday'=>$this->string(36),
            'Reception_Wednesday'=>$this->string(36),
            'Reception_Thursday'=>$this->string(36),
            'Reception_Friday'=>$this->string(36),
            'Reception_Saturday'=>$this->string(36),
            'Reception_Sunday'=>$this->string(36),
            'Delivery_Monday'=>$this->string(36),
            'Delivery_Tuesday'=>$this->string(36),
            'Delivery_Wednesday'=>$this->string(36),
            'Delivery_Thursday'=>$this->string(36),
            'Delivery_Friday'=>$this->string(36),
            'Delivery_Saturday'=>$this->string(36),
            'Delivery_Sunday'=>$this->string(36),
            'Schedule_Monday'=>$this->string(36),
            'Schedule_Tuesday'=>$this->string(36),
            'Schedule_Wednesday'=>$this->string(36),
            'Schedule_Thursday'=>$this->string(36),
            'Schedule_Friday'=>$this->string(36),
            'Schedule_Saturday'=>$this->string(36),
            'Schedule_Sunday'=>$this->string(36),
            'created'=>$this->integer(11),
            'updated'=>$this->integer(11),
            'created_by'=>$this->integer(11),
            'updated_by'=>$this->integer(11),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('warehouses');
    }
}
