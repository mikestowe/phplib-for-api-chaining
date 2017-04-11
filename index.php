<?php
// Include Necessary Classes
require_once('inc/apiChain.php');
require_once('inc/apiResponse.php');


// Setup Routing Handler for Requests
function myCalls($resource, $headers, $body) {
	if ($resource == '/albums') {
		return array(
			'status' => 200,
			'headers' => array(),
			'body' => json_decode('{
	"albums": [{
		"album_type": "album",
		"details": {
			"name": "Cool Album",
			"artist": "cool Artist"
		}
	}, {
		"album_type": "album",
		"details": {
			"name": "Cool Album 2",
			"artist": "cool Artist 2"
		}
	}]
}'));
		
	} elseif ($resource == '/users') {
		return array(
			'status' => 200,
			'headers' => array(),
			'body' => json_decode('{
			"test" : "mike",
	"albums": [{
		"userName": "bob",
		"details": {
			"name": "Cool Album",
			"artist": "cool Artist"
		}
	}, {
		"userName": "joe",
		"details": {
			"name": "Cool Album 2",
			"artist": "cool Artist 2"
		}
	}]
}'));
		
	} elseif ($resource == '/addresses') {
		return array(
			'status' => 200,
			'headers' => array(),
			'body' => json_decode('{
	"albums": [{
		"album_type": "album",
		"details": {
			"name": "Cool Album",
			"artist": "cool Artist"
		}
	}, {
		"album_type": "album",
		"details": {
			"name": "Cool Album 2",
			"artist": "cool Artist 2"
		}
	}]
}'));
		
	}
	
	elseif ($resource == '/usermike') {
		
		return array(
			'status' => 200,
			'headers' => array(),
			'body' => json_decode('{
	"user": {
		"album_type": "album",
		"name": {
			"first": "Mike",
			"last": "Stowe"
		}
	}
}'));
		return array(
			'status' => 200,
			'headers' => array(),
			'body' => json_decode('
{
  "user" : {
    "name" : {
      "first" : "mike",
      "last" : "stowe"
    }
}'));
		
	}
}








// Setup Chain

$chain = '[
  {
    "doOn": "always",
    "href": "/users",
    "method": "get",
    "data": {},
    "return": ["test", "albums[0].userName", "albums[1].userName"]
  },
  {
    "doOn": "$body.test == \'mike\'",
    "href": "/albums",
    "method": "get",
    "data": {"user" : "$body.albums[0].userName"},
    "return": true
  },
  {
    "doOn": "2*",
    "href": "/usermike",
    "method": "get",
    "data": {},
    "return": ["user.name"]
  }

]';



// Run Chain :)

$chain = new apiChain\apiChain($chain, 'myCalls');
echo $chain->getOutput();

?>