<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportCSV extends Model
{
    use HasFactory;

    protected $table = 'import_csv';

    protected $fillable = [
        'tracked_date',
        'client_name',
        'comp_name',
        'work_done',
        'camp_id',
        'camp_name',
        'poc_links',
        'work_type',
        'work_status',
        'total_ip',
    ];
}
