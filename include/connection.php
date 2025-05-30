<?php
// Use Railway environment variables (or hardcode for testing)
$host = getenv("postgres.railway.internal") ?: "containers-us-west-1.railway.app";
$port = getenv("5432") ?: "1234"; // replace with your actual port
$dbname = getenv("railway") ?: "railway";
$user = getenv("postgres") ?: "postgres";
$password = getenv("PGPASSWORD") ?: "LeSCgoEGVGnWHrrbcqiVVmXZgWsMRyqk";

// PostgreSQL connection string
$connStr = "host=$host port=$port dbname=$dbname user=$user password=$password sslmode=require";
$conn = pg_connect($connStr);

if ($conn) {
    echo "Connected to Railway PostgreSQL successfully!";
} else {
    die("Connection failed: " . pg_last_error());
}
?>
