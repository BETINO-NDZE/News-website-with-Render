<?php
$host = 'db.cofvbrhcjspfjtbqundb.supabase.co';
$port = '5432';
$dbname = 'postgres';
$user = 'postgres'; // copy from your pooler connection string
$password = 'VfRQps1SW4XWnVe5';    // your Supabase password

// PostgreSQL connection string
$connStr = "host=$host port=$port dbname=$dbname user=$user password=$password sslmode=require";
$conn = pg_connect($connStr);

if ($conn) {
    echo "Connected to Supabase PostgreSQL successfully!";
} else {
    die("Connection failed: " . pg_last_error());
}
?>
