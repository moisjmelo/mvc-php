<?php
class Students extends model
{
    private $info;
    public function islogged()
    {
        if (isset($_SESSION['lgstudent']) && !empty($_SESSION['lgstudent'])) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $passw)
    {
        $sql = "SELECT * FROM students WHERE email = '$email' AND  passw = '$passw' ";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $row = $sql->fetch();

            $_SESSION['lgstudent'] = $row['id'];

            return true;
        }
        return false;
    }

    public function setStudent($id)
    {
        $sql = "SELECT * FROM students WHERE id = '$id'";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $this->info = $sql->fetch();
        }
    }

    public function getName()
    {
        return $this->info['name'];
    }

    public function getIdStudent()
    {
        return $this->info['id'];
    }

    public function isRegistered($id_course)
    {
        $sql = "SELECT * FROM student_course WHERE id_student = '" . ($this->info['id']) . "'
        AND id_course = '$id_course'";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function getQuantityClassesSeen($id_course)
    {
        $sql = "
        SELECT id 
        FROM historic 
        WHERE 
            id_student = '" . ($this->getIdStudent()) . "'
        AND
            id_class IN (select class.id from class where class.id_course = '$id_course') ";
        $sql = $this->db->query($sql);


        return $sql->rowCount();
    }


    public function forgotPassword($email, $password)
    {
        $sql = "SELECT email FROM students WHERE email = '$email'";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $sql = ("UPDATE students SET password = '$password' WHERE email = '$email'");
            $this->db->query($sql);
            header("Location:" . BASE_URL);
        } else {
            return 'Email Inexistente';
        }
    }
}
