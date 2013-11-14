INSERT INTO `boneshaker`.`item_type` (`id`, `name`, `insert_date`, `available`, `submenu_only`) VALUES (NULL, 'Componente', NULL, '1', '1');

create table component_type
(
id int not null auto_increment, 
name varchar(100),
available boolean,
primary key (id)
);

alter table product add column component_type_id int null;
alter table product add constraint product_component_type_id foreign key (component_type_id) references component_type (id) on delete cascade on update cascade;


