<?php
class homeController extends controller{
    

    public function index(){
        $data = array(
            'info' => array(),
            'age' => 48,
            'name' => 'Moises',
        );

        $alunos = new Alunos();
        $data['info'] = $alunos;
        
        $this->loadTemplate('home', $data);
    }

   
}
