<?php
class DataHandler{
    private $host;
    private $dbdriver;
    private $dbname;
    private $username;
    private $password;

    public function __construct($host, $dbdriver, $dbname, $username, $password)
    {
        $this->host = $host;
        $this->dbdriver = $dbdriver;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;

        try {
            $this->dbh = new PDO("$this->dbdriver:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch (PDOException $e) {
            echo "Connection with ".$this->dbdriver." failed: ".$e->getMessage();
        }
       
    }

    public function __destruct()
    {
        $this->dbh = null;
    }

    public function showBioscoop($sql){
        //var_dump($sql);
        return $this->dbh->query($sql,PDO::FETCH_ASSOC);

    }

    public function showParty($sql){
        var_dump($sql);
        return $this->dbh->query($sql,PDO::FETCH_ASSOC);

    }

    public function showBeheerBioscoop($sql){
        return $this->dbh->query($sql,PDO::FETCH_ASSOC);
    }
    public function showAbout($sql){
        var_dump($sql);
        return $this->dbh->query($sql,PDO::FETCH_ASSOC);

    }

    public function showAllBioscoop($sql){
        //var_dump($sql);
        return $this->dbh->query($sql,PDO::FETCH_ASSOC);

    }
    

    public function createData($sql){
        return $this->dbh->query($sql);
    }

    public function readData($sql){

        //$this->dbh->query($sql);
        var_dump($sql);
        return $this->dbh->query($sql,PDO::FETCH_ASSOC);
    }
    public function readsData($sql){
        //$this->query($sql);
        return $this->dbh->query($sql,PDO::FETCH_ASSOC);
    }
    public function updateData($sql){
        $this->query($sql);
        return $this->rowCount();
    }
    public function deleteData($sql){
        $sth = $this->dbh->query($sql);
        return $sth->rowCount();
    }

    public function searchData($sql){
        //$this->query($sql);
        return $this->dbh->query($sql, PDO::FETCH_ASSOC);
    }

    public function countPages($sql){
        $item_per_page = 4;
        $result = $this->dbh->query($sql);
        $get_total_rows = $result->fetch();

        //breaking total records into pages
        $pages = ceil($get_total_rows[0]/$item_per_page);
        return $pages;
    }
    
    public function readHome($sql){
       // $this->query($sql);
       //return $this->dbh->query($sql,PDO::FETCH_ASSOC);
    }

  



   

  

    public function DB_getResultCount($tableName) {
        try {
            $localConn->$this->dbh;
            $localConn->prepare("SELECT count(*) FROM $tableName");
            $localConn->execute();
            return $localConn->fetchColumn();

        } catch(PDOException $e) {
            throw new Exception("TABLENAME: $tablename ERROR: ", $e->getMessage() );
            return false;
        }
    }

    public function GetCollumnNames($tablename) {
        try {
            $localConn = $this->dbh->prepare("SELECT * FROM $tablename LIMIT 0, 1");
            $localConn->execute();
            $queryRes = $localConn->fetch(PDO::FETCH_ASSOC);
        }

        catch(PDOException $e) {
            throw new Exception("TABLENAME: $tablename ERROR: ", $e->getMessage() );
            return false;
        }

        $data = [];
        $i = 0;
        foreach ($queryRes as $key => $value) {
            $data[$i] = $key;
            $i++;
        }

        return $data;
    }

    public function SelectWithCodeFromArray($array, $code) {
        $splittedCode = str_split($code);
        $return = []; // <--- is used to store the output data
        $y=0; // <--- is used to count in which position the next datapiece needs to go

        for ($i=0; $i<count($array); $i++) {
            if ($splittedCode[$i] == 0) {

            }
            else if ($splittedCode[$i] == 1) {
                $return[$y] = $array[$i];
                $y++;
            }
            else if ($splittedCode[$i] == 2) {
                //runs till the end of the array and writes everything inside the array
                for ($i=$i; $i<count($array); $i++) {
                    $return[$y] = $array[$i];
                    $y++;
                }
            }
            else if ($splittedCode[$i] == 3) {
                //runs till the end of the array and writes nothings
                for ($i=$i; $i<count($array); $i++) {

                }
            }
        }
        return $return;
    }

    private function ExtractData($inputColumnNames, $inputAssocArray) {
        // extract data from $inputAssocArray with provided columnNames
        $sqlAssocArray = [];
        for ($i=0; $i<count($inputColumnNames); $i++) {
            $sqlAssocArray[$i] = $inputAssocArray[$inputColumnNames[$i] ];
        }
        return $sqlAssocArray;
    }

    private function TestIfEmpty($inputColumnNames, $sqlAssocArray) {
        // tests if all fields are filled
        $emptyTest = "true";
        for ($i=0; $i<count($inputColumnNames); $i++) {
            if ($sqlAssocArray[$i] == "") {
                $emptyTest = "false";
            }
        }
        return $emptyTest;
    }

    private function GenerateSqlColumnNames($inputColumnNames) {
        //Generates $sqlColumnNames
        $sqlColumnNames = $inputColumnNames[0];
        for ($i=1; $i<count($inputColumnNames); $i++) {
            $sqlColumnNames .= "," . $inputColumnNames[$i];
        }
        return $sqlColumnNames;
    }

    private function SetRecordData($sqlArray, $inputColumnNames) {
        //Adds datafields to records till the last datafield is reached
        $recordData = "'" . $sqlArray[0] . "'";
        for ($i=1; $i<count($inputColumnNames); $i++) {
            $recordData .= "," . "'" . $sqlArray[$i] . "'";
        }
        return $recordData;
    }

    private function SetInsertQuery($tableName, $sqlColumnNames, $recordData) {
        //Combines $recordData, $tableName and $sqlColumnNames to create the SQL query
        $sql = "INSERT INTO $tableName ($sqlColumnNames)
        VALUES ($recordData)";

        return $sql;
    }

    public function InsertIntoDatabase($tableName, $inputColumnNames, $inputAssocArray) {

        ###
        # active code InsertIntoDatabase functionF

        // set numbered array and set $emptytest
        $sqlArray = $this->ExtractData($inputColumnNames, $inputAssocArray);
        $emptyTest = $this->TestIfEmpty($inputColumnNames, $sqlArray);

        //if tests where succesfull create sql query
        if ($emptyTest == 'true') {

            // set the SQL Query
            $sqlColumnNames = $this->GenerateSqlColumnNames($inputColumnNames);
            $recordData = $this->SetRecordData($sqlArray, $inputColumnNames);
            $sql = $this->SetInsertQuery($tableName, $sqlColumnNames, $recordData);

            // try to add the record with pdo to the database
            try {
                // use exec() because no results are returned
                $this->conn->exec($sql);

                $this->lastInsertedID = $this->dbh->lastInsertId();
                $return = TRUE;

            } catch(PDOException $e) {
                /*enable line herunder for debugging*/
                $return = "?alert=" . $sql . "<br>" . $e->getMessage();
            }
            $conn = null;

        //if not all fields are returbn a getString that not all fields are filled
        } if ($emptyTest != 'true') {
            $return = "?alert=Fill in the whole form";
        }

        //return true or a $_GET string with the error;
        return $return;
    }


    
}
?>