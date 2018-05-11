<?php

namespace App\Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Touch\Compiler as Modulus;

class Mail
{
  public $subject;
  public $body;
  private $from;
  private $bcc;
  private $to;
  private $replyTo;
  private $attachment;
  private $outputdata;

  private $viewLocation;
  private $viewArgs;

  /**
   * Email
   * 
   * @param  string  $view
   * @param  array   $data
   * @return void
   */
  public function view($view = null, $data = [])
  {
    if ($view == null) {
      return;
    }

    $this->viewLocation = $view;
    $this->viewArgs = $data;
  }

  private function make($view, $data = [])
  {
    $body = array(
      'body' => $this->body,
      'subject' => $this->subject
    );
    
    if ($this->body != null) {
      $data = array_merge($data, $body);
    }

    $resources = str_replace(getenv('APP_ROOT'), '/resources/views/', getcwd());
    file_exists($resources.$view.'.modulus.php') == true ? $view = $view . '.modulus' : $view = $view;

    if (file_exists($resources.$view.'.php') == true) {
      extract($data);
      if (substr($view, -8) == '.modulus') {
        $contents = file_get_contents($resources.$view.'.php');
        $this->outputdata = Modulus::render($contents, $data, true);
      }
    }
  }

  public function from($email, $name = null)
  {
    $this->from = ['email' => $email, 'name' => $name];
  }

  public function replyTo($email, $name = null)
  {
    $this->replyTo = ['email' => $email, 'name' => $name];
  }

  public function attachment($file, $name = null)
  {
    $this->attachment[] = ['file' => $file, 'name' => $name];
  }

  public function to($email, $name = null)
  {
    $this->to[] = ['email' => $email, 'name' => $name];
  }

  public function bcc($email, $name = null)
  {
    $this->bcc[] = ['email' => $email, 'name' => $name];
  }

  public function send($message = null, $subject = null)
  {
    if ($message != null) {
      $this->body = $message;
    }

    if ($subject != null) {
      $this->subject = $subject;
    }

    if ($this->viewLocation != null) {
      $this->make($this->viewLocation, $this->viewArgs);
    }

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = getenv('EMAIL_SMTP_SECURE');
    $mail->Host = getenv('EMAIL_HOST');
    $mail->Port = getenv('EMAIL_PORT'); // or 587
    $mail->IsHTML(true);
    $mail->Username = getenv('EMAIL_USERNAME');
    $mail->Password = getenv('EMAIL_PASSWORD');

    if ($this->from != null) {
      $mail->SetFrom($this->from['email'], $this->from['name']);
    }
    else {
      $mail->SetFrom(getenv('EMAIL_USERNAME'));
    }

    $mail->Subject = $this->subject;
    $mail->Body = $this->outputdata;

    if ($this->replyTo != null) {
      $mail->addReplyTo($this->replyTo['email'], $this->replyTo['name']);
    }

    if ($this->to != null) {
      foreach($this->to as $email) {
        $mail->AddAddress($email['email'], $email['name']);
      }
    }

    if ($this->bcc != null) {
      foreach($this->bcc as $email) {
        $mail->addBCC($email['email'], $email['name']);
      }
    }

    if ($this->cc != null) {
      foreach($this->cc as $email) {
        $mail->addCC($email['email'], $email['name']);
      }
    }

    if ($this->attachment != null) {
      foreach($this->attachment as $attachment) {
        $mail->addAttachment($attachment['file'], $attachment['name']);
      }
    }

    if(!$mail->Send()) {
      return array(
        "status" => "failed",
        "reason" => $mail->ErrorInfo
      );
    } else {
      return array(
        "status" => "success"
      );
    }
  }
}