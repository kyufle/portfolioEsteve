<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar email</title>
    <link rel="stylesheet" type="text/css" href="../style.css?t=<?php echo time(); ?>" />
</head>
<body class="page-enviar-email">
    <main>
        <h1>Enviar email</h1>
        <?php if(empty($_POST)):?>
        <form method="post" action="">
            <p>
                <label for="subject">Asunto:</label>
                <input type="text" name="subject">
            </p>

            <input type="submit" name="submit" value="Enviar">
        </form>

    </main>
    <?php else:?>
        <?php
            error_reporting(-1);
            ini_set("display_errors", "1");
            $has_errors = false;
        if(empty($_POST["subject"]) || strlen($_POST["subject"] < 3 || strlen($_POST["subject"])) > 988){
            $has_errors = true;
            echo "<p>El campo subject no puede estar vacio y debere contener entre 3 y 988 caracteres";
        }
            if($has_errors){
                echo "Hay errores en el email";
            } 
            // else{
            //      $mailto = "rromerocarretero.cf@iesesteveterradas.cat";
            // $subject = $_POST["subject"];

            // $boundary=md5(uniqid(rand()));
            // $header = "From: info<".$mailto.">\n";
            // $header .= "Reply-To: ".$mailto."\n";
            // $header .= "MIME-Version: 1.0"."\n";
            // $header .= "Content-type: multipart/alternative; boundary=\"----=_NextPart_" . $boundary . "\"";

            // $message = "This is multipart message using MIME\n";

            // $message .= "------=_NextPart_" . $boundary . "\n";
            // $message .= "Content-Type: text/plain; charset=UTF-8\n";
            // $message .= "Content-Transfer-Encoding: 7bit". "\n\n";
            // $message .= "Plain text version\n\n";
            // $message .="------=_NextPart_" . $boundary . "\n";
            // $message .="Content-Type: text/html; charset=UTF-8\n";
            // $message .= "Content-Transfer-Encoding: 7bit". "\n\n";
            // $message .="
            // <center>
            // <b>HTML text version</b>
            // </center>
            // \n\n";
            // $message .= "------=_NextPart_" . $boundary . "--";

            if(mail(isset($mailto), isset($subject), isset($message), isset($header)))
            {
            print'email sent';
            }
            else
            {
            print"email was not sent";
            }
            ?>
        <p>form procesado</p>
        <a href="<?php basename(__FILE__)?>">Volver a enviar</a>
    <?php
            // }
    ?>
    <?php endif;?>
</body>
</html>