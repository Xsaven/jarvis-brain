<?php

declare(strict_types=1);

namespace Brain;

class Core
{
    protected string|null $versionCache = null;

    public function workingDirectory(): string
    {
        $result = getcwd();

        if (! $result) {
            throw new \RuntimeException('Unable to determine the current working directory.');
        }

        return $result . DS . to_string(config('brain.dir', '.brain'));
    }

    public function version(): string
    {
        if ($this->versionCache !== null) {
            return $this->versionCache;
        }
        $package = 'bfg/jarvis-brain';

        if (class_exists(\Composer\InstalledVersions::class)) {
            try {
                $pretty = \Composer\InstalledVersions::getPrettyVersion($package);
                if (is_string($pretty) && $pretty !== '') {
                    return $this->versionCache = $pretty;
                }
            } catch (\OutOfBoundsException $e) {
                // Not installed as a package; fall through
            }

            try {
                $root = \Composer\InstalledVersions::getRootPackage();
                if (is_array($root) && isset($root['pretty_version']) && is_string($root['pretty_version'])) {
                    return $this->versionCache = $root['pretty_version'];
                }
            } catch (\Throwable $e) {
                // Ignore and fall back
            }
        }

        $composerPath = dirname(__DIR__) . DS . 'composer.json';
        if (is_file($composerPath)) {
            $json = json_decode((string) file_get_contents($composerPath), true);
            if (is_array($json) && isset($json['version']) && is_string($json['version']) && $json['version'] !== '') {
                return $this->versionCache = $json['version'];
            }
        }

        return $this->versionCache = '0.0.0';
    }
}
