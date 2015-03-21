<?php

class m150320_220233_product_import_date extends CDbMigration
{

    private function createImportSource()
    {
        $this->createTable(
            'import_source',
            array(
                'id' => 'INT NOT NULL AUTO_INCREMENT',
                'source_label' => 'varchar(200) NOT NULL',
                'primary key (id)',

            ),
            'Engine=InnoDb'
        );

        $this->insert('import_source', array('source_label' => 'BikeFun'));
    }

    private function createImportTable()
    {
        $this->createTable(
            'product_import',
            array(
                'id' => 'INT NOT NULL AUTO_INCREMENT',
                'product_id' => 'INT NOT NULL',
                'import_date' => 'datetime null',
                'user_id' => 'INT NULL',
                'import_source_id' => 'INT NULL',
                'primary key (id)',
                'constraint product_import_product_id foreign key (product_id) references product (id) ON DELETE CASCADE ON UPDATE CASCADE',
                'constraint product_import_import_source_id foreign key (import_source_id) references import_source (id) ON DELETE CASCADE ON UPDATE CASCADE',
            ),
            'Engine=InnoDb'
        );
    }

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
        $this->createImportSource();
        $this->createImportTable();
	}

	public function safeDown()
	{
        $this->dropTable('product_import');
        $this->dropTable('import_source');
	}

}