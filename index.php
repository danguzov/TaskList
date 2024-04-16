<?php include "include/header.php"  ?>

<link rel="stylesheet" type="text/css" href="assets/css/index.css">

<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7">
            <div class="flex justify-between">
                <div>
                    <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Task List App</h1>
                    <p class="col-lg-10 fs-4">"Experience seamless task management with our intuitive <em>Task List App</em>. Easily input, edit, delete, and check off tasks to stay organized and productive. Streamline your workflow and never miss a deadline again."</p>
                </div>

                <div class="w-1/2"> <!-- Postavljamo širinu forme na polovinu kako bi bila sa desne strane -->
                    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Log in to your account</h2>
                        <form class="mt-10 space-y-6" action="controllers/loginController.php" method="POST">
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Log in</button>
                    </div>
                        </form>
                        <p class="mt-10 text-center text-sm text-gray-500">
                            Not a member?
                            <a href="views/registration.php" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Sign up here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php  require_once "views/footer.php"?>


        <!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
        <!--
          This example requires updating your template:

          ```
          <html class="h-full bg-white">
          <body class="h-full">
          ```
        -->