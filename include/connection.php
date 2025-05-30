<?php
// Parse database URL from environment variable
$dbUrl = getenv("DATABASE_URL");
if (!$dbUrl) {
    die("DATABASE_URL not set in environment.");
}

$dbParts = parse_url($dbUrl);

// Extract credentials
$host = $dbParts["ep-lively-butterfly-a6xxbzff.us-west-2.aws.neon.tech"];
$port = $dbParts["5432"] ?? 5432;
$user = $dbParts["neondb_owner"];
$password = $dbParts["npg_70EgmMDWkzef"];
$dbname = ltrim($dbParts["neondb"], '/');

// Connect to PostgreSQL
$connStr = "host=$host port=$port dbname=$dbname user=$user password=$password sslmode=require";
$conn = pg_connect($connStr);

if ($conn) {
    echo "Connected to Neon PostgreSQL successfully!";
} else {
    die("Connection failed: " . pg_last_error());
}
?>
