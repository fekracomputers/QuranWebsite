<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'sqlite'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'quran' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('quran.sqlite')),
            'prefix' => '',
        ],
        'page' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('quranpages.sqlite')),
            'prefix' => '',
        ],
        'qary2' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('audio/quranaudiomap2.sqlite')),
            'prefix' => '',
        ],
        'qary3' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('audio/quranaudiomap3.sqlite')),
            'prefix' => '',
        ],
        'qary6' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('audio/quranaudiomap6.sqlite')),
            'prefix' => '',
        ],
        'qary9' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('audio/quranaudiomap9.sqlite')),
            'prefix' => '',
        ],
        'qary10' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('audio/quranaudiomap10.sqlite')),
            'prefix' => '',
        ],
        'qary11' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('audio/quranaudiomap11.sqlite')),
            'prefix' => '',
        ],
        'qary13' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('audio/quranaudiomap13.sqlite')),
            'prefix' => '',
        ],
        'qary14' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('audio/quranaudiomap14.sqlite')),
            'prefix' => '',
        ],
        'qary18' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('audio/quranaudiomap18.sqlite')),
            'prefix' => '',
        ],
        'qary24' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('audio/quranaudiomap24.sqlite')),
            'prefix' => '',
        ],
        'qary26' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('audio/quranaudiomap26.sqlite')),
            'prefix' => '',
        ],
        'qary27' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('audio/quranaudiomap27.sqlite')),
            'prefix' => '',
        ],
        'qary29' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('audio/quranaudiomap29.sqlite')),
            'prefix' => '',
        ],
        'qary30' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('audio/quranaudiomap30.sqlite')),
            'prefix' => '',
        ],
        'qary32' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('audio/quranaudiomap32.sqlite')),
            'prefix' => '',
        ],
        'qary34' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('audio/quranaudiomap34.sqlite')),
            'prefix' => '',
        ],
        'tafseer10' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer10.sqlite')),'prefix' => '',],
        'tafseer11' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer11.sqlite')),'prefix' => '',],
        'tafseer12' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer12.sqlite')),'prefix' => '',],
        'tafseer13' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer13.sqlite')),'prefix' => '',],
        'tafseer14' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer14.sqlite')),'prefix' => '',],
        'tafseer15' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer15.sqlite')),'prefix' => '',],
        'tafseer16' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer16.sqlite')),'prefix' => '',],
        'tafseer17' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer17.sqlite')),'prefix' => '',],
        'tafseer18' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer18.sqlite')),'prefix' => '',],
        'tafseer19' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer19.sqlite')),'prefix' => '',],
        'tafseer20' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer20.sqlite')),'prefix' => '',],
        'tafseer201' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer201.sqlite')),'prefix' => '',],
        'tafseer202' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer202.sqlite')),'prefix' => '',],
        'tafseer203' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer203.sqlite')),'prefix' => '',],
        'tafseer204' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer204.sqlite')),'prefix' => '',],
        'tafseer205' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer205.sqlite')),'prefix' => '',],
        'tafseer206' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer206.sqlite')),'prefix' => '',],
        'tafseer207' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer207.sqlite')),'prefix' => '',],
        'tafseer208' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer208.sqlite')),'prefix' => '',],
        'tafseer209' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer209.sqlite')),'prefix' => '',],
        'tafseer21' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer21.sqlite')),'prefix' => '',],
        'tafseer210' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer210.sqlite')),'prefix' => '',],
        'tafseer211' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer211.sqlite')),'prefix' => '',],
        'tafseer212' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer212.sqlite')),'prefix' => '',],
        'tafseer213' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer213.sqlite')),'prefix' => '',],
        'tafseer214' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer214.sqlite')),'prefix' => '',],
        'tafseer215' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer215.sqlite')),'prefix' => '',],
        'tafseer216' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer216.sqlite')),'prefix' => '',],
        'tafseer217' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer217.sqlite')),'prefix' => '',],
        'tafseer218' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer218.sqlite')),'prefix' => '',],
        'tafseer219' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer219.sqlite')),'prefix' => '',],
        'tafseer22' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer22.sqlite')),'prefix' => '',],
        'tafseer220' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer220.sqlite')),'prefix' => '',],
        'tafseer221' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer221.sqlite')),'prefix' => '',],
        'tafseer222' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer222.sqlite')),'prefix' => '',],
        'tafseer223' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer223.sqlite')),'prefix' => '',],
        'tafseer224' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer224.sqlite')),'prefix' => '',],
        'tafseer225' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer225.sqlite')),'prefix' => '',],
        'tafseer226' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer226.sqlite')),'prefix' => '',],
        'tafseer227' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer227.sqlite')),'prefix' => '',],
        'tafseer228' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer228.sqlite')),'prefix' => '',],
        'tafseer229' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer229.sqlite')),'prefix' => '',],
        'tafseer230' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer230.sqlite')),'prefix' => '',],
        'tafseer231' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer231.sqlite')),'prefix' => '',],
        'tafseer232' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer232.sqlite')),'prefix' => '',],
        'tafseer233' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer233.sqlite')),'prefix' => '',],
        'tafseer234' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer234.sqlite')),'prefix' => '',],
        'tafseer235' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer235.sqlite')),'prefix' => '',],
        'tafseer236' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer236.sqlite')),'prefix' => '',],
        'tafseer237' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer237.sqlite')),'prefix' => '',],
        'tafseer238' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer238.sqlite')),'prefix' => '',],
        'tafseer239' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer239.sqlite')),'prefix' => '',],
        'tafseer24' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer24.sqlite')),'prefix' => '',],
        'tafseer240' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer240.sqlite')),'prefix' => '',],
        'tafseer241' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer241.sqlite')),'prefix' => '',],
        'tafseer242' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer242.sqlite')),'prefix' => '',],
        'tafseer243' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer243.sqlite')),'prefix' => '',],
        'tafseer244' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer244.sqlite')),'prefix' => '',],
        'tafseer245' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer245.sqlite')),'prefix' => '',],
        'tafseer246' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer246.sqlite')),'prefix' => '',],
        'tafseer247' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer247.sqlite')),'prefix' => '',],
        'tafseer248' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer248.sqlite')),'prefix' => '',],
        'tafseer249' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer249.sqlite')),'prefix' => '',],
        'tafseer250' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer250.sqlite')),'prefix' => '',],
        'tafseer251' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer251.sqlite')),'prefix' => '',],
        'tafseer252' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer252.sqlite')),'prefix' => '',],
        'tafseer253' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer253.sqlite')),'prefix' => '',],
        'tafseer254' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer254.sqlite')),'prefix' => '',],
        'tafseer255' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer255.sqlite')),'prefix' => '',],
        'tafseer256' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer256.sqlite')),'prefix' => '',],
        'tafseer257' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer257.sqlite')),'prefix' => '',],
        'tafseer258' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer258.sqlite')),'prefix' => '',],
        'tafseer259' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer259.sqlite')),'prefix' => '',],
        'tafseer26' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer26.sqlite')),'prefix' => '',],
        'tafseer260' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer260.sqlite')),'prefix' => '',],
        'tafseer261' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer261.sqlite')),'prefix' => '',],
        'tafseer262' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer262.sqlite')),'prefix' => '',],
        'tafseer263' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer263.sqlite')),'prefix' => '',],
        'tafseer264' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer264.sqlite')),'prefix' => '',],
        'tafseer265' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer265.sqlite')),'prefix' => '',],
        'tafseer266' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer266.sqlite')),'prefix' => '',],
        'tafseer267' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer267.sqlite')),'prefix' => '',],
        'tafseer268' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer268.sqlite')),'prefix' => '',],
        'tafseer269' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer269.sqlite')),'prefix' => '',],
        'tafseer27' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer27.sqlite')),'prefix' => '',],
        'tafseer270' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer270.sqlite')),'prefix' => '',],
        'tafseer271' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer271.sqlite')),'prefix' => '',],
        'tafseer272' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer272.sqlite')),'prefix' => '',],
        'tafseer273' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer273.sqlite')),'prefix' => '',],
        'tafseer274' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer274.sqlite')),'prefix' => '',],
        'tafseer275' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer275.sqlite')),'prefix' => '',],
        'tafseer276' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer276.sqlite')),'prefix' => '',],
        'tafseer277' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer277.sqlite')),'prefix' => '',],
        'tafseer278' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer278.sqlite')),'prefix' => '',],
        'tafseer279' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer279.sqlite')),'prefix' => '',],
        'tafseer28' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer28.sqlite')),'prefix' => '',],
        'tafseer280' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer280.sqlite')),'prefix' => '',],
        'tafseer281' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer281.sqlite')),'prefix' => '',],
        'tafseer282' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer282.sqlite')),'prefix' => '',],
        'tafseer283' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer283.sqlite')),'prefix' => '',],
        'tafseer284' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer284.sqlite')),'prefix' => '',],
        'tafseer285' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer285.sqlite')),'prefix' => '',],
        'tafseer286' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer286.sqlite')),'prefix' => '',],
        'tafseer287' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer287.sqlite')),'prefix' => '',],
        'tafseer288' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer288.sqlite')),'prefix' => '',],
        'tafseer289' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer289.sqlite')),'prefix' => '',],
        'tafseer29' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer29.sqlite')),'prefix' => '',],
        'tafseer290' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer290.sqlite')),'prefix' => '',],
        'tafseer291' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer291.sqlite')),'prefix' => '',],
        'tafseer292' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer292.sqlite')),'prefix' => '',],
        'tafseer293' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer293.sqlite')),'prefix' => '',],
        'tafseer294' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer294.sqlite')),'prefix' => '',],
        'tafseer295' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer295.sqlite')),'prefix' => '',],
        'tafseer296' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer296.sqlite')),'prefix' => '',],
        'tafseer297' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer297.sqlite')),'prefix' => '',],
        'tafseer298' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer298.sqlite')),'prefix' => '',],
        'tafseer299' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer299.sqlite')),'prefix' => '',],
        'tafseer300' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer300.sqlite')),'prefix' => '',],
        'tafseer301' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer301.sqlite')),'prefix' => '',],
        'tafseer302' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer302.sqlite')),'prefix' => '',],
        'tafseer303' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer303.sqlite')),'prefix' => '',],
        'tafseer304' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer304.sqlite')),'prefix' => '',],
        'tafseer32' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer32.sqlite')),'prefix' => '',],
        'tafseer33' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer33.sqlite')),'prefix' => '',],
        'tafseer34' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer34.sqlite')),'prefix' => '',],
        'tafseer36' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer36.sqlite')),'prefix' => '',],
        'tafseer37' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer37.sqlite')),'prefix' => '',],
        'tafseer38' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer38.sqlite')),'prefix' => '',],
        'tafseer39' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer39.sqlite')),'prefix' => '',],
        'tafseer4' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer4.sqlite')),'prefix' => '',],
        'tafseer40' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer40.sqlite')),'prefix' => '',],
        'tafseer42' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer42.sqlite')),'prefix' => '',],
        'tafseer43' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer43.sqlite')),'prefix' => '',],
        'tafseer44' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer44.sqlite')),'prefix' => '',],
        'tafseer45' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer45.sqlite')),'prefix' => '',],
        'tafseer5' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer5.sqlite')),'prefix' => '',],
        'tafseer50' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer50.sqlite')),'prefix' => '',],
        'tafseer6' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer6.sqlite')),'prefix' => '',],
        'tafseer7' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer7.sqlite')),'prefix' => '',],
        'tafseer8' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer8.sqlite')),'prefix' => '',],
        'tafseer9' =>  ['driver' => 'sqlite','database' => env('DB_DATABASE', database_path('tafaseer/tafseer9.sqlite')),'prefix' => '',],


        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => 'predis',

        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

    ],

];
