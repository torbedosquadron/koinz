<?php

namespace App\Libraries;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;



class AmazonThirdParty implements SMSProvider
{
  private $UserName, $EncryptionKey;

  public function __construct(string $UserName, string $EncryptionKey)
  {
    $this->UserName = $UserName;
    $this->EncryptionKey = $EncryptionKey;
  }

  public function LogIn(): void
  {
    Log::debug("Amazon: Authentication for user ($this->UserName ) ... in prograss\n");
  }
  public function SendSMS($message): void
  {
    $response = Http::post('https://run.mocky.io/v3/7060e43a-7647-4cef-b2aa-4c9a4dc22f70', [
      'message' => $message,
    ]);

    if ($response->getStatusCode() == 200 ) {
      Log::debug("Amazon: SMS sent successfully.\n");
    } else {
      Log::debug("Amazon: SMS NOT sent.\n");
    }
  }

}