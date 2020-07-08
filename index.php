<?php

require_once './Maze.php';

if (!empty($_GET['s']) && is_numeric($_GET['s'])) {
    if (($_GET['s']+1)%4 == 0 && $_GET['s'] > 0) {
        $m = new Maze((int) $_GET['s']);
        $result = $m->generate();

        echo '<table>';
        foreach ($result as $data_row) {
            echo '<tr>';
            foreach ($data_row as $data_col) {
                if ($data_col) echo '<td>@</td>';
                else echo '<td>&nbsp;</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    } else echo 'angka harus 4n-1';
} else {
    echo '<form method="GET">
        <input type="number" name="s">
        </form>';
}