<?php

class MemberView
{
  public function render($data)
  {
    $dataMember = null;

    foreach ($data as $val) {
      $id = $val['member_id'];
      $name = $val['member_name'];
      $email = $val['member_email'];
      $phone = $val['member_phone'];
      $join_date = $val['member_join_date'];
      $sport_name = $val['sport_name'];
      $team_name = $val['team_name'];

      $dataMember .= "<tr>
                <td>" . $id . "</td>
                <td>" . $name . "</td>
                <td>" . $email . "</td>
                <td>" . $phone . "</td>
                <td>" . $join_date . "</td>
                <td>" . $sport_name . "</td>
                <td>" . $team_name . "</td>";

      $dataMember .= "
                <td>
                  <a href='form.php?id=" . $id . "' class='btn btn-warning' '>Edit</a>
                  <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger' '>Hapus</a>
                </td>";

      $dataMember .= "</tr>";
    }

    $tpl = new Template("templates/index.html");

    $tpl->replace("DATA_TABLE", $dataMember);
    $tpl->write();
  }
  public function renderForm($data)
  {
    $dataSport = null;
    $dataTeam = null;
    $script = null;

    $id = '';
    $name = '';
    $email = '';
    $phone = '';
    $join_date = '';
    $action = 'Create';

    if (!empty($data['member'])) {

      $action = 'Update';
      $val = $data['member'];

      $id = $val['member_id'];
      $name = $val['member_name'];
      $email = $val['member_email'];
      $phone = $val['member_phone'];
      $join_date = $val['member_join_date'];

      $script .= '<script>
      document.getElementById("sport").value = "' . $val['sport_id'] . '";
      document.getElementById("team").value = "' . $val['team_id'] . '";
      </script>';

    }

    foreach ($data['sport'] as $val) {
      list($id, $nama) = $val;
      $dataSport .= "<option value='" . $id . "'>" . $nama . "</option>";
    }

    foreach ($data['team'] as $val) {
      list($id, $nama) = $val;
      $dataTeam .= "<option value='" . $id . "'>" . $nama . "</option>";
    }

    $tpl = new Template("templates/form.html");

    $tpl->replace("ACTION_NAME", $action);
    $tpl->replace("VALUE_NAME", $name);
    $tpl->replace("VALUE_EMAIL", $email);
    $tpl->replace("VALUE_PHONE", $phone);
    $tpl->replace("VALUE_JOIN", $join_date);
    $tpl->replace("SPORT_OPTION", $dataSport);
    $tpl->replace("TEAM_OPTION", $dataTeam);
    $tpl->replace("HTML_SCRIPT", $script);
    $tpl->write();
  }
}
?>