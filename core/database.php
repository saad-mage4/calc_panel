<?php
session_start();
error_reporting(0);
$host = $_SERVER['HTTP_HOST'];
if ($host == 'localhost') {
    $dirPath = 'calc_panel';
} else {
    $dirPath = '';
}
require_once $_SERVER['DOCUMENT_ROOT'].'/'.$dirPath.'/config.php';
require_once 'functions.php';
$db = mysqli_connect(HOST,USER,PWD,DB);
if(isset($_SESSION['user'])) {
    $id = $_SESSION['user'];
    $sql = $db->query("SELECT * FROM `users` WHERE `id`='$id'");
    $data = mysqli_fetch_object($sql);
    $username = $data->username;
    $status = $data->status;
    $role = $data->role;
}