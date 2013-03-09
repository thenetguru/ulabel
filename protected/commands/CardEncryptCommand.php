<?php

class CardEncryptCommand extends CConsoleCommand
{
  public function actionEncrypt($string) {
    $rijndahl  = new Rijndael("MyEnterprise", $string);
    $code = $rijndahl->encrypt($string);
    $disp = trim(chunk_split(str_repeat("x", strlen($string)-1) . substr($string, strlen($string)-4), 4, "-"), "-");

    print "Display as: {$disp}\n";
    print "Encrypted to: {$code}\n";
  }

  public function actionDecrypt($string) {
    $rijndahl  = new Rijndael("MyEnterprisee", $string);
    $code = $rijndahl->decrypt($string);

    print "Decrypted to: {$code}\n";
  }
}