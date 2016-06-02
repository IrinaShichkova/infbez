<?php

use yii\db\Migration;

/**
 * Handles the creation for table `table_seed`.
 */
class m160507_000006_create_table_seed extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('seed', [
            'id' => $this->primaryKey(),
            'name' => $this->string(40)->notNull(),
            'year' => $this->decimal(4)->notNull(),
            'adaptation' => $this->boolean()->notNull()->defaultValue(false),
            'frost' => $this->boolean()->notNull()->defaultValue(false),
            'technology_id' => $this->integer()->notNull(),
            'period_id' => $this->integer()->notNull(),
            'description' => $this->string(200),
        ], 'ENGINE=InnoDB');

        $this->addForeignKey('seed_technology_id_fkey', 'seed', 'technology_id', 'technology', 'id');
        $this->addForeignKey('seed_period_id_fkey', 'seed', 'period_id', 'period', 'id');

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('seed');
    }
}
