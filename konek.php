<?php
date_default_timezone_set('Asia/Jakarta');
$hostname = 'localhost';
$username = 'root';
$password = 'root';
$database = 'surat';

$konek = mysqli_connect($hostname, $username, $password, $database);
$url_index = "http://localhost:8888/surat18022024/";
