<?php

namespace App\Filament\Resources\Produks\Tables;

use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class ProduksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode')->sortable(),
                TextColumn::make('nama')->sortable()->searchable(),
                TextColumn::make('tipe')->sortable()->searchable(),
                TextColumn::make('jenis')->sortable()->searchable(),
                TextColumn::make('harga')->money('idr', true),
                TextColumn::make('stok'),

                ImageColumn::make('image')
                    ->label('Gambar')
                    ->getStateUsing(function ($record) {
                        if ($record->image && file_exists(storage_path('app/public/' . $record->image))) {
                            return asset('storage/' . $record->image);
                        }
                        return null; // kalau tidak ada gambar
                    }),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}