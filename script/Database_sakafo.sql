CREATE TABLE Regime(
	idRegime  SERIAL PRIMARY KEY ,
    nombreRepas int,
	nom VARCHAR(15) NOT NULL,
    check(nombreRepas>0)
);

CREATE TABLE Composant(
    idComposant SERIAL PRIMARY KEY ,
    nomComposant VARCHAR(15)
);

CREATE TABLE DetailRegime(
    idDetailRegime SERIAL PRIMARY key,
    idComposant int,
    idRegime int,
    foreign key (idComposant) references Composant(idComposant),
    foreign key (idRegime) references Regime(idRegime)
);

CREATE TABLE Tarification(
    idRegime SERIAL PRIMARY KEY,
    prix double precision,
    dure int,
    poids double precision,
    foreign key (idRegime) references Regime(idRegime)
);

CREATE table Code(
    idCode SERIAL PRIMARY key,
    etat int,
    check(etat > 0)
);

CREATE TABLE pending_code_validation (
    id SERIAL PRIMARY KEY,
    user_id INT REFERENCES user_account(id),
    id_code INT REFERENCES code(idcode)
);