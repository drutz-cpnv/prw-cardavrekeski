<?php

namespace App;

interface RepositoryInterface
{

	public function insert(string $data): self;
	public function findAll(): array;


}