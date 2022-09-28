<?php
class Classes extends model
{
    public function getClassesModule($id)
    {
        $array = array();
        $student = $_SESSION['lgstudent'];
        $sql = "SELECT * FROM classes WHERE id_module = '$id' ORDER BY order";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();

            foreach ($array as $classKey => $class) {
                $array[$classKey]['watched'] = $this->iswatched($class['id'], $student);

                if ($class['type'] == 'video') {
                    $sql = "SELECT 'name' FROM videos WHERE id_class = '" . ($class['id']) . "'";
                    $sql = $this->db->query($sql)->fetch();
                    $array[$classKey]['name'] = $sql['name'];
                } elseif ($class['type'] == 'quiz') {
                    $array[$classKey]['name'] = "Questionário";
                }
            }
        }
        return $array;
    }





    public function getCourseClass($id_class)
    {
        $sql = "SELECT id_course FROM class WHERE id = '$id_class'";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $row = $sql->fetch();
            return $row['id_course'];
        } else {
            return 0;
        }
    }


    public function getClass($id_class)
    {
        $array = array();
        $id_student = $_SESSION['lgstudent'];
        $sql = "
        SELECT
           type,
           (select count(*) from historic where historic.id_class = class.id and historic.id_student = '$id_student') as watched

         FROM 
            classes 
         WHERE 
            id = '$id_class'";

        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $row = $sql->fetch();            

            if ($row['type'] == 'video') {
                $sql = "SELECT * FROM videos WHERE id_class = '$id_class'";
                $sql = $this->db->query($sql);
                $array = $sql->fetch();
                $array['type'] = 'video';
            } elseif ($row['type'] == 'quiz') {
                $sql = "SELECT * FROM quiz WHERE id_class = '$id_class'";
                $sql = $this->db->query($sql);
                $array = $sql->fetch();
                $array['type'] = 'quiz';
            }
        }
        $array['watched'] = $row['watched'];
        return $array;
    }


    public function setdoubt($doubt, $id_student)
    {
        $sql = "INSERT INTO doubts SET date_doubt = NOW(), doubt = '$doubt', id_student = '$id_student' ";
        $this->db->query($sql);
    }


    public function markAssisted($id)
    {
        $id_student = $_SESSION['lgstudent'];
        $sql = "INSERT INTO historic SET id_student = '$id_student', id_class = '$id', date_watched = NOW() ";
        $this->db->query($sql);
    }


    private function isWatched($id_class, $id_student)
    {
        $sql = "SELECT id FROM historic WHERE id_studet = '$id_student' AND id_class = '$id_class'";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

}
