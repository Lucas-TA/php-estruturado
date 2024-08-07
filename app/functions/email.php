<?php
/**
 * Setting up email configuration
 * @param $data
 * @return void
 * @throws \PHPMailer\PHPMailer\Exception
 */
function send($data)
{
    $email = new PHPMailer\PHPMailer\PHPMailer;
    $email->CharSet = 'UTF-8';
    $email->SMTPSecure = 'plain'; //ssl
    $email->isSMTP();
    $email->Host = 'sandbox.smtp.mailtrap.io';
    $email->Port = 465;
    $email->SMTPAuth = true;
    $email->Username = '39ab47229f22cc';
    $email->Password = '6909ff617f9a86';
    $email->isHTML(true);
    $email->setFrom('lucasteixeira.ta@gmail.com');
    $email->FromName = $data['from'];
    $email->addAddress($data['to']);
    $email->Body = $data['message'];
    $email->Subject = $data['subject'];
    $email->AltBody = $data['Para ver este email, tenha certeza de utilizar um programa que aceite html'];
    $email->MsgHTML($data['message']);
    $email->Send();
}