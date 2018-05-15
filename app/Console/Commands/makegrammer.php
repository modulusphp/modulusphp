<?php

namespace App\Console\Commands;

use Symfony\Component\Process\Process;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Exception\ProcessFailedException;

class MakeGrammerCommand extends Command
{
  protected $commandName = 'make:grammer';
  protected $commandDescription = "Create a new Grammer class";

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
    $grammerName = ucfirst(strtolower($name));

    // if (substr($grammerName, -10) != 'middleware') {
    //   $grammerName = $grammerName.'Middleware';
    // }
    // else {
    //   $grammerName = substr($grammerName, 0, strlen($grammerName) - 10).'Middleware';
    // }

    $grammer = '<?php

namespace App\Grammer;

use App\Touch\Fluent;
use App\Touch\Grammer;

class '.$grammerName.' extends Grammer implements Fluent
{
  public function handle()
  {
    return $this->code;
  }
}';

    if ($grammerName != null || $grammerName != '') {
      if (file_exists('app/Grammer/'. $grammerName.'.php')) {
        $output->writeln('Grammer already exists!');
      }
      else {
        file_put_contents('app/Grammer/'. $grammerName.'.php', $grammer);
        $output->writeln($grammerName.' was successfully created!');
      }
    }
    else {
      $output->writeln('Specify Grammer name!');
    }
  }
}