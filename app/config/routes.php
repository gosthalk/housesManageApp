<?php

return [

    '' => [
        'controller' => 'main',
        'action' => 'index'
    ],

    'addHouse' => [
        'controller' => 'main',
        'action' => 'addHouse'
    ],

    'editHouse/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'editHouse'
    ],

    'deleteHouse/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'deleteHouse'
    ],

    'addApartment' => [
        'controller' => 'main',
        'action' => 'addApartment'
    ],

    'editApartment' => [
        'controller' => 'main',
        'action' => 'editApartment'
    ]

];