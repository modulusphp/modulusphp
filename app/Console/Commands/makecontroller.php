<?php

namespace App\Console\Commands;

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

  protected $commandOptionAuth = "auth";
  protected $commandOptionDescription = 'Create a Auth Controller';

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
      ->addArgument(
        $this->commandOptionAuth,
        InputArgument::OPTIONAL,
        $this->commandOptionDescription
      )
    ;
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $name = $input->getArgument($this->commandArgumentName);
    $controllerName = ucfirst(strtolower($name));

    if (substr($controllerName, -10) != 'controller') {
      $controllerName = $controllerName.'Controller';
    }
    else {
      $controllerName = substr($controllerName, 0, strlen($controllerName) - 10).'Controller';
    }

    $isAuth = $input->getArgument($this->commandOptionAuth);

    $auth = '';

    if ($isAuth != null) {
      if (strtolower($isAuth) == 'auth') {
        $auth = "\\".ucfirst($isAuth)."/";
      }
      else {
        $output->writeln(ucfirst($isAuth).' Controller can\'t be created');
        return;
      }
    }

    $controller = "<?php

namespace App\Http\Controllers".str_replace('/', '', $auth).";

use App\Http\Controllers\Controller;

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

    if (file_exists('app/Http/Controllers/'.str_replace('\\', '/', $auth)."/". $controllerName.'.php')) {
      $output->writeln('Controller already exists!');
    }
    else {
      file_put_contents('app/Http/Controllers/'.str_replace('\\', '/', $auth). $controllerName.'.php', $controller);
      $output->writeln($controllerName.' was successfully created!');
    }
  }
}