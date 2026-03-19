<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrations - NK EDUCATIF SPORTIF Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-orange: #FF7A59;
            --primary-green: #1D5944;
            --accent-yellow: #FFD93D;
            --dark-navy: #0F1419;
            --light-gray: #F5F7FA;
            --text-dark: #0f1419;
            --text-light: #6b7280;
            --border-light: #e5e7eb;
            --bg-light: #fafbfc;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            color: #333;
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-orange) 100%);
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .navbar h1 {
            font-size: 24px;
        }
        .navbar .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .navbar .logo img {
            height: 40px;
        }

        .back-link {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
            transition: all 0.3s;
        }

        .back-link:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .container {
            max-width: 1400px;
            margin: 30px auto;
            padding: 0 20px;
        }

        /* layout/sidebar for admin pages */
        .layout {
            display: flex;
            min-height: calc(100vh - 72px);
        }
        .sidebar {
            width: 250px;
            background: var(--bg-light);
            border-right: 1px solid var(--border-light);
            transition: width 0.3s;
            overflow: hidden;
        }
        .sidebar.collapsed {
            width: 60px;
        }
        .sidebar ul {
            list-style: none;
            padding: 20px 0;
        }
        .sidebar li {
            padding: 12px 24px;
        }
        .sidebar a {
            color: var(--text-dark);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 14px;
        }
        .sidebar a:hover {
            background: var(--bg-light);
        }
        .sidebar .toggle-btn {
            position: absolute;
            top: 10px;
            right: -15px;
            background: var(--primary-green);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        }

        /* Dark mode */
        .dark-mode {
            --text-dark: #f4f4f4;
            --text-light: #cbd5e1;
            --bg-light: #1f2937;
            --border-light: #374151;
            background: #111827;
            color: var(--text-dark);
        }
        .dark-mode .sidebar {
            background: #111827;
        }
        .dark-mode .navbar {
            background: #1f2937 !important;
        }
        .dark-mode .back-link,
        .dark-mode .logout-btn {
            color: var(--text-light);
        }


        .filters {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .filter-group {
            display: flex;
            flex-direction: column;
        }

        .filter-group label {
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .filter-group select {
            padding: 10px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 5px;
            font-size: 14px;
        }

        .filter-group select:focus {
            outline: none;
            border-color: #667eea;
        }

        .filter-actions {
            display: flex;
            gap: 10px;
            align-items: flex-end;
        }

        .filter-actions button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }

        .search-btn {
            background: #667eea;
            color: white;
        }

        .search-btn:hover {
            background: #5568d3;
        }

        .reset-btn {
            background: #e0e0e0;
            color: #333;
        }

        .reset-btn:hover {
            background: #d0d0d0;
        }

        .table-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        tr:hover {
            background: #f9f9f9;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-approved {
            background: #d4edda;
            color: #155724;
        }

        .status-rejected {
            background: #f8d7da;
            color: #721c24;
        }

        .pagination {
            text-align: center;
            margin-top: 30px;
            padding: 20px;
        }

        .pagination a,
        .pagination span {
            display: inline-block;
            padding: 10px 15px;
            margin: 0 3px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-decoration: none;
            color: #667eea;
        }

        .pagination .active {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }

        @media (max-width: 768px) {
            .filters {
                grid-template-columns: 1fr;
            }

            .filter-actions {
                grid-column: 1 / -1;
            }

            table {
                font-size: 12px;
            }

            td, th {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="NKES logo" />
            <h1>📋 Registrations</h1>
        </div>
        <div style="display: flex; align-items: center; gap: 16px;">
            <button id="darkToggle" title="Toggle dark mode" style="background: transparent; border:none; color:white; font-size:18px; cursor:pointer;">🌓</button>
            <a href="{{ route('admin.dashboard') }}" class="back-link">← Back to Dashboard</a>
        </div>
    </div>

    <div class="layout">
        <aside class="sidebar" id="sidebar">
            <div class="toggle-btn" id="sidebarToggle">≡</div>
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">🏠 Dashboard</a></li>
                <li><a href="{{ route('admin.registrations') }}">📋 Registrations</a></li>
            </ul>
        </aside>
        <div class="container" id="mainContent">
            <!-- Filters -->
        <div class="filters">
            <form style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; width: 100%;">
                <div class="filter-group">
                    <label for="sport">Sport</label>
                    <select name="sport" id="sport">
                        <option value="">All Sports</option>
                        @foreach($sports as $sport)
                            <option value="{{ $sport }}" {{ request('sport') == $sport ? 'selected' : '' }}>
                                {{ $sport }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="filter-group">
                    <label for="status">Status</label>
                    <select name="status" id="status">
                        <option value="">All Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender">
                        <option value="">All Genders</option>
                        <option value="Male" {{ request('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ request('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Other" {{ request('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <div class="filter-actions">
                    <button type="submit" class="search-btn">🔍 Search</button>
                    <a href="{{ route('admin.registrations') }}" class="reset-btn" style="padding: 10px 20px; text-decoration: none; border-radius: 5px; text-align: center;">Reset</a>
                </div>
            </form>
        </div>

        <!-- Registrations Table -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Sport</th>
                        <th>Age Group</th>
                        <th>Gender</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Registered Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($registrations as $reg)
                        <tr>
                            <td>#{{ $reg->id }}</td>
                            <td>{{ $reg->full_name ?? ($reg->user->name ?? 'N/A') }}</td>
                            <td>{{ $reg->email ?? ($reg->user->email ?? 'N/A') }}</td>
                            <td>{{ $reg->sport_name }}</td>
                            <td>{{ $reg->age_group }}</td>
                            <td>{{ $reg->gender }}</td>
                            <td>{{ $reg->position ?? 'N/A' }}</td>
                            <td>
                                <span class="status-badge status-{{ $reg->status }}">
                                    {{ ucfirst($reg->status) }}
                                </span>
                            </td>
                            <td>{{ $reg->created_at->format('M d, Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" style="text-align: center; padding: 40px; color: #999;">
                                No registrations found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($registrations->hasPages())
            <div class="pagination">
                {{ $registrations->links('pagination::bootstrap-4') }}
            </div>
        @endif
        </div> <!-- end mainContent container -->
    </div> <!-- end layout -->

    <script>
        // sidebar toggle
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
        });
        if (localStorage.getItem('sidebarCollapsed') === 'true') {
            sidebar.classList.add('collapsed');
        }

        // dark mode
        const darkToggle = document.getElementById('darkToggle');
        function applyDarkMode(enable) {
            document.body.classList.toggle('dark-mode', enable);
            localStorage.setItem('darkMode', enable);
        }
        darkToggle.addEventListener('click', () => {
            applyDarkMode(!document.body.classList.contains('dark-mode'));
        });
        if (localStorage.getItem('darkMode') === 'true') {
            applyDarkMode(true);
        }
    </script>
</body>
</html>
