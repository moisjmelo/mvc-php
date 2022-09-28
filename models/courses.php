<?php
class Courses extends model{
    private $info;
    public function getCoursesStudent($id_student){
        $array = array();
        $sql = "
        SELECT 
            student_course.id_course,
            courses.name, 
            courses.image,
            courses.description
        FROM 
            student_course 
            LEFT JOIN courses 
            ON student_course.id_course = courses.id
        WHERE 
            student_course.id_student = '$id_student'
        ";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }
        return $array;

    }

    public function setCourse($id){
        $sql = "SELECT * FROM courses WHERE id = '$id'";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0){
            $this->info = $sql->fetch();
        }
    }

    public function getName(){
        return $this->info['name'];
    }
    public function getImage(){
        return $this->info['image'];
    }
    public function getDescription(){
        return $this->info['description'];
    }

    public function getId(){
        return $this->info['id'];
    }

    public function getTotalClasses(){
        $sql = "SELECT id FROM class WHERE id_course = '".($this->getId())."' ";
        $sql = $this->db->query($sql);
        return $sql->rowCount();
    }
}

?>