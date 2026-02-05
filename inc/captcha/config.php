
<?php
declare(strict_types=1);

// Use environment variables for sensitive credentials
$dbName = getenv('CAPTCHA_DB_NAME') ?: 'database_name';
$dbHost = getenv('CAPTCHA_DB_HOST') ?: 'localhost';
$dbUser = getenv('CAPTCHA_DB_USER') ?: 'database_user';
$dbPass = getenv('CAPTCHA_DB_PASS') ?: 'database_password';

$dsn = "mysql:dbname={$dbName};host={$dbHost}";
$pdo = new PDO($dsn, $dbUser, $dbPass, [
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4',
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES => false,
]);

// Captcha expiration:
$expires_in = 120; // 120 seconds

// Captcha dimensions:
$width = 250;
$height = 80;

// Captcha length:
$length = 6;
