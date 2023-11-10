<?php

namespace App\Livewire;

use App\Models\Meeting;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class CreateMeeting extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('user_id')
                    ->dehydrateStateUsing(fn ($state) => Auth::id()),
                Radio::make('fellowship')
                    ->options([
                        'NA' => 'NA',
                        'AA' => 'AA',
                        'RR' => 'RR'
                    ])
                    ->inline()
                    ->required(),
                DateTimePicker::make('date_time')
                    ->required(),
                TextInput::make('location')
                    ->required()
                    ->maxLength(255),
                TextInput::make('topic')
                    ->required()
                    ->maxLength(255),



            ])
            ->statePath('data')
            ->model(Meeting::class);
    }

    public function create(): void
    {
        $data = $this->form->getState();

        $record = Meeting::create($data);

        $this->form->model($record)->saveRelationships();
    }

    public function render(): View
    {
        return view('livewire.create-meeting');
    }
}
