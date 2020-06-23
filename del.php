<?php 


include 'model.php';

$del_id = $_POST['del_id'];

$model = new Model();

$insert = $model->del($del_id);


?>