<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HAuth extends CI_Controller {

	public function __construct()
	{
		// Constructor to auto-load HybridAuthLib
		parent::__construct();
		$this->load->library('HybridAuthLib');
	}

	public function index()
	{
		// Send to the view all permitted services as a user profile if authenticated
		$login_data['providers'] = $this->hybridauthlib->getProviders();
		foreach($login_data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$login_data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}

		$this->load->view('hauth/home', $login_data);
	}

	public function login($provider)
	{
		$user_type = 'client';
		try
		{
			$this->load->library('HybridAuthLib');

			if ($this->hybridauthlib->providerEnabled($provider))
			{
				
				$service = $this->hybridauthlib->authenticate($provider);

				if ($service->isUserConnected())
				{
					$user_profile = $service->getUserProfile();
					$data['user_profile'] = $user_profile;

					// New register for login by social network
					$this->new_register($user_profile,$provider);

					$this->session->set_userdata(array(
		              	'id' 							=> $user_profile->identifier,
			            'user_name' 			=> $user_profile->displayName,
			            'email' 					=> $user_profile->email,
			            'is_client_login' => true,
			            'roles' 			=> [$user_type],
			            'photo'						=> $user_profile->photoURL
			            )
		          	);
					redirect('/client');
				}
				else // Cannot authenticate user
				{
					show_error('Cannot authenticate user');
				}
			}
			else // This service is not enabled.
			{
				show_404($_SERVER['REQUEST_URI']);
			}
		}
		catch(Exception $e)
		{
			$error = 'Unexpected error';
			switch($e->getCode())
			{
				case 0 : $error = 'Unspecified error.'; break;
				case 1 : $error = 'Hybriauth configuration error.'; break;
				case 2 : $error = 'Provider not properly configured.'; break;
				case 3 : $error = 'Unknown or disabled provider.'; break;
				case 4 : $error = 'Missing provider application credentials.'; break;
				case 5 : log_message('debug', 'controllers.HAuth.login: Authentification failed. The user has canceled the authentication or the provider refused the connection.');
				         //redirect();
				         if (isset($service))
				         {
				         	$service->logout();
				         }
				         show_error('User has cancelled the authentication or the provider refused the connection.');
				         break;
				case 6 : $error = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
				         break;
				case 7 : $error = 'User not connected to the provider.';
				         break;
			}

			if (isset($service))
			{
				$service->logout();
			}

			show_error('Error authenticating user.');
		}
	}

	public function endpoint()
	{


		if ($_SERVER['REQUEST_METHOD'] === 'GET')
		{
			$_GET = $_REQUEST;
		}

		require_once APPPATH.'/third_party/hybridauth/index.php';

	}

	private function new_register($user, $provider = NULL){
		$this->load->model("User_model");
		if(!$user) return false;
		if(empty($this->User_model->getByEmail($user->email))){
			$data['email'] = $user->email;
			$data['first_name'] = $user->firstName;
			$data['last_name'] = $user->lastName;
			$data['phone_mobile'] = $user->phone;
			$data['address_street'] = $user->address;
			$data['photo'] = $user->photoURL;
			$data['register_by'] = $provider;
			$this->User_model->add($data);
		}
		return true;
	}
}

/* End of file hauth.php */
/* Location: ./application/controllers/hauth.php */
