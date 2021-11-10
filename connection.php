<?php
    $conn = pg_connect("postgres://gmpcstrqfaogmy:d0a56b7680988fcc7e23d4ce63fa22ca94fa9747cb3c5a157cd4a4d47e74c621@ec2-35-168-65-132.compute-1.amazonaws.com:5432/dbdncl8acmh72r");
	//$Connect =pg_connect("host=localhost port=5432 dbname=postgres pass=123456")
	if (!$conn) {
        die("Connection failed");
    }
?>