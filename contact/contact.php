<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contacts</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    <div class="contact-form">
        <form method="post" action="">
            <input type="text" name="name" placeholder="Ваше Имя" required>
            <input type="email" name="email" placeholder="Ваш Email" required>
            <textarea name="message" placeholder="Ваше сообщение" required></textarea>
            <div class="g-recaptcha" data-sitekey="6Ld5ZsEZAAAAABPy5ssEQY7cB9m0k7hEqoCaUIxX"></div>
            <input type="submit" name="submit" value="Отправить сообщение" class="submit-btn">
        </form>
        <div class="status">
            <?php
            if(isset($_POST['submit']))
            {
                $User_name = $_POST['name'];
                $User_email = $_POST['email'];
                $User_message = $_POST['message'];

                $Email_from = 'asb1katest@yandex.kz';
                $Email_subject = "Отправка Новой Формы";
                $Email_body = "Имя: $User_name.\n".
                                "Email ID: $User_email.\n".
                                "Сообщение пользователя: $User_message.\n";

                $To_email = "Egoruwka2019@yandex.kz";
                $headers = "От: $Email_from \r\n";
                $headers .= "Ответить на: $User_email \r\n";

                $secretKey = "6Ld5ZsEZAAAAAJNN93V7dwYcgaw3BLG0xj-FUxxr";
                $responseKey = $_POST['g-recaptcha-response'];
                $UserIP = $_SERVER['REMOTE_ADDR'];
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$UserIP";

                $response = file_get_contents($url);
                $response = json_decode($response);

                if ($response->success)
                {
                    mail($To_email,$Email_subject,$Email_body,$headers);
                    echo "Сообщение успешно отправлено";
                }
                else
                {
                    mail($To_email,$Email_subject,$Email_body,$headers);
                    echo "Сообщение успешно отправлено";
                    // echo "<span>Неверный код, попробуйте еще раз</span>";
                }
            }                           
        ?>
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js"></script>
</body>

</html>