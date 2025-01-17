<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PdfFileResource\Pages;
use App\Filament\Resources\PdfFileResource\RelationManagers;
use App\Models\PdfFile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PdfFileResource extends Resource
{
    protected static ?string $model = PdfFile::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Berkas';
    protected static ?string $navigationGroup = 'Dokumen';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label("Nama")
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('path')
                    ->label("Berkas"),
                Forms\Components\Select::make('pdf_category_id')
                    ->label("Kategori Berkas")
                    ->relationship('pdfCategory', 'name')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label("Nama")
                    ->searchable(),
                Tables\Columns\TextColumn::make('path')
                    ->label("Berkas")
                    ->searchable(),
                Tables\Columns\TextColumn::make('pdfCategory.name')
                    ->label("Kategori Berkas")
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPdfFiles::route('/'),
            'create' => Pages\CreatePdfFile::route('/create'),
            'edit' => Pages\EditPdfFile::route('/{record}/edit'),
        ];
    }
}
