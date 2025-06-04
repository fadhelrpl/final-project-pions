<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemberResource\Pages;
use App\Filament\Resources\MemberResource\RelationManagers;
use App\Models\Member;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn; // Pastikan ini diimport
use Filament\Tables\Columns\ImageColumn; // Pastikan ini diimport

class MemberResource extends Resource
{
    protected static ?string $model = Member::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'PIONS';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('photo')
                    ->image()
                    ->disk('public') // Pastikan ini sesuai dengan konfigurasi filesystem Anda
                    ->directory('images') // Folder tempat gambar akan disimpan
                    ->nullable(),
                // Anda mungkin ingin menambahkan input untuk posisi dan periode di sini
                // jika Anda ingin admin bisa mengelola posisi dari halaman Member.
                // Ini akan membutuhkan penyesuaian pada formulir PionsPositionResource juga.
                // Untuk saat ini, kita fokus pada tampilan tabel.
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                // Kolom untuk 'Role/Position' dari relasi pionsPositions
                TextColumn::make('pionsPositions.position') // Akses relasi hasMany
                    ->label('Role/Position')
                    ->listWithLineBreaks() // Tampilkan semua posisi jika ada beberapa
                    ->badge() // Opsional: tampilkan sebagai badge
                    ->sortable(),
                // Kolom untuk 'Period' dari relasi pionsPositions
                TextColumn::make('pionsPositions.period') // Akses relasi hasMany
                    ->label('Period')
                    ->listWithLineBreaks() // Tampilkan semua periode jika ada beberapa
                    ->sortable(),
                ImageColumn::make('photo')
                    ->label('Picture')
                    ->circular(), // Opsional: tampilan gambar melingkar
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            RelationManagers\PionsPositionsRelationManager::class,
        ];
    }
    // ...

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }
}