<?php
    session_start();
    require_once "../include/header.php";
    require_once "../class/Database.php";
    require_once "../class/User.php";

    $sql = new Database();
    $user = new User($sql);

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user->create($firstName, $lastName, $email, $password);
    }
?>



<div class="bg-white dark:bg-gray-900">
    <div class="flex justify-center h-screen">
        <div class="hidden bg-cover lg:block lg:w-2/3" style="background-image: url(https://images.unsplash.com/photo-1616763355603-9755a640a287?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80)">
            <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
                <div>
                    <h2 class="text-4xl font-bold text-white">Task List App</h2>

                    <p class="max-w-xl mt-3 text-gray-300">Lorem ipsum dolor sit, amet consectetur adipisicing elit. In autem ipsa, nulla laboriosam dolores, repellendus perferendis libero suscipit nam temporibus molestiae</p>
                </div>
            </div>
        </div>

        <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
            <div class="flex-1">
                <div class="text-center">
                    <h2 class="text-4xl font-bold text-center text-gray-700 dark:text-white">Sign Up</h2>

                    <p class="mt-3 text-gray-500 dark:text-gray-300">Sign in to access your account</p>
                </div>

                <div class="mt-8">
                    <form class="space-y-6" action="../controllers/registrationController.php" method="POST">
                        <div>
                            <label for="first_name" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">First Name</label>
                            <input id="email" name="first_name" type="text" placeholder="Enter your first name" required class="p-2 block w-full rounded-md border-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>

                        <div>
                            <label for="last_name" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Last Name</label>
                            <input id="email" name="last_name" type="text" placeholder="Enter your last name" required class="p-2 block w-full rounded-md border-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>

                        <div>
                            <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Email Address</label>
                            <input id="email" name="email" type="email" autocomplete="email" placeholder="example@example.com" required class="p-2 block w-full rounded-md border-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>

                        <div class="mt-6">
                            <div class="flex justify-between mb-2">
                                <label for="password" class="text-sm text-gray-600 dark:text-gray-200">Password</label>
                            </div>

                            <input id="email" name="password" type="password" autocomplete="email" placeholder="Your Password" required class="p-2 block w-full rounded-md border-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>

                        <div class="mt-6">
                            <button
                                    class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                Sign Up
                            </button>
                        </div>
                    </form>

                    <p class="mt-6 text-sm text-center text-gray-400">Already have an account? <a href="../index.php" class="text-blue-500 focus:outline-none focus:underline hover:underline">Log In</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once "footer.php"; ?>


