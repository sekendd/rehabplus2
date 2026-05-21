<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RehabPlus</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body{
            background:#eef2f7;
            overflow-x:hidden;
            font-family:'Segoe UI',sans-serif;
        }

        .sidebar{
            width:280px;
            min-height:100vh;
            background:white;
            border-right:1px solid #e5e7eb;
            position:fixed;
            left:0;
            top:0;
        }

        .main-content{
            margin-left:280px;
            min-height:100vh;
        }

        .topbar{
            height:90px;
            background:white;
            border-bottom:1px solid #e5e7eb;
        }

        .menu-link{
            display:flex;
            align-items:center;
            gap:14px;
            padding:16px 20px;
            border-radius:18px;
            color:#334155;
            text-decoration:none;
            font-weight:600;
            margin-bottom:8px;
        }

        .menu-link.active{
            background:#dff7f2;
            color:#0f766e;
        }

        .menu-link:hover{
            background:#f1f5f9;
        }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar p-4">

    <h1 class="fw-bold mb-5">
        <span style="color:#14b8a6;">❤</span>
        RehabPlus
    </h1>

    <div class="text-uppercase text-muted small fw-bold mb-3">
        Main
    </div>

    <a href="<?= site_url('dashboard') ?>" class="menu-link">
        <i class="bi bi-speedometer2"></i>
        Dashboard
    </a>

    <a href="<?= site_url('patients') ?>" class="menu-link">
        <i class="bi bi-people-fill"></i>
        Patients
    </a>

    <a href="<?= site_url('appointments') ?>" class="menu-link">
        <i class="bi bi-calendar-check"></i>
        Appointments
    </a>

    <a href="<?= site_url('analytics') ?>" class="menu-link">
        <i class="bi bi-graph-up"></i>
        Recovery Analytics
    </a>

    <div class="text-uppercase text-muted small fw-bold mt-5 mb-3">
        Admin
    </div>

    <a href="<?= site_url('users') ?>" class="menu-link active">
        <i class="bi bi-person-gear"></i>
        Users
    </a>

</div>


<!-- MAIN CONTENT -->
<div class="main-content">

    <!-- TOPBAR -->
    <div class="topbar d-flex justify-content-end align-items-center px-5">

        <div class="d-flex align-items-center gap-4">

            <div class="fw-semibold text-muted">
                <?= date('F d, Y') ?>
            </div>

            <div class="d-flex align-items-center gap-3 border rounded-pill px-3 py-2">

                <div class="rounded-circle bg-info text-white d-flex align-items-center justify-content-center"
                     style="width:45px;height:45px;font-weight:700;">

                    S

                </div>

                <div>
                    <div class="fw-bold">
                        Super Admin
                    </div>

                    <small class="text-muted">
                        Superadmin
                    </small>
                </div>

            </div>

            <a href="<?= site_url('logout') ?>"
               class="btn btn-outline-secondary rounded-pill px-4">

                <i class="bi bi-box-arrow-right me-2"></i>
                Logout

            </a>

        </div>

    </div>


    <!-- PAGE CONTENT -->
    <div class="p-4">
        <?= $this->renderSection('content') ?>
    </div>

</div>

</body>
</html>