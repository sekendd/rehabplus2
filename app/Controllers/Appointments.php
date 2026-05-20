<?php

namespace App\Controllers;

use App\Models\AppointmentModel;

class Appointments extends BaseController
{
    protected $appointmentModel;

    public function __construct()
    {
        $this->appointmentModel = new AppointmentModel();
    }

    public function index()
    {
        $appointments = $this->appointmentModel
            ->orderBy('date', 'ASC')
            ->findAll();

        return view('appointments/index', [
            'appointments' => $appointments
        ]);
    }

    public function create()
    {
        return view('appointments/create');
    }

    public function store()
    {
        $this->appointmentModel->save([

            'patient' => $this->request->getPost('patient'),

            'therapist' => $this->request->getPost('therapist'),

            'patient_condition' => $this->request->getPost('patient_condition'),

            'contact' => $this->request->getPost('contact'),

            'date' => $this->request->getPost('date'),

            'time' => $this->request->getPost('time'),

            'session' => $this->request->getPost('session'),

            'notes' => $this->request->getPost('notes'),

            'status' => 'Upcoming'
        ]);

        return redirect()->to('/appointments')
            ->with('success', 'Appointment scheduled successfully.');
    }
}