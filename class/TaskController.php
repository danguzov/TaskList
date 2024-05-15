<?php

    require_once "Task.php";
    require_once "Database.php";
    require_once dirname(__DIR__) . "/include/helpers.php";
    require_once dirname(__DIR__) . "/include/header.php";

    class TaskController
    {
        public $sql;

        public function __construct()
        {
            $database = new Database();
            $this->sql = $database->sql;
        }

        public function getAllTasks($status = 'all')
        {
            $task = new Task();
            return $task->getTasks($status);
        }


        public function create($user_id, $task, $priority)
        {
            $insert = $this->sql->prepare("INSERT INTO tasks(user_id, task, priority) VALUES (?, ?, ?)");
            $insert->bind_param("iss", $user_id, $task, $priority);
            $insert->execute();
        }

        public function delete()
        {
            $data = get_json_data();
            error_log("json data from request: " . json_encode($data), LOG_ERR);

            if (isset($data['task_id'])) {
                $task_id = $data['task_id'];
                error_log("task id from request: {$task_id}", LOG_ERR);

                $delete = $this->sql->prepare("DELETE FROM tasks WHERE id = ?");
                $delete->bind_param("i", $task_id);
                return $delete->execute();
            } else {
                error_log("task_id not found in \$_POST", LOG_ERR);
            }

            return false;
        }

        public function edit()
        {
            if (isset($_POST['task_id']) && isset($_POST['edited_task'])) {
                $task_id = $_POST['task_id'];
                $edited_task = $_POST['edited_task'];

                $update = $this->sql->prepare("UPDATE tasks SET task = ? WHERE id = ?");
                $update->bind_param("si", $edited_task, $task_id);
                $update->execute();

                header("Location: ../views/content.php");
                exit();
            }
        }
        public function markCompleted()
        {
            $data = get_json_data();
            error_log("json data from request: " . json_encode($data), LOG_ERR);

            if (! isset($data['task_id'])) {
                error_log("task_id not found in \$_POST", LOG_ERR);
                return false;
            }

            $task_id = $data['task_id'];
            $completed = $data['completed'];
            error_log("task id from request: {$task_id}", LOG_ERR);

            $query = $this->sql->prepare("UPDATE tasks SET completed = ? WHERE id = ?");
            $query->bind_param("ii", $completed, $task_id);

            var_dump($query);

            return $query->execute();
        }

        public function markImportant()
        {
            $data = get_json_data();
            error_log("json data from request: " . json_encode($data), LOG_ERR);

            if (! isset($data['task_id'])) {
                error_log("task_id not found in \$_POST", LOG_ERR);
                return false;
            }

            $task_id = $data['task_id'];
            $important = $data['important'];
            error_log("task id from request: {$task_id}", LOG_ERR);

            $query = $this->sql->prepare("UPDATE tasks SET important = ? WHERE id = ?");
            $query->bind_param("ii", $important, $task_id);

            return $query->execute();
        }

        public function renderTaskRow($task)
        {

            $done_html = $task['completed']
                ? "<i class='fa-solid fa-square-check' style='color: #28A745;'></i>"
                : "<i class='fa-regular fa-square-check' style='color: #28A745;'></i>";

            $new_done_state = ! $task['completed'];

            $star_html = $task['important']
                ? "<i class='fa-solid fa-star' style='color: #FFD43B;' ></i>"
                : "<i class='fa-regular fa-star' style='color: #FFD43B;'></i>";

            $new_important_state = ! $task['important'];

            return <<<HTML
                <tr id="task_{$task['id']}" tabindex="0" class="focus:outline-none h-16 border rounded">
                    <td class=""> <!-- CHECKBOX -->
                        <div class="ml-5">
                            <a href="javascript:void(0);" onclick="completedTask({$task['id']}, {$new_done_state})" title="Complete task">
                                {$done_html}
                            </a>
                        </div>
                    </td>
                        <!-- TASK IZ BAZE PODATAKA -->
                <td class="">
                    <div class="flex items-center pl-1">
                        <span id="task_{$task['id']}" class="text-base font-medium leading-none text-gray-700 mr-2">{$task['task']}</span>
                    </div>
                </td>
                
                <td class="pl-24">
                    
                </td>
                   
                <td class="pl-5">
                   {$task['time']}
                </td> 

                <td class="pl-4">
                    <button class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none">{$task['priority']}</button>
                </td>
                
                <td class="">
                    <a href="javascript:void(0);" onclick="showEditModal({$task['id']})" class="edit-icon" title="Edit Task">
                        <i class="fa-solid fa-pen-to-square" style="color: #74C0FC;"></i>
                    </a>
                    <a href="javascript:void(0);" onclick="confirmDelete({$task['id']})" class="delete-icon" title="Delete Task">
                        <i class="fa-solid fa-trash-can" style="color: #ff0000;"></i>
                    </a>
                    <a href="javascript:void(0);" onclick="importantTask({$task['id']}, {$new_important_state})" class="important-icon" title="Important Task">
                        {$star_html}
                    </a>
                    
                        <!-- Edit Task Modal -->
                    <div id="editTaskModal_{$task['id']}" class="fixed z-10 inset-0 overflow-y-auto hidden">
                        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                            <div class="fixed inset-0 bg-gray-500 opacity-75">
                                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Task</h3>
                                        <div class="mt-2">
                                            <form method="post" action="../controllers/editController.php">
                                                <input type="hidden" name="task_id" value="{$task['id']}">
                                                <input type="text" name="edited_task" class="border rounded-md px-3 py-2 w-full" value="{$task['task']}">
                                                <div class="mt-4 flex justify-end">
                                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                                                    <button class="ml-4 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="cancelEdit({$task['id']})">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </td>
                

            HTML;
        }


        public function renderTasksTable($tasks)
        {

            $html = <<<HTML
            <div class="container">
                 <table class="table"">
                    <thead class="table-heading">
                        <tr class="">
                            <div class="sm:px-6 w-full">
            <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
                        <div class="px-4 md:px-10 py-4 md:py-7">
                            <div class="flex items-center justify-between">
                                <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">Tasks</p>
                            </div>
                        </div>
                        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
                            <div class="sm:flex items-center justify-between">
                                <div class="flex items-center">
                                    <a href="../views/content.php" class="rounded-full focus:outline-none focus:ring-2  focus:bg-indigo-50 focus:ring-indigo-800" href=" javascript:void(0)">
                                        <div class="py-2 px-8 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full">
                                            <p>All</p>
                                        </div>
                                    </a>
                                    <a href="../views/content.php?status=completed" class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8" href="javascript:void(0)">
                                        <div class="py-2 px-8 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full">
                                            <p>Done</p>
                                        </div>
                                    </a>
                                    <a href="../views/content.php?status=important" class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8" href="javascript:void(0)">
                                        <div class="py-2 px-8 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                                            <p>Important</p>
                                        </div>
                                    </a>
                                </div>
                    
                                <!-- Trigger button for modal window -->
                                <button type="button" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <p class="text-sm font-medium leading-none text-white">Add Task</p>
                                </button>
                            </div>
                        </tr>
                    </thead>
                <tbody>
            </div>
            
                
            HTML;

                foreach ($tasks as $task) {
                    $html .= $this->renderTaskRow($task);
                }

                $html .= <<<HTML
                    </tbody>
                    </table>
            HTML;


            return $html;
        }
    }





