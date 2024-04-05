<?php require_once "../include/header.php" ?>
<link href="../assets/css/sidebar.css" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px;">
            <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <svg class="bi pe-none me-2" width="40" height="32"></svg>
                <span class="fs-4">Menu</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="content.php" class="nav-link active" aria-current="page">
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                        Home
                    </a>
                </li>

                <li>
                    <a href="completed_tasks.php" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                        Complited Tasks
                    </a>
                </li>

                <li>
                    <a href="profile.php" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                        Profile
                    </a>
                </li>

                <li>
                    <a href="change_password.php" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                        Change Password
                    </a>
                </li>
            </ul>
            <hr>
        </div>
        </div>
    </div>



