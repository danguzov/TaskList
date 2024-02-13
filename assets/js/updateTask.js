
    function showEditForm(taskId) {
    // Prikazi formu sa određenim ID-om
    document.getElementById('editTask_' + taskId).style.display = 'block';
}

    function cancelEdit(taskId) {
    // Sakrij formu sa određenim ID-om
    document.getElementById('editTask_' + taskId).style.display = 'none';
}

function finishTask(taskId) {

    // 1. do ajax request using fetch()
        // on the backend:
            // create new endpoint
    // 2. if response is success, remove the row from the table
    // 3. if response is not success (is_success: false), show an alert to user that the task is not completed
    // and show the error if error is present
}