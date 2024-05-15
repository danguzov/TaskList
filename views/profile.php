<?php require_once "../include/header.php" ?>
<?php require_once "sidebar.php" ?>
<?php require_once "../class/EditProfile.php" ?>
<?php require_once "../class/User.php" ?>
<?php require_once  "../class/Database.php" ?>
<?php require_once "../controllers/editProfileController.php" ?>

<?php $user_id = $_SESSION['user_first_name']?>

<!-- <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
-->

<section class=" py-1 bg-blueGray-50">
    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
            <div class="rounded-t bg-white mb-0 px-6 py-6">
                <div class="text-center flex justify-between">
                    <h6 class="text-blueGray-700 text-xl font-bold">
                        My account
                    </h6>
                    <a href="changePassword.php" class="bg-indigo-500 text-white active:bg-indigo-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150">
                        <button  type="button">
                            Change Password
                        </button>
                    </a>
                </div>
            </div>
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form method="post" action="../controllers/editProfileController.php">
                    <h6 class="text-gray-400 text-sm mt-3 mb-6 font-bold">
                        User Information
                    </h6>
                    <div class="flex flex-wrap">
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    First Name
                                </label>
                                <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="border-1 border-black-100 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="<?= $user_id; ?>">
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Last name
                                </label>
                                <input type="text" name="last-name" id="last-name" value="<?= $last_name; ?>" autocomplete="family-name" class="border-1 border-black-100 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Email Address
                                </label>
                                <input id="email" name="email" type="email" value="<?= $userData['email'] ?>" class="border-1 border-black-100 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            </div>
                        </div>

                    </div>

                    <h6 class="text-gray-400 text-sm mt-3 mb-6 font-bold">
                        Contact Information
                    </h6>
                    <div class="flex flex-wrap">
                        <div class="w-full lg:w-12/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Address
                                </label>
                                <input type="text" name="address" id="street-address" value="<?= $userData['address'] ?>" class="border-1 border-black-100 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            </div>
                        </div>
                        <div class="w-full lg:w-4/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    City
                                </label>
                                <input type="text" name="city" id="city" value="<?= $userData['city'] ?>" class="border-1 border-black-100 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            </div>
                        </div>
                        <div class="w-full lg:w-4/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Postal Code
                                </label>
                                <input type="text" name="postcode" id="street-address" value="<?= $userData['postcode'] ?>" class="border-1 border-black-100 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            </div>
                        </div>
                        <div class="w-full lg:w-4/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Mobile number
                                </label>
                                <input type="text" name="mobile_number" id="street-address" value="<?= $userData['mobile_number'] ?>" class="border-1 border-black-100 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-between gap-x-6">
                        <a href="content.php" class="flex justify-start bg-white-500 text-grey active:bg-blue-200 text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 ease-linear transition-all duration-150 font-bold border-1 border-black-100">
                            <button type="button">
                                Back
                            </button>
                        </a>
                        <div class="flex justify-end">
                            <button type="button" class="bg-red-500 text-white active:bg-red-600 text-xs px-4 py-2 rounded-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150 font-bold">Cancel</button>
                            <button type="submit" class="bg-indigo-500 text-white active:bg-indigo-600 text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 ease-linear transition-all duration-150 font-bold">Save</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</section>

<?php require_once "../include/scripts.php" ?>
