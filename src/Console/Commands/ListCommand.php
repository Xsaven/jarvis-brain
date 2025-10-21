<?php

declare(strict_types=1);

namespace Brain\Console\Commands;

use Illuminate\Console\Command;
use Brain\Library;
use Brain\Models\Credential;

class ListCommand extends Command
{
    protected $signature = 'list {search?}';

    protected $description = 'The list of MCP servers';

    public function handle()
    {
        $all = Library::create()->all(
            $this->argument('search')
        );

        if (count($all) === 0) {
            $this->components->warn('No MCP servers found in the configuration.');
            return;
        } else {
            $this->components->success('List of MCP servers:');
        }

        $all->map(function (object $server) {
            $this->components->twoColumnDetail(
                '[ ' . $server->icon . ' ] ' . $server->name . ' (' . $server->license . ')',
                $server->description ?? ''
            );
        });

        $this->components->info('Total MCP servers: ' . $all->count());
    }


}

