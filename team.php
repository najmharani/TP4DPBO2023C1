<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Team.controller.php");

$team = new TeamController();

if (isset($_POST['Add'])) {

    $team->add($_POST);

} else if (isset($_POST['Update'])) {

    $team->edit($_POST['fid'], $_POST);

} else if (!empty($_GET['id_hapus'])) {

    $id = $_GET['id_hapus'];
    $team->delete($id);

} else if (!empty($_GET['id_edit'])) {

    $id = $_GET['id_edit'];
    $team->index('Update', $id);

} else {
    $team->index('Add', 0);
}