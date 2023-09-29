<?php

namespace App;

use PDO;

class MysqlDriver implements RepositoryInterface
{

	public function __construct(
		private PDO $pdo
	)
	{
		if(!$this->pdo) {
			$this->pdo = new PDO(getenv('PDO_DSN', true), getenv('PDO_USERNAME', true), getenv('PDO_PASSWORD', true));
		}
	}

	public function insert(string $data): self
	{
		$statement = $this->pdo->prepare('INSERT INTO prw.verses(body) VALUES (:value)');
		$statement->execute(['value' => $data]);
		return $this;
	}

	public function findAll(): array
	{
		return ($this->pdo->query('SELECT body FROM prw.verses'))->fetchAll(PDO::FETCH_COLUMN, 0);
	}
}