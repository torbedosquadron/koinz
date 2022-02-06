<?php

namespace App\Libraries;

interface SMSProvider
{

  public function LogIn(): void;

  public function SendSMS($message): void;
}
