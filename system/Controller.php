<?php

namespace CodeIgniter;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Validation\Exceptions\ValidationException;
use CodeIgniter\Validation\Validation;
use Config\Services;
use Psr\Log\LoggerInterface;

class Controller
{

	protected $helpers = [];

	
	protected $request;

	
	protected $response;

	
	protected $logger;

	
	protected $forceHTTPS = 0;

	protected $validator;

	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		$this->request  = $request;
		$this->response = $response;
		$this->logger   = $logger;

		if ($this->forceHTTPS > 0)
		{
			$this->forceHTTPS($this->forceHTTPS);
		}

		$this->loadHelpers();
	}

	
	protected function forceHTTPS(int $duration = 31536000)
	{
		force_https($duration, $this->request, $this->response);
	}

	protected function cachePage(int $time)
	{
		CodeIgniter::cache($time);
	}

	
	protected function loadHelpers()
	{
		if (empty($this->helpers))
		{
			return;
		}

		foreach ($this->helpers as $helper)
		{
			helper($helper);
		}
	}

	//--------------------------------------------------------------------

	
	protected function validate($rules, array $messages = []): bool
	{
		$this->validator = Services::validation();

		// If you replace the $rules array with the name of the group
		if (is_string($rules))
		{
			$validation = config('Validation');

			// If the rule wasn't found in the \Config\Validation, we
			// should throw an exception so the developer can find it.
			if (! isset($validation->$rules))
			{
				throw ValidationException::forRuleNotFound($rules);
			}

			// If no error message is defined, use the error message in the Config\Validation file
			if (! $messages)
			{
				$errorName = $rules . '_errors';
				$messages  = $validation->$errorName ?? [];
			}

			$rules = $validation->$rules;
		}

		return $this->validator
			->withRequest($this->request)
			->setRules($rules, $messages)
			->run();
	}

	//--------------------------------------------------------------------
}
