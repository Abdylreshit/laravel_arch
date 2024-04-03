<?php

namespace App\Ship\Core\Abstracts\Actions;

use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

abstract class Action
{
    use AsAction;

    /**
     * @see static::handle()
     *
     * @param  mixed  ...$arguments
     */
    public static function transactionalRun(...$arguments): mixed
    {
        return DB::transaction(function () use ($arguments) {
            return static::make()->handle(...$arguments);
        });
    }
}
