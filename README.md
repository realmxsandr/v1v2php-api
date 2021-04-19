# v1v2/php-client

JSON API to https://cov19vacsideeffects.online data

# How to install

```composer require v1v2/php-client```

#Usage

`````php
<?php

use V1V2\Client;
use V1V2\Security;

$client = new Client(
    new Security(),
    'your_api_key'
);

$result = $client->getTemperaturePiePlotsAllAge();

// gets all V1V2\PlotInterface plots from getTemperaturePiePlotsAllAge
$result->toArray(); 

// gets specific plot. see V1V2\PlotEnum for all available plots
$stage2Plot = $result->getByPlotType(\V1V2\PlotEnum::get(\V1V2\PlotEnum::PIE_TEMP_ALL_STAGE_2)); 
`````