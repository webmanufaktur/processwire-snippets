<?php

function aws_signed_request($region, $params, $public_key, $private_key, $associate_tag=NULL, $version='2011-08-01') {
    
        
        // some paramters
        $method = 'GET';
        $host = 'webservices.amazon.'.$region;
        $uri = '/onca/xml';
    
    
    
        // additional parameters
        $params['Service'] = 'AWSECommerceService';
        $params['AWSAccessKeyId'] = $public_key;
        
        
        // GMT timestamp
        $params['Timestamp'] = gmdate('Y-m-d\TH:i:s\Z');
        
        
        // API version
        $params['Version'] = $version;
        if ($associate_tag !== NULL) {
            $params['AssociateTag'] = $associate_tag;
        }
    
        
        // sort the parameters
        ksort($params);
    
        
        // create the canonicalized query
        $canonicalized_query = array();
        foreach ($params as $param=>$value)
        {
            $param = str_replace('%7E', '~', rawurlencode($param));
            $value = str_replace('%7E', '~', rawurlencode($value));
            $canonicalized_query[] = $param.'='.$value;
        }
        $canonicalized_query = implode('&', $canonicalized_query);
    
        
        // create the string to sign
        $string_to_sign = $method."\n".$host."\n".$uri."\n".$canonicalized_query;
    
        
        // calculate HMAC with SHA256 and base64-encoding
        $signature = base64_encode(hash_hmac('sha256', $string_to_sign, $private_key, TRUE));
    
        
        // encode the signature for the request
        $signature = str_replace('%7E', '~', rawurlencode($signature));
    
        
        // create request
        $request = 'http://'.$host.$uri.'?'.$canonicalized_query.'&Signature='.$signature;
    
        return $request;
    };