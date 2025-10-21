<?php

declare(strict_types=1);

namespace Brain\Console\Commands;

use Illuminate\Console\Command;
use Brain\Library;
use Brain\McpFileDetector;
use Brain\Models\Credential;

class AddCommand extends Command
{
    protected $signature = 'add {name} {--agent= : The agent to use (claude, codex, gemini, qwen)}';

    protected $description = 'Add a new MCP server to the configuration';

    public function handle()
    {
        $name = $this->argument('name');

        try {
            $serverInfo = Library::create()
                ->setNotFoundCredentialCallback([$this, 'askCredentials'])
                ->get($name, true);
        } catch (\Throwable $e) {
            $this->components->error($e->getMessage());
            return 1;
        }

        $fileDetector = McpFileDetector::create();

        try {
            $fileDetector->addServer($serverInfo);
        } catch (\Throwable $e) {
            $this->components->error($e->getMessage());
            return 1;
        }

        dd($fileDetector);

        //$this->components->info("MCP server {$server->name} added successfully.");
    }

    public function askCredentials(string $name, mixed $default): string|null
    {
        if ($default && is_array($default) && count($default) > 0) {
            $value = $this->choice("Enter the value for credential '{$name}'", $default, 0);
        } elseif ($default && is_string($default)) {
            $value = $this->ask("Enter the value for credential '{$name}'", $default);
        } else {
            $value = $this->ask("Enter the value for credential '{$name}'");
        }
        return $value;
    }
}

