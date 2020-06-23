<?php 


include 'model.php';

$edit_id = $_POST['edit_id'];

$model = new Model();

$row = $model->edit($edit_id);
if(!empty($row)){?>
<form id="form">
  <div class="col justify-content-center">
  <div class="">
  	<input type="hidden" id="edit_id" name="" value="<?php echo $row['id'];?>">
  </div>
      <label>Title</label>
      <input type="text" class="form-control" placeholder="Title" id="edit_title" value="<?php echo $row['title'];?>">

     <label>Description</label>
      <textarea class="form-control" id="edit_description" cols="3"><?php echo $row['description'];?></textarea><br>
<!--       <button class="btn btn-success float-right" value="Submit" id="submit">Submit</button> -->
    
  </div>
</form>
<?php
  }
?>