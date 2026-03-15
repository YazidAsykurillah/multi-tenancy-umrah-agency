<?php

namespace App\Filament\Resources\Documents\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DocumentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('pilgrim_id')
                    ->relationship('pilgrim', 'name')
                    ->required()
                    ->searchable(),
                Select::make('document_type')
                    ->options([
                        'passport' => 'Passport',
                        'visa' => 'Visa',
                        'ticket' => 'Ticket',
                        'vaccine' => 'Vaccine',
                        'insurance' => 'Insurance',
                    ])
                    ->required(),
                Select::make('status')
                    ->options([
                        'not_submitted' => 'Not Submitted',
                        'processing' => 'Processing',
                        'completed' => 'Completed',
                    ])
                    ->required()
                    ->default('not_submitted'),
                FileUpload::make('file_path')
                    ->label('Document File')
                    ->disk('public')
                    ->directory('pilgrim-documents')
                    ->visibility('public')
                    ->openable()
                    ->downloadable(),
            ]);
    }
}
