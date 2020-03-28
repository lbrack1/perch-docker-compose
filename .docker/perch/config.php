<?php
    define('PERCH_LICENSE_KEY', '${PERCH_LICENSE_KEY}');

    $http_host = getenv('HTTP_HOST');
    switch($http_host)
    {
        case('${LOCAL_DOMAIN}') :
            define("PERCH_DB_USERNAME", '${PERCH_DB_USERNAME}');
            define("PERCH_DB_PASSWORD", '${PERCH_DB_PASSWORD}');
            define("PERCH_DB_SERVER", '${PERCH_DB_SERVER}');
            define("PERCH_DB_DATABASE", '${PERCH_DB_DATABASE}');
            break;

        default :
            define("PERCH_DB_USERNAME", 'dbu396113');
            define("PERCH_DB_PASSWORD", 'Leobrack2018!');
            define("PERCH_DB_SERVER", "db5000286592.hosting-data.io");
            define("PERCH_DB_DATABASE", "dbs279811");
            define("PERCH_SSL", true);
            break;
        }

define('PERCH_EMAIL_FROM', '');
define('PERCH_EMAIL_FROM_NAME', '');

define('PERCH_LOGINPATH','/perch');
define('PERCH_PATH',)
define('PERCH_PATH', str_replace(DIRECTORY_SEPARATOR.'config', '', __DIR__));
define('PERCH_CORE', PERCH_PATH.DIRECTORY_SEPARATOR.'core');
define('PERCH_RESFILEPATH', PERCH_PATH . DIRECTORY_SEPARATOR . 'resources');
define('PERCH_RESPATH', PERCH_LOGINPATH . '/resources');

define('PERCH_HTML5', true);
define('PERCH_SCHEDULE_SECRET', 'giraffe');

