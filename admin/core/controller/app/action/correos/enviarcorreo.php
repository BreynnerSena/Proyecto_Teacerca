
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

class enviarEmail
{

    public function enviarCorreo($em, $accion, $clave)
    {
        try {


            $mail = new PHPMailer(true);

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true

                )
            );

            //Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'teacerc4@gmail.com';
            $mail->Password   = 'teacerca12345678';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            //Recipients
            $mail->setFrom('teacerc4@gmail.com', 'Mailer');
            $mail->addAddress($em, '');   // Add a recipient


            $codigo = rand(5, 2000 * 50);
            $_SESSION["CODIGO"] = $codigo;


            // Content
            $mail->isHTML(true);

            switch ($accion) {
                case 1: // Recuperación de contraseña enviando código

                    $mail->Subject = "MENSAJE TEACERCA";
                    $mail->Body   = 'Estimado Usuario Teacerca te ha enviado un correo 
                 para la recuperaci&oacuten de contrase&ntildea. Su c&oacutedigo de confirmaci&oacuten es ' . $codigo;

                    break;


                case 2:
                    // Envio de correo para registro de usuario
                    $mail->Subject = 'Usuario registrado';
                    $mail->Body    = 'Usted ha sido registrado en el sistema Teacerca. Ingrese con el nombre de usuario ' . $em . " y su contrase&ntildea " . $clave;

                    break;

                default:
                    # code...
                    break;
            }

            $mail->send();
        } catch (Exception $e) {
            echo "ERROR EN EL ENVIO DE CORREO";
        }
    }
}
