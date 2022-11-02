<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask();
    if(isset($_POST['update']))      updateTask();
    if(isset($_POST['delete']))      deleteTask();
    

    function getTasks($icon, $status)
    {
        global $conn;

        $sql = "SELECT tasks.id,tasks.title,tasks.priority_id,tasks.type_id,tasks.status_id, status.name as status, types.name as type, priorities.name as priority, tasks.task_datetime as date, tasks.description  
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
                        <button id ="'.$row['id'].'" class="d-flex" onclick ="edit_tasks('.$row['id'].', `'.$row['title'].'`, `'.$row['date'].'`, `'.$row['description'].'`, `'.$row['priority_id'].'`, `'.$row['type_id'].'`, `'.$row['status_id'].'`)" data-bs-toggle="modal" data-bs-target="#modal-task" >
                            <span class = "icon">
                               '.$icon.'
                            </span>
                            <div class=" task-body align-center text-start">
                                <div class ="title mb-2" name = "title"><h6>'.$row['title'].'</h6></div>
                                <div class = "date mb-2" name = "date">'.$row['date'].'</div>
                                <div class ="description mb-2" name = "description" >'.$row['description'].'</div>
                                <span class = "btn btn-warning priority" name = "priority">'.$row['priority'].'</span>
                                <span class = "btn btn-info type" name = "type">'.$row['type'].'</span>
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
        $type = $_POST['task-type'];
        $priority = $_POST['task-priority'];
        $status = $_POST['task-status'];
        $date = $_POST['task-date'];
        $description = $_POST['task-description'];

    

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
        global $conn;
        $id = $_POST['id_hidden'];
        $title = $_POST['title'];
        $type = $_POST['task-type'];
        $priority = $_POST['task-priority'];
        $status = $_POST['task-status'];
        $date = $_POST['task-date'];
        $description = $_POST['task-description'];
        //CODE HERE
        //SQL INSERT
        $sql ="UPDATE `tasks` SET `title`='$title',`type_id`='$type',`priority_id`=' $priority',`status_id`='$status',`task_datetime`='$date',`description`='$description'
         WHERE `id`='$id'";
        $results = mysqli_query($conn, $sql);
        //CODE HERE
        //SQL UPDATE
        $_SESSION['message'] = "Task has been updated successfully !";
		header('location: index.php');
    }

    function deleteTask()
    {
        global $conn;
        $id = $_POST['id_hidden'];
        //CODE HERE
        $sql="DELETE FROM `tasks` WHERE `id`='$id'";
        //SQL DELETE
        $results = mysqli_query($conn, $sql);

        $_SESSION['message'] = "Task has been deleted successfully !";
		header('location: index.php');
    }

    ?>



