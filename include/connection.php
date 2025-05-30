<?php
// 
$host = "dpg-d0sjoak9c44c73f7vevg-a";
$port = "5432";
$dbname = "news_portal_db_s0y9";
$user = "news_portal_db_s0y9_user";
$password = "xJgAnCJKCC3aF45xHfCsJn1UGedDoFb3"; // Replace with the actual password from Render

// PostgreSQL connection string
$connStr = "host=$host port=$port dbname=$dbname user=$user password=$password";

// Connect to PostgreSQL
$conn = pg_connect($connStr);

if ($conn) {
    echo "Connected to PostgreSQL on Render successfully!";
} else {
    die("Connection failed: " . pg_last_error());
}
?>
