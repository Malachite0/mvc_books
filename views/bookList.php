<?php

if (count($boekenArray) > 0) {
    echo '<table>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Titel</th>';
    echo '<th>Auteur</th>';
    echo '<th>ISBN</th>';
    echo '</tr>';

    foreach ($boekenArray as $boek) {
        echo '<tr>';
        echo '<td>' . $boek->id . '</td>';
        echo '<td>' . $boek->title . '</td>';
        echo '<td>' . $boek->author . '</td>';
        echo '<td>' . $boek->isbn . '</td>';
        echo "<td><a href='?id={$boek->id}'>details</a></td>";
        echo "<td><a href='?verwijder={$boek->id}' onclick=\"return confirm('weet je zeker dat je dit boek wilt delten');\">verwijderen</a></td>";
        echo '</tr>';

    }
    echo '</table>';
}
else{
    echo "<p>geen boeken gevodnen</p>";
}