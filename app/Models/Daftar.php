<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Nicolaslopezj\Searchable\SearchableTrait;

class Daftar extends Model
{
    use SearchableTrait;
    use HasFactory;
    protected $guarded = [];


    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'pasiens.nama' => 1,
            'pasiens.no_pasiens' => 10,
            'polis.nama' => 2,
        ],
        'joins' => [
            'pasiens' => ['pasiens.id','daftars.pasien_id'],
            'polis' => ['polis.id','daftars.poli_id'],
        ],
    ];

    public function pasien(): BelongsTo
    {
        return $this->belongsTo(pasien::class)->withDefault();
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class)->withDefault();  // Assuming 'poli' is the foreign key
    }

}
