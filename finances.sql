CREATE DATABASE finances;
USE finances;

CREATE TABLE perspect_eco (
    annee VARCHAR(10) NOT NULL,
    pib_nominal DECIMAL(15,2),
    taux_croissance DECIMAL(4,2),
    indice_prix_cons DECIMAL(4,2),
    ratio_dep_publ DECIMAL(5,2),
    solde_global DECIMAL(10,2),
    solde_primaire DECIMAL(10,2),
    taux_change_usd DECIMAL(10,4),
    taux_change_eur DECIMAL(10,4),
    investissement_public DECIMAL(4,2),
    investissement_prive DECIMAL(4,2),
    pression_fiscale DECIMAL(4,2)
);

CREATE TABLE croissance_sectorielle (
    annee VARCHAR(10) NOT NULL,
    secteur VARCHAR(100) NOT NULL,
    sous_secteur VARCHAR(100),
    taux_croissance DECIMAL(5,2),
    PRIMARY KEY (annee, secteur, sous_secteur)
);

CREATE TABLE recettes_fiscales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    annee VARCHAR(10) NOT NULL,
    nature_impot VARCHAR(100) NOT NULL,
    montant DECIMAL(15,2),
    UNIQUE KEY unique_impot_annee (nature_impot, annee)
);

CREATE TABLE recettes_douanieres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    annee VARCHAR(10) NOT NULL,
    nature_droits_taxes VARCHAR(100) NOT NULL,
    montant DECIMAL(15,2),
    UNIQUE KEY unique_douane_annee (nature_droits_taxes, annee)
);

CREATE TABLE recettes_non_fiscales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    annee VARCHAR(10) NOT NULL,
    type_recette VARCHAR(100) NOT NULL,
    montant DECIMAL(15,2),
    UNIQUE KEY unique_recette_annee (type_recette, annee)
);
CREATE TABLE dons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    annee VARCHAR(10) NOT NULL,
    type_don VARCHAR(50) NOT NULL,
    montant DECIMAL(15,2),
    UNIQUE KEY unique_don_annee (type_don, annee)
);
CREATE TABLE depenses_rubriques (
    id INT AUTO_INCREMENT PRIMARY KEY,
    annee VARCHAR(10) NOT NULL,
    rubrique VARCHAR(100) NOT NULL,
    montant DECIMAL(15,2),
    UNIQUE KEY unique_rubrique_annee (rubrique, annee)
);
CREATE TABLE evolution_depenses_soldes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    annee VARCHAR(10) NOT NULL,
    libelle VARCHAR(100) NOT NULL,
    valeur DECIMAL(15,2),
    type_valeur ENUM('montant', 'pourcentage'),
    UNIQUE KEY unique_libelle_annee_type (libelle, annee, type_valeur)
);
CREATE TABLE postes_budgetaires_2025 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ministere VARCHAR(200) NOT NULL,
    budget_alloue DECIMAL(15,2),
    pourcentage_total DECIMAL(5,2),
    UNIQUE KEY unique_ministere (ministere)
);

CREATE TABLE depenses_fonctionnement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    poste_depense VARCHAR(100) NOT NULL,
    montant_2024 DECIMAL(15,2),
    montant_2025 DECIMAL(15,2),
    ecart DECIMAL(15,2)

);
CREATE TABLE repartition_budget_admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    institution_ministere VARCHAR(200) NOT NULL,
    lfr_2024 DECIMAL(15,2),
    lf_2025 DECIMAL(15,2),
    categorie VARCHAR(50)
);

CREATE TABLE utilisateurs (
    username VARCHAR(50) NOT NULL UNIQUE PRIMARY KEY,
    password VARCHAR(255) NOT NULL
);

INSERT INTO utilisateurs (username, password)
VALUES ('admin', 'password');

INSERT INTO perspect_eco (annee, pib_nominal, taux_croissance, indice_prix_cons, ratio_dep_publ, solde_global, solde_primaire, taux_change_usd, taux_change_eur, investissement_public, investissement_prive, pression_fiscale) VALUES
('2024', 78945.4, 4.40, 8.20, 16.20, -4.30, 214.20, 4508.6000, 4905.5000, 6.10, 14.60, 10.60),
('2025', 88851.6, 5.00, 7.10, 18.40, -4.10, 1097.60, 4688.8000, 5275.2000, 9.60, 12.00, 11.20),
('2026', 99826.3, 5.20, 7.20, 17.80, -4.10, 866.00, 4853.2000, 5532.7000, 8.30, 13.70, 11.80);

INSERT INTO croissance_sectorielle (annee, secteur, sous_secteur, taux_croissance) VALUES
('2024', 'Primaire', 'Agriculture', 6.00),
('2024', 'Primaire', 'Élevage et pêche', 3.90),
('2024', 'Primaire', 'Sylviculture', 1.00),
('2025', 'Primaire', 'Agriculture', 9.50),
('2025', 'Primaire', 'Élevage et pêche', 4.00),
('2025', 'Primaire', 'Sylviculture', 1.10),

('2024', 'Secondaire', 'Industrie extractive', -20.80),
('2024', 'Secondaire', 'Alimentaire, boisson, tabac', 0.90),
('2024', 'Secondaire', 'Textile', 31.60),
('2024', 'Secondaire', 'Bois, papiers, imprimerie', 0.40),
('2024', 'Secondaire', 'Matériaux de construction', 7.90),
('2024', 'Secondaire', 'Industrie métallique', 7.20),
('2024', 'Secondaire', 'Machine, matériels électriques', 3.10),
('2024', 'Secondaire', 'Industries diverses', 0.50),
('2024', 'Secondaire', 'Électricité, eau, gaz', 3.90),

('2025', 'Secondaire', 'Industrie extractive', 4.00),
('2025', 'Secondaire', 'Alimentaire, boisson, tabac', 2.40),
('2025', 'Secondaire', 'Textile', 4.00),
('2025', 'Secondaire', 'Bois, papiers, imprimerie', 0.70),
('2025', 'Secondaire', 'Matériaux de construction', 8.00),
('2025', 'Secondaire', 'Industrie métallique', 7.30),
('2025', 'Secondaire', 'Machine, matériels électriques', 3.20),
('2025', 'Secondaire', 'Industries diverses', 0.60),
('2025', 'Secondaire', 'Électricité, eau, gaz', 4.00),

('2024', 'Tertiaire', 'BTP', 3.20),
('2024', 'Tertiaire', 'Commerce, entretiens, réparations', 4.20),
('2024', 'Tertiaire', 'Hôtel, restaurant', 14.70),
('2024', 'Tertiaire', 'Transport', 7.00),
('2024', 'Tertiaire', 'Poste et télécommunication', 13.40),
('2024', 'Tertiaire', 'Banque, assurance', 5.30),
('2024', 'Tertiaire', 'Services aux entreprises', 2.30),
('2024', 'Tertiaire', 'Administration', 1.70),
('2024', 'Tertiaire', 'Éducation', 1.70),
('2024', 'Tertiaire', 'Santé', 1.80),
('2024', 'Tertiaire', 'Services rendus aux ménages', 1.30),

('2025', 'Tertiaire', 'BTP', 3.60),
('2025', 'Tertiaire', 'Commerce, entretiens, réparations', 4.30),
('2025', 'Tertiaire', 'Hôtel, restaurant', 14.90),
('2025', 'Tertiaire', 'Transport', 7.20),
('2025', 'Tertiaire', 'Poste et télécommunication', 13.70),
('2025', 'Tertiaire', 'Banque, assurance', 6.10),
('2025', 'Tertiaire', 'Services aux entreprises', 2.40),
('2025', 'Tertiaire', 'Administration', 1.90),
('2025', 'Tertiaire', 'Éducation', 1.80),
('2025', 'Tertiaire', 'Santé', 1.90),
('2025', 'Tertiaire', 'Services rendus aux ménages', 1.40);

INSERT INTO croissance_sectorielle (annee, secteur, sous_secteur, taux_croissance) VALUES
('2024', 'Primaire', 'Total', 5.30),
('2024', 'Secondaire', 'Total', -3.30),
('2024', 'Tertiaire', 'Total', 5.00),
('2025', 'Primaire', 'Total', 7.80),
('2025', 'Secondaire', 'Total', 3.40),
('2025', 'Tertiaire', 'Total', 5.40);

INSERT INTO recettes_fiscales (annee, nature_impot, montant) VALUES
('2024', 'Impôt sur les revenus', 1179.0),
('2024', 'Impôt sur les revenus Salariaux et Assimilés', 848.2),
('2024', 'Impôt sur les revenus des Capitaux Mobiliers', 78.2),
('2024', 'Impôt sur les plus-values Immobilières', 14.0),
('2024', 'Impôt Synthétique', 132.3),
('2024', 'Droit d''Enregistrement', 49.0),
('2024', 'Taxe sur la Valeur Ajoutée (y compris Taxe sur les transactions Mobiles)', 1400.2),
('2024', 'Impôt sur les marchés Publics', 148.7),
('2024', 'Droit d''Accise (y compris Taxe environnementale)', 754.1),
('2024', 'Taxes sur les Assurances', 17.2),
('2024', 'Droit de Timbres', 14.1),
('2024', 'Autres', 1.5),
('2024', 'TOTAL', 4636.5),

('2025', 'Impôt sur les revenus', 1411.4),
('2025', 'Impôt sur les revenus Salariaux et Assimilés', 889.9),
('2025', 'Impôt sur les revenus des Capitaux Mobiliers', 93.7),
('2025', 'Impôt sur les plus-values Immobilières', 18.3),
('2025', 'Impôt Synthétique', 164.7),
('2025', 'Droit d''Enregistrement', 62.8),
('2025', 'Taxe sur la Valeur Ajoutée (y compris Taxe sur les transactions Mobiles)', 1742.2),
('2025', 'Impôt sur les marchés Publics', 250.0),
('2025', 'Droit d''Accise (y compris Taxe environnementale)', 955.4),
('2025', 'Taxes sur les Assurances', 20.6),
('2025', 'Droit de Timbres', 16.8),
('2025', 'Autres', 2.7),
('2025', 'TOTAL', 5628.4);

INSERT INTO recettes_douanieres (annee, nature_droits_taxes, montant) VALUES

('2024', 'Droit de douane', 847.5),
('2024', 'TVA à l''importation', 1768.3),
('2024', 'Taxe sur les produits pétroliers', 308.0),
('2024', 'TVA sur les produits pétroliers', 842.8),
('2024', 'Droit de navigation', 1.2),
('2024', 'Autres', 0.2),
('2024', 'TOTAL', 3768.0),

('2025', 'Droit de douane', 1010.7),
('2025', 'TVA à l''importation', 2148.3),
('2025', 'Taxe sur les produits pétroliers', 326.0),
('2025', 'TVA sur les produits pétroliers', 879.0),
('2025', 'Droit de navigation', 1.9),
('2025', 'Autres', 0.1),
('2025', 'TOTAL', 4366.0);

INSERT INTO recettes_non_fiscales (annee, type_recette, montant) VALUES

('2024', 'Dividendes', 89.5),
('2024', 'Productions immobilières financières', 0.5),
('2024', 'Redevance de pêche', 10.0),
('2024', 'Redevance minières', 84.9),
('2024', 'Autres redevance', 9.7),
('2024', 'Produits des activités et autres', 11.1),
('2024', 'Autres', 140.1),
('2024', 'TOTAL', 345.8),

('2025', 'Dividendes', 120.2),
('2025', 'Productions immobilières financières', 2.1),
('2025', 'Redevance de pêche', 15.0),
('2025', 'Redevance minières', 331.2),
('2025', 'Autres redevance', 10.0),
('2025', 'Produits des activités et autres', 8.1),
('2025', 'Autres', 5.2),
('2025', 'TOTAL', 491.7);

INSERT INTO dons (annee, type_don, montant) VALUES
('2024', 'Courants', 0.3),
('2024', 'Capital', 1086.0),
('2024', 'TOTAL', 1086.3),
('2025', 'Courants', 31.0),
('2025', 'Capital', 2445.6),
('2025', 'TOTAL', 2476.6);

INSERT INTO depenses_rubriques (annee, rubrique, montant) VALUES
-- LFR 2024
('2024', 'Intérêts de la dette', 672.0),
('2024', 'Dépenses courantes de solde (hors indemnités)', 3814.5),
('2024', 'Dépenses courantes hors solde', 3069.0),
('2024', 'Indemnités', 244.8),
('2024', 'Biens/Services', 573.2),
('2024', 'Transferts et subventions', 2251.0),
('2024', 'Dépenses d''investissement', 4836.8),
('2024', 'PIP sur financement interne', 1262.5),
('2024', 'PIP sur financement externe', 3574.3),
('2024', 'Autres opérations nettes du trésor', 390.2),
('2024', 'TOTAL', 12782.4),

-- LF 2025
('2025', 'Intérêts de la dette', 756.5),
('2025', 'Dépenses courantes de solde (hors indemnités)', 3846.4),
('2025', 'Dépenses courantes hors solde', 2304.3),
('2025', 'Indemnités', 244.8),
('2025', 'Biens/Services', 504.7),
('2025', 'Transferts et subventions', 1554.8),
('2025', 'Dépenses d''investissement', 8537.2),
('2025', 'PIP sur financement interne', 2377.3),
('2025', 'PIP sur financement externe', 6159.9),
('2025', 'Autres opérations nettes du trésor', 860.6),
('2025', 'TOTAL', 16304.9);

INSERT INTO evolution_depenses_soldes (annee, libelle, valeur, type_valeur) VALUES
-- Données 2024
('2024', 'Dépenses de solde', 3814.5, 'montant'),
('2024', 'Solde/PIB Nominal', 4.8, 'pourcentage'),
('2024', 'Solde/Recettes fiscales nettes', 47.9, 'pourcentage'),
('2024', 'Solde/Dépenses totales', 29.9, 'pourcentage'),

-- Données 2025
('2025', 'Dépenses de solde', 3846.4, 'montant'),
('2025', 'Solde/PIB Nominal', 4.3, 'pourcentage'),
('2025', 'Solde/Recettes fiscales nettes', 40.5, 'pourcentage'),
('2025', 'Solde/Dépenses totales', 23.6, 'pourcentage');

INSERT INTO postes_budgetaires_2025 (ministere, budget_alloue, pourcentage_total) VALUES
('Ministère des Forces Armées', 1000.0, 15.04),
('Ministère de la Santé Publique', 300.0, 4.51),
('Ministère de la Sécurité Publique', 1000.0, 15.04),
('Ministère de l''Éducation Nationale', 3000.0, 45.11),
('Ministère de l''Enseignement Technique et de la Formation Professionnelle', 250.0, 3.76),
('Ministère de l''Enseignement Supérieur et de la Recherche Scientifique', 100.0, 1.50),
('Ministère délégué en charge de la Gendarmerie Nationale', 1000.0, 15.04),
('TOTAL', 6650.0, 100.00);

INSERT INTO depenses_fonctionnement (poste_depense, montant_2024, montant_2025, ecart) VALUES
('Indemnités', 244.8, 244.8, 0),
('Biens et Services', 573.2, 504.7, -68.5),
('Transferts', 2251.0, 1554.8, -696.2),
('TOTAL', 3069.0, 2304.3, -764.7);

INSERT INTO repartition_budget_admin (institution_ministere, lfr_2024, lf_2025, categorie) VALUES
-- Institutions
('Présidence de la République', 177.1, 224.7, 'Institution'),
('Sénat', 22.1, 21.3, 'Institution'),
('Assemblée Nationale', 87.4, 85.9, 'Institution'),
('Haute Cour Constitutionnelle', 11.9, 9.3, 'Institution'),
('Primature', 278.3, 339.9, 'Institution'),
('Conseil du Fampihavanana Malagasy', 6.7, 6.3, 'Institution'),
('Commission Électorale Nationale Indépendante', 113.3, 16.4, 'Institution'),

-- Ministères
('Ministère de la Défense Nationale', 557.0, 543.2, 'Ministère'),
('Ministère des Affaires Étrangères', 99.2, 104.7, 'Ministère'),
('Ministère de la Justice', 199.6, 219.8, 'Ministère'),
('Ministère de l''Intérieur', 150.2, 134.7, 'Ministère'),
('Ministère de l''Économie et des Finances', 2848.0, 2332.7, 'Ministère'),
('Ministère de la Sécurité Publique', 228.3, 229.2, 'Ministère'),
('Ministère de l''Industrialisation et du Commerce', 113.2, 119.6, 'Ministère'),
('Ministère de la Décentralisation et de l''Aménagement du Territoire', 356.8, 568.1, 'Ministère'),
('Ministère du Travail, de l''Emploi et de la Fonction Publique', 31.8, 33.7, 'Ministère'),
('Ministère du Tourisme et de l''Artisanat', 19.2, 43.9, 'Ministère'),
('Ministère de l''Enseignement Supérieur et de la Recherche Scientifique', 284.2, 285.6, 'Ministère'),
('Ministère de l''Environnement et du Développement Durable', 94.4, 188.8, 'Ministère'),
('Ministère de l''Éducation Nationale', 1532.8, 1562.0, 'Ministère'),
('Ministère des Transports et de la Météorologie', 63.9, 216.3, 'Ministère'),
('Ministère de la Santé Publique', 716.6, 921.0, 'Ministère'),
('Ministère de la Communication et de la Culture', 38.4, 32.1, 'Ministère'),
('Ministère des Travaux Publics', 1217.3, 2327.5, 'Ministère'),
('Ministère des Mines et des Ressources Stratégiques', 18.3, 18.1, 'Ministère'),
('Ministère de l''Énergie et des Hydrocarbures', 407.9, 1332.0, 'Ministère'),
('Ministère de l''Eau, de l''Assainissement et de l''Hygiène', 306.1, 600.2, 'Ministère'),
('Ministère de l''Agriculture et de l''Élevage', 469.8, 795.5, 'Ministère'),
('Ministère de la Pêche et de l''Économie Bleue', 29.9, 28.8, 'Ministère'),
('Ministère de l''Enseignement Technique et de la Formation Professionnelle', 103.7, 94.8, 'Ministère'),
('Ministère de l''Artisanat et des Métiers', 2.5, 0, 'Ministère'),
('Ministère du Développement Numérique, des Postes et des Télécommunications', 8.4, 8.8, 'Ministère'),
('Ministère de la Population et des Solidarités', 99.1, 193.4, 'Ministère'),
('Ministère de la Jeunesse et des Sports', 40.5, 58.1, 'Ministère'),
('Secrétariat d''État en charge des Nouvelles Villes et de l''Habitat', 247.1, 138.8, 'Ministère'),
('Ministère délégué chargé de la Gendarmerie', 414.8, 446.4, 'Ministère'),
('Secrétariat d''État en charge de la Souveraineté Alimentaire', 0, 127.3, 'Ministère'),

-- Totaux partiels
('Total Institutions et Ministères', 11395.9, 14408.9, 'Total partiel'),

-- Organes Constitutionnels
('Haut Conseil pour la Défense de la Démocratie et de l''État de Droit (HCDDED)', 2.1, 2.0, 'Organe Constitutionnel'),
('Commission Nationale Indépendante des Droits de l''Homme (CNIDH)', 2.1, 2.0, 'Organe Constitutionnel'),
('Total « Organes Constitutionnels »', 4.2, 4.0, 'Total partiel'),

-- Autres
('Haute Cour de Justice', 3.7, 3.5, 'Institution'),
('Total Hors « Opérations d''ordre »', 11403.8, 14416.4, 'Total général');