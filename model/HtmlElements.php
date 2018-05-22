<?php 

class HtmlElements {

    
    public function addActionButtons($array){
        foreach ($array as $key => $value) {
            $array[$key]["Action"] =
                "<a class='btn btn-success' href='index.php?op=read&id=$value[product_id]'><i class='fa fa-book' aria-hidden='true'></i>Read</a>
                <a class='btn btn-info' href='index.php?op=update&id=$value[product_id]'><i class='fa fa-pencil' aria-hidden='true'></i>Update</a>
                <a class='btn btn-danger' href='index.php?op=delete&id=$value[product_id]'><i class='fa fa-times' aria-hidden='true'></i>Delete</a>";
        }
        return $array;
    }

    public function addCheckBoxes($array){
        foreach ($array as $key => $value) {
            $array[$key]["<input type='checkbox' name='' value='index.php?op=read&id=$value[product_id]'>"] =
                "<input type='checkbox' name='' value='index.php?op=read&id=$value[product_id]'>";
        }
  
        return $array;
    }

    public function Replace($array){
        foreach ($array as $key => $value) {
            $array[$key]["product_price"] = "€ " . str_replace("." , "," , $value['product_price']);
        }
        return $array;
    }
    
    public function createTable($array){
        $table = "";

        $table = "<table class='table table-striped' ";

        foreach ($array as $key => $value) {
            $table .= "<thead class='thead-dark'><tr>";
            foreach ($value as $k => $v) {
                $table .= "<th class='text-center'>" . $k . "</th>";
            }
            break;
        }
        foreach ($array as $k => $v) {
            $table .= "<tr>";
            foreach ($v as $key => $value) {
                $table .= "<td>" . $value . "</td>";
            }
        }
        $table .= "</table>";
        return $table;
    }

    public function createForm($data, $dataForm = false) {
        $form = "<form method='post'>";
        $data;
        // echo "<pre>";
        // var_dump($data);
        // echo "</pre>";
        foreach ($data as $key => $value) {
            if ($value['Extra'] != "auto_increment") {

                $a = preg_split("/\W+/", $value['Type']);
                $number = "";
                $type = "text";

                switch ($a[0]) {
                    case "int":
                    case "float":
                    case "double":
                        $type = "number";
                        if (isset($a[1])) {
                            $number = $a[1];
                        }
                        break;
                    default:
                        if (isset($a[1])) {
                            $number = $a[1];
                        }
                        $type = "text";
                }

                $form .= "<label class='form-control-label'>" . ucfirst(str_replace("_", " ", $value['Field'])) . "</label>";
                $form .= "<input class='form-control' value='". ($dataForm ? $dataForm[0][$value['Field']] : " ") ."' type='$type' max='$number' name='$value[Field]' id='$value[Field]'>";
            }
        }
        $form .= "<input class='btn btn-primary mt-3' type='submit' name='send'>";
        $form .= "</form>";

        return $form;
        
    }


}
?>