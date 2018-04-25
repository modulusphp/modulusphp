<?php
use Symfony\Component\Process\Process;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Exception\ProcessFailedException;

class ServeCommand extends Command
{
  protected $commandName = 'serve';
  protected $commandDescription = "Serve the application on the PHP development serve";

  protected $commandArgumentPort = "port";
  protected $commandArgumentDescription = "The port to serve the application on. <info>[default: 8000]</info>";

  protected $commandOptionName = "port";
  protected $commandOptionDescription = 'The port to serve the application on.';

  protected function configure()
  {
    $this
      ->setName($this->commandName)
      ->setDescription($this->commandDescription)
      ->addArgument(
        $this->commandArgumentPort,
        InputArgument::OPTIONAL,
        $this->commandArgumentDescription
      )
      ->addOption(
        $this->commandOptionName,
        null,
        InputOption::VALUE_NONE,
        $this->commandOptionDescription
      )
    ;
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $port = $input->getArgument($this->commandArgumentPort);

    $appRoot = $this->root();

    if ($port != null && is_numeric($port)) {
      $output->writeln('['.date('D M d G:i:s Y').'] Listening on http://localhost:'.$port);
      $output->writeln('Press Ctrl-C to quit.');
      $cmd = passthru('cd '.$appRoot.' && php -S localhost:'.$port);
      $output->writeln($cmd);
    }
    else if ($port == null) {
      $output->writeln('['.date('D M d G:i:s Y').'] Listening on http://localhost:8000');
      $output->writeln('Press Ctrl-C to quit.');
      $cmd = passthru('cd '.$appRoot.' && php -S localhost:8000');
      $output->writeln($cmd);
    }
    else if (!is_numeric($port)) {
      $output->writeln('invalid port number');
    }
    else {
      $output->writeln('['.date('D M d G:i:s Y').'] Listening on http://localhost:8000');
      $output->writeln('Press Ctrl-C to quit.');
      $cmd = passthru('cd '.$appRoot.' && php -S localhost:8000');
      $output->writeln($cmd);
    }
  }

  private function root() {
    $service = require 'app/Config/app.php';
    $appRoot = $service['app']['root'];

    $appRoot = $appRoot != null ? $appRoot : '/public' ;

    if ($appRoot[0] == "/") {
      $appRoot = substr($appRoot, 1);
    }

    return $appRoot;
  }
}