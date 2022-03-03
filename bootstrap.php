<?php
/**
*
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @author sergio vera jurado<a19vejuse@iesgrancapitan.org>
*
*/
require "vendor/autoload.php";
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
define("DB_HOST",$_ENV["DBHOST"]);
define("DB_USER",$_ENV["DBUSER"]);
define("DB_PASS",$_ENV["DBPASS"]);
define("DB_NAME",$_ENV["DBNAME"]);
define("DB_PORT",$_ENV["DBPORT"]);
define("KEY",$_ENV["KEY"]);
?>