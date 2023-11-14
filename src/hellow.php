<?php
namespace Ksr\SchemeCli\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

include 'fonction.php';


class Ping extends Command
{
    protected function configure()
    {
        $this->setName("hellow");
        $this->setDescription("Just a welcoming page !");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(someFont());
        return Command::SUCCESS;
    }
}