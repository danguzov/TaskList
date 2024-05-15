        function showEditModal(taskId) {
            let modal = document.getElementById('editTaskModal_' + taskId);
            modal.classList.remove('hidden');
        }

        function cancelEdit(taskId) {
            let modal = document.getElementById('editTaskModal_' + taskId);
            modal.classList.add('hidden');
        }


