create or replace view v_etape as(
    select  idetape,nometape,etape.idcourse,nomcourse,kilometre,nombrecoureur,rangetape,dateetape
    from etape
    join course
    on etape.idcourse = course.idcourse
);


-- v_coureuretape
create or replace view v_coureuretape as(
    select coureuretape.idetape,idcourse,nometape,kilometre,nombrecoureur,rangetape,dateetape,
    coureuretape.idcoureur,nomcoureur,idgenre,numerodossard,dtn,equipe.idequipe,equipe.nomequipe
    from coureuretape
    join etape
    on etape.idetape = coureuretape.idetape
    join coureur
    on coureur.idcoureur = coureuretape.idcoureur
    join equipe 
    on equipe.idequipe = coureur.idequipe
);

create or replace view v_coureur as(
    select coureur.idcoureur,nomcoureur,coureur.idgenre,genre.nomgenre,numerodossard,dtn,equipe.idequipe,equipe.nomequipe
    from coureur
    join equipe
    on equipe.idequipe = coureur.idequipe
    join genre
    on genre.idgenre = coureur.idgenre
);

create or replace view penalitesansdouble as(
    select idequipe,idetape,sum(temps) as temps
    from penalite
    group by idequipe,idetape
);

CREATE OR REPLACE VIEW v_deroulementcourseChaquePenalite AS (
    SELECT idderoulementcourse,deroulementcourse.idcoureuretape,heuredepart,heurearrive,
    deroulementcourse.duree + COALESCE(EXTRACT(EPOCH FROM temps),0) as duree,
    etape.idetape,nometape,coureur.idcoureur,equipe.idequipe,nomequipe, coureur.nomcoureur ,course.idcourse ,
    course.nomcourse , 
    genre.idgenre , genre.nomgenre , penalite.temps , deroulementcourse.duree as dureesanspenalite
    FROM deroulementcourse
    JOIN coureuretape
    on coureuretape.idcoureuretape = deroulementcourse.idcoureuretape
    JOIN etape
    on etape.idetape = coureuretape.idetape 
    JOIN coureur
    on coureur.idcoureur = coureuretape.idcoureur
    join equipe
    on equipe.idequipe = coureur.idequipe
    join course
    on course.idcourse = etape.idcourse
    join genre 
    on genre.idgenre = coureur.idgenre
    -- -------------------------------------etoooooooo-------------------------------------------
    left join penalitesansdouble penalite
    on penalite.idetape = etape.idetape
    and penalite.idequipe = equipe.idequipe
);

-- totat penalite par equipe
create or replace view totaliteparequipe as(
    select idequipe,idetape, sum(temps) as penalite
    from v_deroulementcourseChaquePenalite
    group by idequipe,idetape
);

-- somme any par penalite
create or replace view v_deroulementcourse as(
    select idderoulementcourse,
    idcoureuretape,heuredepart,heurearrive,
    idetape,nometape,idcoureur,idequipe,nomequipe, nomcoureur ,idcourse ,
    nomcourse ,
    idgenre , nomgenre , temps ,sum(dureesanspenalite) as dureesanspenalite,
    sum(duree) as duree
    from v_deroulementcourseChaquePenalite
    group by idequipe,idetape,idcoureur,idcoureuretape,
    idetape,nometape,idcoureur,idequipe,nomequipe, nomcoureur ,idcourse ,
    nomcourse,idderoulementcourse,heuredepart,heurearrive , idgenre , nomgenre , temps
);


-- classementgeneralparetape
CREATE OR REPLACE VIEW classementgeneralparetape AS (
    WITH ranked_course AS (
        SELECT 
            dc.idderoulementcourse,dc.idcoureuretape,dc.heuredepart,
            dc.heurearrive,dc.duree,ce.idetape,ce.idcoureur,dc.idequipe,dc.nomequipe,
            dc.nomcoureur,dc.idcourse,dc.nomcourse,
            dc.idgenre , dc.nomgenre , dc.temps ,dc.dureesanspenalite,
            DENSE_RANK() OVER (PARTITION BY ce.idetape ORDER BY dc.duree ASC) AS rang
        FROM v_deroulementcourse dc
        JOIN coureuretape ce ON ce.idcoureuretape = dc.idcoureuretape
    )
    SELECT
        rc.idderoulementcourse,rc.idcoureuretape,rc.heuredepart,rc.heurearrive,
        rc.duree,rc.idetape,rc.idcoureur,rc.rang,rc.idequipe,
        rc.nomequipe,rc.nomcoureur,rc.idcourse,rc.nomcourse,
        rc.idgenre , rc.nomgenre , rc.temps ,rc.dureesanspenalite,
        COALESCE(pe.points, 0) AS points
    FROM ranked_course rc
    LEFT JOIN pointsetape pe ON pe.rang = rc.rang   
        -- pointsetape pe ON pe.idcourse = rc.idetape AND pe.rang = rc.rang 
    ORDER by rang
);

-- classement par equipe
create or replace view classementequipe as(
    SELECT 
        idequipe, 
        nomequipe, 
        SUM(points) AS points, 
        DENSE_RANK() OVER (ORDER BY SUM(points) DESC) AS rang 
    FROM 
        classementgeneralparetape
    GROUP BY 
        idequipe, nomequipe
    ORDER BY 
        points DESC
);

-- nombre de coureur dans un etape dans une equipe
create or replace view nombrecoureuretapequipe as(
    select idetape,count(coureur.idcoureur)  as nombrecoureur,idequipe 
    from coureuretape 
    join coureur
    on coureur.idcoureur = coureuretape.idcoureur 
    group by idetape,idequipe
);


-- Vue pour liste coureur par etape + deroulement
create or replace view etapeavectempscoureur as(
    select  deroulementcourse.idderoulementcourse,coureuretape.idcoureuretape,nomcoureur,dateetape,heureetape,
            datearrive,heurearrive,COALESCE(duree,0) as duree,idequipe,
            etape.idetape,etape.nometape ,kilometre,nombrecoureur,rangetape,coureur.idcoureur
    from etape
    join coureuretape
    on coureuretape.idetape = etape.idetape 
    join coureur 
    on coureur.idcoureur = coureuretape.idcoureur
    LEFT join deroulementcourse
    on deroulementcourse.idcoureuretape = coureuretape.idcoureuretape
);

-- coureur avec age et genre
create or replace view v_coureuravecage as(
    select idcoureur,nomcoureur,genre.idgenre,genre.nomgenre,numerodossard,dtn,idequipe,
    EXTRACT(YEAR FROM CURRENT_DATE) - EXTRACT(YEAR FROM dtn) as age
    from coureur
    join genre
    on coureur.idgenre = genre.idgenre  
);

-- V_deroulement avec Categorie 
create or replace view v_deroulementcourseaveccategorie as(
    select idderoulementcourse,idcoureuretape,heuredepart,heurearrive,duree,idetape,
    nometape,v_deroulementcourse.idcoureur,idequipe,nomequipe,nomcoureur,idcourse,nomcourse,
    categorie.idcategorie, nomcategorie
    from v_deroulementcourse
    left join coureurcategorie
    on coureurcategorie.idcoureur = v_deroulementcourse.idcoureur
    left join categorie
    on categorie.idcategorie = coureurcategorie.idcategorie
);

-- Classements equipe par categorie
-- CREATE OR REPLACE VIEW classementparcategorie AS (
--     WITH ranked_course AS (
--         SELECT
--             SUM(dc.duree) AS duree,
--             dc.idcategorie,
--             dc.idequipe,
--             dc.nomequipe,
--             dc.nomcategorie,
--             DENSE_RANK() OVER (PARTITION BY dc.idcategorie ORDER BY SUM(dc.duree) ASC) AS rang
--         FROM
--             v_deroulementcourseaveccategorie dc
--         GROUP BY
--             dc.idcategorie, dc.idequipe, dc.nomequipe,dc.nomcategorie
--     )
--     SELECT
--         rc.rang,
--         rc.duree,
--         rc.idcategorie,
--         rc.idequipe,
--         rc.nomequipe,
--         rc.nomcategorie,
--         COALESCE(pe.points, 0) AS points
--     FROM ranked_course rc
--     LEFT JOIN pointsetape pe ON pe.rang = rc.rang
--     ORDER BY rc.rang
-- );


-- Classements equipe par categorie miaraka amle total ana points par course
CREATE OR REPLACE VIEW ClassementsCategorieSansPoints AS (
    SELECT
        idderoulementcourse,idcoureuretape,heuredepart,heurearrive,duree,idetape,nometape,idcoureur,idequipe,
        nomequipe,nomcoureur,idcourse,nomcourse,idcategorie,nomcategorie,
        DENSE_RANK() OVER (PARTITION BY idetape, idcategorie ORDER BY duree ASC) AS rang
    FROM
        v_deroulementcourseaveccategorie
);

-- donner des points aux classements
CREATE OR REPLACE VIEW RangAvecCategorie AS (
    SELECT
        rc.*,
        COALESCE(pe.points, 0) AS points
        -- SUM(COALESCE(pe.points, 0)) OVER (PARTITION BY rc.idequipe,rc.idcategorie) AS points
    FROM ClassementsCategorieSansPoints rc
    LEFT JOIN pointsetape pe
    ON rc.rang = pe.rang
);

-- par categorie par equipe
CREATE OR REPLACE VIEW classementparcategorie AS (
    select 
        idcategorie,nomcategorie,idequipe,nomequipe,SUM(points) as points, sum(duree) as duree,
        DENSE_RANK() OVER (PARTITION BY idcategorie ORDER BY sum(points) DESC) AS rang 
    from RangAvecCategorie
    group by idcategorie,nomcategorie,idequipe,nomequipe
);


-- penalite
create or replace view v_penalite as(
    select  idpenalite,equipe.idequipe,equipe.nomequipe,etape.idetape,etape.nometape,temps
    from penalite
    join etape
    on etape.idetape = penalite.idetape
    join equipe
    on equipe.idequipe = penalite.idequipe
);





-- alea

create or replace view execo as(
    select rang,idcategorie,count(rang) as nombre
    from classementparcategorie 
    group by rang,idcategorie
);

create or replace view resultatparequipe as(
    select idcoureur,nomcoureur,idequipe,nomequipe,sum(points) as points
    from classementgeneralparetape
    group by idcoureur,nomcoureur,idequipe,nomequipe
    order by points DESC
);