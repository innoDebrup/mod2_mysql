<?php

/**
 * Database Class to connect to the MySQL server and insert data in to the database.
 */
class Database {
  /**
   * Stores the connected database object provided by mysqli.
   * @var mixed
   */
  private $conn;

  /**
   * Constructor to establish connection.
   *
   * @param string $servername
   * Name of the DBMS server.
   * @param string $username
   * The DBMS username.
   * @param string $password
   * The DBMS access/login password.
   * @param string $database
   * The name of the Database to be used.
   * 
   */
  public function __construct(string $servername, string $username, string $password, string $database) {
    $this->conn = new mysqli($servername, $username, $password, $database);

    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }

  /**
   * Function to insert data into the employee_code_table.
   *
   * @param string $code
   * Employee code
   * @param string $code_name
   * Employee code name
   * @param string $domain
   * Employee domain or Area of Expertise.
   * 
   * @return void
   * 
   */
  public function insertDataCode($code, $code_name, $domain) {
    $sql = "INSERT INTO 
              employee_code_table (
                employee_code, 
                employee_code_name, 
                employee_domain
              ) 
              VALUES (
                '$code', 
                '$code_name', 
                '$domain'
              ); ";
    // Query is run in the connected server through the query method. 
    // The function returns TRUE if query is successfull, or FALSE if not.
    if ($this->conn->query($sql) === TRUE) {
      echo "New record created in 'employee_code_table' successfully" . nl2br("\n");
    }
    else {
      // Display the error.
      echo "Error: $this->conn->error";
    }
  }
  /**
   * Function to insert data into employee_salary_table.
   *
   * @param int $salary
   * Salary of the employee.
   * @param string $code
   * Employee code.
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
              '$salary', 
              '$code'
            ); ";
    // Query is run in the connected server through the query method. 
    // The function returns TRUE if query is successfull, or FALSE if not.
    if ($this->conn->query($sql) === TRUE) {
      echo "New record created in 'employee_salary_table' successfully" . nl2br("\n");    
    }
    // Display the error.
    else {
      echo "Error: $this->conn->error";
    }
  }
  /**
   * Function to insert the data into employee_details_table.
   *
   * @param string $first_name
   * First Name of the employee.
   * @param string $last_name
   * Last Name of the employee.
   * @param int $percentile
   * Graduation_percentile of the employee.
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
              '$first_name', 
              '$last_name', 
              '$percentile'
            ); ";
    // Query is run in the connected server through the query method. 
    // The function returns TRUE if query is successfull, or FALSE if not.
    if ($this->conn->query($sql) === TRUE) {
      echo "New record created in 'employee_details_table' successfully" . nl2br("\n");
    }
    // Display the error.
    else {
      echo "Error: $this->conn->error";
    }
  }

  /**
   * Function to close Database Connection.
   *
   * @return void
   */
  public function closeConnection() {
    $this->conn->close();
  }
}
