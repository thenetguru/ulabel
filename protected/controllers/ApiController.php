<?php

class ApiController extends Controller
{
  /**
   * SOAP declarative
   */
  public function actions()
  {
    return array(
      "playground" => array(
        "class" => "CWebServiceAction",
        "classMap" => array(
          "ApiMap" => "ApiMap"
        )
      )
    );
  }

  /**
   *
   */
  public function beforeAction($action)
  {
    file_put_contents("/tmp/soap.txt",
      print_r(getallheaders(), true));
    $this->preFlightCheck();
    return parent::beforeAction($action);
  }

  /**
   * List all API keys grouped by branch
   */
  public function actionIndex()
  {

  }

  public function actionList($format = null)
  {
    switch ($format) {
      case "json":
        print "JSON output";
        break;

      case "xml":
        print "XML output";
        break;

      default:
        print "Standard output";
        break;
    }
  }

  /**
   * @soap
   */
  public function getLabels()
  {

  }

  /**
   * @soap
   */
  public function searchByCompany()
  {

  }

  /**
   * @soap
   */
  public function searchByBranch()
  {

  }

  /**
   * @soap
   */
  public function searchByCountry()
  {

  }

  /**
   * Push labels into the ULabel system
   * @param string $type Type of label you are pushing to the system.
   *        This string can be either OUTER_BOX|INNER_BOX|BAG|LABEL
   * @param array|int $range Number or range of label numbers of the given $type
   *        You can set this to be a integer or a two part array of the start and end
   *        labels
   * @param int The label to which your labels should be inserted into. The system will
   *        use automatic logic to determine the label type your labels should be inside.
   *        Therefore if you are pushing a LABEL and include an owner, the owner will be a BAG
   *        or if you are pushing a BAG, the OWNER will be an INNER_BOX and finally if you are
   *        pushing an INNER_BOX the owner will be assumed to be an OUTER_BOX. If your $type is
   *        an OUTER_BOX then the $owner and $createOwner settings are ignored
   * @param bool Set this to true if you want the owner label created if it does not already
   *        exist.
   * @return bool
   * @soap
   */
  public function import($type, $range, $owner = null, $createOwner = false)
  {
    switch ($type) {
      case "OUTER_BOX":
        break;

      case "INNER_BOX":
        if (isset($owner)) {
          //$owner = $this->findOwner($owner, $parentOf)
        }
        break;

      case "BAG":
        break;

      case "LABEL":
        break;
    }
  }

  /**
   * Dispatch an item from your location to another
   * @soap
   */
  public function dispatchOrder($type, $range)
  {

  }

  /**
   * Initiate a new order for the ULabel system. A new order is only valid against your own client ID and can be created
   * within 5 minutes of the original initiation.
   * @return string Returns the token you will need when creating your new order
   * @soap
   */
  public function prepareNewOrder()
  {

    return "";
  }

  /**
   * Call this SOAP method after you have first initiated a new order.
   * @soap
   */
  public function createNewOrder($token, $orderID)
  {

  }

  public function cancelOrder()
  {

  }

  /**
   * Check access based on the clients remote details
   */
  protected function preFlightCheck()
  {

  }

  /**
   * Create a UUID
   */
  protected function uuid($namespace, $name)
  {
    if (!self::isValid($namespace)) return false;

    // Get hexadecimal components of namespace
    $nhex = str_replace(array('-', '{', '}'), '', $namespace);

    // Binary Value
    $nstr = '';

    // Convert Namespace UUID to bits
    for ($i = 0; $i < strlen($nhex); $i += 2) {
      $nstr .= chr(hexdec($nhex[$i] . $nhex[$i + 1]));
    }

    // Calculate hash value
    $hash = sha1($nstr . $name);

    return sprintf('%08s-%04s-%04x-%04x-%12s',

      // 32 bits for "time_low"
      substr($hash, 0, 8),

      // 16 bits for "time_mid"
      substr($hash, 8, 4),

      // 16 bits for "time_hi_and_version",
      // four most significant bits holds version number 5
      (hexdec(substr($hash, 12, 4)) & 0x0fff) | 0x5000,

      // 16 bits, 8 bits for "clk_seq_hi_res",
      // 8 bits for "clk_seq_low",
      // two most significant bits holds zero and one for variant DCE1.1
      (hexdec(substr($hash, 16, 4)) & 0x3fff) | 0x8000,

      // 48 bits for "node"
      substr($hash, 20, 12)
    );
  }

  public static function isValid($uuid)
  {
    return preg_match('/^\{?[0-9a-f]{8}\-?[0-9a-f]{4}\-?[0-9a-f]{4}\-?' .
      '[0-9a-f]{4}\-?[0-9a-f]{12}\}?$/i', $uuid) === 1;
  }
}