<?php
require_once './model/ProductsLogic.php';
require_once './utility/utility.php';

class ProductsController
{
    public function __construct()
    {
        $this->ProductsLogic = new ProductsLogic();
        $this->utility = new utility();
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function handleRequest()
    {
        try {
            $op = isset($_REQUEST['op']) ? $_REQUEST['op'] : NULL;
            switch ($op) {
                case 'create':
                    if ($_POST['name'] == null) {
                        include 'view/old/create.php';
                    } else {
                        $this->collectCreateContact($_REQUEST);
                    }
                    break;
                    case 'detail':
                    $this->showBioscoop($_REQUEST['id']);
                    break;
                    case 'party':
                    $this->showParty();
                    
                    break;
                    case 'catalogus';
                    $this->showAllBioscoop();
                    break;
                    case 'about';
                    $this->showAbout();
                    break;
                    case 'contact';
                    $this->showContactPage();
                    break; 
                case 'reads':
                    $this->collectReadContacts();
                    break;
                case 'read':
                    $this->collectReadContact($_REQUEST['id']);
                    break;
                case 'update':
                    if ($_POST['name'] == null) {
                        include 'view/old/update.php';
                    } else {
                        $this->collectUpdateContact($_POST['name'], $_POST['phone'], $_POST['email'], $_POST['address']);
                    }
                    break;
                case 'delete':
                    $this->collectDeleteContact($_REQUEST['id']);
                    break;
                case 'search':
                    $output = $this->collectSearchContacts($_REQUEST["input"]);
                    break;
                case 'beheerderhan':
                    $this->collectBeheerderhan();
                    break;
                case 'readpage':
                    //get current starting point of records
                    $item_per_page = 4;
                    $position = (($_REQUEST['p']-1) * $item_per_page);
                    $sql = "SELECT * FROM products LIMIT $position, $item_per_page";
                    $result = $data->readsData($sql);
                    $pages = $data->countPages('SELECT COUNT(*) FROM products');
                    include (view/ViewProducts.php);
                    break;
                default:
                    $this->collectReadHome();

                    break;
            }
        } catch (ValidationException $e) {
            $errors = $e->getErrors();
        }

    }

    public function collectCreateContact($request)
    {
        $products = $this->ProductsLogic->createContact($_POST['product_id'], $_POST['product_type_code'], $_POST['supplier_id'], $_POST['product_name'], $_POST['product_price'], $_POST['other_product_details']);
        include 'view/old/create.php';
    }

    public function showBioscoop($id){
        $products = $this->ProductsLogic->showBioscoop($id);
        include 'view/bios_detail.php';

    }

    public function showParty(){
        $party = $this->ProductsLogic->showParty();
        include 'view/bios_detail.php';
    }

    public function showAllBioscoop(){
        $products = $this->ProductsLogic->showAllBioscoop();
        include 'view/bios_catalog.php';
    }
    public function showAbout(){
        include 'view/about.php';
    }

    public function showContactPage(){
        include 'view/contact.php';
    }

    public function collectUpdateContact()
    {
        include 'view/old/update.php';
    }

    public function collectReadContact($id)
    {

        $products = $this->ProductsLogic->readContact($id);
        include 'view/ViewProducts.php';


    }

    public function collectReadContacts()
    {
        //$products = $this->ProductsLogic->readContacts();
        //$result  = $this->utility->createTable($products);
        include 'view/home.php';
    }

    public function collectDeleteContact($id)
    {
        //echo "Gebruiker is verwijderd";
        $products = $this->ProductsLogic->deleteContact($id);
        include 'view/old/delete.php';

    }

    public function collectSearchContacts($input){
        $searchOutput = $this->ProductsLogic->searchContact($input);

        $result = $this->utility->createTable($searchOutput);
        include 'view/ViewProducts.php';


    }

    public function collectReadHome(){
        $home = $this->ProductsLogic->readHome();
        include 'view/home.php';
    }

    public function collectBeheerderhan(){
        include 'view/beheerderhan.php';
    }

}