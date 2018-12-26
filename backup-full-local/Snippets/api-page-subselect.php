<?php

$brands = new PageArray();
foreach($pages->find("template=product, amz_price>0") as $watch) {
  $brands->add($watch->brand); 
};