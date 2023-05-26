<?php
class TeamView
{
  public function render($data, $action, $selected)
  {
    $dataTeam = null;
    $title = 'Team';
    $tableName = 'team';
    $sportStatus = '';
    $teamStatus = 'active';

    $selectedId = '';
    $selectedName = '';

    if ($selected != null) {
      $selectedId = $selected['team_id'];
      $selectedName = $selected['team_name'];
    }

    foreach ($data as $val) {
      list($id, $nama) = $val;

      $dataTeam .= "<tr>
                    <td>" . $id . "</td>
                    <td>" . $nama . "</td>
                    <td>
                    <a href='team.php?id_edit=" . $id . "' class='btn btn-warning''>Edit</a>
                    <a href='team.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                    </td>
                    </tr>";
    }

    $tpl = new Template("templates/table.html");
    $tpl->replace("MAIN_TITLE", $title);
    $tpl->replace("TABLE_NAME", $tableName);
    $tpl->replace("SPORT_STATUS", $sportStatus);
    $tpl->replace("TEAM_STATUS", $teamStatus);
    $tpl->replace("NEXT_ACTION", $action);
    $tpl->replace("SELECTED_ID", $selectedId);
    $tpl->replace("SELECTED_NAME", $selectedName);
    $tpl->replace("DATA_TABLE", $dataTeam);
    $tpl->write();
  }
}