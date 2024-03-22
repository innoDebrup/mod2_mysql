<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/style.css">
  <title>Employee Details</title>
</head>
<body>
  <div class="container">
    <form action="data.php" method="post">
      
      <label for="firstName">Employee FirstName</label>
      <input type="text" name="firstName" maxlength="30">
      
      
      <label for="firstName">Employee LastName</label>
      <input type="text" name="lastName" maxlength="30">
      
      <label for="firstName">Employee Code Name</label>
      <input type="text" name="codeName">
      
      <label for="firstName">Employee Domain</label>
      <input type="text" name="domain">
      
      <label for="firstName">Employee Salary</label>
      <input type="text" name="salary">
      
      <label for="firstName">Employee Graduation Percentile</label>
      <input type="text" name="percentile">

      <input type="submit" name="submit" value="SUBMIT">
    </form>
  </div>
</body>
</html>
