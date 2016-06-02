<?php

use yii\db\Migration;

/**
 * Handles the creation for table `table_batch`.
 */
class m160507_000003_create_table_batch extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('batch', [
            'id' => $this->primaryKey(),
            'name' => $this->string(20)->notNull(),
        ], 'ENGINE=InnoDB');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('batch');
    }
}
