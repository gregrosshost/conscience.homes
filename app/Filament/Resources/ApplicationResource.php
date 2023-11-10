<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApplicationResource\Pages;
use App\Filament\Resources\ApplicationResource\RelationManagers;
use App\Models\Application;
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

class ApplicationResource extends Resource
{
    protected static ?string $model = Application::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('application.motivation')
                            ->label("What motivated you to seek recovery housing at Conscience Homes? Where were you before now?"),
                        TextInput::make('application.past-history')
                            ->label("Have you previously attempted recovery or participated in any treatment programs? If yes, please provide brief details."),
                        TextInput::make('application.recovery-goals')
                            ->label("What are your recovery goals, both short-term and long-term?"),
                        TextInput::make('application.support-system')
                            ->label("Do you have a support system, such as family, friends, or a sponsor? How do they contribute to your recovery?"),
                        TextInput::make('application.medications')
                            ->label("Are you currently taking any medications prescribed by a medical professional? If yes, please provide details."),
                        TextInput::make('application.member-contributions')
                            ->label("How do you plan to contribute to the supportive community environment at Conscience Homes?"),
                        TextInput::make('application.member-commitments')
                            ->label("Can you commit to actively participating in house meetings and other recovery-oriented activities?"),
                        TextInput::make('application.member-guidance')
                            ->label("Are you open to receiving guidance and support from house representatives and fellow residents in your recovery journey?"),
                        TextInput::make('application.member-challenges')
                            ->label("How do you plan to address any potential challenges or triggers that may arise during your stay at Conscience Homes?"),
                        TextInput::make('application.member-guidelines')
                            ->label("Are you willing to adhere to the guidelines set forth by Conscience Homes, including chores and abstinence requirements?"),
                        TextInput::make('application.member-aspirations')
                            ->label("What are your expectations and aspirations for life during your stay at Conscience Homes?"),
                        TextInput::make('application.legal')
                            ->label("Do you have any legal obligations or pending court cases that may impact your ability to stay at Conscience Homes?"),
                        TextInput::make('application.employment')
                            ->label("Are you currently employed or actively seeking employment? If not employed, what plans do you have to secure a stable income? (For example: Job History) "),
                        TextInput::make('application.allergies')
                            ->label("Do you have any specific medical or dietary requirements that need to be considered?"),
                        TextInput::make('application.background-check')
                            ->label("Are you willing to undergo a background check, if required by Conscience Homes?"),
                        TextInput::make('application.additional-info')
                            ->label("Is there any additional information or concerns you would like to share with us?"),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('application.date')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListApplications::route('/'),
            'create' => Pages\CreateApplication::route('/create'),
            'edit' => Pages\EditApplication::route('/{record}/edit'),
        ];
    }
}
