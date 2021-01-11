
create database sistemalicitacao;

use sistemalicitacao;

create table agent (
	id int auto_increment unique,
    name_agent varchar(255),
    email_agent varchar(255),
    phone_agent varchar(255)
);

create table client(
	id int auto_increment unique,
    name_client varchar(255),
    addres_client varchar(255),
	email_client varchar(255),
	cnpj_client varchar(255),
	phone_client varchar(255),
	contact_client varchar(255),
	id_agent int
	
);

create table cost_Ata(
		 id int auto_increment unique,
         
                                            id_Client int,
                                            date varchar(255),
                                            pr varchar(255),
                                            process varchar(255),
                                            object varchar(255),
                                            in_day int,
                                            winner int,
                                            days_deliver varchar(255),
                                            example int,
                                            bula int,
                                            catalog int,
                                            cbpf int,
                                            accreditation int,
                                            register_anvisa int,
                                            register_dou int,
                                            id_agent int
                                            
);

create table cost_ata_detail(
	id int auto_increment unique,
                                            id_ata_cost int,
                                            pr_ata_cost varchar(255),
                                            id_client_ata_cost int,
                                            item varchar(255),
                                            desc_comp_product varchar(255),
                                            id_product int,
                                            id_und int,
                                            quantity float,
                                            id_factory int,
                                            cost_unity float,                                            
                                            p1 float,                                            
                                            p2 float,                                            
                                            p3 float,                                            
                                            minimum float,
                                            status int

);

create table factory(
	id int auto_increment unique,
    name_factory varchar(255),
    addres_factory varchar(255), 
    email_factory varchar(255),
	cnpj_factory varchar(255), 
	phone_factory varchar(255), 
	contact_factory varchar(255)
);


create table permission(
id int auto_increment unique,
 type varchar(255),
 type_name varchar(255),
 perm varchar(255),
 perm_name varchar(255)

);

create table product(
id int auto_increment unique,
code_prod int,
desc_prod varchar(255),
id_und int,                                                                                       
id_factory int,                                                                                       
active_prod int,
medicament_prod int,
controlled_prod int,
desc_complete_prod varchar(255)
);

create table und (
id int auto_increment unique,
description varchar(255),
und varchar(3)

);

create table user(
	id int auto_increment unique,
    name varchar(255),
    pass varchar(255), 
    active int, 
    id_perm int, 
    email varchar(255), 
    id_factory int
);




