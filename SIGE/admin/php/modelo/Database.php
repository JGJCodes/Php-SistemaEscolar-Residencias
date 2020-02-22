<?php	

    $DB_USER = 'res';
    $DB_PASSWORD = '';
    $DB_HOST = 'localhost';
    $DB_NAME = 'residencias';

    $dbc =  mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME) OR die('Could not connect to MySQL:' . mysqli_connect_error());

    mysqli_set_charset($dbc, 'utf8');
?>