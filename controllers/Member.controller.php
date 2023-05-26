<?php
include_once("conf.php");
include_once("models/Member.class.php");
include_once("models/Team.class.php");
include_once("models/Sport.class.php");
include_once("views/Member.view.php");

class MemberController
{
  private $member;
  private $team;
  private $sport;

  function __construct()
  {
    $this->member = new Member(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->sport = new Sport(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->team = new Team(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index()
  {
    $this->member->open();
    $this->member->getMember();

    $data = array();

    while ($row = $this->member->getResult()) {
      array_push($data, $row);
    }

    $this->member->close();

    $view = new MemberView();
    $view->render($data);
  }

  public function form($id)
  {
    $this->member->open();
    $this->sport->open();
    $this->team->open();
    $this->member->getMemberById($id);
    $this->sport->getSport();
    $this->team->getTeam();

    $data = array(
      'member' => $this->member->getResult(),
      'sport' => array(),
      'team' => array()
    );

    while ($row = $this->sport->getResult()) {
      array_push($data['sport'], $row);
    }

    while ($row = $this->team->getResult()) {
      array_push($data['team'], $row);
    }
    $this->member->close();
    $this->sport->close();
    $this->team->close();

    $view = new MemberView();
    $view->renderForm($data);
  }

  function add($data)
  {
    $this->member->open();
    $this->member->add($data);
    $this->member->close();

    header("location:index.php");
  }

  function edit($id, $data)
  {
    $this->member->open();
    $this->member->update($id, $data);
    $this->member->close();

    header("location:index.php");
  }

  function delete($id)
  {
    $this->member->open();
    $this->member->delete($id);
    $this->member->close();

    header("location:index.php");
  }

}