<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 5 Sidebar Layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Sidebar styling */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: -250px;
            background-color: #343a40;
            padding-top: 56px;
            transition: all 0.3s;
        }
        .sidebar.show {
            left: 0;
        }
        .sidebar a {
            padding: 15px;
            text-decoration: none;
            font-size: 18px;
            color: #fff;
            display: block;
            transition: 0.3s;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 0;
            transition: margin-left 0.3s;
        }
        .content.shift {
            margin-left: 250px;
        }
    </style>
</head>
<body>

    <!-- Top Navbar -->
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <button class="btn btn-outline-light" id="sidebarToggle">☰</button>
            <a class="navbar-brand ms-3" href="#">My Website</a>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <a href="#">🏠 Home</a>
        <a href="#">📄 About</a>
        <a href="#">📞 Contact</a>
    </div>

    <!-- Main Content -->
    <div class="content p-4" id="mainContent" style="margin-top: 56px;">
        <h1>Responsive Sidebar with Navbar</h1>
        <p>This is a simple page with a responsive sidebar and a top navbar.</p>
    </div>

    <!-- Sidebar Toggle Script -->
    <script>
        document.getElementById("sidebarToggle").addEventListener("click", function () {
            document.getElementById("sidebar").classList.toggle("show");
            document.getElementById("mainContent").classList.toggle("shift");
        });
    </script>

</body>
</html>
