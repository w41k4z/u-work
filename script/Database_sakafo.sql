CREATE TABLE Regime(
	idRegime PRIMARY KEY SERIALE,
	nom VARCHAR(15) NOT NULL
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

CREATE TABLE Detail(
    idRegime int,
    idDetailRegime int,
    idComposant int,
    foreign key (idRegime) references Regime(idRegime)
    foreign key (idDetailRegime) references DetailRegime(idDetailRegime),
    foreign key (idComposant) references Composant(idComposant),
);

CREATE TABLE Tarification(
    idRegime int,
    prix double precision,
    dure int,
    poids double precision,
    foreign key (idRegime) references Regime(idRegime)
);
