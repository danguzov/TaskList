
    function confirmDelete(taskId) {
    console.log("Confirm delete", taskId);
        let result = confirm("Are you sure you want to delete this task?");
            console.log("Task ID:", taskId);
        if(result) {
            window.location.href = "../../views/content.php?task_id=" + taskId;
        } else {
            window.location.herf = "../../views/content.php";
            // for Cancel button
        }

        console.log(taskId);
    }