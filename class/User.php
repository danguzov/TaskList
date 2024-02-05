<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "Database.php";
class User extends Database
{
    public $sql;
    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $password;


    /*
     * Videtiu sa bolikom da li u __constuctu() treba da se proslede svi atributi i za create() metodu, radi hesovanja lozinke
     * i lakseg odrzavanja koda
     */
    //Dependency injection
    public function __construct(Database $sql, $firstName = '')
    {
        $this->sql = $sql;
        $this->firstName = $firstName;
    }

    // Setteri

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setPassword($password)
    {
        $this->password = $this->hashPassword($password);
    }
    // Getteri


    /*
     * Videti na koji nacin funckionisu metode create() i getFirstName(), jer postoji mogucnost da kada pitam za upit
     * u bazu podataka za first name, on ne moze da izbaci jer ga nema u bazi podataka. Samo treba proveriti.
     */
    public function getFirstName($id)
    {
        $query = $this->sql->prepare("SELECT first_name FROM users WHERE id = ?");
        $query->bind_param("i", $id);
        $query->execute();

        $result = $query->get_result();

        if($row = $result->fetch_assoc()) {
            $this->firstName = $row['first_name'];
            return $this->firstName;
        } else {
            return "N/A";
        }

    }


    private function hashPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }


    public function create($firstName, $lastName, $email, $password)
    {
        //check for email & insert to DB
        if ($this->checkEmail($email)) {
            echo "User with this email address already exist, please try another one";
        } else {
            $insert = $this->sql->prepare("INSERT INTO users (first_name, last_name, email, password) VAlUES (?, ?, ?, ?)");
            $insert->bind_param("ssss", $firstName, $lastName, $email, $password);
            $insert->execute();

            $newUserId = $insert->insert_id;
            $this->setSession($newUserId);

            $_SESSION['registration_message'] = "Welcome, " . $firstName;

            header("Location: ../views/content.php");
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

    public function login($email, $password)
    {
        // Check user email and password
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
            }
        } else {
            echo "Something went wrong, email doesn't matched!";
        }
    }

    public function setSession($user)
    {
        session_start();
        session_regenerate_id(true);

        //provera da li korisnik postoji
        if(isset($user['id'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_first_name'] = $user['first_name'];
        } else {
            echo "User not found";
        }
    }

    public function logout()
    {
        if (session_status() == PHP_SESSION_ACTIVE) {
            session_start();
        }

        session_destroy();


        header("Location: ../views/login.php");
        exit();
    }

}

