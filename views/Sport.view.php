<?php
class SportView
{
  public function render($data, $action, $selected)
  {
    $dataSport = null;
    $title = 'Sport';
    $tableName = 'sport';
    $sportStatus = 'active';
    $teamStatus = '';

    $selectedId = '';
    $selectedName = '';

    if ($selected != null) {
      $selectedId = $selected['sport_id'];
      $selectedName = $selected['sport_name'];
    }

    foreach ($data as $val) {
      list($id, $nama) = $val;

      $dataSport .= "<tr>
                    <td>" . $id . "</td>
                    <td>" . $nama . "</td>
                    <td>
                    <a href='sport.php?id_edit=" . $id . "' class='btn btn-warning''>Edit</a>
                    <a href='sport.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
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
    $tpl->replace("DATA_TABLE", $dataSport);
    $tpl->write();
  }
}