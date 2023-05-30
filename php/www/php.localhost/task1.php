<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["task1"] = $_POST["answer"];
    header("Location: task2.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<body>

<h1>Вопрос 1</h1>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
  <input type="radio" id="answer1" name="answer" value="1">
  <label for="answer1">Ответ 1</label><br>
  <input type="radio" id="answer2" name="answer" value="2">
  <label for="answer2">Ответ 2</label><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>