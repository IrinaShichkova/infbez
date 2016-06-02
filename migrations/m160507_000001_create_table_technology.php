<?php

use yii\db\Migration;

/**
 * Handles the creation for table `table_technology`.
 */
class m160507_000001_create_table_technology extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('technology', [
            'id' => $this->primaryKey(),
            'description' => $this->text()->notNull(),
        ],  'ENGINE=InnoDB');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('technology');
    }
}
