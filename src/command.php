<?php

namespace exl; // Adjust the namespace as needed

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Question\Question;



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
       
        $output->writeln('
        
        
        
                        <info>                               Welcome on the actual SchExE tool !                                               </info>
                        
                        
                        
                        ');

        $greetInput = new ArrayInput([
            // the command name is passed as first argument
            'command' => 'help'
        ]);

        $returnCode = $this->getApplication()->doRun($greetInput, $output);

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
        //question pour le scheme code
        $helper = $this->getHelper('question');
        $question = new Question('Enter Scheme code: ');

        $schemecode = $helper->ask($input, $output, $question);
        
        $result = schemeInterp($schemecode);

        //debut de la progress bar
        $progressBar = new ProgressBar($output, 50);

        // Set the redraw frequency to update the progress bar more frequently
        $progressBar->setRedrawFrequency(1);

        // Set the progress bar format for better visualization
        $progressBar->setFormat(' [%bar%] %percent:3s%% %elapsed:6s%/%estimated:6s%');

        // starts and displays the progress bar
        $progressBar->start();

        $startTime = time();
        

        while (time() - $startTime < 4) {
            // ... do some work

            // advances the progress bar 1 unit
            $progressBar->advance(1);

            // sleep for a short interval to simulate work
            usleep(100000); // 100,000 microseconds = 0.1 seconds
        }

        $progressBar->finish();

        $output->writeln('');
        $output->writeln('');
        $output->writeln('The result is : <comment>'.$result. '</comment>');
        $output->writeln('');

        // Return on success
        return Command::SUCCESS;
    }
}
