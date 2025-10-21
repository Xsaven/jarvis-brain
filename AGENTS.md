# Repository Guidelines

## Project Structure & Module Organization
The CLI relies on Laravel's console components and a lightweight Eloquent setup. Key paths:
- `bin/brain` boots the application container and registers console commands.
- `src/Console/Commands` houses interactive flows such as `list`, `add`, `detail`, and `migrate`.
- `src/Database` contains the SQLite bootstrapper and migrations; data lives in `~/.mcpc/mcpc.sqlite` unless `MCPC_DB_PATH` overrides it.
- `schema/` stores JSON schemas for YAML authoring assistance, while `.docs/` keeps long-form project briefs.
- `library.json` curates shipped MCP server templates; treat it as the canonical catalog for agent integrations.

## Build, Test, and Development Commands
- `composer install` installs dependencies and runs migrations through Composer hooks; rerun after changing `composer.json` or migrations.
- `composer dump-autoload` refreshes class maps when adding or relocating PHP files.
- `php bin/brain list` verifies command registration and surfaces available tooling.
- `php bin/brain migrate` manually applies database migrations during local testing.

## Coding Style & Naming Conventions
Follow PSR-12 with strict types enabled, four-space indentation, and imported classes grouped alphabetically. Command classes should use imperative names (`AddCommand`, `ListCommand`), while services remain noun-based. Keep configuration keys lowercase with hyphens (see `library.json`). Document non-trivial logic inline sparingly.

## Testing Guidelines
A formal test suite is not yet present; when contributing features, add PHPUnit coverage under `tests/` and register a `composer test` script so future runs are one command away. At a minimum, exercise new console flows via `php bin/brain <command>` and capture expected prompts or side effects (e.g., credential persistence).

## Commit & Pull Request Guidelines
No Git history ships with this snapshot, so default to Conventional Commits (e.g., `feat: add qwen detector`). Pull requests should outline motivation, impacted commands, schema updates, and manual verification steps. Include screenshots or terminal transcripts when modifying interactive prompts, and note any new env vars or credential requirements to update downstream agent configs.

## Configuration & Security Tips
Keep secrets out of source control; rely on the `credentials` table for runtime storage and never hard-code defaults in `library.json`. Use `MCPC_DB_PATH` to isolate development databases per environment, and confirm file permissions when running on shared machines. Update schema definitions alongside any new agent attributes to maintain autocompletion fidelity.

# About Project

This project is the basis for any AI CLI tool. It is a CLI tool written in Laravel. And it was created to keep instructions 
and settings for everything needed for the AI CLI Agent in the `.brain` folder in a single Yaml format with schemas 
`# yaml-language-server: $schema=https://raw.githubusercontent.com/Xsaven/jarvis-brain/refs/heads/master/schema/barin.json` 
for autocompletion. This tool is installed globally through composer and is available anywhere from the terminal. 
Compiling configs for agents will depend on the selected tool, first it will be compiled into configs for Claude code CLI 
and for Codex CLI. Then in the future we will add Gemini CLI and Qwen CLI. Since AI understands xml better, all instructions 
will be compiled in xml format with the most thoughtful neural xml methods for the agent and subagents. 
Also, general control of the MCP by tools, also in a single format in Yaml and will be compiled for different agents. 
It is possible to compile for several agents at the same time. The advantage of this approach is that in one place and 
in one format we configure the brain and it will then compile into configs for any other agent, if for example the 
limits on Codex CLI have run out, then we can recompile under Claude Code CLI and continue working without straining for 
new settings, everything is unified to Yaml format and conveniently compiled into configs for the agent. 
