create table cliente
(
    id int not null
        primary key,
    nome      char null,
    sobrenome char null,
    email     char null,
    cpf       char null
);

create table employee
(
    id      int   not null
        primary key,
    nome    char  not null,
    email   char  null,
    pass   char  not null,
    salary float not null,
    cpf     char  not null
);

create table product
(
    codigo int not null
        primary key,
    nome      char  not null,
    categoria char  null,
    preco     float null
);

create table sale
(
    idemployee  int  not null,
    id_cliente    int  not null,
    codigo_product int  not null,
    id int not null
        primary key,
    data           date null,
    constraint fk_cliente
        foreign key (id_cliente) references cliente (id),
    constraint fk_employee
        foreign key (idemployee) references employee (id),
    constraint fk_product
        foreign key (codigo_product) references product (codigo)
);