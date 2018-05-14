<?php

namespace App\Console\Commands;

use Symfony\Component\Process\Process;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Exception\ProcessFailedException;

class MakeMiddlewareCommand extends Command
{
  protected $commandName = 'make:middleware';
  protected $commandDescription = "Create a new Middleware class";

  protected $commandArgumentName = "name";
  protected $commandArgumentDescription = "The name of the class.";

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
    ;
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $name = $input->getArgument($this->commandArgumentName);
    $middlewareName = ucfirst(strtolower($name));

    if (substr($middlewareName, -10) != 'middleware') {
      $middlewareName = $middlewareName.'Middleware';
    }
    else {
      $middlewareName = substr($middlewareName, 0, strlen($middlewareName) - 10).'Middleware';
    }

    $middleware = "<?php

namespace App\Http\Middleware;

use App\Core\Auth;

class ".$middlewareName."
{
  public function handle()
  {

  }
}";

    if ($middlewareName != null || $middlewareName != '') {
      if (file_exists('app/Http/Middleware/'. $middlewareName.'.php')) {
        $output->writeln('Middleware already exists!');
      }
      else {
        file_put_contents('app/Http/Middleware/'. $middlewareName.'.php', $middleware);
        $output->writeln($middlewareName.' was successfully created!');
      }
    }
    else {
      $output->writeln('Specify Middleware name!');
    }
  }
}