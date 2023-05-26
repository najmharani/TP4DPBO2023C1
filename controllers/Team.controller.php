<?php
include_once("conf.php");
include_once("models/Team.class.php");
include_once("views/Team.view.php");

class TeamController
{
  private $team;

  function __construct()
  {
    $this->team = new Team(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index($action, $id)
  {
    $this->team->open();
    $this->team->getTeam();
    $data = array();
    while ($row = $this->team->getResult()) {
      array_push($data, $row);
    }

    $this->team->getTeamById($id);
    $selected = $this->team->getResult();

    $this->team->close();

    $view = new TeamView();
    $view->render($data, $action, $selected);
  }

  function add($data)
  {
    $this->team->open();
    $this->team->add($data);
    $this->team->close();

    header("location:team.php");
  }

  function edit($id, $data)
  {
    $this->team->open();
    $this->team->update($id, $data);
    $this->team->close();

    header("location:team.php");
  }

  function delete($id)
  {
    $this->team->open();
    $this->team->delete($id);
    $this->team->close();

    header("location:team.php");
  }

}