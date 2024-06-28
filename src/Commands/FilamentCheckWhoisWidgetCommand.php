<?php

namespace JeffersonSimaoGoncalves\FilamentCheckWhoisWidget\Commands;

use Illuminate\Console\Command;

class FilamentCheckWhoisWidgetCommand extends Command
{
    public $signature = 'filament-check-whois-widget';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
