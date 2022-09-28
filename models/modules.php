<?php
class Modules extends model
{
    public function getModules($id_course)
    {
        $array = array();
        $sql = "SELECT * FROM modules WHERE id_course = '$id_course'";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();

            $classes = new Classes();

            foreach ($array as $mkeys =>$mDatas) {
                $array[$mkeys]['classes'] = $classes->getClassesModule($mDatas['id']);
            }
        }
        return $array;
    }
}
