CREATE TABLE activite (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(30) NOT NULL
);

CREATE TABLE entrainement (
    id SERIAL PRIMARY KEY,
    niveau INT NOT NULL -- 0 facile, 5 moyen, 10 difficile
);

CREATE TABLE activite_entrainement (
    id SERIAL PRIMARY KEY,
    id_entrainement INT REFERENCES entrainement(id) NOT NULL,
    id_activite INT REFERENCES activite(id) NOT NULL,
    quantite INT NOT NULL, -- ex: pompe x30
    CHECK(quantite > 0),
    UNIQUE(id_entrainement, id_activite)
);

CREATE TABLE categorie_regime (
    id SERIAL PRIMARY KEY,
    categorie VARCHAR(30) NOT NULL UNIQUE
);

CREATE TABLE regime (
	id SERIAL PRIMARY KEY,
	nom VARCHAR(15) NOT NULL,
    id_categorie INT REFERENCES categorie_regime(id) NOT NULL,
    duree INT NOT NULL, -- unite hebdomadaire
    de INT NOT NULL, -- borne inferieur
    a INT NOT NULL, -- borne superieur
    prix DOUBLE PRECISION NOT NULL, -- prix unitaire/j
    CHECK(duree > 0),
    CHECK(de > 0 AND de < a),
    CHECK(prix > 0)
);
ALTER TABLE regime add column types int ;

CREATE TABLE plat (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(30) NOT NULL UNIQUE,
    etat INT NOT NULL, -- 0 matin, 5 midi, 10 soir
    CHECK(etat >= 0)
);

CREATE TABLE detail_regime (
    id SERIAL PRIMARY KEY,
    id_regime INT REFERENCES regime(id) NOT NULL,
    jour INT NOT NULL, -- ex: Jour 1
    id_plat_matin INT REFERENCES plat(id) NOT NULL,
    id_plat_midi INT REFERENCES plat(id) NOT NULL,
    id_plat_soir INT REFERENCES plat(id) NOT NULL,
    id_entrainement INT REFERENCES entrainement(id) NOT NULL
);