<?php

namespace App\Services;

class Toastr
{
    public function success($message)
    {
        session()->flash('toast', [
            'type' => 'success',
            'message' => $message
        ]);
    }

    public function error($message)
    {
        session()->flash('toast', [
            'type' => 'error',
            'message' => $message
        ]);
    }

    public function warning($message)
    {
        session()->flash('toast', [
            'type' => 'warning',
            'message' => $message
        ]);
    }

    public function info($message)
    {
        session()->flash('toast', [
            'type' => 'info',
            'message' => $message
        ]);
    }
}
