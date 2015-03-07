<?php

class m140121_203053_cart_db extends CDbMigration
{

    private function _addCartStatus()
    {
        $this->createTable(
            'cart_status',
            array(
                'id' => 'INT NOT NULL AUTO_INCREMENT',
                'status' =>'varchar(100)',
                'primary key (id)'
            ),
            'Engine=InnoDb'
        );

        $this->insert('cart_status', array('status' => 'Comanda plasata'));
        $this->insert('cart_status', array('status' => 'Comanda finalizata'));
        $this->insert('cart_status', array('status' => 'Predata curierului'));
        $this->insert('cart_status', array('status' => 'Livrata la destinatie'));
        $this->insert('cart_status', array('status' => 'Preluare refuzata'));

    }

    private function _addCart()
    {
        $this->_addCartStatus();

        $this->createTable(
            'cart',
            array(
                'id' => 'INT NOT NULL AUTO_INCREMENT',
                'create_date' => 'datetime null',
                'session_id' => 'varchar(200) NOT NULL',
                'user_id' => 'INT NULL',
                'cart_status_id' => 'INT NOT NULL',
                'primary key (id)',
                'constraint cart_cart_status_id foreign key (cart_status_id) references cart_status (id) ON DELETE CASCADE ON UPDATE CASCADE',
                'constraint cart_user_id foreign key (user_id) references user (id) ON DELETE CASCADE ON UPDATE CASCADE'
            ),
            'Engine=InnoDb'
        );
    }

    private function _addCartDetail()
    {
        $this->_addCart();

        $this->createTable(
            'cart_detail',
            array(
                'id' => 'int not null auto_increment',
                'cart_id' => 'int not null',
                'product_id' => 'int not null',
                'primary key (id)',
                'constraint cart_detail_cart_id foreign key (cart_id) references cart (id) ON DELETE CASCADE ON UPDATE CASCADE',
                'constraint cart_detail_product_id foreign key (product_id) references product (id) ON DELETE CASCADE ON UPDATE CASCADE',
            ),
            'Engine=InnoDb'
        );
    }

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{

        $this->_addCartDetail();

	}

	public function safeDown()
	{
        $this->dropTable('cart_detail');
        $this->dropTable('cart');
        $this->dropTable('cart_status');
	}

}