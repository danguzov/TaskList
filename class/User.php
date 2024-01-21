<?php
// sta sam na 14 koraku PHP OOP programiranja, nastaviti dalje pun gas

require_once "Database.php";
class User
{
    public $db;
    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $password;

    //Dependency injection
    public function __construct(Database $connection)
    {
        $this->db = $connection;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $this->escape($firstName);
    }
    public function setLastName($lastName)
    {
        $this->lastName = $this->escape($lastName);
    }
    public function setEmail($email)
    {
        $this->email = $this->escape($email);
    }
    public function setPassword($password)
    {
        $this->password = $this->hashPassword($password);
    }

    public function escape($value)
    {
        return $this->db->real_escape_string($value);
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
            $insert = $this->db->prepare("INSERT INTO users (first_name, last_name, email, password) VAlUES (?, ?, ?, ?)");
            $insert->bind_param("ssss", $firstName, $lastName, $email, $password);
            $insert->execute();

            $newUserId = $insert->insert_id;
            $this->setSession($newUserId);

            header("Location: ../views/content.php");
        }
    }

    public function checkEmail($email)
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $query->bind_param("s", $email);
        $query->execute();
        $result = $query->get_result();

        return $result->num_rows > 0;
    }

    public function login($email, $password)
    {
        $this->email = $this->escape($email);
        $this->password = $this->escape($password);

        // Check user email and password
        $queryResult = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $queryResult->bind_param("s", $email);
        $queryResult->execute();
        $result = $queryResult->get_result();

        if ($result) {
            $user = $result->fetch_assoc();
            $verifyPassword = password_verify($password, $user['password']);

            if ($verifyPassword) {
                $this->setSession($user);
                header("location: ../view/content.php");
            } else {
                echo "You dumb-ass";
            }
        } else {
            echo "User with this email address already exist";
        }
    }
    // iz ove metode izbaciti upit u bazu jer se ponavlja vec 100 put
    public function setSession($user)
    {
        session_start();
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['id'];
        //GET first name from DB

    }

    public function logout()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        session_destroy();

        header("Location: index.php");
        exit();
    }

}

