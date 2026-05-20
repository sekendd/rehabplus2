<?= view('layouts/header', ['pageTitle' => 'Schedule Appointment']) ?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h1 class="page-title mb-1">
            Schedule Appointment
        </h1>

        <p class="page-subtitle mb-0">
            Create physical therapy session appointment
        </p>
    </div>

    <a href="<?= site_url('appointments') ?>"
       class="btn btn-outline-secondary">

        <i class="bi bi-arrow-left me-2"></i>

        Back

    </a>

</div>


<div class="card border-0 shadow-sm">

    <div class="card-body p-4">

        <form action="<?= site_url('appointments/store') ?>" method="post">

            <?= csrf_field() ?>

            <div class="row g-4">

                <div class="col-md-6">

                    <label class="form-label fw-semibold">
                        Patient Name
                    </label>

                    <input type="text"
                           name="patient"
                           class="form-control"
                           required>

                </div>

                <div class="col-md-6">

                    <label class="form-label fw-semibold">
                        Therapist
                    </label>

                    <select name="therapist"
                            class="form-select"
                            required>

                        <option value="">
                            Select therapist
                        </option>

                        <option>
                            Dr. Santos
                        </option>

                        <option>
                            Dr. Reyes
                        </option>

                        <option>
                            Dr. Cruz
                        </option>

                    </select>

                </div>

                <div class="col-md-6">

                    <label class="form-label fw-semibold">
                        Condition / Injury
                    </label>

                    <input type="text"
                           name="patient_condition"
                           class="form-control"
                           placeholder="ACL Injury"
                           required>

                </div>

                <div class="col-md-6">

                    <label class="form-label fw-semibold">
                        Contact Number
                    </label>

                    <input type="text"
                           name="contact"
                           class="form-control"
                           placeholder="+63 912 345 6789"
                           required>

                </div>

                <div class="col-md-6">

                    <label class="form-label fw-semibold">
                        Appointment Date
                    </label>

                    <input type="date"
                           name="date"
                           class="form-control"
                           required>

                </div>

                <div class="col-md-6">

                    <label class="form-label fw-semibold">
                        Appointment Time
                    </label>

                    <input type="time"
                           name="time"
                           class="form-control"
                           required>

                </div>

                <div class="col-md-6">

                    <label class="form-label fw-semibold">
                        Session Type
                    </label>

                    <select name="session"
                            class="form-select"
                            required>

                        <option>
                            Initial Assessment
                        </option>

                        <option>
                            Follow-up Therapy
                        </option>

                        <option>
                            Rehabilitation Session
                        </option>

                    </select>

                </div>

                <div class="col-12">

                    <label class="form-label fw-semibold">
                        Notes / Instructions
                    </label>

                    <textarea name="notes"
                              rows="4"
                              class="form-control"
                              placeholder="Add therapy instructions or reminders..."></textarea>

                </div>

                <div class="col-12">

                    <button type="submit"
                            class="btn btn-primary px-5 py-2">

                        <i class="bi bi-calendar-check me-2"></i>

                        Confirm Appointment

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

<?= view('layouts/footer') ?>