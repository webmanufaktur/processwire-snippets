<?php

function Amazon($a) {


    include_once('_amz/amz-vars.php');
    
    include_once('_amz/amz-func.php');

    // $asin = wire('pages')->get("id=1289")->amz_asin;

    $request = aws_signed_request('de', array( 'Operation' => 'ItemLookup', 'ItemId' => $asin, 'ResponseGroup' => 'Images,ItemAttributes,Offers'), AWS_API_KEY, AWS_API_SECRET_KEY, AWS_ASSOCIATE_TAG);
    $response = @file_get_contents($request);
    
    if ($response === FALSE) {
    
        echo $asin . " - " . "Request failed." . "<br>";
        // wenn keine Rückmeldung, Datensatz markieren
        $product = wire('pages')->get("amz_asin=$asin");
        $product->of(false);
        $product->amz_failed = 1;
        $product->save();
    
    } else {
    
        // parse XML
        $pxml = simplexml_load_string($response);
        if ($pxml === FALSE) {
    
            echo "Response could not be parsed.\n";
    
            // wenn keine Rückmeldung, Datensatz markieren
            $product = wire('pages')->get("amz_asin=$asin");
            $product->of(false);
            $product->amz_failed = 1;
            $product->save();
    
    
        } else {
    
            $titel = $pxml->Items->Item->ItemAttributes->Title;
            $brand = $pxml->Items->Item->ItemAttributes->Brand;
            $manufacturer = $pxml->Items->Item->ItemAttributes->Manufacturer;
            $preis = $pxml->Items->Item->OfferSummary->LowestNewPrice->Amount;
            $price = number_format($preis, 2, ',' , '.');
            
            $largeimage = $pxml->Items->Item->LargeImage->URL;        
            $link = $pxml->Items->Item->DetailPageURL;
            $feature1 = $pxml->Items->Item->ItemAttributes->Feature[0];
            $feature2 = $pxml->Items->Item->ItemAttributes->Feature[1];
            $feature3 = $pxml->Items->Item->ItemAttributes->Feature[2];
            $feature4 = $pxml->Items->Item->ItemAttributes->Feature[3];
            $feature5 = $pxml->Items->Item->ItemAttributes->Feature[4];
            $prime = $pxml->Items->Item->Offers->Offer->OfferListing->IsEligibleForPrime;


            $product = wire('pages')->get("amz_asin=$asin");
            $product->of(false);
            $product->title = $titel;
            $product->amz_prod = $titel;
            $product->amz_brand = $brand;
            $product->brand = $brand;
            $product->amz_manufacturer = $manufacturer;
            $product->amz_f1 = $feature1;
            $product->amz_f2 = $feature2;
            $product->amz_f3 = $feature3;
            $product->amz_f4 = $feature4;
            $product->amz_f5 = $feature5;
            $product->amz_prime = $prime;
            $product->amz_link = $link; 
            $product->amz_price = number_format(($preis / 100), 2, ',' , '.');
            $product->amz_imageurl = $largeimage;
            $product->amz_failed = 0;        
            $product->amz_check = 1;
            $product->save();
            if(count($product->amz_image)) { $product->of(false); $product->amz_image->removeAll(); };
            $product->save();
            $product->of(false);
            $product->amz_image->add("$product->amz_imageurl");
            $product->save();
            
            echo $product->amz_asin . " - " . "aktualisiert." . "<br>";


    
        }
    };
    
    
    echo "<hr>";

};



?>