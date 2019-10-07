<?php

class ContactsRouter {
    private $controller;

    public function __Construct() {
        require_once 'controller/c_ContactsController.php';
        $this->controller = new ContactsController("gameplayparty", "root", "");
    }

    public function __Destruct() {
        $controller = null;
    }

    public function handleRequest() {

        if (isset($_GET['op']) ) {
            $op = $_GET['op'];

        } else {
            $op = "";
        }

        switch ($op) {
            case 'create':
                return $this->controller->collectCreateContacts();
                break;

            case 'update':
                return $this->controller->collectUpdateContact();
                break;

            case 'delete':
                if (isset($_GET['b_naam_int']) ) {
                    $id = $_GET['b_naam_int'];
                    return $this->controller->collectDeleteContacts($id);
                }
                break;

            default:
                return $this->controller->collectReadContacts();
                break;
        }
    }
}

?>
