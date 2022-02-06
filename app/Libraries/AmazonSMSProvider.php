<?php

namespace App\Libraries;

use App\Libraries\AmazonThirdParty;

class AmazonSMSProvider extends SMS
{

  private $UserName, $EncryptionKey;

  public function __construct(string $UserName, string $EncryptionKey)
  {
      $this->UserName      = $UserName;
      $this->EncryptionKey = $EncryptionKey;
  }

  public function GetSMSProvider(): SMSProvider 
  {
    return new AmazonThirdParty($this->UserName, $this->EncryptionKey);
  }

}