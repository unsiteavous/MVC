-- Enlever les clefs primaires :
ALTER TABLE cine_projections DROP PRIMARY KEY;

-- Ajouter une colonne ID :
ALTER TABLE cine_projections 
ADD COLUMN ID INT(11) AUTO_INCREMENT PRIMARY KEY;

-- Modifier l'ordre des colonnes
ALTER TABLE cine_projections
MODIFY COLUMN HORAIRE DATETIME AFTER ID,
MODIFY COLUMN ID_SALLES INT(11) AFTER HORAIRE,
MODIFY COLUMN ID_FILMS INT(11) AFTER ID_SALLES,
MODIFY COLUMN ID_EMPLOYES INT(11) AFTER ID_FILMS;

-- Remplir la colonne ID pour toutes les lignes existantes :
SET @row_number = 0;
UPDATE cine_projections
SET id = (@row_number := @row_number + 1);