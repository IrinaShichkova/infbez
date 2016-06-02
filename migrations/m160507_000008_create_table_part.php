<?php

use yii\db\Migration;

/**
 * Handles the creation for table `table_part`.
 */
class m160507_000008_create_table_part extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('part', [
            'id' => $this->primaryKey(),
            'number' => $this->decimal(10)->notNull(),
            'end' => $this->integer()->notNull(),
            'yes' => $this->boolean()->notNull()->defaultValue(false),
            'amount' => $this->decimal(4)->notNull(),
            'batch_time' => $this->integer()->notNull(),
            'weight' => $this->integer(4)->notNull(),
            'batch_id' => $this->integer()->notNull(),
            'seed_id' => $this->integer()->notNull(),
        ], 'ENGINE=InnoDB');

        $this->addForeignKey('part_batch_id_fkey', 'part', 'batch_id', 'batch', 'id');
        $this->addForeignKey('part_seed_id_fkey', 'part', 'seed_id', 'seed', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('part');
    }
}
