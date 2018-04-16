<?php
use Symfony\Component\Process\Process;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Exception\ProcessFailedException;

class MigrateCommand extends Command
{
  protected $commandName = 'migrate';
  protected $commandDescription = "Runs a migration";

  protected $commandArgumentName = "name";
  protected $commandArgumentDescription = "The name of the migration.";

  protected $commandOptionMigration = "action";
  protected $commandOptionDescription = 'The action, the migration will take.';

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
        $this->commandOptionMigration,
        InputArgument::OPTIONAL,
        $this->commandOptionDescription,
        'up'
      )
    ;
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $name = strtolower($input->getArgument($this->commandArgumentName));
    $action = $input->getArgument($this->commandOptionMigration);

    $migrationFile = 'storage/migrations/'.$name.'.php';

    if (file_exists($migrationFile)) {
      require_once 'app/Config/environment.php';
      require_once 'app/Config/database.php';
      require_once $migrationFile;

      try {
        call_user_func([ucfirst($name).'Migration', strtolower($action == 'drop' ? 'down' : $action)]);
        $output->writeln('Migration was successful');
      }
      catch (EXception $e)
      {
        $output->writeln('Couldn\'t migrate. See log for more information');
        Debug::error($e);
      }
    }
    else {
      $output->writeln('"'.$name.'" migration file does not exist');
    }
  }
}