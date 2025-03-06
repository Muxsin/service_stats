<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%services}}`.
 */
class m250306_072121_create_services_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%services}}', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'price' => $this->decimal(10, 2)->notNull(),
            'quantity' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-services-project_id',
            'services',
            'project_id',
            'projects',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%services}}');
    }
}
