<?php

namespace App;

use App\RepositoryInterface;

class FileDriver implements RepositoryInterface
{

	public function __construct(private string $filename = "data.txt")
	{
		if(!file_exists($this->filename)) {
			file_put_contents($this->filename, "");
		}
	}

	public function insert(string $data): self
	{
		file_put_contents($this->filename, $data . PHP_EOL);
		return $this;
	}

	public function findAll(): array
	{
		return explode("\n", file_get_contents($this->filename));
	}
}