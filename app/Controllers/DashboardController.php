<?php

namespace App\Controllers;

use App\Models\ExerciseRecordModel;
use App\Models\PatientModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $exerciseRecords = new ExerciseRecordModel();
        $patientStats = $exerciseRecords->getPatientStats();
        $recentRecords = $exerciseRecords->getRecentRecords(10);
        $totalPatients = (new PatientModel())->countAllResults();
        $patientsWithRecords = array_filter($patientStats, static fn (array $patient): bool => (int) $patient['total_sessions'] > 0);
        $recordedPatientCount = count($patientsWithRecords);
        $avgCompliance = $recordedPatientCount
            ? round(array_sum(array_column($patientsWithRecords, 'compliance_rate')) / $recordedPatientCount, 1) : 0;
        $avgPain = $recordedPatientCount
            ? round(array_sum(array_column($patientsWithRecords, 'avg_pain')) / $recordedPatientCount, 1) : 0;
        $hasRecoveryData = $recordedPatientCount > 0;

        $recoveryLabels = array_column($patientStats, 'name');
        $recoveryValues = array_map(
            static fn (array $patient): float => (float) ($patient['recovery_score'] ?? 0),
            $patientStats
        );

        $conditionCounts = [];
        foreach ($patientStats as $patient) {
            $condition = $patient['condition'];
            $conditionCounts[$condition] = ($conditionCounts[$condition] ?? 0) + 1;
        }

        return view('dashboard/index', compact(
            'patientStats',
            'recentRecords',
            'totalPatients',
            'avgCompliance',
            'avgPain',
            'hasRecoveryData',
            'recoveryLabels',
            'recoveryValues',
            'conditionCounts'
        ));
    }
}
