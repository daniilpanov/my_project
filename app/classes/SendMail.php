<?php
namespace app\classes;


class SendMail
{
    private $to; // email получателя
    private $from; // email отправителя для ответа
    private $mail = "office@"; // email сервера с доменным именем
    private $phone; // номер телефона отправителя
    private $subject; // тема письма
    private $message; // текст письма
    private	$headers; // кодировка отправляемого письма

    public function send_mail($from, $subject, $message, $phone = null)
    {
        $this->from = $from;
        $this->subject = $subject;
        $this->message = $message;
        $this->phone = $phone;

        if($phone)
        {
            $this->message .= "<b><br><br>Номер телефона для связи: <u>".$this->phone."</u></b>";
        }

        $this->message .= "<br><br><b><i>Это письмо было отправлено с сайта <a href='{$_SERVER['HTTP_HOST']}'>".$_SERVER['HTTP_HOST']."</a></i></b>";

        $this->prepare_additionally();

        $this->sending();
    }

    private function prepare_additionally()
    {
        //ДОПОЛНИТЕЛЬНО:
        // с какого сайта отправлено (THIS->MAIL)
        $this->mail .= $this->get_domain_name();

        // от кого, кому ответить, тип документа и кодировка (THIS->HEADERS)
        $this->headers = "From: " . $this->mail . "\r\n";
        $this->headers .= "Reply-To: " . $this->from . "\r\n";
        $this->headers .= "Content-type: text/html; charset=\"utf-8\"\r\n";

        // кому отправится письмо (THIS->TO)
        $this->to = $this->get_admin_email();
    }

    private function get_domain_name()
    {
        $sql = "SELECT `value` FROM constants WHERE name = 'domainname'";
        $response = Db::getInstance()->sql($sql);

        $result = mysqli_fetch_assoc($response);

        return $result['value'];
    }

    private function get_admin_email()
    {
        $sql = "SELECT `value` FROM constants WHERE name = 'admin_email'";
        $response = Db::getInstance()->sql($sql);

        $result = mysqli_fetch_assoc($response);

        return $result['value'];
    }

    private function sending()
    {
        if (!mail($this->to,$this->subject,$this->message,$this->headers))
        {
            echo "<u>Упс... Что-то пошло не так</u>";
        }
        else
        {
            echo "<u>Ваше письмо отправлено успешно</u>";
        }
    }
}