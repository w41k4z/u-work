CREATE TABLE Regime(
	idRegime PRIMARY KEY SERIALE,
    nombreRepas int,
	nom VARCHAR(15) NOT NULL,
    check(nombreRepas>0)
);

CREATE TABLE Composant(
    idComposant PRIMARY KEY SERIALE,
    nomComposant VARCHAR(15)
);

CREATE TABLE DetailRegime(
    idDetailRegime SERIALE,
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
