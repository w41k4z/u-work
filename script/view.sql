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