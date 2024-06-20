<?php

namespace App\Imports;

use App\Models\Property;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PropertyImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Model|Property|null
     */
    public function model(array $row): Model|Property|null
    {
        return new Property([
            'name'  => $row['name'],
            'price' => $row['price'],
            'bedrooms' => $row['bedrooms'],
            'bathrooms' => $row['bathrooms'],
            'storeys' => $row['storeys'],
            'garages' => $row['garages'],
        ]);
    }
}
