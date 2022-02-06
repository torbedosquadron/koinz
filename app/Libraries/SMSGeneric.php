<?php

namespace App\Libraries;

use App\Libraries\AmazonSMSProvider;
use App\Libraries\InfopipSMSProvider;
use Illuminate\Support\Facades\Log;

final class SMSGeneric
{

  final public static function SMSSendGeneric($provider, $message) 
  {
    // the credentials should be put in .env file
    // but for ease of use and it will not be commited 
    // it is hard coded in this class.

    if ($provider == 'Infopip') {

      $SMSProvider = new InfopipSMSProvider('anonymous', 'password', 'mEwUoo21UNSfSpLgXqhmG0pPNDa0');
      $SMSProvider->SMS($message);

    } else if($provider == 'Amazon') {

      $SMSProvider = new AmazonSMSProvider('anonymous', 'mEwUoo21UNSfSpLgXqhmG0pPNDa0');
      $SMSProvider->SMS($message);

    } else {
      // log error
      Log::error("Wrong SMS provider name " );
    }


  }
}
