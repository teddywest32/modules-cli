<?php namespace Pingpong\ModulesCli\Console;

use Illuminate\Console\Command;
use Pingpong\ModulesCli\Generators\ModelGenerator;
use Pingpong\ModulesCli\Traits\ModuleCommandTrait;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class GenerateModelCommand extends Command {

    use ModuleCommandTrait;

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'generate:model';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generate a new model';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$generator = new ModelGenerator($this->getModuleName(), $this->argument('model'));

        $generator->generate();

        $this->info("Model created successfully");
    }

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
            ['model', InputArgument::REQUIRED, 'Model name.'],
            ['module', InputArgument::OPTIONAL, 'The name of module will used.'],
		];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [
//			['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		];
	}

}
