<?php

namespace App\Http\Responses;

use App\Filament\Resources\MeetingResource;
use Filament\Facades\Filament;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;

class LoginResponse extends \Filament\Http\Responses\Auth\LoginResponse
{
    public function toResponse($request): RedirectResponse|Redirector
    {
        if (Filament::getCurrentPanel()->getId() === 'member') {
            return redirect()->to(MeetingResource::getUrl('index'));
        }

        return parent::toResponse($request);
    }
}
