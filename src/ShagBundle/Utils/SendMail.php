<?php

namespace ShagBundle\Utils;

class SendMail
{
    protected $mailer;

    /**
     * SendMail constructor.
     * @param \Swift_Mailer $mailer
     */
    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param $from string
     * @param $subject string
     * @param $content string
     */
    public function sendMessage($from = null, $subject = null, $content = null)
    {
        $mail = \Swift_Message::newInstance();


        $mail->setFrom($from)
            ->setSubject($subject)
            ->setBody($content)
        ;

        $failedRecipients = [];
        $numSent = 0;
        $to = ['frédrickkhamla@gmail.com' => 'Frédérick'];

        foreach ($to as $address => $name)
        {
            if(is_int($address)) {
                $mail->setTo($name);
            } else {
                $mail->setTo([$address => $name]);
            }

            $numSent += $this->mailer->send($mail, $failedRecipients);

        }
    }
}
