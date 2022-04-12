<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabApplication extends Model
{
    use HasFactory;
    protected $fillable = [
        'idea_details',
        'email',
        'iitism_id',
        'external_id',
        'remarks',
        'application_status',
        'application_verdict',
        'deletedapplication_category',
        'nvtil_unit',
        'title_of_project',
        'objective_of_project',
        'name_of_mentor',
        'number_of_members',
        'source_of_funding',
        'supporting_document_path',
        'supporting_document_mime_type'
    ];

}
