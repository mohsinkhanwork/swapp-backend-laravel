<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'billed_at'=>$this->billed_at->toFormattedDateString(),
            'total'=>$this->total(),
            'tax'=>$this->tax(),
            'download_invoice_url'=>route('download-invoice',$this->id),
        ];
    }
}
