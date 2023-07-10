CREATE TABLE Regime(
	idRegime SERIAL PRIMARY KEY,
    nombreRepas int,
	nom VARCHAR(15) NOT NULL,
    check(nombreRepas>0),
);

CREATE TABLE Composant(
    idComposant SERIAL,
    nomComposant VARCHAR(15),
    PRIMARY KEY (idComposant)
);

CREATE TABLE DetailRegime(
    idDetailRegime SERIAL,
    idComposant int,
    idRegime int,
    foreign key (idComposant) references Composant(idComposant),
    foreign key (idRegime) references Regime(idRegime)
);

CREATE TABLE Tarification(
    idRegime int,
    prix double precision,
    dure int,
    poids double precision,
    foreign key (idRegime) references Regime(idRegime)
);

CREATE TABLE Activite(
    idActivite SERIAL,
    typeActivite VARCHAR(15),
    dureeActivite DOUBLE PRECISION,
    PRIMARY KEY (idActivite)
);

CREATE TABLE DetailActivite(
    idActivite int,
    idDetailRegime int,
    Foreign Key (idActivite) REFERENCES Activite(idActivite),
    Foreign Key (idDetailRegime) REFERENCES DetailRegime(idDetailRegime)
);

