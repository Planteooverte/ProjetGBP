<?php

namespace App\Imports;

use App\Models\OperationBancaire;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OperationBancairesImport implements ToModel, WithHeadingRow
{




    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new OperationBancaire([

            'DateOperation' => $row['Date'],
            'DescriptionOperation' => $row['Opération'],
            'Credit' => $row['Débit (¤)'],
            'Debit' => $row['Crédit (¤)'],
            'compte_bancaire_id' => $CompteBancaire['id'],
            'fichier_csv_id' => $FichierCsv['id'],
        ]);
    }
}
