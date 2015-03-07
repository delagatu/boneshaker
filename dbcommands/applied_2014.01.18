
create table accessory_sub_type
(
id int not null auto_increment,
name varchar(100),
insert_date datetime,
available boolean default 1,
primary key (id)
) Engine=InnoDb;

alter table product add column accessory_sub_type_id int null;
alter table product add constraint product_accessory_sub_type_id foreign key (accessory_sub_type_id) references accessory_sub_type (id) on delete cascade on update cascade;


create table component_sub_type
(
id int not null auto_increment,
name varchar(100),
insert_date datetime,
available boolean default 1,
primary key (id)
) Engine=InnoDb;

alter table product add column component_sub_type_id int null;
alter table product add constraint product_component_sub_type_id foreign key (component_sub_type_id) references component_sub_type (id) on delete cascade on update cascade;

