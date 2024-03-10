<?php

use Dotenv\Dotenv;

require_once "Database.php";
require_once "vendor/autoload.php";
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
//Loading the $_ENV values into variables.
$server_name = $_ENV['S_NAME'];
$user_name = $_ENV['USER_NAME'];
$password = $_ENV['PASSWORD'];
$db_name = $_ENV['DB_NAME'];

$database = new Database($server_name, $user_name, $password, $db_name);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $employee_first_name = $_POST['firstName'];
  $employee_last_name = $_POST['lastName'];
  $employee_code_name = $_POST['codeName'];
  $employee_salary = $_POST['salary'];
  $employee_domain = $_POST['domain'];
  $employee_percentile = $_POST['percentile'];
  $employee_code = 'su_' . strtolower($employee_first_name);
  $database->insertDataCode($employee_code, $employee_code_name, $employee_domain);
  $database->insertDataSalary($employee_salary, $employee_code);
  $database->insertDataDetails($employee_first_name, $employee_last_name, $employee_percentile);
  echo "Updated successfully!";
}