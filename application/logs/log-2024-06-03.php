<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2024-06-03 07:42:03 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 07:42:13 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 07:42:19 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 07:42:28 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 08:31:02 --> Severity: Warning --> pg_query(): Query failed: ERREUR:  syntaxe en entrée invalide pour le type double precision : « 8,6 »
LINE 1: ...tedepart&quot;, &quot;heuredepart&quot;) VALUES ('Betsirazaina', '8,6', '1'...
                                                             ^ C:\xampp\htdocs\S6\Course\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2024-06-03 08:31:02 --> Query error: ERREUR:  syntaxe en entrée invalide pour le type double precision : « 8,6 »
LINE 1: ...tedepart", "heuredepart") VALUES ('Betsirazaina', '8,6', '1'...
                                                             ^ - Invalid query: INSERT INTO "grandtableetape" ("etape", "longueur", "nbcoureur", "rangetape", "datedepart", "heuredepart") VALUES ('Betsirazaina', '8,6', '1', '1', '01/06/2024', '09:00:00')
ERROR - 2024-06-03 10:18:24 --> Severity: Warning --> pg_query(): Query failed: ERREUR:  la colonne equipe.iequipe n'existe pas
LINE 2: ...LECT DISTINCT nom,genre.idgenre,numerodossard,dtn,equipe.ieq...
                                                             ^
HINT:  Peut-être que vous souhaitiez référencer la colonne « equipe.idequipe ». C:\xampp\htdocs\S6\Course\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2024-06-03 10:18:24 --> Query error: ERREUR:  la colonne equipe.iequipe n'existe pas
LINE 2: ...LECT DISTINCT nom,genre.idgenre,numerodossard,dtn,equipe.ieq...
                                                             ^
HINT:  Peut-être que vous souhaitiez référencer la colonne « equipe.idequipe ». - Invalid query:  INSERT INTO coureur (nomcoureur,idgenre,numerodossard,dtn,idequipe)
                        SELECT DISTINCT nom,genre.idgenre,numerodossard,dtn,equipe.iequipe
                        FROM grandtableresultat
                        join genre 
                        on genre.nomgenre = grandtableresultat.genre
                        join equipe
                        on equipe.nomequipe = grandtableresultat.equipe
                        WHERE NOT EXISTS (
                            SELECT nomcoureur,numerodossard FROM coureur
                            WHERE coureur.nomcoureur = grandtableresultat.nom
                            AND coureur.numerodossard = grandtableresultat.numerodossard
                        )
ERROR - 2024-06-03 10:19:17 --> Severity: Warning --> pg_query(): Query failed: ERREUR:  erreur de syntaxe sur ou près de « arrive »
LINE 2: ...coureuretape,dateetape,heureetape,DATE(arrive),TIME(arrive),
                                                               ^ C:\xampp\htdocs\S6\Course\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2024-06-03 10:19:17 --> Query error: ERREUR:  erreur de syntaxe sur ou près de « arrive »
LINE 2: ...coureuretape,dateetape,heureetape,DATE(arrive),TIME(arrive),
                                                               ^ - Invalid query:  INSERT INTO deroulementcourse (idcoureuretape,datedepart,heuredepart,datearrive,heurearrive,duree)
                        SELECT DISTINCT coureuretape.idcoureuretape,dateetape,heureetape,DATE(arrive),TIME(arrive),
                        EXTRACT(EPOCH FROM (arrive - (dateetape + heureetape)))
                        FROM grandtableresultat
                        join etape
                        on etape.rangetape = grandtableresultat.etape_rang
                        join coureur
                        on coureur.nomcoureur = grandtableresultat.nom
                        join coureuretape
                        on coureuretape.idetape = etape.idetape and coureuretape.idcoureur = coureur.idcoureur 
                        
ERROR - 2024-06-03 10:20:36 --> Severity: Warning --> pg_query(): Query failed: ERREUR:  erreur de syntaxe sur ou près de « arrivee »
LINE 2: ...ureuretape,dateetape,heureetape,DATE(arrivee),TIME(arrivee),
                                                              ^ C:\xampp\htdocs\S6\Course\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2024-06-03 10:20:36 --> Query error: ERREUR:  erreur de syntaxe sur ou près de « arrivee »
LINE 2: ...ureuretape,dateetape,heureetape,DATE(arrivee),TIME(arrivee),
                                                              ^ - Invalid query:  INSERT INTO deroulementcourse (idcoureuretape,datedepart,heuredepart,datearrive,heurearrive,duree)
                        SELECT DISTINCT coureuretape.idcoureuretape,dateetape,heureetape,DATE(arrivee),TIME(arrivee),
                        EXTRACT(EPOCH FROM (arrive - (dateetape + heureetape)))
                        FROM grandtableresultat
                        join etape
                        on etape.rangetape = grandtableresultat.etape_rang
                        join coureur
                        on coureur.nomcoureur = grandtableresultat.nom
                        join coureuretape
                        on coureuretape.idetape = etape.idetape and coureuretape.idcoureur = coureur.idcoureur 
                        
ERROR - 2024-06-03 11:01:56 --> Severity: Warning --> pg_query(): Query failed: ERREUR:  la fonction effacer_donnees_sauf_admin() n'existe pas
LINE 2: FROM effacer_donnees_sauf_admin()
             ^
HINT:  Aucune fonction ne correspond au nom donné et aux types d'arguments.
Vous devez ajouter des conversions explicites de type. C:\xampp\htdocs\S6\Course\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2024-06-03 11:01:56 --> Query error: ERREUR:  la fonction effacer_donnees_sauf_admin() n'existe pas
LINE 2: FROM effacer_donnees_sauf_admin()
             ^
HINT:  Aucune fonction ne correspond au nom donné et aux types d'arguments.
Vous devez ajouter des conversions explicites de type. - Invalid query: SELECT *
FROM effacer_donnees_sauf_admin()
ERROR - 2024-06-03 11:02:46 --> Severity: Warning --> pg_query(): Query failed: ERREUR:  une instruction insert ou update sur la table « deroulementcourse » viole la contrainte de clé
étrangère « deroulementcourse_idcoureuretape_fkey »
DETAIL:  La clé (idcoureuretape)=(1) n'est pas présente dans la table « coureuretape ». C:\xampp\htdocs\S6\Course\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2024-06-03 11:02:46 --> Query error: ERREUR:  une instruction insert ou update sur la table « deroulementcourse » viole la contrainte de clé
étrangère « deroulementcourse_idcoureuretape_fkey »
DETAIL:  La clé (idcoureuretape)=(1) n'est pas présente dans la table « coureuretape ». - Invalid query:  INSERT INTO deroulementcourse (idcoureuretape,datedepart,heuredepart,datearrive,heurearrive,duree)
                        SELECT DISTINCT 1,dateetape,heureetape,DATE(arrive),
                        (EXTRACT(HOUR FROM arrive)::INTEGER || ':' || 
                        EXTRACT(MINUTE FROM arrive)::INTEGER || ':' || 
                        EXTRACT(SECOND FROM arrive)::INTEGER)::TIME AS heurearrivee,
                        EXTRACT(EPOCH FROM (arrive - (dateetape + heureetape)))
                        FROM grandtableresultat
                        join etape
                        on etape.rangetape = grandtableresultat.etape_rang
                        join coureur
                        on coureur.nomcoureur = grandtableresultat.nom
                        join coureuretape
                        on coureuretape.idetape = etape.idetape and coureuretape.idcoureur = coureur.idcoureur 
                        
ERROR - 2024-06-03 11:55:56 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 11:55:58 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 11:56:08 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 11:56:12 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 11:57:14 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 12:03:16 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 12:03:21 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 13:15:00 --> Severity: Warning --> Undefined property: stdClass::$nomcourse C:\xampp\htdocs\S6\Course\application\views\backoffice\accueilBackOffice.php 59
ERROR - 2024-06-03 13:15:00 --> Severity: Warning --> Undefined property: stdClass::$nomcourse C:\xampp\htdocs\S6\Course\application\views\backoffice\accueilBackOffice.php 59
ERROR - 2024-06-03 13:15:00 --> Severity: Warning --> Undefined property: stdClass::$nomcourse C:\xampp\htdocs\S6\Course\application\views\backoffice\accueilBackOffice.php 59
ERROR - 2024-06-03 13:15:00 --> Severity: Warning --> Undefined property: stdClass::$nomcourse C:\xampp\htdocs\S6\Course\application\views\backoffice\accueilBackOffice.php 59
ERROR - 2024-06-03 13:15:00 --> Severity: Warning --> Undefined property: stdClass::$nomcourse C:\xampp\htdocs\S6\Course\application\views\backoffice\accueilBackOffice.php 59
ERROR - 2024-06-03 13:17:00 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 13:17:03 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 13:23:02 --> Severity: error --> Exception: Too few arguments to function ListeEtapeEquipeModel::SelectEtape(), 0 passed in C:\xampp\htdocs\S6\Course\application\controllers\ListeEtapeEquipeController.php on line 17 and exactly 2 expected C:\xampp\htdocs\S6\Course\application\models\ListeEtapeEquipeModel.php 5
ERROR - 2024-06-03 13:24:08 --> Severity: error --> Exception: Too few arguments to function ListeEtapeEquipeModel::SelectSansPagination(), 0 passed in C:\xampp\htdocs\S6\Course\application\controllers\ListeEtapeEquipeController.php on line 17 and exactly 2 expected C:\xampp\htdocs\S6\Course\application\models\ListeEtapeEquipeModel.php 14
ERROR - 2024-06-03 13:32:21 --> Severity: error --> Exception: syntax error, unexpected token "}" C:\xampp\htdocs\S6\Course\application\views\frontoffice\accueilFrontOffice.php 66
ERROR - 2024-06-03 14:05:25 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 14:05:29 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 14:46:27 --> Severity: error --> Exception: Call to undefined function validation_errors() C:\xampp\htdocs\S6\Course\application\views\backoffice\Formulairecategorie.php 24
ERROR - 2024-06-03 14:46:53 --> Severity: error --> Exception: Call to undefined function form_open_multipart() C:\xampp\htdocs\S6\Course\application\views\backoffice\Formulairecategorie.php 24
ERROR - 2024-06-03 14:47:04 --> Severity: error --> Exception: Call to undefined function form_open_multipart() C:\xampp\htdocs\S6\Course\application\views\backoffice\Formulairecategorie.php 24
ERROR - 2024-06-03 14:47:05 --> Severity: error --> Exception: Call to undefined function form_open_multipart() C:\xampp\htdocs\S6\Course\application\views\backoffice\Formulairecategorie.php 24
ERROR - 2024-06-03 14:47:05 --> Severity: error --> Exception: Call to undefined function form_open_multipart() C:\xampp\htdocs\S6\Course\application\views\backoffice\Formulairecategorie.php 24
ERROR - 2024-06-03 14:47:06 --> Severity: error --> Exception: Call to undefined function form_open_multipart() C:\xampp\htdocs\S6\Course\application\views\backoffice\Formulairecategorie.php 24
ERROR - 2024-06-03 14:47:06 --> Severity: error --> Exception: Call to undefined function form_open_multipart() C:\xampp\htdocs\S6\Course\application\views\backoffice\Formulairecategorie.php 24
ERROR - 2024-06-03 14:47:06 --> Severity: error --> Exception: Call to undefined function form_open_multipart() C:\xampp\htdocs\S6\Course\application\views\backoffice\Formulairecategorie.php 24
ERROR - 2024-06-03 14:51:46 --> Severity: error --> Exception: Call to undefined function form_open_multipart() C:\xampp\htdocs\S6\Course\application\views\backoffice\Formulairecategorie.php 24
ERROR - 2024-06-03 14:53:32 --> Severity: error --> Exception: Call to undefined function form_open_multipart() C:\xampp\htdocs\S6\Course\application\views\backoffice\Formulairecategorie.php 24
ERROR - 2024-06-03 15:22:43 --> Severity: error --> Exception: Too few arguments to function CategorieModel::SelectCoureurAvecAge(), 0 passed in C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php on line 33 and exactly 1 expected C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 13
ERROR - 2024-06-03 15:23:23 --> Severity: error --> Exception: Too few arguments to function CategorieModel::SelectCategorie(), 0 passed in C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php on line 34 and exactly 1 expected C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 5
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:41 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:42 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:42 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:42 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:42 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:42 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:42 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:42 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:42 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:42 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:42 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:42 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:42 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:42 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:42 --> Severity: Warning --> Undefined variable $age C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 41
ERROR - 2024-06-03 15:23:42 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:23:42 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> Undefined variable $listecoureur C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:24:14 --> Severity: Warning --> foreach() argument must be of type array|object, null given C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 22
ERROR - 2024-06-03 15:28:47 --> Severity: error --> Exception: Unsupported operand types: string + string C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 37
ERROR - 2024-06-03 15:29:07 --> Severity: error --> Exception: Unsupported operand types: string + string C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 37
ERROR - 2024-06-03 15:30:22 --> Severity: error --> Exception: Unsupported operand types: string + string C:\xampp\htdocs\S6\Course\application\models\CategorieModel.php 37
ERROR - 2024-06-03 15:56:49 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 15:56:52 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 15:58:06 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 15:59:13 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 16:05:59 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 16:06:03 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 16:14:56 --> Severity: Warning --> pg_query(): Query failed: ERREUR:  la relation « idetape » n'existe pas
LINE 2: FROM &quot;etape&quot;, &quot;idetape&quot;
                      ^ C:\xampp\htdocs\S6\Course\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2024-06-03 16:14:56 --> Query error: ERREUR:  la relation « idetape » n'existe pas
LINE 2: FROM "etape", "idetape"
                      ^ - Invalid query: SELECT *
FROM "etape", "idetape"
ERROR - 2024-06-03 16:25:57 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 16:40:09 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 16:40:13 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 17:46:05 --> Severity: Warning --> Undefined variable $Etape C:\xampp\htdocs\S6\Course\application\views\classement\ClassementParEtape.php 10
ERROR - 2024-06-03 17:46:05 --> Severity: Warning --> Attempt to read property "nometape" on null C:\xampp\htdocs\S6\Course\application\views\classement\ClassementParEtape.php 10
ERROR - 2024-06-03 17:46:05 --> Severity: Warning --> Undefined variable $Etape C:\xampp\htdocs\S6\Course\application\views\classement\ClassementParEtape.php 10
ERROR - 2024-06-03 17:46:05 --> Severity: Warning --> Attempt to read property "kilometre" on null C:\xampp\htdocs\S6\Course\application\views\classement\ClassementParEtape.php 10
ERROR - 2024-06-03 17:46:05 --> Severity: Warning --> Undefined variable $Etape C:\xampp\htdocs\S6\Course\application\views\classement\ClassementParEtape.php 10
ERROR - 2024-06-03 17:46:05 --> Severity: Warning --> Attempt to read property "rangetape" on null C:\xampp\htdocs\S6\Course\application\views\classement\ClassementParEtape.php 10
ERROR - 2024-06-03 17:46:23 --> Severity: Warning --> Undefined variable $Etape C:\xampp\htdocs\S6\Course\application\views\classement\ClassementParEtape.php 10
ERROR - 2024-06-03 17:46:23 --> Severity: Warning --> Attempt to read property "nometape" on null C:\xampp\htdocs\S6\Course\application\views\classement\ClassementParEtape.php 10
ERROR - 2024-06-03 17:46:23 --> Severity: Warning --> Undefined variable $Etape C:\xampp\htdocs\S6\Course\application\views\classement\ClassementParEtape.php 10
ERROR - 2024-06-03 17:46:23 --> Severity: Warning --> Attempt to read property "kilometre" on null C:\xampp\htdocs\S6\Course\application\views\classement\ClassementParEtape.php 10
ERROR - 2024-06-03 17:46:23 --> Severity: Warning --> Undefined variable $Etape C:\xampp\htdocs\S6\Course\application\views\classement\ClassementParEtape.php 10
ERROR - 2024-06-03 17:46:23 --> Severity: Warning --> Attempt to read property "rangetape" on null C:\xampp\htdocs\S6\Course\application\views\classement\ClassementParEtape.php 10
ERROR - 2024-06-03 19:04:32 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 19:05:05 --> Severity: error --> Exception: Too few arguments to function ClassementModel::Selectclassementparcategorie(), 0 passed in C:\xampp\htdocs\S6\Course\application\controllers\ClassementController.php on line 31 and exactly 1 expected C:\xampp\htdocs\S6\Course\application\models\ClassementModel.php 31
ERROR - 2024-06-03 19:10:01 --> Severity: Warning --> Undefined variable $etape C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 41
ERROR - 2024-06-03 19:10:01 --> Severity: Warning --> Attempt to read property "nometape" on null C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 41
ERROR - 2024-06-03 19:10:01 --> Severity: Warning --> Undefined variable $etape C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 41
ERROR - 2024-06-03 19:10:01 --> Severity: Warning --> Attempt to read property "kilometre" on null C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 41
ERROR - 2024-06-03 19:10:01 --> Severity: Warning --> Undefined variable $etape C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 41
ERROR - 2024-06-03 19:10:01 --> Severity: Warning --> Attempt to read property "nombrecoureur" on null C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 41
ERROR - 2024-06-03 19:10:01 --> Severity: Warning --> Undefined variable $etape C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 41
ERROR - 2024-06-03 19:10:01 --> Severity: Warning --> Attempt to read property "nometape" on null C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 41
ERROR - 2024-06-03 19:10:01 --> Severity: Warning --> Undefined variable $etape C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 41
ERROR - 2024-06-03 19:10:01 --> Severity: Warning --> Attempt to read property "kilometre" on null C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 41
ERROR - 2024-06-03 19:10:01 --> Severity: Warning --> Undefined variable $etape C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 41
ERROR - 2024-06-03 19:10:01 --> Severity: Warning --> Attempt to read property "nombrecoureur" on null C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 41
ERROR - 2024-06-03 19:10:01 --> Severity: Warning --> Undefined variable $etape C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 41
ERROR - 2024-06-03 19:10:01 --> Severity: Warning --> Attempt to read property "nometape" on null C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 41
ERROR - 2024-06-03 19:10:01 --> Severity: Warning --> Undefined variable $etape C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 41
ERROR - 2024-06-03 19:10:01 --> Severity: Warning --> Attempt to read property "kilometre" on null C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 41
ERROR - 2024-06-03 19:10:01 --> Severity: Warning --> Undefined variable $etape C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 41
ERROR - 2024-06-03 19:10:01 --> Severity: Warning --> Attempt to read property "nombrecoureur" on null C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 41
ERROR - 2024-06-03 19:19:54 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 19:20:04 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 19:26:53 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 19:29:49 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 19:29:55 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 19:51:14 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 19:51:17 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 20:11:05 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 20:11:10 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 20:13:52 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 20:13:55 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
ERROR - 2024-06-03 21:10:07 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:10:07 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:10:07 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:10:07 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:10:07 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:10:07 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:10:07 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:10:07 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:10:07 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:10:07 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:10:07 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:10:07 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:33:33 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:50 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:52 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:53 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$rang C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 57
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$points C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 66
ERROR - 2024-06-03 21:34:54 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:56:10 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:56:10 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:56:10 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:56:10 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 21:56:10 --> Severity: Warning --> Undefined property: stdClass::$duree C:\xampp\htdocs\S6\Course\application\views\classement\classementCategorie.php 69
ERROR - 2024-06-03 22:52:29 --> 404 Page Not Found: Assets/bootstrap-5.0.2-dist
