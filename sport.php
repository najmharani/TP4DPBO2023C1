<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Sport.controller.php");

$sport = new SportController();

if (isset($_POST['Add'])) {

    $sport->add($_POST);

} else if (isset($_POST['Update'])) {

    $sport->edit($_POST['fid'], $_POST);

} else if (!empty($_GET['id_hapus'])) {

    $id = $_GET['id_hapus'];
    $sport->delete($id);

} else if (!empty($_GET['id_edit'])) {

    $id = $_GET['id_edit'];
    $sport->index('Update', $id);

} else {
    $sport->index('Add', 0);
}