#!/usr/bin/env php
<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/src/command.php';

use Symfony\Component\Console\Application;

// Create a new Symfony Console Application
$application = new Application();

// Add your command to the application
$application->setDefaultCommand('hellow');
$application->add(new \exl\read()); // Adjust the namespace as needed
$application->add(new \exl\hellow()); // Adjust the namespace as needed

// Run the application
$application->run();
