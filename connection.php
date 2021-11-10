<?php
    $Connect = pg_connect("postgres://symwisvhvnxipq:e3d493a2db5ef2e25e255d9fd0527625ff687ccd119e9c7ddf7b3e6eb67df34e@ec2-44-193-182-0.compute-1.amazonaws.com:5432/d1oqshbn724nm");
	//$Connect =pg_connect("host=localhost port=5432 dbname=postgres pass=123456")
	if (!$Connect) {
        die("Connection failed");
    }
?>