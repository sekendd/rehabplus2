<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title><?= $pageTitle ?? 'RehabPlus Dashboard' ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>

        :root{

            --primary:#14b8a6;
            --primary-dark:#0f766e;
            --primary-light:#ccfbf1;

            --bg:#f4f7fb;
            --sidebar:#ffffff;
            --card:#ffffff;

            --text:#0f172a;
            --muted:#64748b;

            --border:#e2e8f0;

            --shadow:
                0 12px 35px rgba(15,23,42,.06);

            --sidebar-w:260px;
        }

        *{
            font-family:'Inter',sans-serif;
        }

        body{

            margin:0;

            background:var(--bg);

            color:var(--text);

            min-height:100vh;
        }

        /* NAVBAR */

        .navbar{

            height:74px;

            background:white;

            border-bottom:1px solid var(--border);

            padding:0 28px;

            position:sticky;
            top:0;
            z-index:999;

            box-shadow:
                0 4px 18px rgba(15,23,42,.04);
        }

        .navbar-brand{

            font-size:1.8rem;

            font-weight:800;

            color:var(--text) !important;
        }

        .navbar-brand i{

            color:var(--primary);
        }

        .top-date{

            color:var(--muted);

            font-weight:600;
        }

        /* USER CHIP */

        .user-chip{

            background:#f8fafc;

            border:1px solid var(--border);

            border-radius:50px;

            padding:.45rem .9rem .45rem .45rem;

            display:flex;
            align-items:center;
            gap:.7rem;
        }

        .user-avatar{

            width:40px;
            height:40px;

            border-radius:50%;

            background:
                linear-gradient(
                    135deg,
                    #14b8a6,
                    #2dd4bf
                );

            display:flex;
            align-items:center;
            justify-content:center;

            color:white;

            font-weight:700;
        }

        /* SIDEBAR */

        .sidebar{

            width:var(--sidebar-w);

            min-height:calc(100vh - 74px);

            background:white;

            border-right:1px solid var(--border);

            padding:1.5rem 1rem;

            position:sticky;
            top:74px;
        }

        .nav-section{

            color:#94a3b8;

            font-size:.78rem;

            font-weight:700;

            letter-spacing:.12em;

            text-transform:uppercase;

            padding:.6rem .9rem;
        }

        .sidebar .nav-link{

            color:#334155;

            border-radius:18px;

            padding:.95rem 1rem;

            display:flex;
            align-items:center;
            gap:.9rem;

            margin-bottom:.35rem;

            transition:.2s ease;

            font-weight:600;
        }

        .sidebar .nav-link i{

            font-size:1.05rem;
        }

        .sidebar .nav-link:hover{

            background:#f0fdfa;

            color:var(--primary-dark);

            transform:translateX(2px);
        }

        .sidebar .nav-link.active{

            background:
                linear-gradient(
                    135deg,
                    #14b8a6,
                    #2dd4bf
                );

            color:white;

            box-shadow:
                0 10px 24px rgba(20,184,166,.20);
        }

        /* MAIN */

        .main-content{

            flex:1;

            padding:2rem;
        }

        /* PAGE TITLE */

        .page-title{

            font-size:2rem;

            font-weight:800;

            margin-bottom:.25rem;
        }

        .page-subtitle{

            color:var(--muted);

            font-size:1rem;
        }

        /* BUTTON */

        .btn-primary{

            background:
                linear-gradient(
                    135deg,
                    #14b8a6,
                    #2dd4bf
                );

            border:none;

            border-radius:16px;

            padding:.9rem 1.3rem;

            font-weight:700;

            box-shadow:
                0 12px 24px rgba(20,184,166,.18);
        }

        .btn-primary:hover{

            opacity:.92;
        }

        /* CARDS */

        .card{

            background:var(--card);

            border:1px solid var(--border);

            border-radius:28px;

            box-shadow:var(--shadow);

            overflow:hidden;
        }

        .card-header{

            background:white !important;

            border-bottom:1px solid var(--border);

            padding:1.2rem 1.5rem;

            font-size:1.1rem;

            font-weight:700;

            color:var(--text);
        }

        /* STATS */

        .stat-card{

            padding:1.8rem;

            position:relative;

            min-height:160px;
        }

        .stat-label{

            color:var(--muted);

            font-size:1rem;

            font-weight:600;
        }

        .stat-value{

            font-size:3.2rem;

            font-weight:800;

            margin-top:.5rem;
        }

        .stat-icon{

            position:absolute;

            right:24px;
            top:50%;

            transform:translateY(-50%);

            font-size:3rem;

            opacity:.9;
        }

        /* TABLE */

        .table{

            color:#334155;

            margin-bottom:0;
        }

        .table thead th{

            color:#64748b;

            font-size:.82rem;

            text-transform:uppercase;

            border-color:var(--border);

            letter-spacing:.06em;
        }

        .table td{

            border-color:var(--border);

            vertical-align:middle;
        }

        .table tbody tr:hover{

            background:#f8fafc;
        }

        /* SEARCH */

        .search-box{

            background:white;

            border:1px solid var(--border);

            border-radius:16px;

            overflow:hidden;
        }

        .search-box .form-control{

            border:none;

            box-shadow:none;
        }

        /* CHART CANVAS */

        canvas{

            max-height:360px !important;
        }

        /* MOBILE */

        @media(max-width:768px){

            .sidebar{
                display:none !important;
            }

            .main-content{
                padding:1rem;
            }

            .navbar{
                padding:0 14px;
            }

            .page-title{
                font-size:1.5rem;
            }

        }

    </style>

</head>

<body>

<!-- NAVBAR -->

<nav class="navbar d-flex justify-content-between align-items-center">

    <a class="navbar-brand d-flex align-items-center gap-2"
       href="<?= site_url('dashboard') ?>">

        <i class="bi bi-heart-pulse-fill"></i>

        RehabPlus

    </a>

    <div class="d-flex align-items-center gap-3">

        <span class="top-date d-none d-md-inline">

            <?= date('F j, Y') ?>

        </span>

        <div class="user-chip">

            <div class="user-avatar">

                <?= strtoupper(substr(session()->get('user_name') ?? 'U',0,1)) ?>

            </div>

            <div>

                <div class="fw-bold">

                    <?= esc(session()->get('user_name') ?? '') ?>

                </div>

                <small class="text-muted">

                    <?= ucfirst(session()->get('user_role') ?? '') ?>

                </small>

            </div>

        </div>

        <a href="<?= site_url('logout') ?>"
           class="btn btn-outline-secondary rounded-pill px-3">

            <i class="bi bi-box-arrow-right me-1"></i>

            Logout

        </a>

    </div>

</nav>

<div class="d-flex">

    <!-- SIDEBAR -->

    <nav class="sidebar d-none d-md-flex flex-column">

        <div class="nav-section">

            Main

        </div>

        <ul class="nav flex-column">

            <li class="nav-item">

                <a class="nav-link <?= uri_string() === '' || uri_string() === 'dashboard' ? 'active' : '' ?>"
                   href="<?= site_url('dashboard') ?>">

                    <i class="bi bi-speedometer2"></i>

                    Dashboard

                </a>

            </li>

            <li class="nav-item">

                <a class="nav-link <?= str_starts_with(uri_string(),'patients') ? 'active' : '' ?>"
                   href="<?= site_url('patients') ?>">

                    <i class="bi bi-people-fill"></i>

                    Patients

                </a>

            </li>

            <li class="nav-item">

                <a class="nav-link"
                   href="<?= site_url('appointments') ?>">

                    <i class="bi bi-calendar-check"></i>

                    Appointments

                </a>

            </li>

            <li class="nav-item">

                <a class="nav-link"
                   href="<?= site_url('analytics') ?>">

                    <i class="bi bi-graph-up-arrow"></i>

                    Recovery Analytics

                </a>

            </li>

        </ul>

        <?php if(session()->get('user_role') === 'superadmin'): ?>

        <div class="nav-section mt-4">

            Admin

        </div>

        <ul class="nav flex-column">

            <li class="nav-item">

                <a class="nav-link <?= str_starts_with(uri_string(),'users') ? 'active' : '' ?>"
                   href="<?= site_url('users') ?>">

                    <i class="bi bi-person-gear"></i>

                    Users

                </a>

            </li>

        </ul>

        <?php endif ?>

    </nav>

    <!-- MAIN -->

    <main class="main-content">