<?php

/**
 * Database Class to connect to MySQL server and insert data into the database.
 */
class Database {
  
  /**
   * Stores the connected database object provided by mysqli.
   * 
   * @var \PDO
   */
  private $conn;

  /**
   * Constructor to establish connection.
   *
   * @param string $servername
   *  Name of the DBMS server.
   * @param string $username
   *  The DBMS username.
   * @param string $password
   *  The DBMS access/login password.
   * @param string $database
   *  The name of the Database to be used.
   */
  public function __construct(string $servername, string $username, string $password, string $database) {
    try {
      $database_server = "mysql:host=$servername;dbname=$database";
      $pdo = new PDO($database_server, $username, $password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->conn = $pdo;
    }
    catch (PDOException $e) {
      die("Connection failed: " . $e->getMessage());
    }
  }

  /**
   * Function to insert data into the employee_code_table.
   *
   * @param string $code
   *  Employee code
   * @param string $code_name
   *  Employee code name
   * @param string $domain
   *  Employee domain or Area of Expertise.
   * 
   * @return void
   */
  public function insertDataCode($code, $code_name, $domain) {
    
    $sql = "INSERT INTO 
              employee_code_table (
                employee_code, 
                employee_code_name, 
                employee_domain
              ) 
              VALUES (
                :code, 
                :code_name, 
                :domain
              ); ";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
      ':code' => $code,
      ':code_name' => $code_name,
      ':domain' => $domain
    ]);
  }

  /**
   * Function to insert data into employee_salary_table.
   *
   * @param int $salary
   *  Salary of the employee.
   * @param string $code
   *  Employee code.
   * 
   * @return void
   */
  public function insertDataSalary(int $salary, string $code) {
    $sql = "INSERT INTO 
              employee_salary_table (
                employee_salary, 
                employee_code
              ) 
            VALUES (
              :salary, 
              :code
            ); ";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
      ':salary' => $salary,
      ':code' => $code
    ]);
  }

  /**
   * Function to insert the data into employee_details_table.
   *
   * @param string $first_name
   *  First Name of the employee.
   * @param string $last_name
   *  Last Name of the employee.
   * @param int $percentile
   *  Graduation_percentile of the employee.
   * 
   * @return void
   */
  public function insertDataDetails(string $first_name, string $last_name, int $percentile){
    $sql = "INSERT INTO 
              employee_details_table (
                employee_first_name, 
                employee_last_name, 
                Graduation_percentile
                ) 
            VALUES (
              :first_name, 
              :last_name, 
              :percentile
            ); ";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
      ':first_name' => $first_name,
      ':last_name' => $last_name,
      ':percentile' => $percentile
    ]);
  }

  /**
   * Function to close Database Connection.
   *
   * @return void
   */
  public function closeConnection() {
    unset($this->conn);
  }
}
