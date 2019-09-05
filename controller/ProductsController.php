<?php

require_once 'model/ProductsLogic.php';

class ProductsController {
    private $ProductsLogic;

    public function __construct($dbName, $username, $pass, $serverAdress = "localhost", $dbType = "mysql" ) {
        $this->ProductsLogic = new ProductsLogic($dbName, $username, $pass, $serverAdress, $dbType);
    }

    public function __destruct() {
        $this->ProductsLogic = NULL;
    }

    public function handleRequest() {

        if (isset($_GET['op']) ) {
            $op = $_GET['op'];

        } else {
            $op = "";
        }

        switch ($op) {
            case 'create':
                $this->collectCreateProducts();
                break;

            case 'update':
                $this->collectUpdateProduct();
                break;

            case 'delete':
                if (isset($_GET['id']) ) {
                    $id = $_GET['id'];
                    $this->collectDeleteProducts($id);
                }
                break;

            case 'search':
                $this->collectSearchProducts();
                break;

            default:
                $this->collectReadProducts();
                break;
        }
    }

    // data gets extracted from the $_POST
    public function collectCreateProducts() {
        if ($this->ProductsLogic->TestDataSubmitted(1) ) {

            // sumbit the form
            $lastID = $this->ProductsLogic->CreateProduct();

            // run a read
            $_GET["id"] = $lastID;
            $this->collectReadProducts();
        } else {
            // Show the form
            $content = $this->ProductsLogic->GenerateCreateForm();
            require_once 'view/create.php';
        }
    }

    public function collectReadProducts() {
        // run the read
        if ( !empty($_GET["id"] ) && $_GET["id"] > -1 ) {

            $content = $this->ProductsLogic->ReadSingleProduct($_GET["id"]);
            require_once 'view/readSingle.php';

        } else {
            if ( !isset($_GET["page"]) ) {
                $_GET["page"] = 1;
            }
            $returnedArray = $this->ProductsLogic->ReadProduct($_GET["page"]);

            $content = $returnedArray[0];
            $pagination = $returnedArray[1];

            require_once 'view/read.php';
        }
    }

    // private function collectSingleReadProduct($id) {
    //     // run singleRead
    //     $content = $this->ProductsLogic->ReadSingleProduct($id);
    //     require_once 'view/readSingle.php';
    // }

    // not done
    public function collectUpdateProduct() {

        // check if Data is submitted
        if ($this->ProductsLogic->TestDataSubmitted() ) {
            // Run the update
            $content = $this->ProductsLogic->UpdateProduct();
            require_once 'view/readSingle.php';

        // Check if There is an Id in the url
    } else if ( isset($_GET["id"]) || isset($_POST['product_id']) ) {
            // Set the id
            if (isset($_GET["id"]) ) {
                $id = $_GET['id'];
            }

            // if form is incorrectly filled set the id to post id
            else {
                $id = $_POST['product_id'];
            }

            // Show the form
            $content = $this->ProductsLogic->GenerateUpdateForm($id);
            require_once 'view/update.php';

        } else {
            // run a regular read
            $_GET["id"] = -1;
            $this->collectReadProducts();
        }
    }

    public function collectDeleteProducts($id) {
        // Run Delete
        $result = $this->ProductsLogic->DeleteProduct($id);

        // run Read
        $_GET["id"] = -1;
        $this->collectReadProducts();
    }

    public function collectSearchProducts() {

        if (isset($_REQUEST["search"]) ) {
            if (isset($_GET["page"]) ) {
                $page = $_GET["page"];
            } else {
                $page = 1;
            }

            $search = $_REQUEST["search"];
            $returnedArray = $this->ProductsLogic->SearchProduct($search, $page);

            $content = $returnedArray[0];
            $pagination = $returnedArray[1];

            require_once 'view/readSingle.php';

        } else {
            $this->collectReadProducts();
        }
    }
}
 ?>
