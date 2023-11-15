<?php

namespace exl; // Adjust the namespace as needed

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

require_once 'functions.php';

class hellow extends Command
{
    protected function configure()
    {
        $this->setName("hellow");
        $this->setDescription("Just a welcoming page ! :3");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<question>'.someFont().'</question>');
       
        $output->writeln('<error>                               Welcome on the actual SchExE tool !</error>');
        $output->writeln("<comment>                             Be aware that the tool isn't fully fonctionnal</comment>");
        $output->writeln("<comment>                             Be aware that the tool isn't fully fonctionnal</comment>");
        $output->writeln("<comment>                             Be aware that the tool isn't fully fonctionnal</comment>");
        $output->writeln("<comment>                             Be aware that the tool isn't fully fonctionnal</comment>");



        // Return on success
        return Command::SUCCESS;
    }
}

class read extends Command
{
    protected function configure()
    {
        $this->setName('read')
            ->setDescription('Read the following scheme content');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('In');

        // Return on success
        return Command::SUCCESS;
    }
}

