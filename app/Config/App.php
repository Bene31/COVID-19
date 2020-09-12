<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class App extends BaseConfig
{

	
	public $baseURL = BASE.'/arthur';
	public $indexPage = 'index.php';
	public $uriProtocol = 'REQUEST_URI';
	public $defaultLocale = 'pt-br';
	public $negotiateLocale = false;
	public $supportedLocales = ['pt-br'];
	public $appTimezone = 'America/Sao_Paulo';
	public $charset = 'UTF-8';
	public $forceGlobalSecureRequests = false;
	public $sessionDriver            = 'CodeIgniter\Session\Handlers\FileHandler';
	public $sessionCookieName        = 'ci_session';
	public $sessionExpiration        = 7200;
	public $sessionSavePath          = WRITEPATH . 'session';
	public $sessionMatchIP           = false;
	public $sessionTimeToUpdate      = 300;
	public $sessionRegenerateDestroy = false;
	public $cookiePrefix   = '';
	public $cookieDomain   = '';
	public $cookiePath     = '/';
	public $cookieSecure   = false;
	public $cookieHTTPOnly = false;
	public $proxyIPs = '';
	public $CSRFTokenName  = 'csrf_test_name';
	public $CSRFHeaderName = 'X-CSRF-TOKEN';
	public $CSRFCookieName = 'csrf_cookie_name';
	public $CSRFExpire     = 7200;
	public $CSRFRegenerate = true;
	public $CSRFRedirect   = true;
	public $CSPEnabled = false;
}
