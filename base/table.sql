\c postgres
drop database course;
create database course;
\c course;

create table admin(
    idadmin serial not null primary key,
    nomadmin varchar(200),
    mail varchar(200),
    mdp varchar(200),
    identifiant int default 1
);

insert into admin(nomadmin,mail,mdp) values('admin' , 'admin@gmail.com' , '0000');

create table genre(
    idgenre serial not null primary key,
    nomgenre varchar(200)
);

insert into genre(nomgenre) values('homme'),('femme');

create table equipe(
    idequipe serial not null primary key,
    nomequipe varchar(200),
    mail varchar(200),
    mdp varchar(200),
    identifiant int default 0
);

create table coureur(
    idcoureur serial not null primary key,
    nomcoureur varchar(200),
    idgenre int not null,
    numerodossard double precision ,
    dtn date,
    idequipe int not null,
    foreign key(idgenre) references genre(idgenre),
    foreign key(idequipe) references equipe(idequipe)
);

create table categorie(
    idcategorie serial not null primary key,
    nomcategorie varchar(200),
    identifiant varchar(200),
    agedebut double precision,
    ageFin double precision
);
insert into categorie(nomcategorie,identifiant,agedebut,ageFin) values
('Homme' , 'M' , 18 , 10000000),
('Femme' , 'F' , 18 , 10000000),
('Junior' , 'J' , 0 , 18);

create table coureurcategorie(
    idcoureurcategorie serial not null primary key,
    idcoureur int not null,
    idcategorie int not null,
    foreign key(idcategorie) references categorie(idcategorie),
    foreign key(idcoureur) references coureur(idcoureur)
);

create table course(
    idcourse serial not null primary key,
    nomcourse varchar(200)
);

insert into course(nomcourse) values('Ampasimbe'),('Betsizaraina');

create table etape(
    idetape serial not null primary key,
    idcourse int not null,
    nometape varchar(200),
    kilometre double precision,
    nombrecoureur int,
    rangetape int not null,
    dateetape date,
    heureetape time,
    foreign key(idcourse) references course(idcourse)
);


create table coureuretape(
    idcoureuretape serial not null primary key,
    idetape int not null,
    idcoureur int not null,
    foreign key(idetape) references etape(idetape),
    foreign key(idcoureur) references coureur(idcoureur)
);

create table deroulementcourse(
    idderoulementcourse serial not null primary key,
    idcoureuretape int not null,
    datedepart date,
    heuredepart time,
    datearrive date,
    heurearrive time,
    duree double precision,
    foreign key(idcoureuretape) references coureuretape(idcoureuretape)
);

create table pointsetape(
    idpointsetape serial not null primary key,
    rang int not null,
    points double precision
);


-- penalite
create table penalite(
    idpenalite serial not null primary key,
    idequipe int not null,
    idetape int not null,
    temps time,
    foreign key(idequipe) references equipe(idequipe),
    foreign key(idetape) references etape(idetape)
);