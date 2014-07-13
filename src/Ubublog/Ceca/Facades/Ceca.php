<?php namespace Ubublog\Ceca\Facades;

use Illuminate\Support\Facades\Facade;

class Ceca extends Facade {
    public static function getFacadeAccessor()
    {
        return 'ceca';
    }
}