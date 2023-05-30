<?php
if (empty($_POST['fio'])) {
    echo "Не указана фамилия, имя и отчество";
    die;
}

if (empty($_POST['email'])) {
    echo "Не указан адрес электронной почты";
    die;
}

if (empty($_POST['phone'])) {
    echo "Не указан контактный номер телефона";
    die;
}

if (mail($_POST['email'], "Регистрация", "Привет, " . $_POST['fio'] . '!')) {
    echo "Ожидайте электронное письмо по адресу " . $_POST['email'];
} else {
    echo "Возникла ошибка при отправке письма на адрес " . $_POST['email'];
}
?>