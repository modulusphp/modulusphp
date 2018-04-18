<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

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
        InputArgument::OPTIONAL,
        $this->commandArgumentDescription,
        'all'
      )
      ->addArgument(
        $this->commandOptionMigration,
        InputArgument::OPTIONAL,
        $this->commandOptionDescription,
        'up'
      )
    ;
  }

  /**
   * Do something weird
   */
  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $name = strtolower($input->getArgument($this->commandArgumentName));
    $action = $input->getArgument($this->commandOptionMigration);

    require_once 'app/Config/environment.php';
    require_once 'app/Config/database.php';

    if (Capsule::schema()->hasTable('migrations') == false) {
      if (file_exists('storage/migrations/migrations.php')) {
        call_user_func(['MigrationsMigration', 'up']);
        Debug::info('Successfully created a migrations table');
      }
      else {
        Debug::error('The migrations file is missing!');
        return $output->writeln('The migrations file is missing');
      }
    }
    
    if ($name == 'all') {
      $succesful = [];

      $migrationsDir = 'storage/migrations/';
      foreach(glob($migrationsDir.'*.php') as $migration) {
        $migration = substr($migration, 0, -4);
        $className = ucfirst(substr($migration, strrpos($migration, '/') + 1)).'Migration';

        if ($className != 'MigrationsMigration') {
          $migrationResponse = $this->migrateAll($migration.'.php', $className, $action);
          if ($migrationResponse != 0 || $migrationResponse != 'Couldn\'t migrate. See log for more information') {
            $succesful[] = $className;
          }
        }

      }

      if (count($succesful) == 0) {
        return $output->writeln('Nothing to migrate');
      }
      
      foreach($succesful as $succesfulMigration) {
        $output->writeln($succesfulMigration.' was successful.');
      }

      return;
    }

    $migrationFile = 'storage/migrations/'.$name.'.php';

    if (file_exists($migrationFile)) {
      $className = ucfirst($name).'Migration';

      if ($className != 'MigrationsMigration') {
        $migrationResponse = $this->migrateAll($migrationFile, $className, $action);
        if ($migrationResponse != 0 || $migrationResponse != 'Couldn\'t migrate. See log for more information') {
          return $output->writeln($className.' was successful.');
        }
        else {
          return $output->writeln('Nothing to migrate');
        }
      }
    }
    else {
      $output->writeln('"'.$name.'" migration file does not exist');
    }
  }

  private function migrateAll($migrationFile, $name, $action)
  {
    require_once 'app/Config/environment.php';
    require_once 'app/Config/database.php';
    require_once $migrationFile;

    require_once 'app/Models/Migration.php';
    
    $migration = Migration::where('title', $name)->first();

    if (strtolower($action == 'drop' ? 'down' : $action) == 'down') {
      if ($migration != null) {
        try {
          call_user_func([$name, 'down']);
        }
        catch (Exception $e) {
          Debug::error($e);
          return 'Couldn\'t migrate. See log for more information';
        }

        $migration->delete();
        return 'Migration was successful';
      }
      else {
        return 0;
      }
    }
    else if (strtolower($action) == 'up'){
      if ($migration == null) {
        try {
          call_user_func([$name, 'up']);
        }
        catch (Exception $e) {
          Debug::error($e);
          return 'Couldn\'t migrate. See log for more information';
        }

        Migration::create([
          'title' => $name
        ]);
    
        return 'Migration was successful';
      }
      else {
        return 0;
      }
    }
  }
}