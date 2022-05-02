<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>High Scores</title>
    <!-- <link rel="stylesheet" href="app.css" /> -->
    <link rel="stylesheet" href="result.css" />
</head>

<body>
    <div id="heading">
        <h1>LeaderBoard</h1>
        <a class="btn" style="font-size:20px" href="/wtPROJECT">Go Home</a>
        <div id="find">
            <form id="form" action="result.php" method="post">
                <p id="res">Find Your Result : </p>
                <input type="text" id="user" name="username" placeholder="username">
                <button type="submit" class="btn" id="buto" name="Find">Find</button>
            </form>
        </div>
    </div>
    </div>
    <?php
// sql query will be executed
    // connect using MySQL database using MySQLi extension
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "users";

    // create a connection object
    $conn = mysqli_connect($servername,$username,$password,$database);
    // echo "connection was successful";
    if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['username']!=""){
      $uname = $_POST['username'];
      $sql = "SELECT * FROM `users` WHERE `username`='$uname'";
      echo "$sql";
      $result = mysqli_query($conn,$sql);

       $rows=mysqli_num_rows($result);

       if($rows>0){
        echo "<table >";
        echo "<tr><th>Username</th><th>Topic</th><th>Difficulty</th><th>Noofque</th><th>Date</th><th>Time</th><th>Score</th><th>Percentage</th></tr>";
        while($row = mysqli_fetch_array($result))
                 {
                 echo "<tr><td>" . $row['username']  . "</td><td> " .  $row['topic'] ."</td><td> " .  $row['difficulty'] ."</td><td> " .  $row['noques'] ."</td><td> " .  $row['date'] ."</td><td> " .  $row['time'] ."</td><td> " .  $row['score'] ."</td><td> " . $row['percentage'] . "</td></tr>";
                 }
        echo "</table>";
       }
       else{
          echo "<p>No Record Exist</p>";
       }
    }
    // Die if connection was not successful
    else{
    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }else{
        $sql = "SELECT * FROM `users`";
        $result = mysqli_query($conn,$sql);

       $rows=mysqli_num_rows($result);

       if($rows>0){
        echo "<table >";
        echo "<tr><th>Username</th><th>Topic</th><th>Difficulty</th><th>Noofque</th><th>Date</th><th>Time</th><th>Score</th><th>Percentage</th></tr>";
        while($row = mysqli_fetch_array($result))
                 {
                 echo "<tr><td>" . $row['username']  . "</td><td> " .  $row['topic'] ."</td><td> " .  $row['difficulty'] ."</td><td> " .  $row['noques'] ."</td><td> " .  $row['date'] ."</td><td> " .  $row['time'] ."</td><td> " .  $row['score'] ."</td><td> " . $row['percentage'] . "</td></tr>";
                 }
        echo "</table>";
       }
      }
}
?>
</body>

</html>