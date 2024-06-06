CREATE or REPLACE view doublonscoureurs AS(
        select distinct numerodossard,nom from grandtableresultat
);

CREATE or REPLACE view nombredoublons AS(
        select count(*) as nombre
        ,numerodossard from doublonscoureurs 
        group by numerodossard
);