<?php
$weightDec['man'] = 100;
$weightDec['woman'] = 110;

if (empty($_POST['sex'])) {
    echo "Не указан пол";
    die;
}

if (!array_key_exists($_POST['sex'], $weightDec)) {
    echo "Неверно указан пол: " . $_POST['sex'];
    die;
}

if (empty($_POST['height'])) {
    echo "Не указан рост";
    die;
}

$height = intval($_POST['height']);
if ($height < 130 || $height > 240) {
    echo "Неверно указан рост";
    die;
}

echo "Ваш идеальный вес: " . number_format(($height - $weightDec[$_POST['sex']]) * 1.15, 1) . " кг";
?>