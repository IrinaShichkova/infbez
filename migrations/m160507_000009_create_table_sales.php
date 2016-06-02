<?php

use yii\db\Migration;

/**
 * Handles the creation for table `table_sales`.
 */
class m160507_000009_create_table_sales extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('sales', [
            'id' => $this->primaryKey(),
            'buy_data' => $this->integer()->notNull(),
            'sum' => $this->decimal(12,2)->notNull(),
            'cash' => $this->boolean()->notNull()->defaultValue(false),
            'seller_id' => $this->integer()->notNull(),
            'client_id' => $this->integer()->notNull(),
            'part_id' => $this->integer()->notNull(),
        ], 'ENGINE=InnoDB');

        $this->addForeignKey('sales_seller_id_fkey', 'sales', 'seller_id', 'seller', 'id');
        //$this->addForeignKey('sales_client_id_fkey', 'sales', 'client_id', 'client', 'id');
        $this->addForeignKey('sales_part_id_fkey', 'sales', 'part_id', 'part', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('sales');
    }
}
