<?
include_once 'setting.php';

if (!empty($_GET['do'])) {
    include 'back/' . $_GET['do'] . ".php";
} else {
    to('index.php');
}
