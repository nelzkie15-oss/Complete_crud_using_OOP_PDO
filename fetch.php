<?php 


include 'model.php';

$model = new Model();

$rows = $model->fetch();


?>


<table class="table">
	<thead>
		<tr>
		<th>ID</th>
		<th>Title</th>
		<th>Description</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>
     <?php 
     $i = 1;
		if(!empty($rows)){
         foreach ($rows as $row) {?>
          <tr>
          	<td><?php echo $i++;?></td>
            <td><?php echo $row['title'];?></td>
            <td><?php echo $row['description'];?></td>
            <td>
            	<a href="" id="Read" class="badge badge-info" value="<?php echo $row['id'];?>" data-toggle="modal" data-target="#exampleModal">Read</a>
            	<a href="" id="Delete" class="badge badge-danger" value="<?php echo $row['id'];?>">Delete</a>
            	<a href="" id="Edit" class="badge badge-warning" value="<?php echo $row['id'];?>" data-toggle="modal" data-target="#exampleModal1">Edit</a>
            </td>
          </tr>

     <?php    
         }

		}else{
			echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>No Data!</strong>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
			</div>';
		}

     ?>
	</tbody>
</table>