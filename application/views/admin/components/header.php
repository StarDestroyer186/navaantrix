<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blog Management</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css" rel="stylesheet">
    <style>
        #editor-container, #desc-container, #title-container {
            height: 150px;
        }
    </style>
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
            <a class="navbar-brand ms-3" href="<?= base_url('/') ?>">My Website</a>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <a href="<?= base_url('admin/blog') ?>">Blogs</a>
        <a href="<?= base_url('admin/contacts') ?>">Contacts</a>
        <a href="<?= base_url('admin/settings') ?>">Settings</a>
    </div>

    <!-- Main Content -->	
    <div class="content p-4" id="mainContent" style="margin-top: 56px;">
	

