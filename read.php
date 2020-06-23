<?php 


include 'model.php';

$read_id = $_POST['read_id'];

$model = new Model();

$row = $model->read($read_id);

if(!empty($row)){?>
 <form id="">
  <div class="col justify-content-center">
      <label>Title</label>
      <input type="text" class="form-control"  value="<?php echo $row['title'];?>">
     <label>Description</label>
      <textarea class="form-control" id="edit_description" cols="3"><?php echo $row['description'];?></textarea><br>
  </div>
</form>
<?php
  }
?>