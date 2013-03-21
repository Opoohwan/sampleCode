<?php

	/**
	 * Index.php
	 *
	 * Main file in which the php application will work
	 *
	 * @author David Lyon <dnclyon@gmail.com>
	 * @version v.1
	 */

	/**
	 * Index Controller
	 *
	 * Index Controller
	 *
	 * @author David Lyon <dnclyon@gmail.com>
	 * @version v.1
	 */
	class IndexController extends Zend_Controller_Action
	{
	    /**
	     * Index Action
		 *
		 * Index Action for php application. will check for request from url path,
		 * perform functionality and return the JSon.
		 *
		 * @author  David Lyon <dnclyon@gmail.com>
		 * @version v.1
		 */
	    public function indexAction()
	    {
	    	$inputData = $this->getRequest()->getParam('key');

	    	// we do not need a view
	    	$this->_helper->viewRenderer->setNoRender(true);
	        $this->_helper->layout->disableLayout();

	    	if (is_int($inputData)) {
	    		$return = $this->processKey($inputData);
	    		$this->returnJson($return);
	    	} else {
	    		throw new Exception('Error in Index, input data incorrect');
	    	}

	    }

	    /**
		 * Process Key
		 *
		 * This function will take a parameter and process it to return
		 * an array with the next 5 digits that are NOT divisable by 3.
		 *
		 * @param int $inputData data to process
		 *
		 * @return array $returnArray processed data
		 *
		 * @author  David Lyon <dnclyon@gmail.com>
		 * @version v.1
		 */
	    public function processKey($inputData)
	    {
	    	if (is_int($inputData)) {
	    		$count = 0;
	    		$returnArray = array();

	    		while ($count<6) {
	    			$value = $inputData+1;
	    			if($value%3 != 0) {
	    				$returnArray[] = $value;
	    				$count++;
	    			}
	    		}

	    		if (count($returnArray) == 5) {
	    			return $returnArray;
	    		} else {
	    			throw new Exception('Error in processing the key, 5 values not generated');
	    		}

	    	} else {
	    		throw new Exception('Error in processing the key, parameter incorrect');
	    	}

	    }

	    /**
		 * Return Json
		 *
		 * This function will take an array parameter, add a string unique identifier,
		 * convert it to Json, and print it.
		 *
		 * @param array $return processed data
		 *
		 * @author  David Lyon <dnclyon@gmail.com>
		 * @version v.1
		 */
	    public function returnJson($return)
	    {
	    	if (is_array($return)) {
	    		$return[] = $this->generateRandomString();
	    		echo json_encode($return);

	    	} else {
	    		throw new Exception('Error in returning json, parameter incorrect');
	    	}

	    }

	    /**
		 * Return Json
		 *
		 * This function will return a unique random string. An optional length can be
		 * set, but default is ten. found at 'http://stackoverflow.com/questions/4356289/php-random-string-generator'
		 *
		 * @param int $lenght optional length request
		 *
		 * @author  David Lyon <dnclyon@gmail.com>
		 * @version v.1
		 */
	    public function generateRandomString($length = 10)
	    {
    		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    		$randomString = '';

    		for ($i = 0; $i < $length; $i++) {
        		$randomString .= $characters[rand(0, strlen($characters) - 1)];
    		}

    		return $randomString;
		}
	}
?>
