<?php
public function GenerateFormTable($columnNames, $types, $required, $data, $option = 0, $id = NULL) {

    // Set Diffrent options Create and Update
    if ($option == 0 || $option == "create") {
        $i = 0;
        $openingLines = "<form action='index.php?op=create' method='post' >";

        $closingLines = "<button name='addproduct' value='1' class='generatedTableButton' type='submit'> <i class='fas buttonIconColor fa-plus'></i> Add product</button>";
        $closingLines .= "</form>";

    } else if ($option == 1 || $option == "update") {
        $i = 1;
        $openingLines = "<form action='index.php?op=update' method='post' >";
        $openingLines .= "<input type='hidden' name='" . $columnNames[0] . "' value='$id'>";

        $closingLines = "<button name='UpdateSubmit' value='1' class='generatedTableButton' type='submit'> <i class='fas buttonIconColor fa-edit'></i> Update</button>";
        $closingLines .= "</form>";
    }

    // set head
    $head = "
    <thead>
        <tr>
            <th>ColumnNames</th>
            <th>InputFields</th>
        </tr>
    </thead>";


    // set Body
    $body = "<tbody>";
    for ($i; $i<count($columnNames); $i++) {
        $row = "
        <tr>
            <td>" . $columnNames[$i] . "</td>
            <td> <input name='" . $columnNames[$i] . "'" . $types[$i] . " value='". $data[$columnNames[$i]] . "'" . $required[$i] . "/> </td>
        </tr>";
        $body .= $row;
    }
    $body .= "</tbody>";


    // Combine the Table
    $table =
        $openingLines .
        "<table border='1' class='generatedTableCreate'>" .
            $head .
            $body .
        "</table>" .
        $closingLines;

    return $table;
}
?>
