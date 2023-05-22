<?php 

Class App {

    protected $controller = 'home';

    protected $method = 'index';

    protected $params = [];

    public function __construct() {
       
        $url = $this->parseURL();

     




        if(file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]); // unset() is used to remove the first element of the array
        }

        require_once '../app/controllers/' . $this->controller . '.php';

        $this->controller = new $this->controller; // this will instantiate the controller class
        
        if(isset($url[1])) {
            if(method_exists($this->controller, $url[1])) {
               
                $this->method = $url[1]; // this will set the method to the second element of the array
                unset($url[1]); // unset() is used to remove the second element of the array
            }
        }

        $this->params = $url ? array_values($url) : []; // this will set the params to the remaining elements of the array if there are any, otherwise it will set it to an empty array

        
        call_user_func_array([$this->controller, $this->method], $this->params); // this will call the method of the controller class and pass the params to it
    }

    public function parseURL() {
        if(isset($_GET['url'])) {
           return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL)); // filter_var() is used to filter the url from any unwanted characters and explode() is used to convert the url into an array
        }
    }

}

?>