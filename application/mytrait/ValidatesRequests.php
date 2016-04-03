<?php
namespace blog\application\mytrait;

trait ValidatesRequests
{
	// max:10
	private $_nowRulesString = '';
	// post name
	private $_nowAttribute;
	// post name value
	private $_nowAttributeValue  = '';
	// dynamic
	private $_checkFunName = '';
	// output error code
	private $_error_code = 0;
	// error msg
	private $_error = [];
	// set start error code num
	public function setErrorCodeStartNum($num = 200)
	{
		$this->_error_code = $num;
	}
	// validate 
	public function validate(array $post, array $rules = [], array $message = [])
	{
		// init start error num
		$this->setErrorCodeStartNum();
		// ['name' => ['max:15'] , 'phone' => ['max:15'] as name => ['max:15'] 
		foreach($rules as $attribute => $rulesArray){		
			$this->_nowAttribute = $attribute;
			$this->_nowAttributeValue = $post[$attribute];
			// ['max:15'] as max:15
			foreach($rulesArray as $ruleString)
			{
				$this->_nowRulesString = $ruleString;
				if(strpos($ruleString, ':') !== FALSE)
				{
					$ruleString = stristr($ruleString, ':', true);
				}

				$this->_checkFunName = 'check'.ucfirst($ruleString).'Rule';
				call_user_func(array(& $this, $this->_checkFunName));
				
			}
			
			
		}
		if(empty($this->_error))
		{
			return TRUE;
		}
		else
		{
			return $this->_error;
		}
	}

	private function checkRequiredRule()
	{
		
	}

	private function checkMaxRule()
	{
		// echo $this->_nowRulesString;
		// echo $this->_nowAttribute;
		// echo $this->_nowAttributeValue;
		$max_value = substr($this->_nowRulesString, '4');
		if(strlen($this->_nowAttributeValue) > $max_value)
		{
			$this->_error[] = $this->_error_format($this->_nowAttribute . ' 太長惹, 必須' . $max_value . '字元以內' , 10);
		}
	}

	private function _error_format($msg, $code)
	{
		return ['status' => FALSE, 'msg' =>  $msg, 'code' => ( $this->_error_code + $code) ];
	}


	private function checkNumberRule()
	{
		
	}

	public function __Call($name, $arguments)
	{
		$this->_error[] = [$this->_checkFunName . ' not found '];
    }
}