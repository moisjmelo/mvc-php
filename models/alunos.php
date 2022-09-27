<?php
class Alunos extends model
{
    private $info;
    public function islogged()
    {
        if (isset($_SESSION['lgaluno']) && !empty($_SESSION['lgaluno'])) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $senha)
    {
        $sql = "SELECT * FROM alunos WHERE email = '$email' AND  senha = '$senha' ";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $row = $sql->fetch();

            $_SESSION['lgaluno'] = $row['id'];

            return true;
        }
        return false;
    }

    public function setAluno($id)
    {
        $sql = "SELECT * FROM alunos WHERE id = '$id'";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $this->info = $sql->fetch();
        }
    }

    public function getNome()
    {
        return $this->info['nome'];
    }

    public function getIdAluno()
    {
        return $this->info['id'];
    }

    public function isInscrito($id_curso)
    {
        $sql = "SELECT * FROM aluno_curso WHERE id_aluno = '" . ($this->info['id']) . "'
        AND id_curso = '$id_curso'";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getIdAlu()
    {
        return $this->info['id'];
    }


    public function getQtdAulasAssistidas($id_curso)
    {
        $sql = "
        SELECT id 
        FROM historico 
        WHERE 
            id_aluno = '" . ($this->getIdAlu()) . "'
        AND
            id_aula IN (select aulas.id from aulas where aulas.id_curso = '$id_curso') ";
        $sql = $this->db->query($sql);


        return $sql->rowCount();
    }


    public function esqueciASenha($email, $senha)
    {
        $sql = "SELECT email FROM alunos WHERE email = '$email'";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $sql = ("UPDATE alunos SET senha = '$senha' WHERE email = '$email'");
            $this->db->query($sql);
            header("Location:" . BASE_URL);
        } else {
            return 'Email Inexistente';
        }
    }
}
