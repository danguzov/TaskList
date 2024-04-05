
function finishTask(taskId) {

    let url = APP_PREFIX + "/controllers/completedController.php"

    ajaxRequest(url, "post", {
        task_id: taskId
    }).then(data => {
        if(data.success) {
            window.location.href = APP_PREFIX + "/views/completed_task.php?taskId=" + taskId;
        } else {
            alert("Failed to mark task as completed");
        }
    }).catch(err => {
        console.log("Error: " + err);
        alert("Failed to mark task as complete");
    });
}

function confirmMarkAsCompleted(taskId) {
    console.log("Confirm Task completed" + taskId);
    let result = confirm("Are you sure you want to mark this task as completed?");

    if(result) {
        finishTask(taskId);
    }
}

let checkboxes = document.querySelectorAll("table .task-checkbox");

checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        let taskId = this.value;
        finishTask(taskId);
    })
})

let checkboxes = document.querySelectorAll("task-checkbox");

checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        let taskId = this.value;
        finishTask(taskId);
    })
})


// 1. do ajax request using fetch()
// on the backend:
// create new endpoint
// 2. if response is success, remove the row from the table
// 3. if response is not success (is_success: false), show an alert to user that the task is not completed
// and show the error if error is present

