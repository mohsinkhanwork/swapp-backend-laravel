<?php

namespace App\Imports;

use App\Models\Question;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportSkillQuestion implements ToCollection
{
    public function collection(Collection $rows)
    {
        return $rows;
    }
}
