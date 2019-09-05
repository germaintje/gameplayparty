<?php

require_once "DataHandler/DataHandler.php";
require_once "HtmlElements.php";
require_once "DataValidator/DataValidator.php";

class ProductsLogic {

    private $DataHandler;
    private $HtmlElements;
    private $DataValidator;

    public function __construct($dbName, $username, $pass, $serverAdress, $dbType) {
        $this->DataHandler = new DataHandler($dbName, $username, $pass, $serverAdress, $dbType);

        $columnNames =   $this->DataHandler->GetColumnNames("products");
        $dataTypes =     $this->DataHandler->GetTableTypes("products");
        $dataNullArray = $this->DataHandler->GetTableNullValues("products");

        $this->DataValidator = new DataValidator($columnNames, $dataTypes, $dataNullArray);
        $this->HtmlElements = new HtmlElements();
    }

    public function __destruct() {
        $this->DataHandler = NULL;
        $this->DataValidator = NULL;
        $this->HtmlElements = NULL;
    }

    public function CreateProduct() {
        $tablename = "products";

        // set and select collumnNames
        $columnNames = $this->DataHandler->GetColumnNames($tablename);
        $columnNames = $this->DataHandler->SelectWithCodeFromArray($columnNames, "02");

        // convert product_price to the right format for the database
        $_POST["product_price"] = $this->ConvertNumericData(1, NULL, $_POST["product_price"]);

        // run insertQuery
        $this->DataHandler->CreateData(NULL, $tablename, $columnNames, $_POST);

        return $this->DataHandler->lastInsertedID;
    }

    public function GenerateCreateForm() {
        $columnNames =  $this->DataHandler->GetColumnNames("products");
        $dataTypes =    $this->DataHandler->GetTableTypes("products");
        // GetHtmlValidateData($dataTypesArray)

        $htmlTypes =    $this->DataValidator->GetHtmlValidateData($dataTypes);
        $required =     $this->DataValidator->ValidateHTMLNotNull();

        // $table = $this->HtmlElements->GenerateFormTable($columnNames, $dataTypes, $required, 0);
        $table = $this->HtmlElements->GenerateForm('post', 'index.php?op=create', "createForm", null, $columnNames, $htmlTypes, $required, 1);

        return $table;
    }

    public function ReadProduct($currentPage = 1) {
        $start = $this->searchSupport($currentPage);

        $returnArray = [];
        $sql = "SELECT * FROM `products` LIMIT $start, 5 ";

        $returnArray[0] = $this->GetData($sql);
        $returnArray[1] = $this->DataHandler->CreatePagination("products", 5, NULL, "pagination", $currentPage);
        $returnArray[1] = $this->HtmlElements->GeneratePaginationTable($returnArray[1], "paginationTable");

        return $returnArray;
    }

    public function ReadSingleProduct($id, $option = 0) {
        $sql = "SELECT * FROM `products` WHERE `product_id` = $id";
        $data = $this->DataHandler->ReadData($sql);
        $data = $this->ConvertNumericData(0, $data);

        if ($option == 0) {
            $buttonArray = $this->TableButtons($data, "generatedTable");
            return $this->HtmlElements->GenerateButtonedTable($data, "generatedTable", "111", $buttonArray, "actions");
        }

        return $data;
    }

    public function UpdateProduct() {
        $id = $_POST["product_id"];

        // convert product_price to right format for the database
        $_POST["product_price"] = $this->ConvertNumericData(1, NULL, $_POST["product_price"]);

        // set query
        $idName = "product_id";
        $idValue =  $_POST[$idName];
        $sql = $this->DataHandler->SetUpdateQuery("products", $_POST, $idName, $idValue);

        // run update
        $this->DataHandler->UpdateData($sql);

        // Get resulting row
        $data = $this->ReadSingleProduct($id, 1);

        // format and return
        $buttonArray = $this->TableButtons($data, "generatedTable");
        return $this->HtmlElements->GenerateButtonedTable($data, "generatedTable", "111", $buttonArray, "actions");
    }

    private function TableButtons($data, $tablename, $idName = "product_id") {
        $buttonsArray = [];

        $returnArray = [];
        $i=0;
        foreach ($data as $key => $value) {

            $id = $value[$idName];
            $buttonsArray[0] = "<td class='button $tablename--buttons' style='min-width: 85px'> <a href='index.php?id=$id&op=read'    class='generatedTableButton' style='min-width:100%'> <i class='fas fa-book buttonIconColor'></i>  Read   </a></td>";
            $buttonsArray[1] = "<td class='button $tablename--buttons' style='min-width: 85px'> <a href='index.php?id=$id&op=update'  class='generatedTableButton' style='min-width:100%'> <i class='fas fa-edit buttonIconColor'></i>  Update </a></td>";
            $buttonsArray[2] = "<td class='button $tablename--buttons' style='min-width: 85px'> <a href='index.php?id=$id&op=delete'  class='generatedTableButton' style='min-width:100%'> <i class='fas fa-trash buttonIconColor'></i> Delete </a></td>";

            $returnArray[$i] = $buttonsArray;

            $i++;
        }
        return $returnArray;
    }

    public function GenerateUpdateForm($id) {

        // get data array
        $data = $this->ReadSingleProduct($id, 1);
        $data = $data[0];
        $data["product_price"] = $this->ConvertNumericData(1, NULL, $data["product_price"]);

        // get other table data
        $columnNames = $this->DataHandler->GetColumnNames("products");
        $dataTypes = $this->DataHandler->GetTableTypes("products");

        $htmlTypes = $this->DataValidator->GetHtmlValidateData($dataTypes);
        $required = $this->DataValidator->ValidateHTMLNotNull();

        // run the query
        $table = $this->HtmlElements->GenerateForm('post', 'index.php?op=update', "updateForm", $data, $columnNames, $htmlTypes, $required, 0);

        return $table;
    }

    public function DeleteProduct($id) {
        $sql = "DELETE FROM `products` WHERE `product_id` = $id";
        return $this->DataHandler->DeleteData($sql);
    }

    public function SearchProduct($search, $currentPage = 1) {
        $start = $this->searchSupport($currentPage);

        $returnArray = [];

        $limit = "LIMIT $start, 5 ";

        $where = $this->DataHandler->SetSearchWhere($search, "products", NULL, 1);
        $sql = $this->DataHandler->SetSearchQuery('products', $search, $limit, NULL, NULL);

        $returnArray[0] = $this->GetData($sql);
        $returnArray[1] = $this->DataHandler->CreatePagination("products", 5, $where, "pagination", $currentPage, "&op=search&search=$search");
        // var_dump($returnArray[1]);
        $returnArray[1] = $this->HtmlElements->GeneratePaginationTable($returnArray[1], "paginationTable");
        // var_dump($returnArray[1]);

        return $returnArray;
    }

    private function searchSupport($page) {
        if ($page > 0) {
            $page--;
        } else {
            $page = 0;
        }

        return (int)$page * 5;
    }

    private function GetData($sql) {
        $data = $this->DataHandler->ReadData($sql);
        $data = $this->ConvertNumericData(0, $data);

        $buttonArray = $this->TableButtons($data, "generatedTable");
        return $this->HtmlElements->GenerateButtonedTable($data, "generatedTable", "111", $buttonArray, "actions");
    }

    public function TestDataSubmitted($option = 0) {
        // Test if post is set
        if (!isset($_POST) ) {
            return FALSE;
        }

        // test and return result
        if ($option === 1 || $option === "Create") {
            return $this->DataValidator->ValidatePHPRequired($_POST, NULL, NULL, "02");

        } else {
            return $this->DataValidator->ValidatePHPRequired($_POST);
        }
    }

    // $data needs to be an Array for
    private function ConvertNumericData($option = 0, $array = NULL, $string = NULL) {
        if ($option == 0) {

            // Loop and convert all shown data
            for ($i=0; $i < count($array); $i++) {
                $array[$i]["product_price"] = "&euro;" . $array[$i]["product_price"];
                $array[$i]["product_price"] = str_Replace(".", ",", $array[$i]["product_price"]);
            }
            return $array;

        } elseif ($option == 1 || $option == "update" || $option == "create") {
            // $data is a string
            $string = str_Replace(",", ".", $string);
            $string = str_Replace("&euro;", "", $string);
            $string = str_Replace("€", "", $string);

            return $string;
        }
    }
}

?>
