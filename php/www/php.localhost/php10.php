<?php

if (empty($_POST['date1'])) {
    echo 'Не указана дата начала промежутка';
    die;
}

//echo $_POST['date1'];
$dateStart = DateTime::createFromFormat('Y-m-d', $_POST['date1']);

if (empty($_POST['date2'])) {
    echo 'Не указана дата конца промежутка';
    die;
}

//echo $_POST['date2'];
$dateEnd = DateTime::createFromFormat('Y-m-d', $_POST['date2']);

echo $dateStart->diff($dateEnd)->days;

?>