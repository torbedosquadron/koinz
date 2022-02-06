<?php

namespace App\Libraries;

use App\Libraries\InfopipThirdParty;

class InfopipSMSProvider extends SMS
{

  private $UserName, $Password, $AppKey;

  public function __construct(string $UserName, string $Password, string $AppKey)
  {
    $this->UserName = $UserName;
    $this->Password = $Password;
    $this->AppKey   = $AppKey;
  }

  public function GetSMSProvider(): SMSProvider 
  {
    return new InfopipThirdParty($this->UserName, $this->Password, $this->AppKey);
  }

}