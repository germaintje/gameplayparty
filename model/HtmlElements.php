<?php

Class HtmlElements {

    public function __Construct() {

    }

    public function GenerateButtonedTable($data, $htmlTableName, $option, $extraColumnsArray = NULL, $specialColumnName = NULL) {

        if (!empty($extraColumnsArray) ) {
            $extraLength = count($extraColumnsArray[0]);
        } else {
            $extraLength = 0;
        }

        $border = "";
        $width = "";

        if ($option[0] == "1") {
            $border = "border='1'";
        }

        if ($option[1] == "1") {
            $width = "width='100%'";
        }

        if ($option[2] == "1") {
            // select checkboxes
        }

        $table = "<table $border $width class='$htmlTableName' id='$htmlTableName'>" .
            $this->ButtonedTableHead($data, $htmlTableName, $extraLength, $specialColumnName) .
            $this->ButtonedTableBody($data, $htmlTableName,  $extraColumnsArray) .
        "</table>";

        return $table;
    }

    public function GenerateForm($method, $targetUrl, $formName, $data, $columnNames, $dataTypesArray, $requiredNullArray, $option = 0) {
        $headAndFoot = $this->SetHeadAndFootForm($formName, $targetUrl, $method);
        $main = $this->GenerateFormMainData($formName, $data, $columnNames, $dataTypesArray, $requiredNullArray, $option);
        return $this->CombineForm($headAndFoot["header"], $main, $headAndFoot["footer"]);
    }

    public function GeneratePaginationTable($generationData, $tableName) {
        $table = "<table class='$tableName'><tr>";
        for ($i=0; $i<count($generationData); $i++) {
            $table .= "<td>" . $generationData[$i] . "</td>";
        }
        $table .= "</tr></table>";

        return $table;
    }

    private function ButtonedTableHead($data, $tablename, $extraLength = 0, $extraColumnName = NULL) {
        // table Collumn names
        $head = "<thead class='$tablename--thead'>";
            foreach ($data as $key => $value) {
                $row = "<tr class='$tablename--tr'>";
                "<td></td>";
                    foreach ($value as $columnName => $v) {
                        $columnName[0] = strToUpper($columnName[0]);
                        $row .= "<th class='$tablename--th'>" . $columnName . "</th>";
                    }
                    if ($extraLength > 0) {
                        $extraColumnName[0] = strToUpper($extraColumnName[0]);
                        $row .= "<th class='$tablename--th' colspan='$extraLength'>$extraColumnName</th>";
                    }

                $row .= "</tr>";

                $head .= $row;
                break;
            }
        $head .= "</thead>";
        return $head;
    }

    private function ButtonedTableBody($data, $tablename, $extraColumnsArray) {
        // table Body
        $body = "<tbody class='$tablename--tbody'>";

            $i=0;
            foreach ($data as $key => $value) {
                $row = "<tr class='$tablename--tr'>";
                    foreach ($value as $k => $v) {
                        $row .= "<td class='$tablename--td'>" . $value[$k] . "</td>";
                    }

                    for ($ii=0; $ii < count($extraColumnsArray[$i]) ; $ii++) {
                        $row .= $extraColumnsArray[$i][$ii];
                    }
                $row .= "</tr>";
                $body .= $row;
                $i++;
            }
        $body .= "</tbody>";
        return $body;
    }

    private function GenerateFormMainData($formName, $data, $columnNames, $dataTypesArray, $requiredNullArray, $option) {
        $form = "";
        $form .= $this->GenerateFormLabel($formName, $data[$columnNames[0]], $columnNames[0], $dataTypesArray[0], $requiredNullArray[0], 9);

        for ($i=1; $i < count($columnNames); $i++) {
            $form .= $this->GenerateFormLabel($formName, $data[$columnNames[$i]], $columnNames[$i], $dataTypesArray[$i], $requiredNullArray[$i], $option);
        }

        return $form;
    }

    private function GenerateFormLabel($formName, $data, $columnName, $dataType, $required, $option) {
        if ($option === 1) {
            $data = "";
        }

        if ($option === 9 || $option === "hidden") {
            $item = "<input class='$formName-input' id='$formName-$columnName-label' name='$columnName' value='$data' type='hidden'>";

        } else {
            $visibleColumnName = $columnName;
            $visibleColumnName[0] = strToUpper($columnName[0]);
            $item = "<label class='$formName-label' for='$formName-$columnName-label'>$visibleColumnName</label>";
            $item .= "<input class='$formName-input' id='$formName-$columnName-label' name='$columnName' value='$data' $dataType $required><span></span>";
        }

        return $item;
    }

    private function SetHeadAndFootForm($formName, $targetUrl, $method) {
        $openingLines = "<form class='$formName' id='$formName' name='$formName' action='$targetUrl' method='$method'>";

        $closingLines = "<input class='$formName-button' type='submit' value='submit'>";
        $closingLines .= "</form>";

        return ["header" => $openingLines, "footer" => $closingLines];
    }

    private function CombineForm($head, $main, $footer) {
        $form = $head . $main . $footer;
        return $form;
    }
}

?>
