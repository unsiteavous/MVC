<?php
    // lors de la mise en open source, remplacer les infos concernant la base de données.
    
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'cinema');
    define('DB_USER', 'cinema');
    define('DB_PWD', 'cinema');
    define('PREFIXE', 'cine_');
      
    // Si le nom de domaine ne pointe pas vers le dossier public, indiquer le chemin entre le nom de domaine et le dossier public.
    // exemple: /mon-site/public
    define('HOME_URL', '/');
    
    // Ne pas toucher :
    
    define('DB_INITIALIZED', TRUE);