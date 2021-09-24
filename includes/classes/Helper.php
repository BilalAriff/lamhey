<?php 

class Helper {
    
    //Add methods here

    public function getURLParams($paramName) {
        // Initialize URL to the variable
        $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            
        // Use parse_url() function to parse the URL
        // and return an associative array which
        // contains its various components
        $url_components = parse_url($url);
        
        // Use parse_str() function to parse the
        // string passed via URL
        parse_str($url_components['query'], $params);
            
        // Display result
        return $params[$paramName];
    }

    public function createUserFolder($username) {
        $dir = "uploads/".$username;
        if( is_dir($dir) === false ) {
                mkdir($dir);
            }
         }
    
    public function passwordsMatch($pw1, $pw2){
        if ($pw1 == $pw2)
            return true;
        else
            return false;
    }
    
    public function isValidLength($str, $min = 8, $max = 20){
        if (strlen($str) < $min || strlen($str) > $max)
            return false;
        else
            return true;
    }
    
    public function isEmpty($postValues){
        
        foreach ($postValues as $value){
            if ($value == '')
                return true;
        }
        
        return false;
        
    }
    
    public function isSecure($pw){
        
        if (preg_match("~[A-Z]+~", $pw) && preg_match("~[a-z]+~", $pw) && preg_match("~[0-9]+~", $pw))
            return true;
        else
            return false;
        
    }

    public function keepValues($val, $type, $attr=''){
        switch ($type){
            case 'textbox':
                echo "value = '$val'";
                break;
            case 'textarea':
                echo $val;
                break;
            case 'select':
                if ($val == $attr)
                    echo 'selected';
                break;
            default:
                echo '';
        }

    }

    public function starRating($_rating) {
        
        $rating = $_rating; 
                                    if($rating == "0") {
                                        echo 
                                        '
                                            <i class="fa fa-star text-dark" aria-hidden="true"></i>
                                            <i class="fa fa-star text-dark" aria-hidden="true"></i>
                                            <i class="fa fa-star text-dark" aria-hidden="true"></i>
                                            <i class="fa fa-star text-dark" aria-hidden="true"></i>
                                            <i class="fa fa-star text-dark" aria-hidden="true"></i>
                                        ';
                                    }

                                    
                                    if ($rating == "1") {
                                        echo 
                                        '
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star text-dark" aria-hidden="true"></i>
                                            <i class="fa fa-star text-dark" aria-hidden="true"></i>
                                            <i class="fa fa-star text-dark" aria-hidden="true"></i>
                                            <i class="fa fa-star text-dark" aria-hidden="true"></i>
                                        ';
                                    }

                                    if ($rating == "2") {
                                        echo 
                                        '
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star text-dark" aria-hidden="true"></i>
                                            <i class="fa fa-star text-dark" aria-hidden="true"></i>
                                            <i class="fa fa-star text-dark" aria-hidden="true"></i>
                                        ';
                                    }

                                    if ($rating == "3") {
                                        echo 
                                        '
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star text-dark" aria-hidden="true"></i>
                                            <i class="fa fa-star text-dark" aria-hidden="true"></i>
                                        ';
                                    }

                                    if ($rating == "4") {
                                        echo 
                                        '
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star text-dark" aria-hidden="true"></i>
                                        ';
                                    }

                                    if ($rating == "5") {
                                        echo 
                                        '
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        ';
                                    }
    }
}