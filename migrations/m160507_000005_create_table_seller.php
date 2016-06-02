<?php

use yii\db\Migration;

/**
 * Handles the creation for table `table_seller`.
 */
class m160507_000005_create_table_seller extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('seller', [
            'id' => $this->primaryKey(),
            'name' => $this->string(15)->notNull(),
        ], 'ENGINE=InnoDB');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('seller');
    }
}
