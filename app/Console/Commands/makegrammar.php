<?php

namespace App\Console\Commands;

use Symfony\Component\Process\Process;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Exception\ProcessFailedException;

class MakeGrammarCommand extends Command
{
  protected $commandName = 'make:grammar';
  protected $commandDescription = "Create a new Grammar class";

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
    $grammarName = ucfirst(strtolower($name));

    $grammar = '<?php

namespace App\Grammar;

use App\Touch\Fluent;
use App\Touch\Grammar;

class '.$grammarName.' extends Grammar implements Fluent
{
  public function handle()
  {
    return $this->code;
  }
}';

    if ($grammarName != null || $grammarName != '') {
      if (file_exists('app/Grammar/'. $grammarName.'.php')) {
        $output->writeln('Grammar already exists!');
      }
      else {
        file_put_contents('app/Grammar/'. $grammarName.'.php', $grammar);
        $output->writeln($grammarName.' was successfully created!');
      }
    }
    else {
      $output->writeln('Specify Grammar name!');
    }
  }
}