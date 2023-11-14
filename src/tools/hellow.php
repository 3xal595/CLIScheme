<?php

// src/Command/CreateUserCommand.php
namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

require __DIR__ ."font.php";




// the name of the command is what users type after "php bin/console"
#[AsCommand(name: 'app:create-user')]
class CreateUserCommand extends Command
{   

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // ... put here the code to create the user

        $output->writeln([
            '',
        ]);

        return Command::SUCCESS;

        // or return this if some error happened during the execution
        // (it's equivalent to returning int(1))
        // return Command::FAILURE;

        // or return this to indicate incorrect command usage; e.g. invalid options
        // or missing arguments (it's equivalent to returning int(2))
        // return Command::INVALID
    }
}