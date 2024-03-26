<?php

namespace App\Filament\Resources\CvResource\Pages;

use App\Models\cv;
use Filament\Actions;
use App\Filament\Resources\CvResource;
use Illuminate\Support\Facades\Storage;
use Filament\Resources\Pages\EditRecord;

class EditCv extends EditRecord
{
    protected static string $resource = CvResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->after(
                function(cv $record) {
                    if($record->thumbnail){
                        Storage::disk('public')->delete($record->thumbnail);
                    }
                }
            ),
        ];
    }
}
