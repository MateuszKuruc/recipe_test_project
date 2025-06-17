<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasViewCount
{
    public function viewed(): int
    {
        $modelName = Str::of($this->getTable())->singular();
        $sessionKey = "is_recipe_{$modelName}_{$this->id}_viewed";

        if (! session()->get($sessionKey)) {
            self::withoutTimestamps(function () {
                $this->increment('view_count');
            });
            session()->put($sessionKey, true);
        }
        return $this->view_count;
    }
}
