<?php

require_once "DataHandler.php";
require_once "utility/utility.php";

class ProductsLogic
{
    public function __construct()
    {
        if($_SERVER['HTTP_HOST'] != "www.gameplayparty.ga") 
   {
        $this->DataHandler = new DataHandler("localhost", "mysql", "gameplayparty", "root", "");
   }else{
    $this->DataHandler = new DataHandler("localhost:3306", "mysql", "gameplayparty", "gameplay", "gameplay");
   }
        $this->Utility = new utility();
    }

    public function __destruct()
    {
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
            $sql = "SELECT * FROM about WHERE page_id = 2 ";
            $result = $this->DataHandler->readHome($sql);

            return $result;
        }catch (Exception $e) {
            throw $e;
        }
    }
    public function showAbout(){

        try{
        $sql = "SELECT * FROM about WHERE page_id = 1";

        $about = $this->DataHandler->showAbout($sql);

        return $about;
    }catch(Exeption $e){
        throw $e;
        }
    }
    public function collectBeheerderContent($id){
        try{

            $sql = "SELECT * FROM about WHERE page_id = $id";

            $about = $this->DataHandler->collectBeheerderContent($sql);

            return $about;
            
        }catch(Exeption $e){
            throw $e;
        }

    }
    
    public function CreateParty($products/*$beschickbaarheid_id, $titel, $informatie, $begin_tijd, $eind_tijd, $zaal, $dag, $b_naam_int*/)
    {
        try {
            $titel = $_POST['titel'];
            $informatie = $_POST['informatie'];
            $begin_tijd = $_POST['begin_tijd'];
            $eind_tijd = $_POST['eind_tijd'];
            $zaal = $_POST['zaal'];
            $dag = $_POST['dag'];
            $b_naam_int = $_POST['b_naam_int'];
            
            $sql = "INSERT INTO party(`titel`,`informatie`,`begin_tijd`, `eind_tijd` ,`zaal`,'dag','b_naam_int')VALUES( '$titel', '$informatie', '$begin_tijd', '$eind_tijd', '$zaal', '$dag', '$b_naam_int');";
            echo "test1";
            $result = $this->DataHandler->createData($sql);
            echo "test2";
            return $result;
        }catch (Exception $e){
            throw $e;
        }
    }

    public function collectUpdateParty($id){
        try{

            $sql = "SELECT * FROM party WHERE reserveerbeschikbaar_id = $id";

            $about = $this->DataHandler->collectBeheerderContent($sql);

            
            
        }catch(Exeption $e){
            throw $e;
        }
    }

    public function UpdateParty($id/*$beschickbaarheid_id, $titel, $informatie, $begin_tijd, $eind_tijd, $zaal, $dag, $b_naam_int*/){
    
            // set variables
            try{
            $beschickbaarheid_id = $_POST["reserveerbeschikbaar_id"];
            $titel = $_POST['titel'];
            $informatie = $_POST['informatie'];
            $begin_tijd = $_POST['begin_tijd'];
            $eind_tijd = $_POST['eind_tijd'];
            $zaal = $_POST['zaal'];
            $dag = $_POST['dag'];
            $b_naam_int = $_POST['b_naam_int'];
            // set sql;
            $sql = "UPDATE party 
            SET titel = '$titel', informatie = '$informatie', 
            begin_tijd = '$begin_tijd', eind_tijd = '$eind_tijd', 
            zaal = '$zaal', dag = '$dag' WHERE reserveerbeschikbaar_id = '$beschickbaarheid_id'";
                
            // run update
            
            $update = $this->DataHandler->UpdateParty($sql);
            
            
            
        }catch(Exeption $e){
            throw $e;
        }
    
    }



 public function DeleteParty($id){
        try {
            $sql = "DELETE FROM party WHERE id =" . $id ;
            $result = $this->DataHandler->deleteData($sql);
            return $result;
        }catch (Exception $e) {
            throw $e;
        }
    }
	
	public function updateContact($id){
	try{
		  $newcontent = $_POST['content'];
          $sql = "Update about SET content = '$newcontent' WHERE page_id =". $id;		
          $update = $this->DataHandler->updateContact($sql);
            
        $melding = "Pagina is bijgewerkt";

            return $melding;
	}catch(Exeption $e){
        throw $e;

		}
		
	}



}  