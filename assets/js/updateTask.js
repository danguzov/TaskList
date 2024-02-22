
    function showEditForm(taskId) {
    // Prikazi formu sa određenim ID-em
    document.getElementById('editTask_' + taskId).style.display = 'block';
}

    function cancelEdit(taskId) {
    // Sakrij formu sa određenim ID-em
    document.getElementById('editTask_' + taskId).style.display = 'none';
}
