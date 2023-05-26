<?php
include_once("conf.php");
include_once("models/Sport.class.php");
include_once("views/Sport.view.php");

class SportController
{
  private $sport;

  function __construct()
  {
    $this->sport = new Sport(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index($action, $id)
  {
    $this->sport->open();
    $this->sport->getSport();
    $data = array();
    while ($row = $this->sport->getResult()) {
      array_push($data, $row);
    }

    $this->sport->getSportById($id);
    $selected = $this->sport->getResult();

    $this->sport->close();

    $view = new SportView();
    $view->render($data, $action, $selected);
  }

  function add($data)
  {
    $this->sport->open();
    $this->sport->add($data);
    $this->sport->close();

    header("location:sport.php");
  }

  function edit($id, $data)
  {
    $this->sport->open();
    $this->sport->update($id, $data);
    $this->sport->close();

    header("location:sport.php");
  }

  function delete($id)
  {
    $this->sport->open();
    $this->sport->delete($id);
    $this->sport->close();

    header("location:sport.php");
  }

}