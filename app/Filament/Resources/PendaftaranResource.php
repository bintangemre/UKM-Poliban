<?php

namespace App\Filament\Resources;

use App\Models\AnggotaUKM;
use App\Models\Mahasiswa;
use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;

class PendaftaranResource extends Resource
{
    protected static ?string $model = AnggotaUKM::class;

    protected static ?string $navigationLabel = 'Pendaftaran Anggota';

    protected static ?int $navigationSort = 4;

    protected static ?string $slug = 'pendaftaran';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Pendaftaran Anggota Baru')
                    ->description('Daftarkan mahasiswa sebagai anggota UKM')
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

                Section::make('Detail Pendaftaran')
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
                            ->default(now())
                            ->nullable(),
                        Forms\Components\Textarea::make('tugas')
                            ->label('Tugas')
                            ->nullable()
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'Aktif' => 'Aktif',
                        'Nonaktif' => 'Nonaktif',
                    ])
                    ->default('Aktif')
                    ->required()
                    ->hidden(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\PendaftaranResource\Pages\CreatePendaftaran::route('/'),
        ];
    }

    public static function canAccess(): bool
    {
        $user = auth()->user();
        if (!$user) return false;
        return $user->canManagePendaftaran();
    }
}
