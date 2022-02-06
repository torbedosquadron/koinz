<?php

namespace App\Libraries;

abstract class SMS
{
  abstract public function GetSMSProvider(): SMSProvider; 

  public function SMS($message) :void 
  {
    $provider = $this->GetSMSProvider();

    $provider->LogIn();
    $provider->SendSMS($message);
  }
}
