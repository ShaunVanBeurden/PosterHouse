<?php

namespace App\Models\Components;

use Carbon\Carbon;

trait Blockable
{
    /**
     * Block the model.
     */
    public function block()
    {
        $this->blocked_at = Carbon::now();
        $this->save();
    }

    /**
     * Unblock model.
     */
    public function unblock()
    {
        $this->blocked_at = null;
        $this->save();
    }

    /**
     * Determine if model is blocked.
     *
     * @return bool
     */
    public function blocked()
    {
        return ! is_null($this->blocked_at);
    }
}