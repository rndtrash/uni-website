<?php
session_start();

if (empty($_SESSION["task1"]) || empty($_SESSION["task2"]) || empty($_SESSION["task3"])) {
    header("Location: task1.php");
    exit();
}

?>

Результаты:

<div>Вопрос 1: <?php echo $_SESSION["task1"] ?></div>
<div>Вопрос 2: <?php echo $_SESSION["task2"] ?></div>
<div>Вопрос 3: <?php echo $_SESSION["task3"] ?></div>

<a href="task1.php">Перепройти</a>