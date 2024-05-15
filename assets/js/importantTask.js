
function importantTask(taskId, isImportant) {
    let url = APP_PREFIX + "/controllers/task/important.php";

    ajaxRequest(url, "post", {
        task_id: taskId,
        important: isImportant
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

