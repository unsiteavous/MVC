-- Mettre à jour les enregistrements existants dans la table cine_films
UPDATE `cine_films`
SET NOM = CASE 
            WHEN ID = 1 THEN "Harry Potter et l'ordre du Phénix"
            WHEN ID = 2 THEN "anatomie d'une chute"
            WHEN ID = 3 THEN 'Dune'
            WHEN ID = 4 THEN 'Pocahontas'
            WHEN ID = 5 THEN 'shooter'
            ELSE NOM
          END,
    URL_AFFICHE = CASE 
                    WHEN ID = 1 THEN 'http://images2.fanpop.com/images/photos/6700000/Harry-Potter-3-harry-potter-6761622-1280-1024.jpg'
                    WHEN ID = 2 THEN 'https://www.moncoinnumerique.fr/wp-content/uploads/2024/03/anatomie-dune-chute.jpg'
                    WHEN ID = 3 THEN 'https://www.thespiral.co.uk/wp-content/uploads/2023/02/dunehero.jpg'
                    WHEN ID = 4 THEN 'https://images6.fanpop.com/image/photos/43400000/Pocahontas-disney-princess-43435379-1600-900.jpg'
                    WHEN ID = 5 THEN 'https://i.ytimg.com/vi/ENEF6UyZEVw/maxresdefault.jpg'
                    ELSE URL_AFFICHE
                 END,
    LIEN_TRAILER = CASE 
                     WHEN ID = 1 THEN 'https://www.youtube.com/embed/S8-SXEGMmi4?si=8Kk2WEbX1o8Pfv7_'
                     WHEN ID = 2 THEN 'https://www.youtube.com/embed/yXE17pvrSkY?si=ObRdgvuLKc6LVCmY'
                     WHEN ID = 3 THEN 'https://www.youtube.com/embed/8g18jFHCLXk?si=fYri_ZPIfcgPoj2B'
                     WHEN ID = 4 THEN 'https://www.youtube.com/embed/mryRcoTO4tY?si=R5ZJeko8ZJnwUHCr'
                     WHEN ID = 5 THEN 'https://www.youtube.com/embed/i3A0ptNnC5s?si=_hCQbspl-LhcSpXy'
                     ELSE LIEN_TRAILER
                  END,
    RESUME = CASE 
                WHEN ID = 1 THEN 'un film de sorciers'
                WHEN ID = 2 THEN 'un super film de policier fait par chez nous'
                WHEN ID = 3 THEN 'un super film de science-fiction'
                WHEN ID = 4 THEN 'un disney génial'
                WHEN ID = 5 THEN "Un film d'action"
                ELSE RESUME
             END,
    DUREE = CASE 
                WHEN ID = 1 THEN '02:00:00'
                WHEN ID = 2 THEN '01:30:00'
                WHEN ID = 3 THEN '03:30:00'
                WHEN ID = 4 THEN '03:30:00'
                WHEN ID = 5 THEN '01:30:00'
                ELSE DUREE
             END,
    DATE_SORTIE = CASE 
                WHEN ID = 1 THEN '2000-03-06'
                WHEN ID = 2 THEN '2024-03-06'
                WHEN ID = 3 THEN '2024-05-08'
                WHEN ID = 4 THEN '2001-03-06'
                WHEN ID = 5 THEN '2007-03-06'
                ELSE DATE_SORTIE
             END,
    ID_CLASSIFICATION_AGE_PUBLIC = CASE 
                                        WHEN ID = 1 THEN 1
                                        WHEN ID = 2 THEN 2
                                        WHEN ID = 3 THEN 2
                                        WHEN ID = 4 THEN 1
                                        WHEN ID = 5 THEN 3
                                        ELSE ID_CLASSIFICATION_AGE_PUBLIC
                                    END;
