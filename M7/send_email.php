<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Email</title>
    <link rel="stylesheet" type="text/css" href="../style.css?t=<?php echo time(); ?>" />
    <style>
        .error { color: red; font-weight: bold; }
        .success { color: green; font-weight: bold; }
    </style>
</head>
<body class="page-enviar-email">
    <main>
        <h1>Enviar Email</h1>

        <?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


            $subject = '';
            $from_email = '';
            $to_email = '';
            $innerText = '';
            $htmlText = '';
            $has_errors = false;
            $errors = [];

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                error_reporting(-1);
                ini_set("display_errors", "1");
                
                $subject = trim(htmlspecialchars($_POST["subject"] ?? ''));
                $from_email = trim(htmlspecialchars($_POST["from"] ?? ''));
                $to_email = trim(htmlspecialchars($_POST["to"] ?? ''));
                $innerText = trim(htmlspecialchars($_POST["innerText"] ?? ''));
                $htmlText = $_POST["htmlText"] ?? '';

                if (empty($subject) || strlen($subject) < 3 || strlen($subject) > 988) {
                    $has_errors = true;
                    $errors[] = "El campo **Asunto** no puede estar vacío y debe contener entre 3 y 988 caracteres.";
                }

                if (empty($from_email) || !filter_var($from_email, FILTER_VALIDATE_EMAIL)) {
                    $has_errors = true;
                    $errors[] = "El campo **De** no es una dirección de correo válida.";
                }

                if (empty($to_email) || !filter_var($to_email, FILTER_VALIDATE_EMAIL)) {
                    $has_errors = true;
                    $errors[] = "El campo **Para** no es una dirección de correo válida.";
                }

                if (empty($innerText) || strlen($innerText) < 100 || strlen($innerText) > 5000) {
                    $has_errors = true;
                    $errors[] = "El campo **Texto** no puede estar vacío y debe contener entre 100 y 5000 caracteres.";
                }
                
                if (empty($htmlText) || strlen($htmlText) < 10) {
                     $has_errors = true;
                    $errors[] = "El campo **HTML Text** no puede estar vacío y debe contener al menos 10 caracteres.";
                }
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$has_errors) {
                
                $final_recipient = $to_email;
                
                // $from_header = "From: $from_email\n";
                // $reply_to_header = "Reply-To: $from_email\n";
                
                // $boundary = md5(uniqid(rand()));
                // $header = $from_header;
                // $header .= $reply_to_header;
                // $header .= "MIME-Version: 1.0\n";
                // $header .= "Content-type: multipart/alternative; boundary=\"----=_NextPart_" . $boundary . "\"";

                // $message = "Este es un mensaje con múltiples partes usando MIME.\n\n";

                // $message .= "------=_NextPart_" . $boundary . "\n";
                // $message .= "Content-Type: text/plain; charset=UTF-8\n";
                // $message .= "Content-Transfer-Encoding: 7bit\n\n";
                // $message .= $innerText . "\n\n";

                // $message .= "------=_NextPart_" . $boundary . "\n";
                // $message .= "Content-Type: text/html; charset=UTF-8\n";
                // $message .= "Content-Transfer-Encoding: 7bit\n\n";
                // $message .= $_POST["htmlText"] . "\n\n";
                
                // $message .= "------=_NextPart_" . $boundary . "--";

                try {
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'ruth.102004@gmail.com';                     //SMTP username
                    $mail->Password   = 'secret';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('ruth.102004@gmail.com', 'Mailer');
                    $mail->addAddress($final_recipient);
                    // $mail->addReplyTo('info@example.com', 'Information');
                    // $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');

                    //Attachments
                    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                    //Content
                    $mail->isHTML(false);
                    $mail->Subject = $subject;
                    $mail->Body    = $innerText;
                    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    echo "<p class='success'>Correo enviado con éxito a **$final_recipient**</p>";
                } catch (Exception $e) {
                    echo "<p class='error'>El correo **no** pudo ser enviado. Revisa la configuración de `sendmail` en tu servidor.</p>";
                }
                
                echo '<p><a href="' . basename(__FILE__) . '">Volver al formulario</a></p>';

            } else {
                if ($has_errors) {
                    echo "<div class='error'>**Hay errores en el formulario:**</div>";
                    echo "<ul>";
                    foreach ($errors as $error) {
                        echo "<li class='error'>$error</li>";
                    }
                    echo "</ul>";
                }
                
                ?>
                <form method="post">
                    <p>
                        <label for="subject">Asunto (Subject):</label>
                        <input type="text" name="subject" id="subject" value="<?php echo htmlspecialchars($subject); ?>">
                    </p>
                    <!-- <p>
                        <label for="from">De (From) - Tu email:</label>
                        <input type="text" name="from" id="from" value="<?php echo htmlspecialchars($from_email); ?>">
                    </p> -->
                    <p>
                        <label for="to">Para (To) - Email del Destinatario:</label>
                        <input type="text" name="to" id="to" value="<?php echo htmlspecialchars($to_email); ?>">
                    </p>
                    <p>
                        <label for="innerText">Texto Plano (Text) - Mínimo 100 caracteres:</label>
                        <textarea name="innerText" id="innerText" cols="30" rows="10"><?php echo htmlspecialchars($innerText); ?></textarea>
                    </p>
                    <!-- <p>
                        <label for="htmlText">Texto HTML (HTML Text) - Mínimo 10 caracteres:</label>
                        <textarea name="htmlText" id="htmlText" cols="30" rows="10"><?php echo htmlspecialchars($htmlText); ?></textarea>
                    </p> -->

                    <input type="submit" name="submit" value="Enviar">
                </form>
            <?php
            }
            ?>

    </main>
</body>
</html>