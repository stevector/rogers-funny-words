<?php

require $_ENV['HOME'] . '/code/wp-content/mu-plugins/hacky-proxy/vendor/autoload.php';

$hackyproxy = new \Stevector\HackyProxy\PantheonToGCPBucket();

$hackyproxy
  ->setSite('pantheon-rogers-funny-words') // pantheon site
  ->setEnvironment('dev') // pantheon environment
  ->setForwards(
    [
      [
        'path' => '/static/',
        'url' => 'http://{site}.static.artifactor.io',
        'prefix' => '{environment}',
      ],
      [
        'path' => '/',
        'url' => 'https://us-central1-webops-prototypes.cloudfunctions.net',
        'prefix' => '{site}--{environment}',
      ],
    ]
  )
  ->forward();
