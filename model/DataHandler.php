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
}
?>