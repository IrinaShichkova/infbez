<?php

use yii\db\Migration;

class m160530_205442_init_data extends Migration
{

    public function safeUp()
    {
        $this->insert("technology", ['description' => 'В открытый грунт']);
        $this->insert("technology", ['description' => 'В закрытый грунт']);
        $this->insert("technology", ['description' => 'В парник']);
        $this->insert("technology", ['description' => 'В вазу']);
        $this->insert("technology", ['description' => 'С подкормкой']);
    }

    public function safeDown()
    {
        $this->execute("TRUNCATE TABLE technology");
    }

}
