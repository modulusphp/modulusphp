<?php

namespace App\Console\Commands;

use Symfony\Component\Process\Process;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Exception\ProcessFailedException;

class MakeModelCommand extends Command
{
  protected $commandName = 'make:model';
  protected $commandDescription = "Create a new Eloquent model class";

  protected $commandArgumentName = "name";
  protected $commandArgumentDescription = "The name of the class.";

  protected $commandOptionController = "controller";
  protected $commandOptionDescription = 'Create a new controller for the model.';

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
        $this->commandOptionController,
        null,
        InputOption::VALUE_NONE,
        $this->commandOptionDescription
      )
    ;
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $name = $input->getArgument($this->commandArgumentName);
    $modelName = ucfirst(strtolower($name));

    $model = "<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ".$modelName." extends Eloquent
{
  
}";

    if ($modelName != null || $modelName != '') {
      if (file_exists('app/Models/'. $modelName.'.php')) {
        $output->writeln('Model already exists!');
      }
      else {
        file_put_contents('app/Models/'. $modelName.'.php', $model);
        $output->writeln($modelName.' was successfully created!');
      }
    }
    else {
      $output->writeln('Specify model name!');
    }
  }
}