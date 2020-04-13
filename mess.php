<meta charset="utf-8">
<?php
header('Content-Type: utf-8');
// error_reporting(E_ERROR);   //Отключение предупреждений и нотайсов (warning и notice) на сайте
// создание переменных из полей формы		
if (isset($_POST['name'])) {
    $name1            = $_POST['name'];
    if ($name1 == '') {
        unset($name1);
    }
}
if (isset($_POST['email'])) {
    $email1        = $_POST['email'];
    if ($email1 == '') {
        unset($email1);
    }
}
if (isset($_POST['phone'])) {
    $phone        = $_POST['phone'];
    if ($phone == '') {
        unset($phone);
    }
}
if (isset($_POST['message'])) {
    $text            = $_POST['message'];
    if ($text == '') {
        unset($text);
    }
}
if (isset($_POST['sab'])) {
    $sab            = $_POST['sab'];
    if ($sab == '') {
        unset($sab);
    }
}
//стирание треугольных скобок из полей формы
if (isset($name1)) {
    $name1 = stripslashes($name1);
    $name1 = htmlspecialchars($name1);
}
if (isset($email1)) {
    $email1 = stripslashes($email1);
    $email1 = htmlspecialchars($email1);
}
if (isset($phone)) {
    $phone = stripslashes($phone);
    $phone = htmlspecialchars($phone);
}
if (isset($text)) {
    $text = stripslashes($text);
    $text = htmlspecialchars($text);
}
// адрес почты куда придет письмо
$address = "info@armeniancoins.am";
// текст письма 
$note_text = "Name : $name1 \r\n Email : $email1 \r\n Phone : $phone \r\n  Message : $text";

if (isset($name1)  &&  isset($sab)) {
    mail($address, "From $name1", $note_text, "Content-type:text/plain; utf-8");
    // сообщение после отправки формы
    echo "<p style='color:#009900;'>Հարգելի <b>$name1</b> Ձեր նամակն ուղարկված է.</p>";
}

?>