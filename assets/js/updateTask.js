
    function showEditForm(taskId) {
    document.getElementById('editTask_' + taskId).style.display = 'block';
}

    function cancelEdit(taskId) {
    document.getElementById('editTask_' + taskId).style.display = 'none';
}
