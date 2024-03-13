<?php
    // lors de la mise en open source, remplacer les infos concernant la base de données.
    
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'cinema');
    define('DB_USER', 'cinema');
    define('DB_PWD', 'cinema');
    define('PREFIXE', 'cine_');
    
    // Ne pas toucher :
    
    define('DB_INITIALIZED', TRUE);