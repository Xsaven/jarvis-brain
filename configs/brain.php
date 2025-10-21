<?php

declare(strict_types=1);

return [
    // Folder name created/used in the current working directory
    // for storing YAML brains and compiled artifacts
    'dir' => '.brain',

    // Default schema URL for YAML authoring assistance
    'schema_url' => 'https://raw.githubusercontent.com/Xsaven/jarvis-brain/refs/heads/master/schema/{name}.json',

    // Optional: allow overriding database path via env as today
    // Kept here for discoverability; DatabaseManager still honors MCPC_DB_PATH
    'database' => [
        'env_path' => 'MCPC_DB_PATH',
    ],
];

