<?php

class m150504_064925_order_related extends CDbMigration
{
    protected function insertCounty()
    {
        $sql = " INSERT INTO county (id, county_short_name, county_name) VALUES ";
        $sql .= " (1, 'DJ', 'Dolj'),(2, 'BC', 'Bacău'),(3, 'HR', 'Harghita'),(4, 'BN', 'Bistrița-Năsăud'),
                (5, 'DB', 'Dâmbovița'),(6, 'SV', 'Suceava'),(7, 'BT', 'Botoșani'),(8, 'BV', 'Brașov'),
                (9, 'B', 'București'),(10, 'BR', 'Brăila'),(11, 'HD', 'Hunedoara'),(12, 'TR', 'Teleorman'),
                (13, 'CV', 'Covasna'),(14, 'TL', 'Tulcea'),(15, 'TM', 'Timiș'),(16, 'BZ', 'Buzău'),(17, 'PH', 'Prahova'),
                (18, 'IF', 'Ilfov'),(19, 'NT', 'Neamț'),(20, 'CJ', 'Cluj'),(21, 'AB', 'Alba'),(22, 'GR', 'Giurgiu'),
                (23, 'AG', 'Argeș'),(24, 'CL', 'Călărași'),(25, 'BH', 'Bihor'),(26, 'IS', 'Iași'),(27, 'VL', 'Vâlcea'),
                (28, 'VN', 'Vrancea'),(29, 'AR', 'Arad'),(30, 'IL', 'Ialomița'),(31, 'CS', 'Caraș-Severin'),(32, 'GL', 'Galați'),
                (33, 'GJ', 'Gorj'),(34, 'CT', 'Constanța'),(35, 'SM', 'Satu Mare'),(36, 'MM', 'Maramureș'),(37, 'MH', 'Mehedinți'),
                (38, 'SJ', 'Sălaj'),(39, 'VS', 'Vaslui'),(40, 'MS', 'Mureș'),(41, 'SB', 'Sibiu'),(42, 'OT', 'Olt') ";

        $this->execute($sql);
    }

    protected function addCounty()
    {
        $this->createTable(
            'county',
            array(
                'id' => 'INT NOT NULL AUTO_INCREMENT',
                'county_short_name' => 'varchar(10) NOT NULL',
                'county_name' => 'varchar(200) NOT NULL',
                'primary key (id)',

            ),
            'Engine=InnoDb'
        );
    }

    protected function addAddressTable()
    {
        $this->createTable(
            'address',
            array(
                'id' => 'INT NOT NULL AUTO_INCREMENT',
                'county_id' => 'int not null',
                'city' => 'varchar(255) not null',
                'street' => 'varchar(255) not null',
                'number' => 'varchar(100) not null',
                'constraint address_county_id foreign key (county_id) references county (id) ON DELETE CASCADE ON UPDATE CASCADE',
                'primary key (id)',

            ),
            'Engine=InnoDb'
        );
    }

    public function addAddressUserTable()
    {
        $this->createTable(
            'address_user',
            array(
                'id' => 'INT NOT NULL AUTO_INCREMENT',
                'address_id' => 'int not null',
                'user_id' => 'int not null',
                'constraint address_user_user_id foreign key (user_id) references user (id) ON DELETE CASCADE ON UPDATE CASCADE',
                'constraint address_user_address_id foreign key (address_id) references address (id) ON DELETE CASCADE ON UPDATE CASCADE',
                'primary key (id)',

            ),
            'Engine=InnoDb'
        );
    }

    protected function addCartAddress()
    {
        $this->addColumn('cart', 'address_id', 'int null');
        $this->addForeignkey('cart_address_id', 'cart', 'address_id', 'address', 'id', 'CASCADE', 'CASCADE');
    }

    protected function removeCartAddress()
    {
        $this->dropForeignKey('cart_address_id', 'cart');
        $this->dropColumn('cart', 'address_id');
    }

    protected function cartDetailUpdate()
    {
        $this->addColumn('cart_detail', 'qty', 'int not null');
        $this->addColumn('cart_detail', 'total_price', 'decimal(10, 2) not null');
        $this->addColumn('cart_detail', 'item_price', 'decimal(10, 2) not null');
    }

    protected function cartDetailDownGrade()
    {
        $this->dropColumn('cart_detail', 'qty');
        $this->dropColumn('cart_detail', 'total_price');
        $this->dropColumn('cart_detail', 'item_price');
    }

    protected function addUserProfile()
    {
        $this->createTable(
            'user_profile',
            array(
                'id' => 'INT NOT NULL AUTO_INCREMENT',
                'user_id' => 'int not null',
                'cnp' => 'varchar(20)',
                'constraint user_profile_user_id foreign key (user_id) references user (id) ON DELETE CASCADE ON UPDATE CASCADE',
                'primary key (id)',

            ),
            'Engine=InnoDb'
        );
    }

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
        $this->addCounty();
        $this->insertCounty();
        $this->addAddressTable();
        $this->addAddressUserTable();
        $this->addCartAddress();
        $this->cartDetailUpdate();
        $this->addUserProfile();

	}

	public function safeDown()
	{
        $this->dropTable('address_user');
        $this->cartDetailDownGrade();
        $this->removeCartAddress();
        $this->dropTable('address');
        $this->dropTable('county');
        $this->dropTable('user_profile');

	}

}