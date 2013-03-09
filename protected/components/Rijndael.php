<?php
/**
 * Class Rijndael
 * Encryption class to encrypt/decrypt to and from a Rijndael string
 * Rijndael is a military class encryption method which is the industry accepted method of storing customer
 * sensitive data securely on any data storage mechanism. If you are not aware of how Rijndael works, please
 * research this process. For security reasons, the exact details of the method and how it's implemented here
 * would defeat the whole purpose of the encryption class - this latter statement is meant for any person who
 * may have gain unauthorised access to the application.
 *
 * The method used requires PHP5.3 or above as we implement 256bit encryption
 */
class Rijndael
{
  protected $_key;
  protected $_iv;

  public function __construct($key, $iv)
  {
    $this->_key = $key;
    $this->_iv = base64_decode($iv);
  }

  /**
   * Encrypt a string using the Rijndael
   * Base64 is not required, but it is be more compact than urlencode
   *
   * @param string $plaintext
   * @return bool|string
   */
  public function encrypt($plaintext)
  {
    $length = (ini_get("mbstring.func_overload") & 2) ? mb_strlen($plaintext, ini_get("default_charset")) : strlen($plaintext);

    if ($length >= 1048576)
      return false;
    return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->_key, $plaintext, MCRYPT_MODE_ECB, $this->_iv)) . sprintf("%06d", $length);
  }

  /**
   * Decrypt a Rijndael cipher
   */
  public function decrypt($ciphertext)
  {
    if (ini_get("mbstring.func_overload") & 2) {
      $length = intval(mb_substr($ciphertext, -6, 6, ini_get("default_charset")));
      $ciphertext = mb_substr($ciphertext, 0, -6, ini_get("default_charset"));
      return mb_substr(
        mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->_key, base64_decode($ciphertext), MCRYPT_MODE_ECB, $this->_iv),
        0,
        $length,
        ini_get("default_charset")
      );
    } else {
      $length = intval(substr($ciphertext, -6));
      $ciphertext = substr($ciphertext, 0, -6);
      return substr(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->_key, base64_decode($ciphertext), MCRYPT_MODE_ECB, $this->_iv), 0, $length);
    }
  }

  /**
   * Converts an ASCII string to its binary value
   */
  public function asc2bin($in)
  {
    $out = "";
    for ($i = 0, $len = strlen($in); $i < $len; $i++)
      $out .= sprintf("%08b", ord($in{$i}));

    return $out;
  }

  /**
   * Convert a binary value its ASCII value
   */
  public function bin2asc($in)
  {
    $out = "";
    for ($i = 0, $len = strlen($in); $i < $len; $i += 8)
      $out .= chr(bindec(substr($in, $i, 8)));

    return $out;
  }
}