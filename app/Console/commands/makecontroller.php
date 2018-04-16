<?php
use Symfony\Component\Process\Process;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Exception\ProcessFailedException;

class MakeControllerCommand extends Command
{
  protected $commandName = 'make:controller';
  protected $commandDescription = "Create a new controller class";

  protected $commandArgumentName = "name";
  protected $commandArgumentDescription = "The name of the class.";

  protected $commandOptionModel = "model";
  protected $commandOptionDescription = 'Generate a resource controller for the given model.';

  protected function configure()
  {
    $this
      ->setName($this->commandName)
      ->setDescription($this->commandDescription)
      ->addArgument(
        $this->commandArgumentName,
        InputArgument::REQUIRED,
        $this->commandArgumentDescription
      )
      ->addOption(
        $this->commandOptionModel,
        null,
        InputOption::VALUE_NONE,
        $this->commandOptionDescription
      )
    ;
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $name = $input->getArgument($this->commandArgumentName);
    $controllerName = ucfirst(strtolower($name)).'Controller';

    $controller = "<?php

class ".$controllerName." extends Controller
{
  /**
   * This is the default method
   *
  */
  public function index()
  {
    echo '".$controllerName." was successfully created!';
  }
}";

    if (file_exists('app/Controllers/'. $controllerName.'.php')) {
      $output->writeln('Controller already exists!');
    }
    else {
      file_put_contents('app/Controllers/'. $controllerName.'.php', $controller);
      $output->writeln($controllerName.' was successfully created!');
    }
  }
}