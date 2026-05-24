<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use PDO;
use PDOException;

#[Signature('testing:database:create')]
#[Description('Create the configured testing database.')]
final class CreateTestingDatabase extends Command
{
    public function handle(): int
    {
        if (app()->environment() !== 'testing') {
            $this->error('This command can only run in the testing environment.');

            return Command::FAILURE;
        }

        $connection = config('database.connections.mysql');

        $database = (string) ($connection['database'] ?? '');

        if ($database === '') {
            $this->error('Testing database name is not configured.');

            return Command::FAILURE;
        }

        if (! str_ends_with($database, '_testing')) {
            $this->error('Testing database name must end with "_testing".');

            return Command::FAILURE;
        }

        if (! preg_match('/^[A-Za-z0-9_]+$/', $database)) {
            $this->error('Testing database name contains invalid characters.');

            return Command::FAILURE;
        }

        $host = (string) ($connection['host'] ?? '127.0.0.1');
        $port = (string) ($connection['port'] ?? '3306');
        $username = (string) ($connection['username'] ?? '');
        $password = (string) ($connection['password'] ?? '');
        $charset = (string) ($connection['charset'] ?? 'utf8mb4');
        $collation = (string) ($connection['collation'] ?? 'utf8mb4_unicode_ci');

        try {
            $pdo = new PDO(
                "mysql:host={$host};port={$port};charset={$charset}",
                $username,
                $password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ],
            );

            $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$database}` CHARACTER SET {$charset} COLLATE {$collation}");

            $this->info("Testing database [{$database}] is ready.");

            return Command::SUCCESS;
        } catch (PDOException $exception) {
            $this->error($exception->getMessage());

            return Command::FAILURE;
        }
    }
}
