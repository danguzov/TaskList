<?php require_once "../include/header.php" ?>
<?php require_once "sidebar.php" ?>

<section class=" py-1 bg-blueGray-50">
    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
            <div class="rounded-t bg-white mb-0 px-6 py-6">
                <div class="text-center flex justify-between">
                    <h6 class="text-blueGray-700 text-xl font-bold">
                        Change Password
                    </h6>
                    <a href="profile.php" class="bg-indigo-500 text-white active:bg-indigo-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150">
                        <button  type="button">
                            Back to Profile page
                        </button>
                    </a>
                </div>
            </div>
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form method="post" action="../controllers/change_password.php">
                    <h6 class="text-gray-400 text-sm mt-3 mb-6 font-bold">
                        Type in input fields to change a password, be careful
                    </h6>
                    <div class="flex flex-wrap">
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Current Password
                                </label>
                                <input type="password" name="current_password" autocomplete="family-name" class="border-1 border-black-100 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">

                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    New Password
                                </label>
                                <input type="password" name="new_password" autocomplete="family-name" class="border-1 border-black-100 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Re-enter Password
                                </label>
                                <input type="password" name="confirm_password" autocomplete="family-name" class="border-1 border-black-100 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-center gap-x-6">
                        <button type="button" class="bg-red-500 text-white active:bg-red-600 text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150 font-bold">Cancel</button>
                        <button type="submit" class="bg-indigo-500 text-white active:bg-indigo-600 text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150 font-bold">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>

<?php require_once "../include/scripts.php" ?>