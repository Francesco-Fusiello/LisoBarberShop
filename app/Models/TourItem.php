<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'city',
        'country',
        'year',
        'sort_order',
    ];

    /**
     * Ottiene il nome del paese in italiano senza dipendere dall'estensione intl di PHP.
     */
    public function getCountryNameAttribute(): string
    {
        if (strlen($this->country) === 2) {
            $code = strtoupper($this->country);

            $paths = [
                base_path('vendor/umpirsky/country-list/data/it/country.php'),
                base_path('vendor/umpirsky/country-list/data/it_IT/country.php'),
            ];

            foreach ($paths as $path) {
                if (file_exists($path)) {
                    $list = include $path;
                    return $list[$code] ?? $this->country;
                }
            }
        }

        // Ritorna il valore grezzo se non è un codice a due lettere o se i file non esistono
        return $this->country;
    }
}
