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

    'apartments' => [
        'controller' => 'main',
        'action' => 'showAllApartments'
    ],

    'apartments/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'apartments'
    ],

    'addApartment/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'addApartment'
    ],

    'editApartment/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'editApartment'
    ],

    'deleteApartment/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'deleteApartment'
    ],

    'apartmentInfo/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'apartmentInfo'
    ],

    'apartmentPlan/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'apartmentPlan'
    ]

];