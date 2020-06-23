<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <title>Hello, world!</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="container">
<br><br>
<form id="form">
  <div class="col justify-content-center">
  <div class="" id="result"></div>
      <label>Title</label>
      <input type="text" class="form-control" placeholder="Title" id="title">

     <label>Description</label>
      <textarea class="form-control" id="description" cols="3"></textarea><br>
      <button class="btn btn-success float-right" value="Submit" id="submit">Submit</button>
    
  </div>
</form>
<br><br><br><Br>
<div class="row">
  <div class="col-md-12 mt-1">
   <div class="" id="delete"></div>
    <div class="" id="show"></div>
    <div class="" id="fetch"></div>

</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Single Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="" id="read"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">View</button>
      </div>
    </div>
  </div>
</div>
<!-- end Modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="" id="edit"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="update">Update</button>
      </div>
    </div>
  </div>
</div>
<!--end Modal -->
<script type="text/javascript">
  $(document).on('click', '#submit', function(e){
    e.preventDefault();
    let title = $("#title").val();
    console.log(title);
    let description = $("#description").val();
    console.log(description);
    let submit = $("#submit").val();

    $.ajax({

      url:"insert.php",
      type:"post",
      data:{
        title:title,
        description:description,
        submit:submit
      },
      success:function(data){
        fetch();
        $("#result").html(data);
          $('#result').fadeOut(3000);
      }
    });


    $("#form")[0].reset();

  });
  //fetch allRecord
  function fetch(){
    $.ajax({
     url: "fetch.php",
     type: "POST",
     success:function(data){
      $("#fetch").html(data);
     }
    });
  }
  fetch();

  //Delete Single record
  $(document).on('click', '#Delete', function(e){
    e.preventDefault();

    if(window.confirm("Do you want delete record?")){
     let del_id = $(this).attr("value");

       $.ajax({
        url: "del.php",
        type: "POST",
        data: {
          del_id: del_id
        },   
         success:function(data){
          fetch();
          $("#delete").html(data);
            $('#delete').fadeOut(3000);
         }

       });

     }else{
      return false;
     }

 });
   //Read Single record
  $(document).on('click', '#Read', function(e){
    e.preventDefault();

     let read_id = $(this).attr("value");

       $.ajax({
        url: "read.php",
        type: "POST",
        data: {
          read_id: read_id
        },   
         success:function(data){
          fetch();
          $("#read").html(data);
         }

       });

 });

  //Edit Single record
  $(document).on('click', '#Edit', function(e){
    e.preventDefault();

     let edit_id = $(this).attr("value");

       $.ajax({
        url: "edit.php",
        type: "POST",
        data: {
          edit_id: edit_id
        },   
         success:function(data){
          fetch();
          $("#edit").html(data);
         }

       });

 });
    //Update Single record
  $(document).on('click', '#update', function(e){
    e.preventDefault();
    let edit_title = $("#edit_title").val();
    console.log(edit_title);
    let edit_description = $("#edit_description").val();
    console.log(edit_description);
    let update = $("#update").val();
    let edit_id = $("#edit_id").val();


       $.ajax({
        url: "update.php",
        type: "POST",
        data: {
          edit_id: edit_id,
          edit_title: edit_title,
          edit_description: edit_description,
          update: update


        },   
         success:function(data){
          fetch();
          $("#show").html(data);
         $('#show').fadeOut(3000);
         }


       });

 });
  ///

</script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  </body>
</html>