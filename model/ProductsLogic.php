<?php

require_once "DataHandler.php";
require_once "utility/utility.php";

class ProductsLogic
{
    public function __construct()
    {
        $this->DataHandler = new DataHandler("localhost", "mysql", "gameplayparty", "root", "");
        $this->Utility = new utility();
    }

    public function __destruct()
    {
    }

    public function createContact($product_id, $product_type_code, $supplier_id, $product_name, $product_price, $other_product_details)
    {
        try {
            $product_id = $_POST['product_id'];
            $product_type_code = $_POST['product_type_code'];
            $supplier_id = $_POST['supplier_id'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $other_product_details = $_POST['other_product_details'];

            $sql = "INSERT INTO products(`product_id`,`product_type_code`,`suplier_id`,`product_name`, `product_price` ,`other_product_details`)VALUES('$product_id', '$product_type_code', '$suplier_id', '$product_name', '$product_price', '$other_product_details');";
            echo "test1";
            $result = $this->DataHandler->createData($sql);
            echo "test2";
            return $result;
        }catch (Exception $e){
            throw $e;
        }
    }

    public function readContacts(){

 

    }

    public function readContactsID($sql){
        try{
            $rows = $this->DataHandler->readsData($sql);
            $result = $this->createSelect($rows);

            return $result;

        }catch (Exception $e){
            throw $e;
        }
    }


    public function readContact($id)
    {

        try {

            $sql = "SELECT * FROM products WHERE id =" . $id;

            $result = $this->DataHandler->readsData($sql);

            return $result;
        }catch (Exception $e) {
            throw $e;
        }
    }

    public function showBioscoop($id){
        try{

            //$id = $_GET['id'];

            $sql = "SELECT * FROM bioscopen WHERE b_naam_int=" . $id;

            $result = $this->DataHandler->showBioscoop($sql);

            return $result;

        }catch(Exeption $e){
            throw $e;
        }
    }

    public function showParty(){

        try{
        $sql = "SELECT * FROM party";

        $party = $this->DataHandler->showParty($sql);

        return $party;
    }catch(Exeption $e){
        throw $e;
    }
}

    public function showAllBioscoop(){
        try{
            $sql = "SELECT * FROM bioscopen";

            $result = $this->DataHandler->showAllBioscoop($sql);

            return $result;

        }catch(Exeption $e){
            throw $e;
        }
    }

    public function updateContact($product_id, $product_type_code, $suplier_id, $product_name, $product_price, $other_product_details)
    {
    }

    public function deleteContact($id)
    {
        try {
            $sql = "DELETE FROM products WHERE id =" . $id ;
            $result = $this->DataHandler->deleteData($sql);
            return $result;
        }catch (Exception $e) {
            throw $e;
        }
    }

    public function searchContact($input){
        try{
            $sql ="SELECT * FROM products WHERE product_name LIKE '%$input%'";
            $result = $this->DataHandler->searchData($sql);
            return $result;
        }catch (Exception $e){
            throw $e;
        }
    }

    public function readHome(){
        try{
            $sql = "SELECT * FROM bioscopen ";
            $result = $this->DataHandler->readHome($sql);

            return $result;
        }catch (Exception $e) {
            throw $e;
        }
    }
    public function showAbout(){

        try{
        $sql = "SELECT * FROM about";

        $about = $this->DataHandler->showAbout($sql);

        return $about;
    }catch(Exeption $e){
        throw $e;
    }
}
    public function collectBeheerderContent(){
        try{

            $sql = "SELECT * FROM about";

            $about = $this->DataHandler->collectBeheerderContent($sql);

            return $about;
            
        }catch(Exeption $e){
            throw $e;
        }

    }

}