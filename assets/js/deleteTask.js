    function deleteTask(taskId) {
        let url = APP_PREFIX + "/controllers/task/delete.php";

        ajaxRequest(url, "post", {
            task_id: taskId
        }).then(data => {
            console.log("response: ", data)
            let deleted = data.deleted

            if (deleted) {
                window.location.reload()
            } else {
                alert("Failed to delete task")
            }
        }).catch(err => {
            console.log("Error: " + err);
        })
   }

    function confirmDelete(taskId) {
        console.log("Confirm TASK delete", taskId);
        let result = confirm("Are you sure you want to delete this task?");

        if (result) {
            deleteTask(taskId)
        }
    }