<?php
define('CONTROLLERS','app/controllers/');
define('MODELS','app/models/');
define('VIEWS','app/views/');
define('CORE','app/core/');
define('BASE_URL','http://200.92.39.106/abc/');
file_exists(CORE."Database.php") or die("No se ha encontrado Database.php");
include CORE."Database.php";

file_exists(CORE."Model.php") or die("No se ha encontrado Model.php");
include CORE."Model.php";