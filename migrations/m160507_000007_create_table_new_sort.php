<?php

use yii\db\Migration;

/**
 * Handles the creation for table `table_new_sort`.
 */
class m160507_000007_create_table_new_sort extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('new_sort', [
            'id' => $this->primaryKey(),
            'date' => $this->integer()->notNull(),
            'comment' => $this->text(),
            'seed_id' => $this->integer(),
        ], 'ENGINE=InnoDB');

        //$this->addForeignKey('new_sort_seed_id_fkey', 'new_sort', 'seed_id', 'seed', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('new_sort');
    }
}
