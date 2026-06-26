<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UKMResource\Pages\ListUKMS;
use App\Filament\Resources\UKMResource\Pages\CreateUKM;
use App\Filament\Resources\UKMResource\Pages\EditUKM;
use App\Models\UKM;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;

class UKMResource extends Resource
{
    protected static ?string $model = UKM::class;

    protected static ?string $navigationLabel = 'Unit Kegiatan Mahasiswa';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Informasi UKM')
                    ->description('Data umum Unit Kegiatan Mahasiswa')
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->label('Nama UKM')
                            ->required()
                            ->unique(ignorable: fn ($record) => $record)
                            ->maxLength(255),
                        Forms\Components\Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->nullable()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('email')
                            ->label('Email UKM')
                            ->email()
                            ->unique(ignorable: fn ($record) => $record)
                            ->nullable(),
                        Forms\Components\TextInput::make('nomor_telepon')
                            ->label('Nomor Telepon')
                            ->tel()
                            ->nullable(),
                        Forms\Components\TextInput::make('lokasi')
                            ->label('Lokasi/Basecamp')
                            ->nullable()
                            ->maxLength(255),
                    ])->columns(2),

                Section::make('Struktur Organisasi')
                    ->description('Data ketua dan sekretaris UKM')
                    ->schema([
                        Forms\Components\TextInput::make('ketua_nama')
                            ->label('Nama Ketua')
                            ->nullable()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('ketua_nim')
                            ->label('NIM Ketua')
                            ->nullable()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('sekretaris_nama')
                            ->label('Nama Sekretaris')
                            ->nullable()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('sekretaris_nim')
                            ->label('NIM Sekretaris')
                            ->nullable()
                            ->maxLength(255),
                    ])->columns(2),

                Section::make('Status')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->label('Status UKM')
                            ->options([
                                'Aktif' => 'Aktif',
                                'Nonaktif' => 'Nonaktif',
                            ])
                            ->default('Aktif')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->label('Nama UKM')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('ketua_nama')
                    ->label('Ketua')
                    ->searchable(),
                TextColumn::make('sekretaris_nama')
                    ->label('Sekretaris')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                TextColumn::make('nomor_telepon')
                    ->label('No. Telepon'),
                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'Aktif',
                        'danger' => 'Nonaktif',
                    ]),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'Aktif' => 'Aktif',
                        'Nonaktif' => 'Nonaktif',
                    ]),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => ListUKMS::route('/'),
            'create' => CreateUKM::route('/create'),
            'edit' => EditUKM::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        $user = auth()->user();
        if (!$user) return false;
        return $user->canManageMahasiswaDanUKM();
    }
}
