<?php

use yii\db\Migration;

/**
 * Handles the creation for table `table_period`.
 */
class m160507_000002_create_table_period extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('period', [
            'id' => $this->primaryKey(),
            'time' => $this->string(50)->notNull(),
        ],  'ENGINE=InnoDB');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('period');
    }
}
