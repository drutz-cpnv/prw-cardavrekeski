<?php

namespace App;

class Cadavrekski
{

	public function __construct(
		private RepositoryInterface $dataManager,
	)
	{
	}

	public function run($argv): void
	{
		match (count($argv)) {
			1 => $this->printAll(),
			2 => $this->createLine($argv),
		};
	}

	private function printAll(): void
	{
		foreach ($this->dataManager->findAll() as $item) {
			echo $item . PHP_EOL;
		}
		exit(0);
	}

	private function createLine($argv)
	{
		$this->dataManager->insert($argv[1]);
	}

}