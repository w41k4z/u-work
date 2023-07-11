CREATE VIEW activites_entrainement AS
    SELECT 
        activite_entrainement.id,
        activite_entrainement.id_entrainement,
        activite_entrainement.id_activite,
        activite.nom,
        activite_entrainement.quantite
    FROM activite_entrainement
    JOIN activite
    ON activite.id = activite_entrainement.id_activite;

CREATE VIEW regimes AS
    SELECT 
        regime.*,
        categorie_regime.categorie
    FROM regime
    JOIN categorie_regime
    ON regime.id_categorie = categorie_regime.id;

CREATE VIEW details_regimes AS
    SELECT 
        detail_regime.*,
        plat1.nom as matin,
        plat2.nom as midi,
        plat3.nom as soir,
        entrainement.niveau AS niveau_activite
    FROM detail_regime
    JOIN plat AS plat1
    ON plat1.id = detail_regime.id_plat_matin
    JOIN plat AS plat2
    ON plat2.id = detail_regime.id_plat_midi
    JOIN plat AS plat3
    ON plat3.id = detail_regime.id_plat_soir
    JOIN entrainement
    ON entrainement.id = detail_regime.id_entrainement;