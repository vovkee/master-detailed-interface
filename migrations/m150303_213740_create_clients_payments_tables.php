<?php

use yii\db\Schema;
use yii\db\Migration;

class m150303_213740_create_clients_payments_tables extends Migration
{
    public function safeUp()
    {
        $this->createTable('clients', [
            'id'    =>  'pk',
            'name'  =>  'text',
            'note'  =>  'text'
        ]);

        $this->createTable('payments', [
            'id'            =>  'pk',
            'client_id'     =>  'int',
            'amount_money'  =>  'float',
            'note'          =>  'text'
        ]);
        $this->createIndex('client_payment_id', 'payments', 'client_id');
        $this->addForeignKey('client_payment_id', 'payments','client_id','clients', 'id', 'CASCADE', 'CASCADE' );
    }

    public function safeDown()
    {
        $this->dropTable('payments');
        $this->dropTable('clients');
    }

}
