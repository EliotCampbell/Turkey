<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $theme = strip_tags($_POST['theme']);
    $themeFieldset = "Событие: ";


    $name = strip_tags($_POST['name']);
    $nameFieldset = "Подписчик: ";



    $phone = strip_tags($_POST['phone']);
    $phoneFieldset = "Телефон: ";


$token = "1076989926:AAHzVK3xldGRsMVxyCzJ2ZYa9AA09oxeYBU";
$chat_id = "-366509636";
$arr = array(
  $themeFieldset => $theme,
  $nameFieldset => $name,
  $phoneFieldset => $phone
);
foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
if ($sendToTelegram) {

  echo '<p class="success">Водитель уже получил вашу заявку. Пожалуйста, дождитесь ответного звонка!</p>';
    return true;
} else {
  echo '<p class="fail"><b>Ошибка. Сообщение не отправлено!</b></p>';
}
}

?>
