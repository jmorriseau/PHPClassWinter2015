<?php
if (isset($_POST['tasklist'])) {
    $task_list = $_POST['tasklist'];
} else {
    $task_list = array();

    // some hard-coded starting values to make testing easier
    $task_list[] = 'Write chapter';
    $task_list[] = 'Edit chapter';
    $task_list[] = 'Proofread chapter';
}

$errors = array();

if(!empty($_POST)){
switch( $_POST['action'] ) {
    case 'Add Task':
        $new_task = $_POST['newtask'];
        if (empty($new_task)) {
            $errors[] = 'The new task cannot be empty.';
        } else {
            array_push($task_list, $new_task);
//            $task_list[] = $new_task;
        }
        break;
    case 'Delete Task':
        $task_index = $_POST['taskid'];
        unset($task_list[$task_index]);
        $task_list = array_values($task_list);
        break;
    case 'Modify Task':
        $task_index = $_POST['taskid'];        
        $task_to_modify = $task_list[$task_index];
        break;
    case 'Save Changes':
        $task_index = $_POST['modifiedtaskid'];
        $modified_task = $_POST['modifiedtask'];
        $task_list[$task_index] = $modified_task;
        break;

    case 'Promote Task':
        $promote_task_id = $_POST['taskid']; 
            if ($promote_task_id <= 0){
                $errors[] = 'You cannot promote the first task';
            }else {
                $promoted_task = $task_list[$promote_task_id - 1];
                $demoted_task = $task_list[$promote_task_id];
                $task_list[$promote_task_id] = $promoted_task;
                $task_list[$promote_task_id - 1] = $demoted_task;               
            }
        break;
    
    case 'Sort Tasks':
        sort($task_list);
        break;

    case 'Cancel Changes':
        break;
    
  

}
}

include('task_list.php');
?>