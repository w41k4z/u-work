CREATE TABLE activite (
    id SERIAL PRIMARY KEY,
    niveau INT NOT NULL, -- < 5 facile, < 10 moyen, < 20 difficile
    CHECK(niveau > 0)
);

CREATE TABLE detail_activite (
    id SERIAL PRIMARY KEY,
    id_activite INT REFERENCES activite(id) NOT NULL, 
    activite VARCHAR(30) NOT NULL, -- ex: Pompe 5
    UNIQUE(id_activite, activite)
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

CREATE TABLE plat (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(30) NOT NULL UNIQUE,
    etat INT NOT NULL, -- 0 matin, 5 midi, 10 soir
    CHECK(etat >= 0)
);

CREATE TABLE detail_regime (
    id SERIAL PRIMARY KEY,
    jour INT NOT NULL, -- ex: Jour 1
    id_plat_matin INT REFERENCES plat(id) NOT NULL,
    id_plat_midi INT REFERENCES plat(id) NOT NULL,
    id_plat_soir INT REFERENCES plat(id) NOT NULL,
    id_activite INT REFERENCES activite(id) NOT NULL
);