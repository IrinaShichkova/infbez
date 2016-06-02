<?php

use yii\db\Migration;

/**
 * Handles the creation for table `table_client`.
 */
class m160507_000004_create_table_client extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('client', [
            'id' => $this->primaryKey(),
            'company' => $this->string(25)->notNull(),
            'address' => $this->string(60)->notNull(),
            'phone' => $this->string(15)->notNull(),
        ], 'ENGINE=InnoDB');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('client');
    }
}
