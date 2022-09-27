<?php
class homeController extends controller
{
    public function __construct(){
        parent::__construct();
        $students = new Students();   
        if(!$students->islogged()){
            header("Location:".BASE_URL."login");
        }     
    }


    public function index()
    {
        $data = array();

        $students = new Students();
        $students->setStudent($_SESSION['lgstudent']);
        $data['info'] = $students;

        $this->loadTemplate('home', $data);
    }
}
