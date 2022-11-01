<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask();
    if(isset($_POST['update']))      updateTask();
    if(isset($_POST['delete']))      deleteTask();
    

    function getTasks($status)
    {
        global $conn;

        $sql = "SELECT tasks.id,tasks.title, status.name as status, types.name as type, priorities.name as priority, tasks.task_datetime as date, tasks.description  
        FROM `tasks` 
             inner join status on tasks.status_id = status.id
             inner join types on tasks.type_id = types.id
             inner join priorities on tasks.priority_id = priorities.id";
        $result = mysqli_query($conn, $sql);
        //CODE HERE
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                 //SQL SELECT
                // echo "Fetch all tasks";
                if ($row['status'] == $status){
                   echo '
                        <button id ="'.$row['id'].'" class="d-flex" onclick ="edit_tasks(`'.$row['title'].'`, `'.$row['date'].'`, `'.$row['description'].'`, `'.$row['priority'].'`, `'.$row['type'].'`, `'.$row['status'].'`)" data-bs-toggle="modal" data-bs-target="#modal-task">
                            <span class = "icon">
                                <i class="bi bi-question-circle-fill text-green"></i>
                            </span>
                            <div class=" task-body align-center text-start">
                                <div class ="title mb-2"><h5>'.$row['title'].'</h5></div>
                                <div class = "date mb-2">'.$row['date'].'</div>
                                <div class ="description mb-2" >'.$row['description'].'</div>
                                <span class = "btn btn-danger priority">'.$row['priority'].'</span>
                                <span class = "btn btn-info type">'.$row['type'].'</span>
                            </div>
                        </button>

                        ';
                }
               
            }
       
    }
}
    function saveTask()
    {
        global $conn;
        $title = $_POST['title'];
        $type = $_POST['type'];
        $priority = $_POST['priority'];
        $status = $_POST['status'];
        $date = $_POST['date'];
        $description = $_POST['description'];

        //CODE HERE
        //SQL INSERT
        $sql = "INSERT INTO tasks( title, type_id, priority_id, status_id, task_datetime, description)
                VALUES ('$title', '$type', '$priority', '$status', '$date', '$description');";

        $results = mysqli_query($conn, $sql);

        $_SESSION['message'] = "Task has been added successfully !";
		header('location: index.php');
    }

    function updateTask()
    {
       
        //CODE HERE

        //SQL UPDATE
        $_SESSION['message'] = "Task has been updated successfully !";
		header('location: index.php');
    }

    function deleteTask()
    {
        //CODE HERE
        //SQL DELETE
        $_SESSION['message'] = "Task has been deleted successfully !";
		header('location: index.php');
    }

    ?>



