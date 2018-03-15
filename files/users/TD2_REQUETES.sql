


--Permet de réaliser la recherche dans une table des personnes nées aujourd'hui--

SELECT nom, DAY(datenaissance) AS Jour, MONTH(datenaissance) as Mois, YEAR(datenaissance) as Annee
FROM Contact
WHERE DAY(datenaissance) = DAY(CURDATE()) AND MONTH (datenaissance) = MONTH (CURDATE())

--Donne la liste des contacts, avec le nom de leur groupe

SELECT Contact.nom, Groupe.nom
FROM `Contact`
INNER JOIN Groupe ON Contact.idGroupe=Groupe.id

--Donne la liste des noms des membres du groupe 'amis'.

SELECT Contact.nom, Groupe.nom, Contact.datenaissance
FROM `Contact`
INNER JOIN Groupe ON Contact.idGroupe=Groupe.id
WHERE Groupe.nom='Amis'

--Donne, classés du plus jeune au plus âgé, les membres du groupe 'Amis'
SELECT Contact.nom, Groupe.nom, Contact.datenaissance
FROM `Contact`
INNER JOIN Groupe ON Contact.idGroupe=Groupe.id
WHERE Groupe.nom='Amis'ORDER BY datenaissance DESC

--Donne la liste des terminaux des membres du groupe 'boulot'.
SELECT Materiel.navigateur, Materiel.nomterminal
FROM Materiel
INNER JOIN Contact ON Contact.id= Materiel.idcontact
INNER JOIN Groupe ON Groupe.id=Contact.idGroupe
WHERE Groupe.nom = "Taff"

--Donner la liste des contacts et le nom du groupe, appartenant au  même groupe que 'Pompom'.

SELECT Contact.nom, Groupe.nom
FROM Contact
INNER JOIN Groupe ON Contact.idGroupe= Groupe.id
WHERE Groupe.nom =(
                    SELECT Groupe.nom
                    FROM Groupe
                    INNER JOIN Contact ON Contact.idGroupe= Groupe.id
                    WHERE Contact.nom= 'Pompom')

--CENTRES D’INTÉRÊTS

--On veut ajouter pour chacun des contacts l'information suivante : ses
--   centres d’intérêts. Un centre d’intérêt est caractérisé simplement par un
--  nom : 'cinéma', 'cuisine', etc. Chaque contact peut avoir un nombre
--   quelconque de centres d'intérets, et chaque centre d’intérêt est partagé
--   par plusieurs contacts. Modifier la base.


--   Afficher pour chaque contact les noms de ses centre d’intérêts.

SELECT Contact.nom, InteretContact.idInteret
FROM Contact
INNER JOIN InteretContact ON Contact.id=InteretContact.idContact
INNER JOIN Hobbies ON InteretContact.idInteret= Hobbies.id


--  Afficher les contacts du groupe 'famille' ayant 'Cinéma' comme centre d'interet.

SELECT Contact.nom, Hobbies.interets
FROM Contact
INNER JOIN InteretContact ON Contact.id=InteretContact.idContact
INNER JOIN Hobbies ON InteretContact.idInteret= Hobbies.id
INNER JOIN Groupe ON Contact.idGroupe= Groupe.id
WHERE Hobbies.interets ='cinema' AND Groupe.nom='famille'


--Afficher les noms des contacts ayant au moins un centre d'interet en
-- commun avec 'Pompom', ainsi que le nom du centre d'interet commun
--!!!!PAS FINI!!!!
SELECT Contact.nom, Hobbies.interets
FROM Contact
INNER JOIN InteretContact ON Contact.id=InteretContact.idContact
INNER JOIN Hobbies ON InteretContact.idInteret= Hobbies.id
WHERE Hobbies.interets =(
                    SELECT Hobbies.interets
                    FROM Hobbies
                    INNER JOIN InteretContact ON InteretContact.idInteret= Hobbies.id
                    INNER JOIN InteretContact ON InteretContact.idInteret= Hobbies.id
                    WHERE Contact.nom= 'Pompom')


--Afficher le nombre de contacts de la base
SELECT COUNT(nom) FROM Contact

--Afficher le nombre de centre d'interets enregistres dans la base
SELECT COUNT(interets) FROM Hobbies

--Afficher le nombre de centres d'interets de Pompom
SELECT COUNT(interets), Contact.nom
FROM Contact
INNER JOIN InteretContact ON Contact.id=InteretContact.idContact
INNER JOIN Hobbies ON InteretContact.idInteret= Hobbies.id
WHERE Contact.nom='Pompom'

--Afficher le nombre de contacts du groupe 'famille'.
--Affiche que 1 membre alors qu'il y en a 2!!!

SELECT Contact.nom,COUNT(Groupe.nom)
FROM Contact
INNER JOIN Groupe ON Contact.id=Groupe.id
WHERE Groupe.nom='famille'

--Afficher le nombres de contacts partageant le centre d'interet 'Cinéma'
SELECT COUNT(Contact.nom)
FROM Contact
INNER JOIN InteretContact ON Contact.id=InteretContact.idContact
INNER JOIN Hobbies ON InteretContact.idInteret= Hobbies.id
WHERE Hobbies.interets='cinema'

--Afficher le nombre de centres d'interets de chaque utilisateur.

SELECT Contact.nom, COUNT(Hobbies.interets)
FROM Contact
INNER JOIN InteretContact ON Contact.id=InteretContact.idContact
INNER JOIN Hobbies ON InteretContact.idInteret= Hobbies.id
WHERE Hobbies.id
GROUP BY Contact.nom

--Afficher le nombre de centre d'interets moyen des contacts.
SELECT Contact.nom, AVG(Hobbies.id)
FROM Contact
INNER JOIN InteretContact ON Contact.id=InteretContact.idContact
INNER JOIN Hobbies ON InteretContact.idInteret= Hobbies.id
WHERE Hobbies.id
GROUP BY Contact.nom
