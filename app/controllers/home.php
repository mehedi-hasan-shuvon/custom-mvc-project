<?php  

Class Home extends Controller {


    public function __construct(){
        $this->userModel = $this->model('User');
    }

    public function index($name='') {

        $userList= $this->userModel->getUsers();

        //get cities
        $cityList= $this->userModel->getCities();

        $data = [
            'title' => 'Home',
            'userList' => $userList,
            'cityList' => $cityList
        ];

        $this->view('home/index', $data);
    
    }

    public function deleteUser($id){
     
        $this->userModel->deleteUser($id);
        // header('location: ' . URLROOT . '/home/index');
    }

    public function addUser($data=[]){
        print_r($data);
        $this->userModel->createUser($data);
        header('location: ' . URLROOT . '/home/index');
    }

    public function about() {

        $this->userModel = $this->model('User');

        $userList= $this->userModel->getUsers();

        $data = [
            'title' => 'Home',
            'userList' => $userList
        ];

       


        $this->view('home/about', $data);
    }
}


?>