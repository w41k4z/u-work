CREATE TABLE regime(
	idRegime  SERIAL PRIMARY KEY,
    nombreRepas int,
	nom VARCHAR(15) NOT NULL,
    check(nombreRepas>0)
);

CREATE TABLE composant(
    idComposant  SERIAL PRIMARY KEY,
    nomComposant VARCHAR(15) not null unique
);

CREATE TABLE detail_regime(
    idDetailRegime SERIAL PRIMARY key,
    idComposant int not null,
    idRegime int not null,
    foreign key (idComposant) references composant(idComposant),
    foreign key (idRegime) references regime(idRegime)
);

CREATE TABLE tarification(
    idRegime  serial PRIMARY key,
    prix double precision not null,
    dure int not null,
    poids double precision not null,
    foreign key (idRegime) references regime(idRegime)
);
