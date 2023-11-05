<?php

namespace App\Filament\Member\Resources;

use App\Filament\Member\Resources\MeetingResource\Pages;
use App\Filament\Member\Resources\MeetingResource\RelationManagers;
use App\Models\Meeting;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class MeetingResource extends Resource
{
    protected static ?string $model = Meeting::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Hidden::make('user_id')
                            ->dehydrateStateUsing(fn ($state) => Auth::id()),
                        TextInput::make('topic')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('fellowship')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DateTimePicker::make('date_time')
                            ->required(),
                        TextInput::make('location')
                            ->required()
                            ->maxLength(255),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->where('user_id', Auth::id()))
            ->columns([
                TextColumn::make('date_time')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('fellowship')
                    ->searchable(),
                TextColumn::make('location')
                    ->searchable(),
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
            'index' => Pages\ListMeetings::route('/'),
            'create' => Pages\CreateMeeting::route('/create'),
            'view' => Pages\ViewMeeting::route('/{record}'),
            'edit' => Pages\EditMeeting::route('/{record}/edit'),
        ];
    }
}
