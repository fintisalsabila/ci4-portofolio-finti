<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: #f4f6f9;
        }
        .sidebar {
            background: #2c3e50;
            min-height: 100vh;
            color: white;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
            transition: 0.3s;
        }
        .sidebar a:hover, .sidebar a.active {
            background: #34495e;
        }
        .main-content {
            padding: 20px;
        }
        .stats-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .stats-number {
            font-size: 2rem;
            font-weight: bold;
            color: #3498db;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar p-0">
            <h4 class="text-center py-3">Admin Panel</h4>
            <nav>
                <a href="/admin" class="active"><i class="fas fa-dashboard"></i> Dashboard</a>
                <a href="/admin/portfolios"><i class="fas fa-folder"></i> Portfolios</a>
                <a href="/admin/tech-stacks"><i class="fas fa-code"></i> Tech Stacks</a>
                <a href="/admin/clients"><i class="fas fa-users"></i> Clients</a>
                <a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </nav>
        </div>
        <div class="col-md-10 main-content">
            <h2>Dashboard</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="stats-card">
                        <i class="fas fa-folder fa-2x"></i>
                        <div class="stats-number"><?= $total_portfolios ?></div>
                        <p>Total Portfolios</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-card">
                        <i class="fas fa-users fa-2x"></i>
                        <div class="stats-number"><?= $total_clients ?></div>
                        <p>New Clients</p>
                    </div>
                </div>
            </div>
            
            <h4 class="mt-4">Recent Portfolios</h4>
            <table class="table table-bordered">
                <thead>
                    <tr><th>Title</th><th>Category</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    <?php foreach($portfolios as $p): ?>
                    <tr>
                        <td><?= $p['title'] ?></td>
                        <td><?= $p['category'] ?></td>
                        <td><button class="btn btn-sm btn-danger">Delete</button></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>