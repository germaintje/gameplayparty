<?php

class utility
{

    public function createTable($result)
    {
        $tableheader = false;
        $html = "";
        $html .= "<table class='table' border='2px'>";


        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            if ($tableheader == false) {


                $html .= "<tr>";
                foreach ($row as $key => $value) {

                    $row['product_price'] = str_replace('.', ',', $row['product_price']);

                    $html .= "<th>$key</th>";
                }

                $html .= "</tr>";
                $tableheader = true;
            }

            $html .= "<tr>";

            foreach ($row as $key => $value) {
                if($key == "product_price"){
                    $html .= "<td> €" . str_replace('.', ',', $value) . "</td>";
                } else {
                    $html .= "<td>$value</td>";
                }

            }


            $html .= "<td><button name='read'><i class=\"fas fa-book-open\"> Read</i></button></td>";
            $html .= "<td><button name='update'><i class=\"fas fa-pencil-alt\"> Update</i></button></td>";
            $html .= "<td><button name='delete'><i class=\"fas fa-times\"> Delete</i></button></td>";
            $html .= "</tr>";

        }

        $html .= "</table>";

        return $html;

    }



}
?>