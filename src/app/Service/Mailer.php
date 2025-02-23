<?php

declare(strict_types=1);

namespace App\Service;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Mailer
{
    private PHPMailer $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP();
        $this->mail->Host = config('mail.mailers.smtp.host');
        $this->mail->Port = config('mail.mailers.smtp.port');
        $this->mail->CharSet = "UTF-8";

        // デフォルトの送信元
        $this->mail->setFrom(config('mail.from.address'), config('mail.from.name'));
    }

    /**
     * @return $this
     */
    public function debug(): self
    {
        $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
        return $this;
    }

    /**
     * @param string $from
     * @return $this
     * @throws Exception
     */
    public function setFrom(string $from): self
    {
        $this->mail->setFrom($from);
        return $this;
    }

    /**
     * @param string $address
     * @return $this
     * @throws Exception
     */
    public function setAddress(string $address): self
    {
        $this->mail->addAddress($address);
        return $this;
    }

    /**
     * @param string $subject
     * @return $this
     */
    public function setSubject(string $subject): self
    {
        $this->mail->Subject = $subject;
        return $this;
    }

    /**
     * @param string $body
     * @return $this
     */
    public function setBody(string $body): self
    {
        $this->mail->Body = $body;
        return $this;
    }

    /**
     * @return void
     * @throws Exception
     */
    public function send(): void
    {
        $this->mail->send();
    }
}
