<?php

namespace App\Libraries;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class InfopipThirdParty implements SMSProvider
{

  private $UserName, $Password, $AppKey;

  public function __construct(string $UserName, string $Password, string $AppKey)
  {
      $this->UserName = $UserName;
      $this->Password = $Password;
      $this->AppKey   = $AppKey;
  }

  public function LogIn(): void
  {
    Log::debug("Infopip: Authentication for user ($this->UserName ) ... in prograss\n");
  }
  public function SendSMS($message): void
  {
    $response = Http::post('https://run.mocky.io/v3/b75a660a-2dc8-4a70-814d-618803261021', [
      'message' => $message,
    ]);

    if ($response->getStatusCode() == 200 ) {
      Log::debug("Infopip: SMS sent successfully.\n");
    } else {
      Log::debug("Infopip: SMS NOT sent.\n");
    }
  }

}