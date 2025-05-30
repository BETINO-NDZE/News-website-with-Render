<?php
$host = getenv("aws-0-eu-central-1.pooler.supabase.com");
$port = getenv("6543");
$dbname = getenv("postgres");
$user = getenv("postgres.cofvbrhcjspfjtbqundb");
$password = getenv("VfRQps1SW4XWnVe5");

$connStr = "host=$host port=$port dbname=$dbname user=$user password=$password sslmode=require";
$conn = pg_connect($connStr);

if ($conn) {
    echo "Connected to Supabase PostgreSQL successfully!";
} else {
    die("Connection failed: " . pg_last_error());
}
?>
