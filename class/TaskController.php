<?php

    require_once "Task.php";
    require_once "Database.php";
    require_once "../include/helpers.php";
    require_once "../include/header.php";

    class TaskController
    {
        public $sql;

        public function __construct()
        {
            $database = new Database();
            $this->sql = $database->sql;
        }

        public function getAllTasks()
        {
            $task = new Task();
            return $task->getTasks();
        }


        public function create($user_id, $task, $date, $time, $priority)
        {
            $insert = $this->sql->prepare("INSERT INTO tasks(user_id, task, date, time, priority) VALUES (?, ?, ?, ?, ?)");
            $insert->bind_param("issss", $user_id, $task, $date, $time, $priority);
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

        public function renderTaskRow($task)
        {
            return <<<HTML
                
                <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                    <td> <!-- CHECKBOX -->
                        <div class="ml-5">
                            <div class="bg-gray-200 rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative">
                                <input placeholder="checkbox" type="checkbox" class="focus:opacity-100 checkbox opacity-0 absolute cursor-pointer w-full h-full" />
                                <div class="check-icon hidden bg-indigo-700 text-white rounded-sm">
                                   <svg class="icon icon-tabler icon-tabler-check" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <path d="M5 12l5 5l10 -10"></path> 
                                   </svg> 
                                </div>
                            </div>
                        </div>
                    </td>
            <!-- TASK IZ BAZE PODATAKA -->
                <td class="">
                    <div class="flex items-center pl-5">
                        <span id="task_{$task['id']}" class="text-base font-medium leading-none text-gray-700 mr-2">{$task['task']}</span>
                    </div>
                </td>

                <td class="pl-24">
                    {$task['date']}
                </td>

                <td class="pl-5">
                    {$task['time']}
                </td>
                
                <td class="pl-5">

                </td>

                <td class="pl-4">
                    <button class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none">{$task['priority']}</button>
                </td>

                <td> 
                    <div id="editTask_{$task['id']}" style="display: none;">
                        <!-- Hidden form for editing tasks -->
                        <form method="post" action="../controllers/editController.php">
                            <input type="hidden" name="task_id" value="{$task['id']}">
                            <input type="text" name="edited_task" style="height: 30px; border-radius: 3px; padding: 5px;" value="{$task['task']}">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-danger" onclick="cancelEdit({$task['id']})">Cancel</button>
                        </form>
                    </div>
                </td>
                     
                <td>
                    <a href="javascript:void(0);" onclick="showEditForm({$task['id']})" class="edit-icon" title="Edit Task">
                        <i class="fa-solid fa-pen-to-square" style="color: #74C0FC;"></i>
                    </a>
                    <a href="javascript:void(0);" onclick="confirmDelete({$task['id']})" class="delete-icon" title="Delete Task">
                        <i class="fa-solid fa-trash-can" style="color: #ff0000;"></i>
                    </a>
                    <a href="javascript:void(0);" onclick="importantTask({$task['id']})" class="important-icon" title="Important Task">
                        <i class="fa-solid fa-star" style="color: #FFD43B;"></i>    
                    </a>               
                </td>
            </tr>
                
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
                                    <a href="../views/completed_tasks.php" class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8" href="javascript:void(0)">
                                        <div class="py-2 px-8 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full">
                                            <p>Done</p>
                                        </div>
                                    </a>
                                    <a href="../views/important.php" class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8" href="javascript:void(0)">
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





