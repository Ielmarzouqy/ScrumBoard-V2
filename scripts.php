 <?php 
// include database file
include './include/database.php';

if(isset($_POST['save']))        saveTask();
if(isset($_POST['update']))      updateTask();
if(isset($_POST['delete']))      deleteTask();


function getTasks($status){
    global $conn;
    global $tasks;

    $sql = "SELECT * FROM tasks;";
    $result = mysqli_query($conn, $sql);

    // $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach($tasks as $row){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            if ($row["status_id"] == $status){
                // echo ('<button class="task p-3 border-0 text-white bg-none mt-2 col-12 d-flex">
                // <div class="">
                // <i class="bi bi-check-circle  text-success me-2"></i> 
                // </div>
                // <div class="text-start">
                //     <div class="text-white">'.$row['title'].'</div>
                //     <div class="">
                //         <div class="">'.$row['date'].'</div>
                //         <div class="" title=" and details in the main/primary description of a tas.">'.$row['description'].'...</div>
                //         </div>
                //         <div class="mt-2 ms-4">
                //             <span class="btn">'.$row['priority'].'</span>
                //             <span class="btn2"></span> </div>
                //             </div>
                //             <div class = "">
                //             <button onclick = "" type="button" class="btn4 me-3 mb-3 float-right border"  data-toggle="modal" data-target="#modal-task" >Edit</button>
                //             <button onclick = "" type="button" class="btn3 me-3 float-right border" data-dismiss="modal">Delete</button>
                //             </div>
                //         </div>
                //     </button>');
            
            }
        }
    }
}
}

function saveTask(){
    global $conn;

    $title = $_POST['title'];
    $type = $_POST['type'];
    $priority = $_POST['priority'];
    $status = $_POST['status'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    
    $sql = "INSERT INTO tasks( title, type_id, priority_id, status_id, task_datetime, description)
    VALUES ('$title', '$type', '$priority', '$status', '$date', '$description');";

    $results = mysqli_query($conn, $sql);

    if($results){
        echo "data inserted";
    } else {
        echo 'data isnot inserted';
    }
} 

function deleteTask(){
    // TODO 
}

function updateTask(){
    // TODO
}

