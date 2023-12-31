<?php

namespace App\Filament\Member\Resources;

use App\Filament\Member\Resources\ReportResource\Pages;
use App\Filament\Member\Resources\ReportResource\RelationManagers;
use App\Models\Report;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Wizard::make([
                            Wizard\Step::make('Medical')
                                ->icon('heroicon-m-heart')
                                ->schema([
                                    Hidden::make('user_id')
                                        ->dehydrateStateUsing(fn ($state) => Auth::id()),
                                    DatePicker::make('report.date')
                                        ->required(),
                                    DatePicker::make('report.prescriptions-date')
                                        ->label("When is the next date your prescriptions need refilled?"),
                                    Select::make('report.outpatient')
                                        ->label("Did you attend outpatient this week? ")
                                        ->options([
                                            'no' => 'No',
                                            'yes' => 'Yes'
                                        ])
                                        ->required(),
                                    TextInput::make('report.outpatient-weeks-remaining')
                                        ->label("How many more weeks left?")
                                        ->numeric(),
                                ]),
                            Wizard\Step::make('Peer Support')
                                ->icon('heroicon-m-face-smile')
                                ->schema([
                                    Select::make('report.meetings')
                                        ->label("Have you attended your weekly meetings?")
                                        ->options([
                                            'no' => 'No',
                                            'yes' => 'Yes'
                                        ])
                                        ->required(),
                                    Select::make('report.meetings-homegroup')
                                        ->label("Do you have a home group?")
                                        ->options([
                                            'no' => 'No',
                                            'yes' => 'Yes'
                                        ])
                                        ->required(),
                                    Select::make('report.meetings-homegroup-attendance')
                                        ->label("Did you attend your homegroup this week?")
                                        ->options([
                                            'no' => 'No',
                                            'yes' => 'Yes'
                                        ])
                                        ->required(),
                                    Select::make('report.meetings-mentor')
                                        ->label("Do you have a sponsor or mentor?")
                                        ->options([
                                            'no' => 'No',
                                            'yes' => 'Yes'
                                        ])
                                        ->required(),
                                     Select::make('report.meetings-mentor-contact')
                                        ->label("How many days this previous week did you contact your mentor?")
                                         ->helperText("Approximately how many, if you dont know for sure?")
                                        ->options([
                                            '00' => 'None',
                                            '01' => '1',
                                            '02' => '2',
                                            '03' => '3',
                                            '04' => '4',
                                            '05' => '5',
                                            '06' => '6',
                                            '07' => 'Every'
                                        ])
                                        ->required(),
                                    TextInput::make('report.meetings-mentor-update')
                                        ->label("What does your mentor/sponsor have you doing?")
                                        ->helperText("For Example: Step 1 -> Powerlessness),
                                ]),
                            Wizard\Step::make('Personal Recovery')
                                ->icon('heroicon-m-finger-print')
                                ->schema([
                                    Select::make('report.personal')
                                        ->options([
                                            '01' => 'Significant Struggles',
                                            '02' => 'Minimal Progress',
                                            '03' => 'Some Progress',
                                            '04' => 'Steady Progress',
                                            '05' => 'Strong Recovery'
                                        ])
                                        ->required(),
                                    Textarea::make('report.personal-shortcomings')
                                        ->label("Are there any obstacles or challenges that you think are preventing you from moving forward in your recovery journey?")
                                        ->helperText("For Example: Not having enough food or clothes. Intrusive thoughts. Etc..."),
                                    Textarea::make('report.personal-goals')
                                        ->label("What is your short-term goal for this week?")
                                        ->helperText("It's important to make goals that are realistic and attainable to ensure a sense of accomplishment and motivation."),
                                ]),
                            Wizard\Step::make('Employment')
                                ->icon('heroicon-m-wallet')
                                ->schema([
                                    Select::make('report.employment')
                                        ->label("Are you currently holding a job, or have side work for income? ")
                                        ->options([
                                            'no' => 'No',
                                            'yes' => 'Yes'
                                        ])
                                        ->required(),
                                    TextInput::make('report.employment-employer')
                                        ->label("Where are you currently employed, or what do you do to earn money?")
                                ]),
                        ])
                            ->skippable()
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->where('user_id', Auth::id()))
            ->columns([
                TextColumn::make('report.date')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReports::route('/'),
            'create' => Pages\CreateReport::route('/create'),
            'edit' => Pages\EditReport::route('/{record}/edit'),
        ];
    }
}
