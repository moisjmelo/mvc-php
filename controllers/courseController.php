<?php
class courseController extends controller
{
    public function index()
    {
        $data = array(
            'info' => array(),
            'courses' => array(),
            'course' => array(),
            'modules' => array()
        );

        $students = new Students();
        $students->setStudent($_SESSION['lgstudent']);
        $data['info'] = $students;

        $courses = new Courses();
        $data['courses'] = $courses->getCoursesStudent($students->getIdStudent());

        $this->loadTemplateCourse('cursos', $data);
    }

    public function  entrar($id)
    {
        $students = new Students();
        $students->setStudent($_SESSION['lgstudent']);
        $data['info'] = $students;

        $course = new Courses();
        $course->setCourse($id);
        $data['course'] = $course;
        $modules =  new Modules();
        $data['modules'] = $modules->getModules($id);
        $data['quantity_class_seen'] = $students->getQuantityClassesSeen($id);
        $data['quantity_class_course'] = $course->getTotalClasses();

        if ($students->isRegistered($id)) {
            $this->loadTemplateCourse('curso_entrar', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }


    public function  aula($id_class)
    {
        $data = array(
            'info' => array(),
            'courses' => array(),
            'course' => array(),
            'modules' => array(),
            'class' => array()
        );

        $students = new Students();
        $students->setStudent($_SESSION['lgstudent']);
        $data['info'] = $students;

        $class = new Classes();
        $id = $class->getCourseClass($id_class);

        $course = new Courses();
        $course->setCourse($id);
        $data['course'] = $course;
        $data['quantity_class_seen'] = $students->getQuantityClassesSeen($id);
        $data['quantity_class_course'] = $course->getTotalClasses();

        $modules =  new Modules();
        $data['modules'] = $modules->getModules($id);

        $data['classe_info'] = $class->getClass($id_class);

        if($data['class_info']['tipy'] == 'video'){
            $view = 'course_class_video';
        }else{
            $view = 'course_class_quiz';
        }
        
        if(isset($_POST['doubt']) && !empty($_POST['doubt'])){
            $doubt = addslashes($_POST['doubt']);
            $class->setDoubt($doubt, $students->getIdStudent());
        }

        if(isset($_POST['option']) && !empty($_POST['option'])){
            $opcao = addslashes($_POST['option']);
            if($opcao == $data['class_info']['response']){
               $data['response'] = true; 
               $class->markAssisted($id_class);
            }else{
                $data['response'] = false; 
            }
        }

        if ($students->isRegistered($id)) {
            
            $this->loadTemplateCourse($view, $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }
}
