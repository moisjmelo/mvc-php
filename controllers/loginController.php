<?php
class loginController extends controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $array = array();

        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $email = addslashes($_POST['email']);
            $passw = md5($_POST['passw']);

            $students = new Students();

            if ($students->login($email, $passw)) {
                header("Location:" . BASE_URL);
            }
        }
        $this->loadTemplate("login", $array);
    }

    public function logout()
    {
        unset($_SESSION['lgstudent']);
        header("Location:" . BASE_URL);
    }


    public function esqueci()
    {
        $array = array(
            'forgot' => ''
        );

        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $email = addslashes($_POST['email']);
            $passw = md5($_POST['passw']);

            $students = new Students();
            $array['forgot'] = $students->forgotPassword($email, $passw);
        }
        $this->loadTemplate("esqueci", $array);
    }
}
