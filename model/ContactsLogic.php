<?php

require_once "DataHandler.php";
require_once "HtmlElements.php";

class ContactsLogic {
    private $DataHandler;
    private $HtmlElements;

    public function __construct($dbName, $username, $pass, $serverAdress, $dbType) {
        
        
        $this->DataHandler = new DataHandler($dbName, $username, $pass, $serverAdress, $dbType);
        $this->HtmlElements = new HtmlElements();
        echo 'datahandler en htmlElements ';
        
    }

    public function __destruct() {
        $this->DataHandler = null;
    }

    public function CreateContact() {
        $tablename = "bioscopen";
        $columnNames = $this->DataHandler->GetCollumnNames($tablename);
        $columnNames = $this->DataHandler->SelectWithCodeFromArray($columnNames, "02");

        $this->DataHandler->InsertIntoDatabase($tablename, $columnNames, $_POST);

        return $this->DataHandler->lastInsertedID;
        echo 'datahandler ';
    }

    public function ReadContact() {
        $sql = "SELECT * FROM `bioscopen` LIMIT 0, 30 ";
        $data = $this->DataHandler->ReadData($sql);
        return $this->HtmlElements->GenerateButtonedTable($data);
        echo 'datahandler en html elements';
    }

    public function ReadSingleContact($id, $option = 0) {
        $sql = "SELECT * FROM `bioscopen` WHERE `b_naam_int` = $id";
        $data = $this->DataHandler->ReadData($sql);

        if ($option == 0) {
            $data = $this->HtmlElements->GenerateButtonedTable($data);
        }
        echo 'datahandler';
        return $data;
    }

    public function UpdateContact() {

            // set variables
            $id = $_POST["b_naam_int"];
            $name = $_POST["b_naam"];
            $phone = $_POST["B_adres"];
            $email = $_POST["openingstijden"];
            $location = $_POST["tarieven"];

            // set sql;
            $sql = "UPDATE `gameplayparty`.`bioscopen`
            SET `b_naam` = '$name', `b_adres` = '$phone', `openingstijden` = '$email', `tarieven` = '$location'
            WHERE `id` = $id";

            // run update
            $this->DataHandler->UpdateData($sql);

            // Get resulting row
            $data = $this->ReadSingleContact($id, 1);

            // format and return
            return $this->HtmlElements->GenerateButtonedTable($data);
            echo 'datahandler en html elements';
    }
    public function GenerateUpdateForm() {
        $id = $_GET["b_naam_int"];

        // get columnNames
        $columnNames = $this->DataHandler->GetCollumnNames("bioscopen");
        $columnNames = $this->DataHandler->SelectWithCodeFromArray($columnNames, "02");

        // get data array
        $data = $this->ReadSingleContact($id, 1);
        $data = $data[0];

        $table = $this->HtmlElements->GenerateUpdateTable($columnNames, $data, $id);
        echo 'datahandler en html elements';
        return $table;
    }

    public function DeleteContact($id) {
        $sql = "DELETE FROM `bioscopen` WHERE `bioscopen`.`b_naam_int` = $id";
        return $this->DataHandler->DeleteData($sql);
    }

    public function GenerateCreateForm() {
        $columnNames = $this->DataHandler->GetCollumnNames('bioscopen');
        $columnNames = $this->DataHandler->SelectWithCodeFromArray($columnNames, "02");

        return $this->HtmlElements->GenerateInputTable($columnNames);
    }
}

?>
