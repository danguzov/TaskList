
    function confirmDelete(taskId) {
        let result = confirm("Are you sure you want to delete this task?");

        if(result) {
            window.location.href = "content.php?task_id=" + taskId;
        } else {
            // ovo nece raditi nista, ali ce da radi za cancel dugme
        }
    }