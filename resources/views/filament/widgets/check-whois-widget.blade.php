<x-filament-widgets::widget class="fi-filament-info-widget">
    <x-filament::section>
        @if($shouldShowTitle)
            <div class="mb-4">
                <h2 class="flex items-center text-lg font-semibold text-gray-900 dark:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-4 h-4" style="margin-right: 8px;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                    </svg>

                    {{ is_null($title) ? __('filament-check-whois-widget::default.title') : $title }}
                </h2>
                <p class="mt-1 text-xs text-gray-600 dark:text-gray-400">
                    {{ is_null($description) ? __('filament-check-whois-widget::default.description') : $description }}
                </p>
            </div>
        @endif

        <div class="grid grid-cols-1 gap-2 md:grid-cols-{{$quantityPerRow}}">
            @foreach ($domainWhois as $whois)
                <div class="flex items-center justify-between bg-gray-100 dark:bg-gray-700 p-2 rounded-md shadow-sm">
                    <span class="flex text-sm font-medium text-gray-800 dark:text-white">
                        {{ $whois['domain'] }}
                    </span>
                    <span class="flex items-center text-xs text-gray-800 dark:text-white">
                        @if ($whois['expiration_date'])
                            <li>
                                <strong>Expiration: </strong> {{ $whois['expiration_date']->diffForHumans() }}
                                (<strong class="italic">{{ (int)abs($whois['expiration_date']->diffInDays()) }} days</strong>)
                            </li>
                        @endif
                    </span>
                </div>
            @endforeach
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
