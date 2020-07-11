<?php
	CLass Model{
		private $server = "localhost";
		private $username = "root";
		private $password = "";
		private $db = "CRUD_ko";
		private $conn;


		public function __construct(){
			try{ 
				$this->conn = new PDO("mysql:host=$this->server;dbname=$this->db", $this->username, $this->password);

			}catch(PDOException $e){
				echo "connection failed". $e->getMessage();
			}
		 }
		public function insert(){
			if(isset($_POST['submit'])){ 
				if(isset($_POST['title']) && isset($_POST['description'])){
						if(!empty($_POST['title']) && !empty($_POST['description'])){
					    $title = $_POST['title'];
					    $description = $_POST['description'];

					    $query = "INSERT INTO userdata (title, description)VALUES('$title', '$description')";
					    if ($sql = $this->conn->exec($query)) {
					    	echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
							  <strong>Successfully Inserted!</strong>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
					    }else{
					    	echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							  <strong>Failed Inserted!</strong>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
					    }
				  }else{
				  	echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							  <strong>Empty Field!</strong>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
						</div>';
				  }
				}
			}
		}
		public function fetch(){
			$data = null;

			$stmt = $this->conn->prepare("SELECT * FROM userdata");
			$stmt->execute();
			$data = $stmt->fetchAll();
			return $data;
		}
	    public function del($del_id){
		
			$query = "DELETE FROM userdata WHERE id = '$del_id'";
	        if ($sql = $this->conn->exec($query)) {
					    	echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
							  <strong>Record has been Deleted Successfully!</strong>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
					    }else{
					    	echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							  <strong>Not Deleted!</strong>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
				   }
		   }
		 public function read($read_id){
			$data = null;

			$stmt = $this->conn->prepare("SELECT * FROM userdata WHERE id = '$read_id'");
			$stmt->execute();
			$data = $stmt->fetch();
			return $data;
		}

	 public function edit($edit_id){
			$data = null;

			$stmt = $this->conn->prepare("SELECT * FROM userdata WHERE id = '$edit_id'");
			$stmt->execute();
			$data = $stmt->fetch();
			return $data;
		}

	    public function update($data){
	    	//var_dump($data);
		
			$query = "UPDATE userdata SET title='$data[edit_title]',description='$data[edit_description]' WHERE id ='$data[edit_id]'";
	        if ($sql = $this->conn->exec($query)) {
					    	echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
							  <strong>Update record Successfully!</strong>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
					    }else{
					    	echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							  <strong>Failed record to update!</strong>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
				   }
		   }

   }

?>
