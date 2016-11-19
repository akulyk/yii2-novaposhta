<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cities`.
 */
class m161117_153246_create_cities_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%cities}}', [
            'CityID' => $this->primaryKey(),
            'Ref'=>$this->string(36),
            'Description'=>$this->string(50),
            'DescriptionRu'=>$this->string(50),
            'Delivery1'=>$this->integer(1),
            'Delivery2'=>$this->integer(1),
            'Delivery3'=>$this->integer(1),
            'Delivery4'=>$this->integer(1),
            'Delivery5'=>$this->integer(1),
            'Delivery6'=>$this->integer(1),
            'Delivery7'=>$this->integer(1),
            'Area'=>$this->string(36),
            'Conglomerates'=>$this->string(),
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
        $this->dropTable('cities');
    }
}
