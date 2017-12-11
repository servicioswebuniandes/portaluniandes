<?php
include('../../../../../default/settings.php');

$db = new PDO('mysql:host='.$databases['default']['default']['host'].';dbname='.$databases['default']['default']['database'], $databases['default']['default']['username'], $databases['default']['default']['password'],array(PDO::MYSQL_ATTR_LOCAL_INFILE => 'TRUE', PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

