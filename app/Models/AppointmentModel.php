<?php

namespace App\Models;

use CodeIgniter\Model;

class AppointmentModel extends Model
{
    protected $table = 'appointments';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'patient',
        'therapist',
        'patient_condition',
        'contact',
        'date',
        'time',
        'session',
        'notes',
        'status'
    ];

    protected $useTimestamps = false;
}