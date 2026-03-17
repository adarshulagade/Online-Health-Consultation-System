<!DOCTYPE html>
<html>
<head>
    <title>Online Health Consultation System</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div class="navbar">
        <h2>Online Health Consultation</h2>
        <div>
            <a href="patient/login.php">Patient</a>
            <a href="doctor/login.php">Doctor</a>
            <a href="admin/login.php">Admin</a>
        </div>
    </div>

    <div class="container">
        <div class="hero">
            <h1>Online Health Consultation System</h1>
            <p>Consult doctors, book appointments, manage prescriptions, and access healthcare services online.</p>
        </div>

        <div class="card-grid">
            <div class="card">
                <h3>Patient Portal</h3>
                <p>Register, login, book appointments, and view prescriptions.</p>
                <a class="btn" href="patient/register.php">Register</a>
                <a class="btn btn-secondary" href="patient/login.php">Login</a>
            </div>

            <div class="card">
                <h3>Doctor Portal</h3>
                <p>Login, check patient appointments, update status, and add prescriptions.</p>
                <a class="btn" href="doctor/login.php">Doctor Login</a>
            </div>

            <div class="card">
                <h3>Admin Portal</h3>
                <p>Manage system data including patients, doctors, and appointments.</p>
                <a class="btn btn-warning" href="admin/login.php">Admin Login</a>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>© 2026 Online Health Consultation System | Final Year Project</p>
    </div>
</body>
</html>