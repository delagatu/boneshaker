alter table bicycle_description add column front_rear_tire_id int null;
alter table bicycle_description add constraint bicycle_description_front_rear_tire_id foreign key (front_rear_tire_id) references tire (id) on delete cascade on update cascade;

alter table bicycle_description add column front_rear_rim_id int null;
alter table bicycle_description add constraint bicycle_description_front_rear_rim_id foreign key (front_rear_rim_id) references rim (id) on delete cascade on update cascade;


CREATE TABLE IF NOT EXISTS rear_shock (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maker_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `valid` boolean,
  PRIMARY KEY (`id`),
  constraint rear_shock_maker_id foreign key (maker_id) references maker (id) on delete cascade on update cascade
) ENGINE=InnoDB;

alter table bicycle_description add column rear_shock_id int null;
alter table bicycle_description add constraint bicycle_description_rear_shock_id foreign key (rear_shock_id) references rear_shock (id) on delete cascade on update cascade;

CREATE TABLE IF NOT EXISTS wheel_size (
  `id` int(11) NOT NULL AUTO_INCREMENT,  
  `name` varchar(200) DEFAULT NULL,
  `valid` boolean,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;


alter table bicycle_description add column wheel_size_id int null;
alter table bicycle_description add constraint bicycle_description_wheel_size foreign key (wheel_size_id) references wheel_size (id) on delete cascade on update cascade;




