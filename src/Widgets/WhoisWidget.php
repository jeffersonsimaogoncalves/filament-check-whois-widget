<?php

namespace JeffersonSimaoGoncalves\FilamentCheckWhoisWidget\Widgets;

use AllowDynamicProperties;
use Filament\Facades\Filament;
use Filament\Widgets\Widget;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

#[AllowDynamicProperties]
class WhoisWidget extends Widget
{
    protected static bool $isLazy = false;

    protected static string $view = 'filament-check-whois-widget::filament.widgets.check-whois-widget';

    protected array $domainWhois = [];

    public function __construct()
    {
        $domains = [];

        $plugin = Filament::getCurrentPanel()?->getPlugin('filament-check-whois-widget');

        if ($plugin->getDomains()) {
            $domains = $plugin->getDomains();
        }

        foreach ($domains as $domain) {
            $this->whois[] = Cache::remember("filament-check-whois-widget-$domain", 2592000, fn () => $this->getWhois($domain));
        }
    }

    private function getWhois(string $domain): array {}

    public static function getSort(): int
    {
        $plugin = Filament::getCurrentPanel()?->getPlugin('filament-check-whois-widget');

        return $plugin->getSort() ?? -1;
    }

    public function getColumnSpan(): int | string | array
    {
        $plugin = Filament::getCurrentPanel()?->getPlugin('filament-check-whois-widget');

        return $plugin->getColumnSpan() ?? '1/2';
    }

    public function render(): View
    {
        return view(static::$view, [
            'domainWhois' => $this->domainWhois,
            'shouldShowTitle' => $this->shouldShowTitle(),
            'title' => $this->title(),
            'description' => $this->description(),
            'quantityPerRow' => $this->quantityPerRow() ?? '1',
        ]);
    }

    public function shouldShowTitle(): bool
    {
        $plugin = Filament::getCurrentPanel()?->getPlugin('filament-check-whois-widget');

        return $plugin->getShouldShowTitle();
    }

    public function title()
    {
        $plugin = Filament::getCurrentPanel()?->getPlugin('filament-check-whois-widget');

        return $plugin->getTitle();
    }

    public function description()
    {
        $plugin = Filament::getCurrentPanel()?->getPlugin('filament-check-whois-widget');

        return $plugin->getDescription();
    }

    public function quantityPerRow()
    {
        $plugin = Filament::getCurrentPanel()?->getPlugin('filament-check-whois-widget');

        return $plugin->getQuantityPerRow();
    }
}
