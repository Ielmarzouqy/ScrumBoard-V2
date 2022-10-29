<?php
    include('scripts.php');
	include('include/database.php');
	// include('include/data.php');


?>
<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="utf-8" />
	<title>YouCode | Scrum Board</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- ================== BEGIN core-css ================== -->
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="assets/css/vendor.min.css" rel="stylesheet" />
	<link href="assets/css/default/app.min.css" rel="stylesheet" />
	<link href="style.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
	<!-- ================== END core-css ================== -->
</head>
<body>

	<!-- BEGIN #app -->
	<div id="app" class="app-without-sidebar">
		<!-- BEGIN #content -->
		<div id="content" class="app-content main-style">
			<div class="row ">
				<div class="col-6">
					<ol class="breadcrumb">
						<li class="breadcrumb-item "><a class="text-white text-decoration-none" href="javascript:;">Home</a></li>
						<li class="breadcrumb-item active ">Scrum Board </li>
					</ol>
					<!-- BEGIN page-header -->
					<h1 class="page-header text-white">
						Scrum Board 
					</h1>
					<!-- END page-header -->
				</div>

				<div class="col-6 text-end">
					<button id="button" onclick="resetForm()" class="btn  rounded-pill  " type="button" data-toggle="modal" data-target="#modal-task" ><i class="bi bi-plus text-white"></i> Add Task</a>
				</div>
			</div>



			<div class="row" id ="tasksList">
				<div class="col-sm-6 col-md-4 ">
					<div class="card" style="background-color: #0F3460;">
						<div class="grad2 p-2 rounded-3">
							<h4 class="text-white">To do (<span id="to-do-tasks-count">0</span>)</h4>
						</div>

						<div class="" id="to-do-tasks">
							<!-- TO DO TASKS HERE -->
							<?php
							getTasks(1);
							?>	
							 <button class="task p-3 border-0 text-white bg-none mt-2 col-12 d-flex">
							   <div class="">
							   <i class="bi bi-check-circle  text-success me-2"></i> 
							   </div>
							   <div class="text-start">
								   <div class="text-white"><?php $row['title']?></div>
								   <div class="">
									   <div class="">#${compt}  ${tasks[i]["date"]}</div>
									   <div class="" title=" and details in the main/primary description of a tas."> ${description.slice(1,55)}...</div>
								   </div>
								   <div class="mt-2 ms-4">
									   <span class="btn"> ${["priority"]}</span>
									   <span class="btn2"> <?php ?></span>
								   </div>
								   </div>
								   <div class = "">
								   <button onclick = "" type="button" class="btn4 me-3 mb-3 float-right border"  data-toggle="modal" data-target="#modal-task" >Edit</button>
								   <button onclick = "" type="button" class="btn3 me-3 float-right border" data-dismiss="modal">Delete</button>
								   </div>
							   </div>
						   </button>			   
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 ">
					<div class="card" style="background-color: #0F3460;">
					
						<div class="grad2 p-2 rounded-3">
							<h4 class="text-white">In Progress (<span id="in-progress-tasks-count">0</span>)</h4>

						</div>
						<div class="" id="in-progress-tasks">
							<!-- IN PROGRESS TASKS HERE -->
							<?php
							getTasks(2);
							?>
							<!-- <button class="task p-3 border-0 text-white bg-none mt-2 col-12 d-flex">
							   <div class="">
							   <i class="bi bi-check-circle  text-success me-2"></i> 
							   </div>
							   <div class="text-start">
								   <div class="text-white"> ${["title"]}</div>
								   <div class="">
									   <div class="">#${compt}  ${tasks[i]["date"]}</div>
									   <div class="" title=" and details in the main/primary description of a tas."> ${description.slice(1,55)}...</div>
								   </div>
								   <div class="mt-2 ms-4">
									   <span class="btn"> ${["priority"]}</span>
									   <span class="btn2"> <?php ?></span>
								   </div>
								   </div>
								   <div class = "">
								   <button onclick = "prepareTaskData(${i})" type="button" class="btn4 me-3 mb-3 float-right border"  data-toggle="modal" data-target="#modal-task" >Edit</button>
								   <button onclick = "deleteTask( ${i})" type="button" class="btn3 me-3 float-right border" data-dismiss="modal">Delete</button>
								   </div>
							   </div>
						   </button> -->
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 ">
					<div class="card" style="background-color: #0F3460;">
						<div class="grad2 p-2 rounded-3">
							<h4 class="text-white">Done (<span id="done-tasks-count">0</span>)</h4>

						</div>
						<div class=" " id="done-tasks">
							<!-- DONE TASKS HERE -->
							<?php
							getTasks(3);
							?>
							<!-- <button class="task p-3 border-0 text-white bg-none mt-2 col-12 d-flex">
							   <div class="">
							   <i class="bi bi-check-circle  text-success me-2"></i> 
							   </div>
							   <div class="text-start">
								   <div class="text-white"> ${["title"]}</div>
								   <div class="">
									   <div class="">#${compt}  ${tasks[i]["date"]}</div>
									   <div class="" title=" and details in the main/primary description of a tas."> ${description.slice(1,55)}...</div>
								   </div>
								   <div class="mt-2 ms-4">
									   <span class="btn"> ${["priority"]}</span>
									   <span class="btn2"> <?php ?></span>
								   </div>
								   </div>
								   <div class = "">
								   <button onclick = "prepareTaskData(${i})" type="button" class="btn4 me-3 mb-3 float-right border"  data-toggle="modal" data-target="#modal-task" >Edit</button>
								   <button onclick = "deleteTask( ${i})" type="button" class="btn3 me-3 float-right border" data-dismiss="modal">Delete</button>
								   </div>
							   </div>
						   </button> -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END #content -->


		<!-- BEGIN scroll-top-btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
		<!-- END scroll-top-btn -->
	</div>
	<!-- END #app -->

	<!-- TASK MODAL -->
	<form action = "./scripts.php" method="POST" class=" form modal fade" id="modal-task" role="dialog" aria-labelledby="exempleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content  text-white">
				<div class="modal-header border-0 grad2">
					<h5 class="modal-title">Add Task</h5>
					<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> ******data-bs-dismiss*******-->
					<button type="button" class="btn-close Close text-white" data-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body ">
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Title</label>
						<input type="text" class="form-control TaskInput" id= "title" name = "title"><br>
						<div id="msg"></div>
					</div>
					<div class="mb-3 d-flex ">
						<label for="" class="col-form-label"  >Type</label>
						<div class="form-check ms-2 mt-5 ">
							<input class="form-check-input" type="radio" name="type" id="typeB" value="2" checked>
							<label class="form-check-label" for="flexRadioDefault1">
							Bug
							</label>
						</div>
						<div class="form-check ms-5 mt-5">
							<input class="form-check-input" type="radio" name="type" value="1" id="typeF">
							<label class="form-check-label" for="flexRadioDefault2">
								Feature
							</label>
						</div>
					</div>
					<div class="mb-3">
						<label for="Priority" class="col-form-label">Priority</label>
						<select class="form-select" aria-label="Default select example" id="priority" name = "priority">
							<option selected >Please select</option>
							<option value="1">Critical</option>
							<option value="2">High</option>
							<option value="3">Medium</option>
							<option value="4">Low</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="status" class="col-form-label" >Status</label>
						<select class="form-select" aria-label="Default select example" id="status" name = "status">
							<option selected>Please select</option>
							<option value="1">To Do</option>
							<option value="2">IN Progress</option>
							<option value="3">Done</option>
							
						</select>
					</div> 
					<div class="mb-3">
						<label for="Date" class="col-form-label">Date</label>
						<input type="date" class="form-control" id="date" name = "date">
					</div>
					 <div class="mb-3">
						<label for="message-text" class="col-form-label" >Description</label>
						<textarea class="form-control" id="description" name = "description"></textarea>
					</div> 
				</div>
				<div class="modal-footer border-0">
					<button type="button" class="btn2   border" data-dismiss="modal">Cancel</button>
					<button type="button" id = "update" class="btn btn-warning  border " data-dismiss="modal" onclick="editTask()">update</button>
					<button  type="submit" name="save" class="btn" id="save" >Save</button>
				</div>
			</div>
		</div>
	</form>
		<!-- Modal content goes here -->

		

	<!-- ================== BEGIN core-js ================== -->
	<script src="assets/js/vendor.min.js"></script>
	<script src="assets/js/app.min.js"></script>
	<script src="assets/js/data.js"></script>
	<script src="assets/js/script.js"></script>
	<!-- ================== END core-js ================== -->
</body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>