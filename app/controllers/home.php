<?php  

Class Home extends Controller {
    public function index($name='') {
  
        
        $user=  $this->model('User');
        $user->name = $name;


        $this->view('home/index', ['name' => $user->name]);
    



        
        // $data['title'] = 'Home';
        // $this->view('templates/header', $data);
        // $this->view('home/index');
        // $this->view('templates/footer');
    }

    public function test() {
        echo 'home/test';
    }
}


?>