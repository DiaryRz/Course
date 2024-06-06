<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2024-05-06 08:27:25 --> Severity: Warning --> pg_connect(): Unable to connect to PostgreSQL server: could not connect to server: Connection refused (0x0000274D/10061)
	Is the server running on host &quot;localhost&quot; (::1) and accepting
	TCP/IP connections on port 5432?
could not connect to server: Connection refused (0x0000274D/10061)
	Is the server running on host &quot;localhost&quot; (127.0.0.1) and accepting
	TCP/IP connections on port 5432? C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 154
ERROR - 2024-05-06 08:27:25 --> Unable to connect to the database
ERROR - 2024-05-06 08:29:08 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-05-06 08:35:42 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-05-06 08:36:30 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-05-06 08:36:52 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-05-06 09:10:38 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-05-06 11:47:56 --> Severity: Warning --> Undefined variable $limit C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 28
ERROR - 2024-05-06 11:47:56 --> Severity: Warning --> Undefined variable $offset C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 28
ERROR - 2024-05-06 11:47:56 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 11:47:56 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 11:48:13 --> Severity: Warning --> Undefined variable $limit C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 28
ERROR - 2024-05-06 11:48:13 --> Severity: Warning --> Undefined variable $offset C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 28
ERROR - 2024-05-06 11:57:49 --> Severity: Warning --> pg_query(): Query failed: ERREUR:  erreur de syntaxe dans tsquery : « *:a:* » C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2024-05-06 11:57:49 --> Query error: ERREUR:  erreur de syntaxe dans tsquery : « *:a:* » - Invalid query: SELECT *
FROM "information"
WHERE search_vector @@ to_tsquery('english', '*:a:*')
 LIMIT 5
ERROR - 2024-05-06 11:57:58 --> 404 Page Not Found: ListeController/index
ERROR - 2024-05-06 11:58:02 --> 404 Page Not Found: ListeController/lsi
ERROR - 2024-05-06 11:58:14 --> Severity: Warning --> pg_query(): Query failed: ERREUR:  erreur de syntaxe dans tsquery : « *:i:* » C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2024-05-06 11:58:14 --> Query error: ERREUR:  erreur de syntaxe dans tsquery : « *:i:* » - Invalid query: SELECT *
FROM "information"
WHERE search_vector @@ to_tsquery('english', '*:i:*')
 LIMIT 5
ERROR - 2024-05-06 14:02:56 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-05-06 14:03:20 --> Severity: Warning --> pg_query(): Query failed: ERREUR:  la colonne « search_column » n'existe pas
LINE 3: WHERE search_column ~* '\ya\y'
              ^ C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2024-05-06 14:03:20 --> Query error: ERREUR:  la colonne « search_column » n'existe pas
LINE 3: WHERE search_column ~* '\ya\y'
              ^ - Invalid query: SELECT *
FROM "information"
WHERE search_column ~* '\ya\y'
 LIMIT 5
ERROR - 2024-05-06 14:04:16 --> Severity: Warning --> pg_query(): Query failed: ERREUR:  l'opérateur n'existe pas : tsvector ~* unknown
LINE 3: WHERE search_vector ~* '\ya\y'
                            ^
HINT:  Aucun opérateur ne correspond au nom donné et aux types d'arguments.
Vous devez ajouter des conversions explicites de type. C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2024-05-06 14:04:16 --> Query error: ERREUR:  l'opérateur n'existe pas : tsvector ~* unknown
LINE 3: WHERE search_vector ~* '\ya\y'
                            ^
HINT:  Aucun opérateur ne correspond au nom donné et aux types d'arguments.
Vous devez ajouter des conversions explicites de type. - Invalid query: SELECT *
FROM "information"
WHERE search_vector ~* '\ya\y'
 LIMIT 5
ERROR - 2024-05-06 14:04:47 --> Severity: Warning --> pg_query(): Query failed: ERREUR:  l'opérateur n'existe pas : tsvector ~* unknown
LINE 3: WHERE search_vector ~* '\ya\y'
                            ^
HINT:  Aucun opérateur ne correspond au nom donné et aux types d'arguments.
Vous devez ajouter des conversions explicites de type. C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2024-05-06 14:04:47 --> Query error: ERREUR:  l'opérateur n'existe pas : tsvector ~* unknown
LINE 3: WHERE search_vector ~* '\ya\y'
                            ^
HINT:  Aucun opérateur ne correspond au nom donné et aux types d'arguments.
Vous devez ajouter des conversions explicites de type. - Invalid query: SELECT *
FROM "information"
WHERE search_vector ~* '\ya\y'
 LIMIT 5
ERROR - 2024-05-06 14:05:01 --> Severity: Warning --> pg_query(): Query failed: ERREUR:  l'opérateur n'existe pas : tsvector ~* unknown
LINE 3: WHERE search_vector ~* '\ya\y'
                            ^
HINT:  Aucun opérateur ne correspond au nom donné et aux types d'arguments.
Vous devez ajouter des conversions explicites de type. C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2024-05-06 14:05:01 --> Query error: ERREUR:  l'opérateur n'existe pas : tsvector ~* unknown
LINE 3: WHERE search_vector ~* '\ya\y'
                            ^
HINT:  Aucun opérateur ne correspond au nom donné et aux types d'arguments.
Vous devez ajouter des conversions explicites de type. - Invalid query: SELECT *
FROM "information"
WHERE search_vector ~* '\ya\y'
 LIMIT 5
ERROR - 2024-05-06 14:08:08 --> Severity: Warning --> pg_query(): Query failed: ERREUR:  la fonction to_tsvector(unknown, tsvector) n'existe pas
LINE 3: WHERE to_tsvector('english', search_vector) @@ to_tsquery('e...
              ^
HINT:  Aucune fonction ne correspond au nom donné et aux types d'arguments.
Vous devez ajouter des conversions explicites de type. C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2024-05-06 14:08:08 --> Query error: ERREUR:  la fonction to_tsvector(unknown, tsvector) n'existe pas
LINE 3: WHERE to_tsvector('english', search_vector) @@ to_tsquery('e...
              ^
HINT:  Aucune fonction ne correspond au nom donné et aux types d'arguments.
Vous devez ajouter des conversions explicites de type. - Invalid query: SELECT *
FROM "information"
WHERE to_tsvector('english', search_vector) @@ to_tsquery('english', 'a')
 LIMIT 5
ERROR - 2024-05-06 14:08:34 --> Severity: Warning --> pg_query(): Query failed: ERREUR:  la fonction to_tsvector(unknown, tsvector) n'existe pas
LINE 3: WHERE to_tsvector('english', search_vector) @@ to_tsquery('e...
              ^
HINT:  Aucune fonction ne correspond au nom donné et aux types d'arguments.
Vous devez ajouter des conversions explicites de type. C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2024-05-06 14:08:34 --> Query error: ERREUR:  la fonction to_tsvector(unknown, tsvector) n'existe pas
LINE 3: WHERE to_tsvector('english', search_vector) @@ to_tsquery('e...
              ^
HINT:  Aucune fonction ne correspond au nom donné et aux types d'arguments.
Vous devez ajouter des conversions explicites de type. - Invalid query: SELECT *
FROM "information"
WHERE to_tsvector('english', search_vector) @@ to_tsquery('english', 'a')
 LIMIT 5
ERROR - 2024-05-06 14:08:44 --> Severity: Warning --> pg_query(): Query failed: ERREUR:  la fonction to_tsvector(unknown, tsvector) n'existe pas
LINE 3: WHERE to_tsvector('english', search_vector) @@ to_tsquery('e...
              ^
HINT:  Aucune fonction ne correspond au nom donné et aux types d'arguments.
Vous devez ajouter des conversions explicites de type. C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2024-05-06 14:08:44 --> Query error: ERREUR:  la fonction to_tsvector(unknown, tsvector) n'existe pas
LINE 3: WHERE to_tsvector('english', search_vector) @@ to_tsquery('e...
              ^
HINT:  Aucune fonction ne correspond au nom donné et aux types d'arguments.
Vous devez ajouter des conversions explicites de type. - Invalid query: SELECT *
FROM "information"
WHERE to_tsvector('english', search_vector) @@ to_tsquery('english', 'a')
 LIMIT 5
ERROR - 2024-05-06 15:56:08 --> Severity: Warning --> pg_query(): Query failed: ERREUR:  l'opérateur n'existe pas : integer ~~ text
LINE 4: OR  &quot;idutilisateur&quot; LIKE '%a%' ESCAPE '!'
                            ^
HINT:  Aucun opérateur ne correspond au nom donné et aux types d'arguments.
Vous devez ajouter des conversions explicites de type. C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2024-05-06 15:56:08 --> Query error: ERREUR:  l'opérateur n'existe pas : integer ~~ text
LINE 4: OR  "idutilisateur" LIKE '%a%' ESCAPE '!'
                            ^
HINT:  Aucun opérateur ne correspond au nom donné et aux types d'arguments.
Vous devez ajouter des conversions explicites de type. - Invalid query: SELECT *
FROM "information"
WHERE "nom" LIKE '%a%' ESCAPE '!'
OR  "idutilisateur" LIKE '%a%' ESCAPE '!'
ERROR - 2024-05-06 15:57:08 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\BaseProjetEval\application\views\page\Liste.php 28
ERROR - 2024-05-06 15:57:48 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\BaseProjetEval\application\views\page\Liste.php 28
ERROR - 2024-05-06 16:00:18 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\BaseProjetEval\application\views\page\Liste.php 28
ERROR - 2024-05-06 16:01:32 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\BaseProjetEval\application\views\page\Liste.php 28
ERROR - 2024-05-06 16:01:36 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\BaseProjetEval\application\views\page\Liste.php 28
ERROR - 2024-05-06 16:04:35 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\BaseProjetEval\application\views\page\Liste.php 28
ERROR - 2024-05-06 16:05:05 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\BaseProjetEval\application\views\page\Liste.php 28
ERROR - 2024-05-06 16:05:29 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\BaseProjetEval\application\views\page\Liste.php 28
ERROR - 2024-05-06 16:06:31 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\BaseProjetEval\application\views\page\Liste.php 29
ERROR - 2024-05-06 16:07:14 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-05-06 16:07:33 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\BaseProjetEval\application\views\page\Liste.php 29
ERROR - 2024-05-06 16:07:58 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\BaseProjetEval\application\views\page\Liste.php 29
ERROR - 2024-05-06 16:12:24 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\BaseProjetEval\application\views\page\Liste.php 29
ERROR - 2024-05-06 16:12:47 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\BaseProjetEval\application\views\page\Liste.php 29
ERROR - 2024-05-06 16:13:11 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\BaseProjetEval\application\views\page\Liste.php 29
ERROR - 2024-05-06 16:13:26 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\BaseProjetEval\application\views\page\Liste.php 29
ERROR - 2024-05-06 16:14:38 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-05-06 16:14:56 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\BaseProjetEval\application\views\page\Liste.php 29
ERROR - 2024-05-06 16:15:29 --> Severity: error --> Exception: var_dump() expects at least 1 argument, 0 given C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 42
ERROR - 2024-05-06 16:15:58 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\BaseProjetEval\application\views\page\Liste.php 28
ERROR - 2024-05-06 16:15:59 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 16:15:59 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 16:16:23 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\BaseProjetEval\application\views\page\Liste.php 28
ERROR - 2024-05-06 16:18:07 --> Severity: error --> Exception: count(): Argument #1 ($value) must be of type Countable|array, null given C:\xampp\htdocs\S6\BaseProjetEval\application\views\page\Liste.php 28
ERROR - 2024-05-06 16:18:07 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php:42) C:\xampp\htdocs\S6\BaseProjetEval\system\core\Common.php 573
ERROR - 2024-05-06 16:18:40 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 16:18:40 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 16:23:34 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 16:23:34 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 16:24:14 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 16:24:14 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 16:24:54 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 16:24:54 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 16:25:27 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 16:25:27 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 16:25:45 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 16:25:45 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 16:26:07 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 16:26:07 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 16:27:32 --> Severity: Warning --> pg_query(): Query failed: ERREUR:  syntaxe en entrée invalide pour le type double precision : « iza »
LINE 5: OR &quot;age&quot; = 'iza'
                   ^ C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2024-05-06 16:27:32 --> Query error: ERREUR:  syntaxe en entrée invalide pour le type double precision : « iza »
LINE 5: OR "age" = 'iza'
                   ^ - Invalid query: SELECT *
FROM "information"
WHERE "nom" LIKE '%iza%' ESCAPE '!'
OR  "image" LIKE '%iza%' ESCAPE '!'
OR "age" = 'iza'
 LIMIT 5
ERROR - 2024-05-06 16:28:46 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 16:28:46 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 16:29:30 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 16:29:30 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 16:31:05 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 16:31:05 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 16:38:39 --> Severity: Warning --> Undefined variable $text C:\xampp\htdocs\S6\BaseProjetEval\application\controllers\ListeController.php 38
ERROR - 2024-05-06 16:38:39 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 47
ERROR - 2024-05-06 16:38:39 --> Severity: Warning --> Undefined variable $limit C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 49
ERROR - 2024-05-06 16:38:39 --> Severity: Warning --> Undefined variable $offset C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 49
ERROR - 2024-05-06 16:39:00 --> Severity: Warning --> Undefined variable $limit C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 49
ERROR - 2024-05-06 16:39:00 --> Severity: Warning --> Undefined variable $offset C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 49
ERROR - 2024-05-06 16:39:00 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 16:39:00 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 16:51:55 --> 404 Page Not Found: Assets/css
ERROR - 2024-05-06 17:00:34 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 47
ERROR - 2024-05-06 17:00:34 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 34
ERROR - 2024-05-06 17:00:48 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 47
ERROR - 2024-05-06 17:00:48 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 34
ERROR - 2024-05-06 19:08:46 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-05-06 19:09:50 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 47
ERROR - 2024-05-06 19:09:50 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 34
ERROR - 2024-05-06 19:09:50 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 19:09:50 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 19:09:59 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 47
ERROR - 2024-05-06 19:09:59 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 34
ERROR - 2024-05-06 19:10:08 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 47
ERROR - 2024-05-06 19:10:08 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 34
ERROR - 2024-05-06 19:21:01 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 47
ERROR - 2024-05-06 19:21:01 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 34
ERROR - 2024-05-06 19:21:07 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 47
ERROR - 2024-05-06 19:21:07 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 34
ERROR - 2024-05-06 19:25:44 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 47
ERROR - 2024-05-06 19:25:44 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 34
ERROR - 2024-05-06 19:25:45 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 19:25:46 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 19:26:00 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 47
ERROR - 2024-05-06 19:26:00 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 34
ERROR - 2024-05-06 19:26:34 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 47
ERROR - 2024-05-06 19:26:34 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 34
ERROR - 2024-05-06 19:26:35 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 19:26:35 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 19:26:45 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 47
ERROR - 2024-05-06 19:26:45 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 34
ERROR - 2024-05-06 19:28:12 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 47
ERROR - 2024-05-06 19:28:12 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 34
ERROR - 2024-05-06 19:28:13 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 19:28:13 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 19:28:29 --> Severity: Warning --> Undefined variable $texte C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 49
ERROR - 2024-05-06 19:28:29 --> Severity: 8192 --> pg_escape_string(): Passing null to parameter #2 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 309
ERROR - 2024-05-06 19:28:29 --> Severity: Warning --> Undefined variable $texte C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 50
ERROR - 2024-05-06 19:28:29 --> Severity: 8192 --> pg_escape_string(): Passing null to parameter #2 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 309
ERROR - 2024-05-06 19:28:29 --> Severity: Warning --> Undefined variable $texte C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 51
ERROR - 2024-05-06 19:28:29 --> Severity: Warning --> Undefined variable $texte C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 37
ERROR - 2024-05-06 19:28:29 --> Severity: 8192 --> pg_escape_string(): Passing null to parameter #2 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 309
ERROR - 2024-05-06 19:28:29 --> Severity: Warning --> Undefined variable $texte C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 38
ERROR - 2024-05-06 19:28:29 --> Severity: 8192 --> pg_escape_string(): Passing null to parameter #2 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 309
ERROR - 2024-05-06 19:28:29 --> Severity: Warning --> Undefined variable $texte C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 39
ERROR - 2024-05-06 19:28:30 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 19:28:30 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 19:28:58 --> Severity: 8192 --> pg_escape_string(): Passing null to parameter #2 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 309
ERROR - 2024-05-06 19:28:58 --> Severity: 8192 --> pg_escape_string(): Passing null to parameter #2 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 309
ERROR - 2024-05-06 19:28:58 --> Severity: 8192 --> pg_escape_string(): Passing null to parameter #2 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 309
ERROR - 2024-05-06 19:28:58 --> Severity: 8192 --> pg_escape_string(): Passing null to parameter #2 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 309
ERROR - 2024-05-06 19:29:00 --> Severity: 8192 --> pg_escape_string(): Passing null to parameter #2 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 309
ERROR - 2024-05-06 19:29:00 --> Severity: 8192 --> pg_escape_string(): Passing null to parameter #2 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 309
ERROR - 2024-05-06 19:29:00 --> Severity: 8192 --> pg_escape_string(): Passing null to parameter #2 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 309
ERROR - 2024-05-06 19:29:00 --> Severity: 8192 --> pg_escape_string(): Passing null to parameter #2 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 309
ERROR - 2024-05-06 19:29:02 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 19:29:02 --> 404 Page Not Found: Assets/images
ERROR - 2024-05-06 19:31:16 --> Severity: 8192 --> pg_escape_string(): Passing null to parameter #2 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 309
ERROR - 2024-05-06 19:31:16 --> Severity: 8192 --> pg_escape_string(): Passing null to parameter #2 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 309
ERROR - 2024-05-06 19:31:16 --> Severity: 8192 --> pg_escape_string(): Passing null to parameter #2 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 309
ERROR - 2024-05-06 19:31:16 --> Severity: 8192 --> pg_escape_string(): Passing null to parameter #2 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\system\database\drivers\postgre\postgre_driver.php 309
ERROR - 2024-05-06 19:32:03 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 47
ERROR - 2024-05-06 19:32:03 --> Severity: 8192 --> trim(): Passing null to parameter #1 ($string) of type string is deprecated C:\xampp\htdocs\S6\BaseProjetEval\application\models\ListeModel.php 34
ERROR - 2024-05-06 19:42:19 --> Severity: Warning --> Undefined variable $textearechercher C:\xampp\htdocs\S6\BaseProjetEval\application\views\page\Liste.php 5
ERROR - 2024-05-06 21:57:55 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
