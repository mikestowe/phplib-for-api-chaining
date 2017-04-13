<?php
namespace apiChain;

class apiResponse {

	public $href;
	public $method;
	public $status;
	public $response;
	
	
	function __construct($resource, $method, $status, $headers, $body, $return) {
		$this->href = $resource;
		$this->method = $method;
		$this->status = $status;
		$this->response = new \stdClass;
		$this->response->headers = $headers;
		$this->response->body = $body;
		if ($return != true || is_array($return)) {
			$body = array();
			foreach($return as $v) {
				$tmpValue = $this->retrieveData('body.'.$v);
				$this->assignArrayByPath($body, $v, $tmpValue);
			}
			//@todo iterate for casting once arrays are available (album[0], album[1], etc);
			$this->response->body = json_decode(json_encode($body));
		}
	}
	
	// courtesty http://stackoverflow.com/users/31671/alex
	//@todo separate array keys and prevent from being casted to object
	function assignArrayByPath(&$arr, $path, $value, $separator='.') {
		$keys = explode($separator, $path);

		foreach ($keys as $key) {
			$arr = &$arr[$key];
		}

		$arr = $value;
	}

	
	function retrieveData($property) {
        $property = str_replace(array('{','}'), '', $property);
		$parts = explode('.', $property);
		$resp = $this->response;

		foreach ($parts as $part) {
			$match = array();
			if (preg_match('/\[(\'|")?[a-z0-9_\s](\'|")?\]+/i', $part, $match)) {
				$part = str_replace($match, '', $part);
			}
			
			$resp = $resp->$part;

			if ($match) {
				foreach ($match as $m) {
					$m = preg_replace('/[\[\'"\]]/', '', $m);
					if (isset($resp)) {
						foreach ($resp as $k => $v) {
							if ($k == $m) {
								$resp = $v;
							}
						}
					}
				}
			}
		}

		return $resp;

	}
}