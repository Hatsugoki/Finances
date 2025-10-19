CREATE DATABASE finances;
USE finances;

CREATE TABLE perspect_eco (
    id INT PRIMARY KEY AUTO_INCREMENT,
    annee VARCHAR(10) NOT NULL,
    pib_nominal DECIMAL(15,2),
    taux_croissance DECIMAL(4,2),
    inflation DECIMAL(4,2),
    taux_change_usd DECIMAL(10,4),
    taux_change_eur DECIMAL(10,4),
    investissement_public DECIMAL(4,2),
    investissement_prive DECIMAL(4,2),
    pression_fiscale DECIMAL(4,2)
);

CREATE TABLE ministeres (
    id_ministere INT PRIMARY KEY AUTO_INCREMENT,
    nom_ministere VARCHAR(150) NOT NULL,
    description TEXT
);

CREATE TABLE recettes (
    id_recette INT PRIMARY KEY AUTO_INCREMENT,
    annee_id INT,
    categorie VARCHAR(100),
    sous_categorie VARCHAR(100),
    montant_2024 DECIMAL(12,2),
    montant_2025 DECIMAL(12,2),
    variation DECIMAL(5,2),
    description TEXT,
    FOREIGN KEY (annee_id) REFERENCES perspect_eco(id)
);

CREATE TABLE depenses (
    id_depense INT PRIMARY KEY AUTO_INCREMENT,
    annee_id INT,
    type VARCHAR(100),
    ministere_id INT,
    montant_2024 DECIMAL(12,2),
    montant_2025 DECIMAL(12,2),
    commentaire TEXT,
    FOREIGN KEY (annee_id) REFERENCES perspect_eco(id),
    FOREIGN KEY (ministere_id) REFERENCES ministeres(id_ministere)
);

CREATE TABLE deficit_bud (
    id_deficit INT PRIMARY KEY AUTO_INCREMENT,
    annee_id INT,
    recettes_totales DECIMAL(15,2),
    depenses_totales DECIMAL(15,2),
    deficit DECIMAL(15,2),
    financement_exterieur DECIMAL(15,2),
    financement_interieur DECIMAL(15,2),
    FOREIGN KEY (annee_id) REFERENCES perspect_eco(id)
);

CREATE TABLE dispositions_fiscales (
    id_disposition INT PRIMARY KEY AUTO_INCREMENT,
    annee_id INT,
    type_impot VARCHAR(100),
    article VARCHAR(100),
    modification TEXT,
    taux DECIMAL(5,2),
    exonerations TEXT,
    commentaire TEXT,
    FOREIGN KEY (annee_id) REFERENCES perspect_eco(id)
);

CREATE TABLE glossaire (
    id_terme INT PRIMARY KEY AUTO_INCREMENT,
    terme VARCHAR(100),
    definition TEXT
);
