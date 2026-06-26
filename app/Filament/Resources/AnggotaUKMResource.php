<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnggotaUKMResource\Pages\ListAnggotaUKMs;
use App\Filament\Resources\AnggotaUKMResource\Pages\CreateAnggotaUKM;
use App\Filament\Resources\AnggotaUKMResource\Pages\EditAnggotaUKM;
use App\Models\AnggotaUKM;
use App\Models\Mahasiswa;
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
use Illuminate\Database\Eloquent\Builder;

class AnggotaUKMResource extends Resource
{
    protected static ?string $model = AnggotaUKM::class;

    protected static ?string $navigationLabel = 'Anggota UKM';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Informasi Anggota UKM')
                    ->description('Data anggota Unit Kegiatan Mahasiswa')
                    ->schema([
                        Forms\Components\Select::make('mahasiswa_id')
                            ->label('Mahasiswa')
                            ->relationship('mahasiswa', 'nama')
                            ->searchable()
                            ->required()
                            ->options(function () {
                                return Mahasiswa::all()
                                    ->mapWithKeys(fn ($m) => [$m->id => "{$m->nama} ({$m->nim})"])
                                    ->toArray();
                            })
                            ->rules([
                                'required',
                                'exists:mahasiswas,id',
                                function ($attribute, $value, $fail) {
                                    $existingAnggota = AnggotaUKM::where('mahasiswa_id', $value)->first();
                                    if ($existingAnggota) {
                                        $fail("Mahasiswa ini sudah terdaftar di UKM: {$existingAnggota->ukm->nama}");
                                    }
                                },
                            ]),
                        Forms\Components\Select::make('u_k_m_id')
                            ->label('Unit Kegiatan Mahasiswa')
                            ->relationship('ukm', 'nama')
                            ->searchable()
                            ->required()
                            ->default(function () {
                                $user = auth()->user();
                                if ($user && ($user->isKetuaUKM() || $user->isSekretarisUKM())) {
                                    return $user->u_k_m_id;
                                }
                                return null;
                            })
                            ->disabled(function () {
                                $user = auth()->user();
                                return $user && ($user->isKetuaUKM() || $user->isSekretarisUKM());
                            }),
                    ])->columns(2),

                Section::make('Detail Keanggotaan')
                    ->schema([
                        Forms\Components\Select::make('posisi')
                            ->label('Posisi')
                            ->options([
                                'Ketua' => 'Ketua',
                                'Sekretaris' => 'Sekretaris',
                                'Bendahara' => 'Bendahara',
                                'Anggota' => 'Anggota',
                            ])
                            ->default('Anggota')
                            ->required(),
                        Forms\Components\DatePicker::make('tanggal_bergabung')
                            ->label('Tanggal Bergabung')
                            ->nullable(),
                        Forms\Components\Textarea::make('tugas')
                            ->label('Tugas')
                            ->nullable()
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Status')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->label('Status')
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
                TextColumn::make('mahasiswa.nama')
                    ->label('Nama Mahasiswa')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('mahasiswa.nim')
                    ->label('NIM')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('ukm.nama')
                    ->label('Unit Kegiatan Mahasiswa')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('posisi')
                    ->label('Posisi')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Ketua' => 'success',
                        'Sekretaris' => 'info',
                        'Bendahara' => 'warning',
                        'Anggota' => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('tanggal_bergabung')
                    ->label('Tanggal Bergabung')
                    ->date('d/m/Y')
                    ->sortable(),
                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'Aktif',
                        'danger' => 'Nonaktif',
                    ])
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('ukm')
                    ->label('Unit Kegiatan Mahasiswa')
                    ->relationship('ukm', 'nama'),
                SelectFilter::make('posisi')
                    ->label('Posisi')
                    ->options([
                        'Ketua' => 'Ketua',
                        'Sekretaris' => 'Sekretaris',
                        'Bendahara' => 'Bendahara',
                        'Anggota' => 'Anggota',
                    ]),
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

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        $user = auth()->user();

        if ($user && ($user->isKetuaUKM() || $user->isSekretarisUKM())) {
            $query->where('u_k_m_id', $user->u_k_m_id);
        }

        return $query;
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
            'index' => ListAnggotaUKMs::route('/'),
            'create' => CreateAnggotaUKM::route('/create'),
            'edit' => EditAnggotaUKM::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        $user = auth()->user();
        if (!$user) return false;
        return $user->canManagePendaftaran();
    }
}
