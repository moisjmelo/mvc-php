<?php

class controller {

 public function __construct() {
        global $currentModules;
        global $currentModule;        
        global $currentTemplate;
        global $config;       
        global $currentAction;
    }

    public function index(){
        
    }

    public function loadView($viewName, $viewData = array()) {
        extract($viewData);
        require 'views/'.$viewName.'/'.$viewName.'.php';
    }


    public function loadTemplate($viewName, $viewData = array()) {
        extract($viewData);
        require 'views/template.php';
    }

    public function loadTemplateCourse($viewName, $viewData = array()) {
        extract($viewData);
        require 'views/template_curso.php';
    }

    public function loadViewInTemplate($viewName, $viewData = array()) {
        extract($viewData);
       
        require 'views/'.$viewName.'/'.$viewName.'.php';
    }

    public function loadViewInTemplateCourse($viewName, $viewData = array()) {
        extract($viewData);
       if($viewName == 'curso_aula_video'){
        require 'views/curso_aula_video/curso_aula_video.php';

       }elseif($viewName == 'curso_aula_questionario'){
        require 'views/curso_aula_questionario.php';
       }
        
    }

    
   

}
