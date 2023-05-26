<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Member.controller.php");

$member = new MemberController();

if (isset($_POST['submit']) && empty($_GET['id'])) {

    $member->add($_POST);

} else if (isset($_POST['submit']) && !empty($_GET['id'])) {

    $id = $_GET['id'];
    $member->edit($id, $_POST);

}

if (!empty($_GET['id'])) {

    $id = $_GET['id'];
    $member->form($id);

} else {

    $member->form(0);
}