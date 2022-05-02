<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Congrats!</title>
    <link rel="stylesheet" href="app.css" />
    <link rel="stylesheet" href="quizend.css" />
  </head>

  <body>
    <?php
// sql query will be executed
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $uname = $_POST['username'];
    $question = $_POST['question'];
    $score = $_POST['score'];
    $time = $_POST['time'];
    $perc = $_POST['percentage'];
    $date = $_POST['date'];
    $diff = $_POST['diff'];
    $topic = $_POST['topic'];

    // connect using MySQL database using MySQLi extension
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "users";

    // create a connection object
    $conn = mysqli_connect($servername,$username,$password,$database);
    // echo "connection was successful";

    // Die if connection was not successful
    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }else{
        $sql = "INSERT INTO `users` (`username`,`topic`,`difficulty`,`noques`,`date`,`time`,`score`, `percentage`) VALUES ('$uname', '$topic','$diff', '$question','$date','$time','$score','$perc')";
        $result = mysqli_query($conn,$sql);
        
        // if($result){
        //     echo "record has been inserted";
        // }else{
        //     echo "record has not been recorded.".mysqli_error($conn);
        // }
    }  
}
?>
    <div class="container">
      <h1 id="finalScore">Result</h1>
      <div id="score"></div>
      <form id="form" action="quizend.php" method="post">
        <input type="text"name="username" id="username" placeholder="username" required/>
        <input type="text" name="question" id="question" class="in" />
        <input type="text" name="topic" id="topic" class="in" />
        <input type="text" name="score" id="Score" class="in" />
        <input type="text" name="time" id="time" class="in" />
        <input type="text" name="diff" id="diff" class="in" />
        <input type="text" name="date" id="date" class="in" />
        <input type="text" name="percentage" id="percentage" class="in" />
        <button type="submit" class="btn" id="saveScoreBtn" name="submit">
          Save
        </button>
      </form>
      <a class="btn" href="quiz.html">Play Again</a>
      <a class="btn" href="/wtPROJECT" onclick="clear();">Go Home</a>
    </div>
    <script src="quizend.js"></script>
  </body>
</html>
