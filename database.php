<?php 

class database{

    private $host;
    private $username;
    private $password;
    private $database;
    private $dbh;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->database = 'jongerenkansrijker';
        
        $dsn = "mysql:host=$this->host;dbname=$this->database";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            //can put $dsn here.
            $this->dbh = new PDO($dsn, $this->username, $this->password, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
            
        }
        
    }

    public function insert($statement, $placeholders, $location=null)
    {
        try {
            $this->dbh->beginTransaction();

            $stmt = $this->dbh->prepare($statement);
            $stmt->execute($placeholders);

            $this->dbh->commit();
            if(!is_null($location)){
                header("location: $location.php");
            }
        } catch (Exception $e){
            $this->db_connection->rollback();
            throw $e;
        }
    }

    public function login($username, $password)
    {
        //placeholders gebruikt in geval van verandering database tabelnamen
        $sql = "SELECT medewerkerID, username, password FROM medewerker WHERE username = :username";

        $stmt = $this->db_connection->prepare($sql);

        $stmt->execute(['username'=>$username]);

        // data ophalen uit de database
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if(is_array($result) && count($result) > 0){
            
            if($username && password_verify($password, $result['password'])){
                session_start();

                $_SESSION['medewerkerID'] = $result['medewerkerID'];
                $_SESSION['username'] = $result['username'];
                $_SESSION['is_logged_in'] = true;

                $date = date("Y-m-d H:i:s");

                header("location: welcome.php");


            }else{
                echo 'Username and/or password is incorrect.';
            }
                
        
        }else{
            echo 'Username and/or password is incorrect.';
        }
    }

    public function select($sql, $placeholders = []){
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($placeholders);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($result)){
            return $result;
        }

        return;
    }


 
    
}

?>