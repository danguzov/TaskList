<?php

    require_once "User.php";
    require_once "Database.php";

    class LoginController
    {
        protected $sql;

        public function __construct(Database $sql = new Database())
        {
            $this->sql = $sql;
        }

        public function login($request)
        {
            $email = $request['email'] ?? null;
            $password = $request['password'] ?? null;

            if(!isset($email) || empty($email)) {
                echo "You must enter email address";
            }

            if(!isset($password) || empty($password)) {
            echo "You must enter password";
            }

            $queryResult = $this->sql->prepare("SELECT * FROM users WHERE email = ?");
            $queryResult->bind_param("s", $email);
            $queryResult->execute();
            $result = $queryResult->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                $verifyPassword = password_verify($password, $user['password']);

                if ($verifyPassword) {
                    $this->setSession($user);
                    header("Location: ../views/content.php");
                } else {
                    echo "Wrong password!";
                    var_dump($password);
                }
            } else {
                echo "Something went wrong, email doesn't matched!";
            }
        }

        public function checkEmail($email)
        {
            $query = $this->sql->prepare("SELECT * FROM users WHERE email = ?");
            $query->bind_param("s", $email);
            $query->execute();
            $result = $query->get_result();

            return $result->num_rows > 0;
        }


        private function hashPassword($password)
        {
            return password_hash($password, PASSWORD_BCRYPT);
        }

        public function getHashedPassword($password)
        {
            return $this->hashPassword($password);
        }






        public function setSession($user)
        {
            session_start();
            session_regenerate_id(true);

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_first_name'] = $user['first_name'];
            $_SESSION['user_email'] = $user['email'];
        }

        public function logout()
        {
            if (session_status() != PHP_SESSION_ACTIVE) {
                session_start();
            }

            session_destroy();
        }
}
