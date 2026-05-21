<?= view('layouts/header', ['pageTitle' => 'Appointments']) ?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h1 class="page-title mb-1">
            Appointments
        </h1>

        <p class="page-subtitle mb-0">
            Physical Therapy Scheduling & Session Management
        </p>
    </div>

    <a href="<?= site_url('appointments/create') ?>"
       class="btn btn-primary px-4 py-2">

        <i class="bi bi-plus-lg me-2"></i>

        Schedule Appointment

    </a>

</div>


<!-- STATS -->

<div class="row g-4 mb-4">

    <div class="col-md-4">

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <div class="text-muted small">
                            Today's Appointments
                        </div>

                        <h2 class="fw-bold mb-0">
                            12
                        </h2>
                    </div>

                    <div class="bg-info-subtle rounded-circle p-3">
                        <i class="bi bi-calendar-check text-info fs-4"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <div class="text-muted small">
                            Active Patients
                        </div>

                        <h2 class="fw-bold mb-0">
                            6
                        </h2>
                    </div>

                    <div class="bg-success-subtle rounded-circle p-3">
                        <i class="bi bi-people-fill text-success fs-4"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <div class="text-muted small">
                            Completed Today
                        </div>

                        <h2 class="fw-bold mb-0">
                            8
                        </h2>
                    </div>

                    <div class="bg-primary-subtle rounded-circle p-3">
                        <i class="bi bi-check-circle-fill text-primary fs-4"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- APPOINTMENTS TABLE -->

<div class="card border-0 shadow-sm">

    <div class="card-header bg-white d-flex justify-content-between align-items-center">

        <h5 class="mb-0 fw-bold">
            Appointment Schedule
        </h5>

        <div style="width:280px;">

            <div class="input-group">

                <span class="input-group-text bg-white border-end-0">
                    <i class="bi bi-search"></i>
                </span>

                <input type="text"
                       class="form-control border-start-0"
                       placeholder="Search appointment...">

            </div>

        </div>

    </div>

    <div class="table-responsive">

        <table class="table align-middle mb-0">

            <thead class="table-light">

                <tr>
                    <th>PATIENT</th>
                    <th>THERAPIST</th>
                    <th>CONDITION</th>
                    <th>DATE</th>
                    <th>TIME</th>
                    <th>SESSION</th>
                    <th>STATUS</th>
                </tr>

            </thead>

            <tbody>

                <?php foreach($appointments as $appointment): ?>

                <tr>

                    <td>

                        <div class="fw-semibold">
                            <?= esc($appointment['patient']) ?>
                        </div>

                        <small class="text-muted">
                            <?= esc($appointment['contact']) ?>
                        </small>

                    </td>

                    <td>
                        <?= esc($appointment['therapist']) ?>
                    </td>

                    <td>
                        <?= esc($appointment['patient_condition']) ?>
                    </td>

                    <td>
                        <?= date('M d, Y', strtotime($appointment['date'])) ?>
                    </td>

                    <td>
                        <?= date('g:i A', strtotime($appointment['time'])) ?>
                    </td>

                    <td>
                        <?= esc($appointment['session']) ?>
                    </td>

                    <td>

                        <?php if($appointment['status'] == 'Upcoming'): ?>

                            <span class="badge bg-info">
                                Upcoming
                            </span>

                        <?php elseif($appointment['status'] == 'Completed'): ?>

                            <span class="badge bg-success">
                                Completed
                            </span>

                        <?php else: ?>

                            <span class="badge bg-danger">
                                Cancelled
                            </span>

                        <?php endif; ?>

                    </td>

                </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

<?= view('layouts/footer') ?>