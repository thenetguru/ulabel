<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
  /**
   * @var string the default layout for the controller view. Defaults to '//layouts/column1',
   * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
   */
  public $layout = '//layouts/column1';
  /**
   * @var array context menu items. This property will be assigned to {@link CMenu::items}.
   */
  public $menu = array();
  /**
   * @var array the breadcrumbs of the current page. The value of this property will
   * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
   * for more details on how to specify this property.
   */
  public $breadcrumbs = array();
  /**
   * @var array the IP filters that specify which IP addresses are allowed to access Pilot.
   * Each array element represents a single filter. A filter can be either an IP address
   * or an address with wildcard (e.g. 192.168.0.*) to represent a network segment.
   * If you want to allow all IPs to access gii, you may set this property to be false
   * (DO NOT DO THIS UNLESS YOU KNOW THE CONSEQUENCE!!!)
   * The default value is array('127.0.0.1', '::1'), which means Pilot can only be accessed
   * on the localhost.
   */
  public $ipFilters = array("127.0.1.*", "::1", "192.168.*");

  public function beforeAction($action)
  {
    $route = "{$action->controller->id }/{$action->id}";
    if (!$this->allowIp(Yii::app()->request->userHostAddress) && $route !== "default/error")
      $this->httpAuth();

    return parent::beforeAction($action);
  }

  /**
   * Authentication realm
   */
  protected function httpAuth()
  {
    if (@$_SERVER["PHP_AUTH_USER"] != "pilot" || @$_SERVER["PHP_AUTH_PW"] != "w") {
      header("WWW-Authenticate: BASIC realm=\"".$_SERVER["HTTP_HOST"]."\"");
      header("Status: 401 Unauthorized");
      header("HTTP-Status: 401 Unauthorized");
      echo "You do not have access to this site";
      Yii::app()->end();
    }

    return true;
  }


  /**
   * Checks to see if the user IP is allowed by {@link ipFilters}.
   * @param string $ip the user IP
   * @return boolean whether the user IP is allowed by {@link ipFilters}.
   */
  protected function allowIp($ip)
  {
    if (empty($this->ipFilters))
      return true;
    foreach ($this->ipFilters as $filter) {
      if ($filter === '*' || $filter === $ip || (($pos = strpos($filter, '*')) !== false && !strncmp($ip, $filter, $pos)))
        return true;
    }
    return false;
  }
}