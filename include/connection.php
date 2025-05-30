<?php
$host = getenv("aws-0-eu-central-1.pooler.supabase.com");
$port = getenv("6543");
$dbname = getenv("postgres");
$user = getenv("postgres.cofvbrhcjspfjtbqundb");
$password = getenv("yiDhcmXqZ8rlySx9");

// Debug (optional, remove in production)
if (!$host || !$port || !$dbname || !$user || !$password) {
    die("One or more environment variables are not set properly.");
}

// Build connection string
$connStr = "host=$host port=$port dbname=$dbname user=$user password=$password sslmode=require";

// Connect
$conn = pg_connect($connStr);

if ($conn) {
    echo "Connected to Supabase PostgreSQL successfully!";
} else {
    die("Connection failed: " . pg_last_error());
}
?>
