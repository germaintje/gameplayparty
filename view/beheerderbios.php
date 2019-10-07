<?php

require "generateTables.php";

class View {
    private $contacts;
    private $lastID;
    private $test;

    public function __Construct($contacts = "", $lastID = NULL) {
        $this->test = new generatedTableButton;
        $this->contacts = $contacts;
        $this->lastID = $lastID;
    }

    public function __Destruct() {

    }

    public function CreateView($columnNames) {
        // $main = $this->GenerateCreateTable($columnNames);
        $main = $this->test->GenerateInputTable($columnNames);
        $view = $this->AddFooterAndHeader($main);
        return $view;
    }

    public function ReadView() {
        $main = "<main>";
        $main .= "<a class='generatedTableButton' href='index.php?op=create'>Create</a>";
        $main .= $this->test->GenerateButtonedTable($this->contacts);

        $view = $this->AddFooterAndHeader($main);
        return $view;
    }

    // public function UpdateView() {
    //     $view = $this->AddFooterAndHeader($main);
    //     return $view;
    // }

    private function DefaultMain($mode = 0) {
        $main = "<main>";

        if ($mode !== 0) {
            $main .= "<div class='col-12' >Record $this->lastID is succesfully removed</div>";
        }

        $main .= "<a class='generatedTableButton' href='index.php?op=create'>Create</a>";
        $main .= $this->GenerateTable($this->contacts);

        return $main;
    }


    private function AddFooterAndHeader($main) {
        $format = $this->Header();
        $format .= $main;
        $format .= $this->Footer();

        return $format;
    }

    private function Header() {
        $header = "
            <header class='col-12 header'>
                <div class='col-3 logo'>MVC</div>
                <!--<nav class='col-9'>
                    <ul class='col-8'>
                        <li><a href='index.php?view=create'>Create</a></li>
                        <li><a href='index.php?view=default'>Read</a></li>
                        <li><a href='index.php?view=update'>Update</a></li>
                        <li><a href='index.php?view=default'>Delete</a></li>
                    </ul>
                </nav>-->
            </header>
        ";
        return $header;
    }

    private function Footer() {
        $footer = '';
        return $footer;
    }
}

?>