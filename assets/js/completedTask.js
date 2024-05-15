
function completedTask(taskId, isCompleted) {
    let url = APP_PREFIX + "/controllers/task/completed.php";

    ajaxRequest(url, "post", {
        task_id: taskId,
        completed: isCompleted
    }).then(data => {
        console.log("data: ", data)

        if (! data.is_success) {
            alert("Failed to move task")
            return
        }

        window.location.href = APP_PREFIX + "/views/content.php";

    }).catch(err => {
        console.log("Error: " + err);
    })
}


