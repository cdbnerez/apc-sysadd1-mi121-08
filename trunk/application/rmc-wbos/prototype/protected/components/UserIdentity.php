<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	 
	private $_id;
	 
	public function authenticate()
	{
	// default authentication
	/** 
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}
	**/

	//username and password authentication
	    $username=strtolower($this->username);
		$user=Customer::model()->find('LOWER(cus_user_name)=?', array($username));
		
		if($user === null) 
		{
		    $this->errorCode=self::ERROR_USERNAME_INVALID;
		} 
		else if ($user->cus_user_passwd !== hash_hmac('sha256', $this->password, Yii::app()->params['encryptionKey']))
		{
		    $this->errorCode=self::ERROR_PASSWORD_INVALID;
		}
		else
		{
		    $this->errorCode=self::ERROR_NONE;
			$this->setState('type', $user->cus_type);
			$this->_id = $user->id;
		}
		return !$this->errorCode;
	}
	
	public function getId()
	{
	    return $this->_id;
	}
	
}