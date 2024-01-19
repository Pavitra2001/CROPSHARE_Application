<?PHP

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');

$database = "cropshare";
$db_found = new mysqli(DB_SERVER, DB_USER, DB_PASS, $database );

?>