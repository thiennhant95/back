<?php

return [

    /*
    |--------------------------------------------------------------------------
    | User Defined Variables
    |--------------------------------------------------------------------------
    |
    | This is a set of variables that are made specific to this application
    | that are better placed here rather than in .env file.
    | Use config('your_key') to get the values.
    |
    */

    'opportunityStatus'     => [
        '失注',
        '新規',
        '要再TEL',
        '後追い長期不在',
        '新規長期不在',
        '査定サービス中',
        '出品中',
        '出品後回答待ち',
        '必要書類待ち',
        '車両引取待ち',
        '振込待ち',
        '完了済み'
    ],
    'listingAccuracy'   => ['S','A','B','C','D','NG'],
    'retelNumber'   => ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'],
        


];
