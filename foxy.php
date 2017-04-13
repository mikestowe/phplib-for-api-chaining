<?php
// Include Necessary Classes
require_once('inc/apiChain.php');
require_once('inc/apiResponse.php');


// Setup Routing Handler for Requests
function myCalls($resource, $headers, $body) {
    $resource = str_replace('https://api.foxycart.com', '', $resource);
	if ($resource == '/users/1') {
		return array(
			'status' => 200,
			'headers' => array(),
			'body' => json_decode('{
    "_links": {
        "curies": [
            {
                "name": "fx",
                "href": "https://api.foxycart.com/rels/{rel}",
                "templated": true
            }
        ],
        "self": {
            "href": "https://api.foxycart.com/users/1",
            "title": "This User"
        },
        "fx:attributes": {
            "href": "https://api.foxycart.com/users/1/attributes",
            "title": "Attributes for This User"
        },
        "fx:default_store": {
            "href": "https://api.foxycart.com/stores/66",
            "title": "Example Store"
        },
        "fx:stores": {
            "href": "https://api.foxycart.com/users/1/stores",
            "title": "Stores for This User"
        }
    },
    "first_name": "John",
    "last_name": "Doe",
    "email": "john.doe@example.com",
    "phone": "555-555-5555",
    "affiliate_id": 0,
    "is_programmer": true,
    "is_front_end_developer": false,
    "is_designer": false,
    "is_merchant": true,
    "date_created": "2007-05-23T16:09:12-0700",
    "date_modified": "2013-07-10T22:37:49-0700"
}'));
		
	} elseif ($resource == '/stores/66') {
		return array(
			'status' => 200,
			'headers' => array(),
			'body' => json_decode('{
  "_links": {
    "curies": [
        {
            "name": "fx",
            "href": "https://api.foxycart.com/rels/{rel}",
            "templated": true
        }
    ],
    "self": {
      "href": "https://api.foxycart.com/stores/2",
      "title": "This Store"
    },
    "fx:attributes": {
      "href": "https://api.foxycart.com/stores/2/attributes",
      "title": "Attributes for This Store"
    },
    "fx:store_version": {
      "href": "https://api.foxycart.com/property_helpers/store_versions/100",
      "title": "This store version"
    },
    "fx:users": {
      "href": "https://api.foxycart.com/stores/2/users",
      "title": "Users for This Store"
    },
    "fx:user_accesses": {
      "href": "https://api.foxycart.com/stores/2/user_accesses",
      "title": "User Access for This Store"
    },
    "fx:customers": {
      "href": "https://api.foxycart.com/stores/2/customers",
      "title": "Customers for This Store"
    },
    "fx:carts": {
      "href": "https://api.foxycart.com/stores/2/carts",
      "title": "Carts for This Store"
    },
    "fx:transactions": {
      "href": "https://api.foxycart.com/stores/2/transactions",
      "title": "Transactions for This Store"
    },
    "fx:subscriptions": {
      "href": "https://api.foxycart.com/stores/2/subscriptions",
      "title": "Subscriptions for This Store"
    },
    "fx:subscription_settings": {
      "href": "https://api.foxycart.com/store_subscription_settings/2",
      "title": "Subscription Settings for This Store"
    },
    "fx:item_categories": {
      "href": "https://api.foxycart.com/stores/2/item_categories",
      "title": "Item Categories for This Store"
    },
    "fx:taxes": {
      "href": "https://api.foxycart.com/stores/2/taxes",
      "title": "Taxes for This Store"
    },
    "fx:payment_method_sets": {
      "href": "https://api.foxycart.com/stores/2/payment_method_sets",
      "title": "Payment Method Sets for This Store"
    },
    "fx:coupons": {
      "href": "https://api.foxycart.com/stores/2/coupons",
      "title": "Coupons for This Store"
    },
    "fx:template_sets": {
      "href": "https://api.foxycart.com/stores/2/template_sets",
      "title": "Template Sets for This Store"
    },
    "fx:cart_templates": {
      "href": "https://api.foxycart.com/stores/2/cart_templates",
      "title": "Cart Templates for This Store"
    },
    "fx:cart_include_templates": {
      "href": "https://api.foxycart.com/stores/2/cart_include_templates",
      "title": "Cart Include Templates for This Store"
    },
    "fx:checkout_templates": {
      "href": "https://api.foxycart.com/stores/2/checkout_templates",
      "title": "Checkout Templates for This Store"
    },
    "fx:receipt_templates": {
      "href": "https://api.foxycart.com/stores/2/receipt_templates",
      "title": "Receipt Templates for This Store"
    },
    "fx:email_templates": {
      "href": "https://api.foxycart.com/stores/2/email_templates",
      "title": "Email Templates for This Store"
    },
    "fx:error_entries": {
      "href": "https://api.foxycart.com/stores/2/error_entries",
      "title": "Error Entries for This Store"
    },
    "fx:downloadables": {
      "href": "https://api.foxycart.com/stores/2/downloadables",
      "title": "Downloadables for This Store"
    },
    "fx:hosted_payment_gateways": {
      "href": "https://api.foxycart.com/stores/2/hosted_payment_gateways",
      "title": "Hosted Payment Gateways for This Store"
    },
    "fx:fraud_protections": {
      "href": "https://api.foxycart.com/stores/2/fraud_protections",
      "title": "Fraud Protections for This Store"
    }
  },
  "store_version_uri": "https://api.foxycart.com/property_helpers/store_versions/20",
  "store_name": "Example Store",
  "store_domain": "example",
  "use_remote_domain": false,
  "store_url": "https://example.com/catalog",
  "receipt_continue_url": "http://www.example.com/thankyou",
  "store_email": "someone@example.com",
  "from_email": "helpdesk@example.com",
  "postal_code": "37211",
  "region": "TN",
  "country": "US",
  "locale_code": "en_US",
  "hide_currency_symbol": false,
  "hide_decimal_characters": false,
  "use_international_currency_symbol": false,
  "language": "english",
  "logo_url": "",
  "checkout_type": "default_account",
  "bcc_on_receipt_email": false,
  "use_webhook": true,
  "webhook_url": "http://example.com/my_webhook_script",
  "webhook_key": "some super secure password your mom could not not guess",
  "use_cart_validation": false,
  "use_single_sign_on": false,
  "single_sign_on_url": "http://example.com/my_single_sign_on_script",
  "use_email_dns": false,
  "customer_password_hash_type": "phpass",
  "customer_password_hash_config": "8",
  "features_multiship": false,
  "shipping_address_type": "residential",
  "timezone": "America/Chicago",
  "unified_order_entry_password": "here I am, buying all your stufz",
  "affiliate_id": 0,
  "is_active": false,
  "first_payment_date": null,
  "date_created": "2010-04-24T19:25:02-0700",
  "date_modified": "2013-07-19T11:47:26-0700"
}'));
		
	} elseif ($resource == '/stores/2/carts') {
		return array(
			'status' => 200,
			'headers' => array(),
			'body' => json_decode('{
  "_links": {
    "curies": [
      {
        "name": "fx",
        "href": "https://api.foxycart.com/rels/{rel}",
        "templated": true
      }
    ],
    "self": {
      "href": "...",
      "title": "This Collection"
    },
    "first": {
      "href": "...?offset=0",
      "title": "First Page of this Collection"
    },
    "prev": {
      "href": "...?offset=0",
      "title": "Previous Page of this Collection"
    },
    "next": {
      "href": "...?offset=0",
      "title": "Next Page of this Collection"
    },
    "last": {
      "href": "...?offset=0",
      "title": "Last Page of this Collection"
    }
  },
  "_embedded": {
    "fx:carts": []
  },
  "total_items": "5",
  "returned_items": 5,
  "limit": 20,
  "offset": 0
}'));
		
	} else {
        return array(
            'status' => 500,
            'headers' => array(),
            'body' => ''
        );
    }
}








// Setup Chain

$chain = '[
  {
    "doOn": "always",
    "href": "/users/1",
    "method": "get",
    "data": {},
    "return": ["_links.fx:default_store.href"]
  },
  {
    "doOn": "200",
    "href": "$body._links.fx:default_store.href",
    "method": "get",
    "data": {},
    "return": ["_links.fx:carts.href"]
  },
  {
    "doOn": "2*",
    "href": "$body._links.fx:carts.href",
    "method": "get",
    "data": {},
    "return": ["total_items"]
  }

]';



// Run Chain :)
echo '<h1 style="margin-bottom: 5px;">FoxyCart Test</h1>';
echo '<em>Objective: get user 1\'s default store carts.</em><br /><br /><br />';
echo '<b>Chain Sent:</b><br /><tt>'.$chain.'</tt><br /><br /><br /><b>Response:</b><br /><tt>';


$chain = new apiChain\apiChain($chain, 'myCalls');
echo $chain->getOutput();

echo '</tt><br /><br /><br /><b>Traditional Response (3 separate calls):</b><br /><tt>';

echo json_encode(myCalls('/users/1', array(), array())['body']);
echo '<br /><br />';
echo json_encode(myCalls('/stores/66', array(), array())['body']);
echo '<br /><br />';
echo json_encode(myCalls('/stores/2/carts', array(), array())['body']);
?>