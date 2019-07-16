<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=mariadb;port=3306;dbname=ttr_hims',
    'username' => 'root',
    'password' => 'docker',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
