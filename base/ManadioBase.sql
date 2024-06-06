CREATE OR REPLACE FUNCTION effacer_donnees_sauf_admin() RETURNS VOID AS $$
DECLARE
    r RECORD;
BEGIN
    -- Désactiver les déclencheurs sur toutes les tables de la base de données
    FOR r IN (SELECT tablename FROM pg_tables WHERE schemaname = current_schema()) LOOP
        EXECUTE 'ALTER TABLE ' || quote_ident(r.tablename) || ' DISABLE TRIGGER ALL';
    END LOOP;
    
    -- Supprimer toutes les données de toutes les tables, sauf celle de l'utilisateur
    FOR r IN (SELECT tablename FROM pg_tables WHERE schemaname = current_schema()) LOOP
        IF r.tablename <> 'admin' and r.tablename <> 'categorie' and r.tablename <> 'course' THEN
            EXECUTE 'DELETE FROM ' || quote_ident(r.tablename);
        END IF;
    END LOOP;
    
    -- Réactiver les déclencheurs sur toutes les tables de la base de données
    FOR r IN (SELECT tablename FROM pg_tables WHERE schemaname = current_schema()) LOOP
        EXECUTE 'ALTER TABLE ' || quote_ident(r.tablename) || ' ENABLE TRIGGER ALL';
    END LOOP;
END;
$$ LANGUAGE plpgsql;
