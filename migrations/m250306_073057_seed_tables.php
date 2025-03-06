<?php

use yii\db\Migration;

class m250306_073057_seed_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('projects', [
            'title' => 'Проект 1',
            'author' => 'Иван Иванов',
        ]);
    
        $this->insert('projects', [
            'title' => 'Проект 2',
            'author' => 'Петр Петров',
        ]);
    
        $this->insert('services', [
            'project_id' => 1,
            'name' => 'Дизайн сайта',
            'price' => 1000,
            'quantity' => 1,
        ]);
    
        $this->insert('services', [
            'project_id' => 1,
            'name' => 'Разработка логотипа',
            'price' => 500,
            'quantity' => 2,
        ]);
    
        $this->insert('services', [
            'project_id' => 1,
            'name' => 'Настройка рекламы',
            'price' => 300,
            'quantity' => 3,
        ]);
    
        $this->insert('services', [
            'project_id' => 1,
            'name' => 'SEO-оптимизация',
            'price' => 850,
            'quantity' => 2,
        ]);

        $this->insert('services', [
            'project_id' => 2,
            'name' => 'SEO-оптимизация',
            'price' => 800,
            'quantity' => 1,
        ]);
    
        $this->insert('services', [
            'project_id' => 2,
            'name' => 'Разработка логотипа',
            'price' => 400,
            'quantity' => 2,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250306_073057_seed_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250306_073057_seed_tables cannot be reverted.\n";

        return false;
    }
    */
}
