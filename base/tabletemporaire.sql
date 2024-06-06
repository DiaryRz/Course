create table grandtableetape(
    idetape serial not null primary key,
    etape varchar(200),
    longueur double precision,
    nbcoureur int,
    rangetape int,
    datedepart date,
    heuredepart time
);

create table  grandtableresultat(
    idgrandtableresultat serial not null primary key,
    etape_rang int,
    numerodossard double precision,
    nom varchar(200),
    genre  varchar(200),
    dtn date,
    equipe varchar(200),
    arrive timestamp
);

create table grandtablepoints(
    idgrandtablepoints serial not null primary key,
    classements int,
    points double precision
);

