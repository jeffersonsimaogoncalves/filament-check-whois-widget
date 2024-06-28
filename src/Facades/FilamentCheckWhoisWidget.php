<?php

namespace JeffersonSimaoGoncalves\FilamentCheckWhoisWidget\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \JeffersonSimaoGoncalves\FilamentCheckWhoisWidget\FilamentCheckWhoisWidget
 */
class FilamentCheckWhoisWidget extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \JeffersonSimaoGoncalves\FilamentCheckWhoisWidget\FilamentCheckWhoisWidget::class;
    }
}
