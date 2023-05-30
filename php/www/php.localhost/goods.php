<?php

$art = array(
    '1' => array(
        'name' => 'Товар №1',
        'weight' => '100 килограмм',
        'cost' => '100 рублей',
        'img' => 'https://bigrat.monster/media/bigrat.png'
    ),
    '2' => array(
        'name' => 'Товар №2',
        'weight' => '100 грамм',
        'cost' => '100 000 рублей',
        'img' => 'https://soggy.cat/img/soggycat.jpg'
    )
);

header('Content-Type: application/json');

if (empty($_POST['art'])) {
    echo json_encode(
        array(
            'error' => 'Не указан артикуль'
        )
    );
    die;
}

if (!array_key_exists($_POST['art'], $art)) {
    echo json_encode(
        array(
            'error' => "Неверно указан артикуль: " . $_POST['art']
        )
    );
    die;
}

echo json_encode($art[$_POST['art']]);

?>