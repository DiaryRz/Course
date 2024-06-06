<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2024-05-15 02:29:22 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-05-15 02:30:08 --> Severity: Warning --> Undefined array key "sexe" C:\xampp\htdocs\S6\BaseProjetEval\application\controllers\FormulaireController.php 42
ERROR - 2024-05-15 02:30:08 --> Severity: Warning --> pg_query(): Query failed: ERREUR:  une valeur NULL viole la contrainte NOT NULL de la colonne « idsexe »
DETAIL:  La ligne en échec contient (19, gggg, 12, -1, uploads/_ed15263d-268c-44a4-ae80-564888d3e26c6.jpg, 3, null) C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2024-05-15 02:30:08 --> Query error: ERREUR:  une valeur NULL viole la contrainte NOT NULL de la colonne « idsexe »
DETAIL:  La ligne en échec contient (19, gggg, 12, -1, uploads/_ed15263d-268c-44a4-ae80-564888d3e26c6.jpg, 3, null) - Invalid query: INSERT INTO "information" ("nom", "age", "nombre", "image", "idutilisateur", "idsexe") VALUES ('gggg', '12', '-1', 'uploads/_ed15263d-268c-44a4-ae80-564888d3e26c6.jpg', '3', NULL)
