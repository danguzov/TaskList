<?php

    require_once "User.php";

    class RegistrationController extends LoginController
    {
        private $user;

        public function __construct(User $user)
        {
            parent::__construct();
            $this->sql = new Database();
            $this->user = $user;
        }
        public function create($firstName, $lastName, $email, $password)
        {
            //check for email & insert to DB
            if ($this->checkEmail($email)) {
                echo "User with this email address already exist, please try another one";
            } else {
                $insert = $this->sql->prepare("INSERT INTO users (first_name, last_name, email, password) VAlUES (?, ?, ?, ?)");
                $hashed_password = $this->getHashedPassword($password);
                $insert->bind_param("ssss", $firstName, $lastName, $email, $hashed_password);
                $insert->execute();

                $newUserId = $insert->insert_id;
                $user_data = $this->user->getUserById($newUserId);
                $this->setSession($user_data);

                $_SESSION['registration_message'] = "Welcome, " . $firstName;

                header("Location: ../views/content.php");
            }
        }
    }