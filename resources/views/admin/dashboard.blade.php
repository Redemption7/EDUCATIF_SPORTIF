<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.admin_dashboard_title') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --green: #1D5944;
            --green-light: #2a7a5e;
            --orange: #FF7A59;
            --orange-light: #ff9a7f;
            --yellow: #FFD93D;
            --navy: #0F1419;
            --bg: #f0f2f5;
            --surface: #ffffff;
            --surface-hover: #f8f9fb;
            --text: #1a1d21;
            --text-secondary: #6b7280;
            --text-muted: #9ca3af;
            --border: #e5e7eb;
            --border-light: #f3f4f6;
            --shadow-sm: 0 1px 2px rgba(0,0,0,0.05);
            --shadow: 0 1px 3px rgba(0,0,0,0.08), 0 1px 2px rgba(0,0,0,0.06);
            --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.08), 0 2px 4px -2px rgba(0,0,0,0.05);
            --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.08), 0 4px 6px -4px rgba(0,0,0,0.05);
            --radius: 12px;
            --radius-lg: 16px;
        }

        body {
            font-family: 'Inter', -apple-system, sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            transition: background 0.3s, color 0.3s;
        }

        /* Dark Mode */
        body.dark {
            --bg: #0f1117;
            --surface: #1a1d27;
            --surface-hover: #22252f;
            --text: #e8eaed;
            --text-secondary: #9aa0a8;
            --text-muted: #6b7280;
            --border: #2d3039;
            --border-light: #22252f;
            --shadow-sm: 0 1px 2px rgba(0,0,0,0.2);
            --shadow: 0 1px 3px rgba(0,0,0,0.3);
            --shadow-md: 0 4px 6px rgba(0,0,0,0.3);
            --shadow-lg: 0 10px 15px rgba(0,0,0,0.3);
        }

        /* Top Bar */
        .topbar {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            padding: 0 32px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(12px);
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .topbar-left img {
            height: 36px;
            border-radius: 8px;
        }

        .topbar-brand {
            font-weight: 700;
            font-size: 16px;
            background: linear-gradient(135deg, var(--green), var(--orange));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .topbar-btn {
            background: var(--bg);
            border: 1px solid var(--border);
            color: var(--text-secondary);
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 16px;
        }

        .topbar-btn:hover {
            background: var(--surface-hover);
            color: var(--text);
            border-color: var(--green);
        }

        /* Admin language dropdown */
        .lang-dropdown-admin { position: relative; display: inline-block; }
        .lang-dropdown-admin .lang-dropdown-toggle { min-width: auto; padding: 0 10px; gap: 4px; font-size: 12px; }
        .lang-dropdown-admin .lang-current { max-width: 70px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
        .lang-dropdown-admin .lang-arrow { font-size: 0.6rem; }
        .lang-dropdown-admin .lang-dropdown-menu {
            display: none; position: absolute; top: 100%; right: 0; margin-top: 4px; min-width: 140px;
            background: var(--surface); border: 1px solid var(--border); border-radius: 8px;
            box-shadow: var(--shadow-lg); list-style: none; padding: 6px 0; z-index: 1100;
        }
        .lang-dropdown-admin .lang-dropdown:hover .lang-dropdown-menu { display: block; }
        .lang-dropdown-admin .lang-dropdown-menu a {
            display: block; padding: 8px 14px; color: var(--text); text-decoration: none; font-size: 13px;
        }
        .lang-dropdown-admin .lang-dropdown-menu a:hover,
        .lang-dropdown-admin .lang-dropdown-menu a.active { background: var(--bg); color: var(--green); }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 6px 14px 6px 6px;
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 10px;
            margin-left: 4px;
        }

        .topbar-avatar {
            width: 30px;
            height: 30px;
            border-radius: 8px;
            background: linear-gradient(135deg, var(--green), var(--orange));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 12px;
        }

        .topbar-user-name {
            font-size: 13px;
            font-weight: 600;
            color: var(--text);
        }

        .logout-btn {
            background: none;
            border: none;
            color: var(--orange);
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            padding: 6px 12px;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .logout-btn:hover {
            background: rgba(255,122,89,0.1);
        }

        /* Main Container */
        .main {
            max-width: 1400px;
            margin: 0 auto;
            padding: 24px 32px 48px;
        }

        /* Greeting Banner */
        .greeting {
            background: linear-gradient(135deg, var(--green) 0%, #2a7a5e 50%, var(--orange) 100%);
            border-radius: var(--radius-lg);
            padding: 32px 36px;
            color: white;
            margin-bottom: 24px;
            position: relative;
            overflow: hidden;
        }

        .greeting::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 300px;
            height: 300px;
            background: rgba(255,255,255,0.06);
            border-radius: 50%;
        }

        .greeting::after {
            content: '';
            position: absolute;
            bottom: -30%;
            right: 15%;
            width: 200px;
            height: 200px;
            background: rgba(255,255,255,0.04);
            border-radius: 50%;
        }

        .greeting-time {
            font-size: 13px;
            font-weight: 500;
            opacity: 0.8;
            margin-bottom: 6px;
            letter-spacing: 0.3px;
        }

        .greeting h2 {
            font-size: 26px;
            font-weight: 800;
            margin-bottom: 6px;
            letter-spacing: -0.5px;
        }

        .greeting p {
            font-size: 14px;
            opacity: 0.85;
            max-width: 500px;
            line-height: 1.5;
        }

        .greeting-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            position: relative;
            z-index: 1;
        }

        .greeting-btn {
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: none;
        }

        .greeting-btn-primary {
            background: white;
            color: var(--green);
        }

        .greeting-btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .greeting-btn-secondary {
            background: rgba(255,255,255,0.15);
            color: white;
            border: 1px solid rgba(255,255,255,0.25);
        }

        .greeting-btn-secondary:hover {
            background: rgba(255,255,255,0.25);
        }

        /* Stats Row */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 20px;
            transition: all 0.25s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .stat-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .stat-icon-wrap {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .stat-icon-wrap.total { background: linear-gradient(135deg, #e0f2fe, #bae6fd); }
        .stat-icon-wrap.pending { background: linear-gradient(135deg, #fef3c7, #fde68a); }
        .stat-icon-wrap.approved { background: linear-gradient(135deg, #d1fae5, #a7f3d0); }
        .stat-icon-wrap.rejected { background: linear-gradient(135deg, #fee2e2, #fca5a5); }
        .stat-icon-wrap.today { background: linear-gradient(135deg, #ede9fe, #c4b5fd); }

        .stat-trend {
            font-size: 11px;
            font-weight: 600;
            padding: 2px 8px;
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            gap: 2px;
        }

        .trend-up { background: #d1fae5; color: #047857; }
        .trend-neutral { background: #f3f4f6; color: #6b7280; }

        .stat-label {
            font-size: 12px;
            font-weight: 500;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 800;
            color: var(--text);
            letter-spacing: -1px;
        }

        .stat-sub {
            font-size: 12px;
            color: var(--text-muted);
            margin-top: 2px;
        }

        /* Bento Grid */
        .bento {
            display: grid;
            grid-template-columns: 1fr 1fr 360px;
            grid-template-rows: auto auto;
            gap: 16px;
            margin-bottom: 24px;
        }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            transition: all 0.2s;
        }

        .card:hover {
            box-shadow: var(--shadow-md);
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 20px 14px;
            border-bottom: 1px solid var(--border-light);
        }

        .card-title {
            font-size: 14px;
            font-weight: 700;
            color: var(--text);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .card-title-icon {
            width: 28px;
            height: 28px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .card-badge {
            font-size: 11px;
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 6px;
            background: var(--bg);
            color: var(--text-secondary);
        }

        .card-body {
            padding: 16px 20px 20px;
        }

        /* Chart card spanning */
        .chart-status { grid-column: 1; grid-row: 1; }
        .chart-sports { grid-column: 2; grid-row: 1; }
        .approval-ring { grid-column: 3; grid-row: 1; }
        .chart-trend { grid-column: 1 / 3; grid-row: 2; }
        .quick-stats { grid-column: 3; grid-row: 2; }

        /* Chart containers */
        .chart-wrap {
            position: relative;
            height: 220px;
        }

        .chart-wrap-sm {
            position: relative;
            height: 180px;
        }

        /* Approval Ring */
        .ring-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
        }

        .ring-wrap {
            position: relative;
            width: 160px;
            height: 160px;
        }

        .ring-center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .ring-value {
            font-size: 36px;
            font-weight: 800;
            color: var(--text);
            letter-spacing: -2px;
        }

        .ring-label {
            font-size: 11px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .ring-legend {
            display: flex;
            gap: 16px;
            margin-top: 16px;
        }

        .ring-legend-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            color: var(--text-secondary);
            font-weight: 500;
        }

        .ring-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }

        /* Quick Stats / Gender / Age */
        .quick-stats .card-body {
            max-height: 260px;
            overflow-y: auto;
        }

        .mini-stats {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .mini-stat {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 12px;
            background: var(--bg);
            border-radius: 10px;
            transition: all 0.2s;
            min-height: 0;
            flex-shrink: 0;
        }

        .mini-stat:hover {
            background: var(--surface-hover);
        }

        .mini-stat-left {
            display: flex;
            align-items: center;
            gap: 8px;
            overflow: hidden;
            min-width: 0;
        }

        .mini-stat-icon {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            flex-shrink: 0;
            line-height: 1;
            overflow: hidden;
        }

        .mini-stat-text {
            min-width: 0;
            overflow: hidden;
            margin-left: 2px;
        }

        .mini-stat-label {
            font-size: 12px;
            font-weight: 600;
            color: var(--text);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .mini-stat-sub {
            font-size: 10px;
            color: var(--text-muted);
            white-space: nowrap;
        }

        .mini-stat-value {
            font-size: 16px;
            font-weight: 700;
            color: var(--text);
        }

        /* Registrations Table Section */
        .table-section {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
        }

        .table-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 20px;
            border-bottom: 1px solid var(--border-light);
            flex-wrap: wrap;
            gap: 12px;
        }

        .table-title {
            font-size: 15px;
            font-weight: 700;
            color: var(--text);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .table-filters {
            display: flex;
            gap: 8px;
            align-items: center;
            flex-wrap: wrap;
        }

        .filter-select {
            padding: 7px 12px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 13px;
            font-family: inherit;
            background: var(--bg);
            color: var(--text);
            cursor: pointer;
            transition: all 0.2s;
        }

        .filter-select:focus {
            outline: none;
            border-color: var(--green);
            box-shadow: 0 0 0 3px rgba(29,89,68,0.1);
        }

        .btn {
            padding: 7px 16px;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-family: inherit;
            text-decoration: none;
        }

        .btn-green {
            background: var(--green);
            color: white;
        }

        .btn-green:hover {
            background: var(--green-light);
            transform: translateY(-1px);
        }

        .btn-outline {
            background: var(--surface);
            color: var(--text-secondary);
            border: 1px solid var(--border);
        }

        .btn-outline:hover {
            background: var(--bg);
            color: var(--text);
        }

        /* Table */
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table thead {
            background: var(--bg);
        }

        .data-table th {
            padding: 10px 16px;
            text-align: left;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-muted);
            border-bottom: 1px solid var(--border);
        }

        .data-table td {
            padding: 12px 16px;
            font-size: 13px;
            color: var(--text);
            border-bottom: 1px solid var(--border-light);
        }

        .data-table tbody tr {
            transition: background 0.15s;
        }

        .data-table tbody tr:hover {
            background: var(--surface-hover);
        }

        .data-table tbody tr:last-child td {
            border-bottom: none;
        }

        .user-cell {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar-sm {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: linear-gradient(135deg, var(--green), var(--orange));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 11px;
            flex-shrink: 0;
        }

        .user-name {
            font-weight: 600;
            color: var(--text);
        }

        .user-email {
            font-size: 12px;
            color: var(--text-muted);
        }

        .sport-tag {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 10px;
            background: var(--bg);
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            color: var(--text-secondary);
        }

        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.3px;
            text-transform: uppercase;
        }

        .badge-pending { background: #fef3c7; color: #b45309; }
        .badge-approved { background: #d1fae5; color: #047857; }
        .badge-rejected { background: #fee2e2; color: #dc2626; }

        body.dark .badge-pending { background: #78350f; color: #fde68a; }
        body.dark .badge-approved { background: #064e3b; color: #6ee7b7; }
        body.dark .badge-rejected { background: #7f1d1d; color: #fca5a5; }

        .actions-cell {
            display: flex;
            gap: 4px;
        }

        .action-btn {
            padding: 5px 10px;
            border: 1px solid var(--border);
            border-radius: 6px;
            cursor: pointer;
            font-size: 11px;
            font-weight: 600;
            transition: all 0.2s;
            background: var(--surface);
            color: var(--text-secondary);
            font-family: inherit;
        }

        .action-btn:hover {
            border-color: var(--green);
            color: var(--green);
            background: var(--surface-hover);
        }

        .action-btn.approve {
            color: #047857;
            border-color: #d1fae5;
        }

        .action-btn.approve:hover {
            background: #d1fae5;
            border-color: #047857;
        }

        .action-btn.reject {
            color: #dc2626;
            border-color: #fee2e2;
        }

        .action-btn.reject:hover {
            background: #fee2e2;
            border-color: #dc2626;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 48px 20px;
            color: var(--text-muted);
        }

        .empty-icon {
            font-size: 48px;
            margin-bottom: 12px;
            opacity: 0.5;
        }

        .empty-state h3 {
            font-size: 15px;
            color: var(--text);
            margin-bottom: 4px;
        }

        .empty-state p {
            font-size: 13px;
        }

        /* Pagination */
        .pagination-wrap {
            display: flex;
            justify-content: center;
            gap: 4px;
            padding: 16px 20px;
            border-top: 1px solid var(--border-light);
        }

        .pagination-wrap a,
        .pagination-wrap span {
            padding: 6px 10px;
            border: 1px solid var(--border);
            border-radius: 6px;
            text-decoration: none;
            color: var(--text-secondary);
            font-size: 12px;
            font-weight: 600;
            transition: all 0.2s;
        }

        .pagination-wrap a:hover {
            background: var(--green);
            color: white;
            border-color: var(--green);
        }

        .pagination-wrap .active {
            background: var(--green);
            color: white;
            border-color: var(--green);
        }

        /* Modals */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(4px);
        }

        .modal-box {
            background: var(--surface);
            border-radius: var(--radius-lg);
            width: 90%;
            max-width: 520px;
            box-shadow: var(--shadow-lg);
            animation: modalIn 0.25s ease;
            max-height: 85vh;
            overflow-y: auto;
        }

        @keyframes modalIn {
            from { transform: translateY(12px) scale(0.98); opacity: 0; }
            to { transform: translateY(0) scale(1); opacity: 1; }
        }

        .modal-head {
            padding: 20px 24px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal-head h3 {
            font-size: 16px;
            font-weight: 700;
        }

        .modal-close {
            background: var(--bg);
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            font-size: 16px;
            transition: all 0.2s;
        }

        .modal-close:hover {
            background: var(--border);
            color: var(--text);
        }

        .modal-body {
            padding: 20px 24px;
        }

        .modal-body p {
            color: var(--text-secondary);
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 12px;
        }

        .modal-body textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--border);
            border-radius: 10px;
            font-family: inherit;
            font-size: 14px;
            resize: vertical;
            min-height: 80px;
            background: var(--bg);
            color: var(--text);
            transition: all 0.2s;
        }

        .modal-body textarea:focus {
            outline: none;
            border-color: var(--green);
            box-shadow: 0 0 0 3px rgba(29,89,68,0.1);
        }

        .modal-foot {
            padding: 16px 24px 20px;
            display: flex;
            gap: 8px;
            justify-content: flex-end;
            border-top: 1px solid var(--border);
        }

        /* Details modal */
        .details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .detail-item {
            background: var(--bg);
            padding: 12px 14px;
            border-radius: 10px;
        }

        .detail-label {
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-muted);
            margin-bottom: 4px;
        }

        .detail-value {
            font-size: 14px;
            font-weight: 600;
            color: var(--text);
        }

        .detail-value.highlight {
            background: linear-gradient(135deg, var(--green), var(--orange));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .detail-section-title {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-secondary);
            padding: 12px 0 8px;
            border-bottom: 1px solid var(--border-light);
            margin-bottom: 10px;
        }

        .notes-box {
            background: #f0fdf4;
            border-radius: 10px;
            padding: 12px 14px;
            font-size: 13px;
            color: var(--text);
            line-height: 1.5;
        }

        body.dark .notes-box {
            background: #064e3b33;
        }

        /* Animated counters */
        .counter {
            display: inline-block;
        }

        /* Responsive */
        @media (max-width: 1100px) {
            .bento {
                grid-template-columns: 1fr 1fr;
            }
            .chart-status { grid-column: 1; grid-row: 1; }
            .chart-sports { grid-column: 2; grid-row: 1; }
            .approval-ring { grid-column: 1; grid-row: 2; }
            .chart-trend { grid-column: 2; grid-row: 2; }
            .quick-stats { grid-column: 1 / -1; grid-row: 3; }
        }

        @media (max-width: 768px) {
            .main { padding: 16px; }
            .topbar { padding: 0 16px; }

            .stats-row {
                grid-template-columns: repeat(2, 1fr);
            }

            .bento {
                grid-template-columns: 1fr;
            }

            .bento > * {
                grid-column: 1 !important;
                grid-row: auto !important;
            }

            .greeting {
                padding: 24px 20px;
            }

            .greeting h2 {
                font-size: 20px;
            }

            .greeting-actions {
                flex-direction: column;
            }

            .table-toolbar {
                flex-direction: column;
                align-items: stretch;
            }

            .data-table th:nth-child(n+4),
            .data-table td:nth-child(n+4) {
                display: none;
            }

            .topbar-user-name {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .stats-row {
                grid-template-columns: 1fr;
            }
        }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: var(--border); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--text-muted); }
    </style>
</head>
<body>
    <!-- Top Bar -->
    <div class="topbar">
        <div class="topbar-left">
            <img src="{{ asset('images/logo.png') }}" alt="NKES" />
            <span class="topbar-brand">NK EDUCATIF SPORTIF</span>
        </div>
        <div class="topbar-right">
            @include('partials.language-switcher-admin')
            <button class="topbar-btn" id="darkToggle" title="{{ __('messages.admin_toggle_dark') }}">
                <span id="darkIcon">&#9790;</span>
            </button>
            <a href="{{ route('admin.export') }}" class="topbar-btn" title="{{ __('messages.admin_export_csv_title') }}">&#8615;</a>
            <div class="topbar-user">
                <div class="topbar-avatar">{{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}</div>
                <span class="topbar-user-name">{{ Auth::user()->name ?? 'Admin' }}</span>
            </div>
            <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                @csrf
                <button type="submit" class="logout-btn">{{ __('messages.admin_logout') }}</button>
            </form>
        </div>
    </div>

    <div class="main">
        <!-- Greeting Banner -->
        <div class="greeting">
            <div class="greeting-time" id="greetingTime"></div>
            <h2>{{ __('messages.admin_welcome_back', ['name' => Auth::user()->name ?? 'Admin']) }}</h2>
            <p>{{ __('messages.admin_greeting_intro', ['count' => $stats['pending']]) }}</p>
            <div class="greeting-actions">
                <a href="{{ route('home') }}" class="greeting-btn greeting-btn-primary">&#127968; {{ __('messages.admin_view_website') }}</a>
                <a href="{{ route('admin.export') }}" class="greeting-btn greeting-btn-secondary">&#8615; {{ __('messages.admin_export_data') }}</a>
            </div>
        </div>

        <!-- Stats Row -->
        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon-wrap total">&#128202;</div>
                    <span class="stat-trend trend-neutral">{{ __('messages.admin_all_time') }}</span>
                </div>
                <div class="stat-label">{{ __('messages.admin_total_registrations') }}</div>
                <div class="stat-value"><span class="counter" data-target="{{ $stats['total'] }}">0</span></div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon-wrap pending">&#9203;</div>
                    @if($stats['pending'] > 0)
                        <span class="stat-trend trend-up">{{ $stats['pending'] }} {{ __('messages.admin_awaiting') }}</span>
                    @else
                        <span class="stat-trend trend-neutral">{{ __('messages.admin_none') }}</span>
                    @endif
                </div>
                <div class="stat-label">{{ __('messages.admin_pending') }}</div>
                <div class="stat-value"><span class="counter" data-target="{{ $stats['pending'] }}">0</span></div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon-wrap approved">&#9989;</div>
                    <span class="stat-trend trend-up">{{ $approvalRate }}%</span>
                </div>
                <div class="stat-label">{{ __('messages.admin_approved') }}</div>
                <div class="stat-value"><span class="counter" data-target="{{ $stats['approved'] }}">0</span></div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon-wrap rejected">&#10060;</div>
                </div>
                <div class="stat-label">{{ __('messages.admin_rejected') }}</div>
                <div class="stat-value"><span class="counter" data-target="{{ $stats['rejected'] }}">0</span></div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon-wrap today">&#9889;</div>
                    <span class="stat-trend trend-up">{{ __('messages.admin_today') }}</span>
                </div>
                <div class="stat-label">{{ __('messages.admin_new_today') }}</div>
                <div class="stat-value"><span class="counter" data-target="{{ $stats['today'] }}">0</span></div>
                <div class="stat-sub">{{ $stats['this_week'] }} {{ __('messages.admin_this_week') }}</div>
            </div>
        </div>

        <!-- Bento Grid: Charts -->
        <div class="bento">
            <!-- Status Chart -->
            <div class="card chart-status">
                <div class="card-header">
                    <span class="card-title">
                        <span class="card-title-icon" style="background:#e0f2fe;">&#128200;</span>
                        {{ __('messages.admin_status_overview') }}
                    </span>
                    <span class="card-badge">{{ $stats['total'] }} {{ __('messages.admin_total') }}</span>
                </div>
                <div class="card-body">
                    <div class="chart-wrap">
                        <canvas id="statusChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Sports Breakdown -->
            <div class="card chart-sports">
                <div class="card-header">
                    <span class="card-title">
                        <span class="card-title-icon" style="background:#fef3c7;">&#9917;</span>
                        {{ __('messages.admin_sports_breakdown') }}
                    </span>
                    <span class="card-badge">{{ $sportBreakdown->count() }} {{ __('messages.admin_sports_count') }}</span>
                </div>
                <div class="card-body">
                    <div class="chart-wrap">
                        <canvas id="sportsChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Approval Ring -->
            <div class="card approval-ring">
                <div class="card-header">
                    <span class="card-title">
                        <span class="card-title-icon" style="background:#d1fae5;">&#127919;</span>
                        {{ __('messages.admin_approval_rate') }}
                    </span>
                </div>
                <div class="card-body">
                    <div class="ring-container">
                        <div class="ring-wrap">
                            <canvas id="approvalRing"></canvas>
                            <div class="ring-center">
                                <div class="ring-value">{{ $approvalRate }}%</div>
                                <div class="ring-label">{{ __('messages.admin_chart_approved') }}</div>
                            </div>
                        </div>
                        <div class="ring-legend">
                            <div class="ring-legend-item">
                                <div class="ring-dot" style="background:var(--green);"></div>
                                {{ __('messages.admin_chart_approved') }}
                            </div>
                            <div class="ring-legend-item">
                                <div class="ring-dot" style="background:var(--yellow);"></div>
                                {{ __('messages.admin_chart_pending') }}
                            </div>
                            <div class="ring-legend-item">
                                <div class="ring-dot" style="background:var(--orange);"></div>
                                {{ __('messages.admin_chart_rejected') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Weekly Trend -->
            <div class="card chart-trend">
                <div class="card-header">
                    <span class="card-title">
                        <span class="card-title-icon" style="background:#ede9fe;">&#128200;</span>
                        {{ __('messages.admin_registration_trend') }}
                    </span>
                    <span class="card-badge">{{ __('messages.admin_last_7_days') }}</span>
                </div>
                <div class="card-body">
                    <div class="chart-wrap-sm">
                        <canvas id="trendChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Quick Stats: Gender + Age -->
            <div class="card quick-stats">
                <div class="card-header">
                    <span class="card-title">
                        <span class="card-title-icon" style="background:#fce7f3;">&#128101;</span>
                        {{ __('messages.admin_demographics') }}
                    </span>
                </div>
                <div class="card-body">
                    <div class="mini-stats">
                        @foreach($genderBreakdown as $g)
                        <div class="mini-stat">
                            <div class="mini-stat-left">
                                <div class="mini-stat-icon" style="background: {{ $g->gender === 'Male' ? '#dbeafe' : ($g->gender === 'Female' ? '#fce7f3' : '#f3f4f6') }};">
                                    {!! $g->gender === 'Male' ? '&#9794;' : ($g->gender === 'Female' ? '&#9792;' : '&#9898;') !!}
                                </div>
                                <div class="mini-stat-text">
                                    <div class="mini-stat-label">{{ $g->gender }}</div>
                                    <div class="mini-stat-sub">{{ $stats['total'] > 0 ? round(($g->count / $stats['total']) * 100) : 0 }}% {{ __('messages.admin_of_total') }}</div>
                                </div>
                            </div>
                            <div class="mini-stat-value">{{ $g->count }}</div>
                        </div>
                        @endforeach

                        @foreach($ageBreakdown->take(3) as $a)
                        <div class="mini-stat">
                            <div class="mini-stat-left">
                                <div class="mini-stat-icon" style="background: #f3e8ff;">&#127947;</div>
                                <div class="mini-stat-text">
                                    <div class="mini-stat-label">{{ $a->age_group }}</div>
                                    <div class="mini-stat-sub">{{ __('messages.admin_age_group_label') }}</div>
                                </div>
                            </div>
                            <div class="mini-stat-value">{{ $a->count }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Registrations Table -->
        <div class="table-section">
            <div class="table-toolbar">
                <div class="table-title">
                    &#128203; {{ __('messages.admin_all_registrations') }}
                    <span class="card-badge">{{ $registrations->total() }} {{ __('messages.admin_entries') }}</span>
                </div>
                <div class="table-filters">
                    <form method="GET" action="{{ route('admin.dashboard') }}" style="display:flex;gap:8px;align-items:center;flex-wrap:wrap;">
                        <select name="status" class="filter-select" onchange="this.form.submit()">
                            <option value="">{{ __('messages.admin_all_status') }}</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>{{ __('messages.admin_pending') }}</option>
                            <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>{{ __('messages.admin_approved') }}</option>
                            <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>{{ __('messages.admin_rejected') }}</option>
                        </select>
                        <select name="sport" class="filter-select" onchange="this.form.submit()">
                            <option value="">{{ __('messages.admin_all_sports') }}</option>
                            @foreach($sports as $sport)
                                <option value="{{ $sport }}" {{ request('sport') == $sport ? 'selected' : '' }}>{{ $sport }}</option>
                            @endforeach
                        </select>
                        @if(request('status') || request('sport'))
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline">{{ __('messages.admin_clear') }}</a>
                        @endif
                    </form>
                    <a href="{{ route('admin.export') }}" class="btn btn-green">&#8615; {{ __('messages.admin_export_csv') }}</a>
                </div>
            </div>

            @if($registrations->count() > 0)
                <div style="overflow-x: auto;">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>{{ __('messages.admin_athlete') }}</th>
                            <th>{{ __('messages.admin_sport') }}</th>
                            <th>{{ __('messages.admin_age_group') }}</th>
                            <th>{{ __('messages.admin_gender') }}</th>
                            <th>{{ __('messages.admin_status') }}</th>
                            <th>{{ __('messages.admin_date') }}</th>
                            <th>{{ __('messages.admin_actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registrations as $reg)
                            <tr>
                                <td>
                                    <div class="user-cell">
                                        <div class="user-avatar-sm">{{ strtoupper(substr($reg->full_name ?? ($reg->user->name ?? 'N'), 0, 1)) }}</div>
                                        <div>
                                            <div class="user-name">{{ $reg->full_name ?? ($reg->user->name ?? 'N/A') }}</div>
                                            <div class="user-email">{{ $reg->email ?? ($reg->user->email ?? 'N/A') }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="sport-tag">{{ $reg->sport_name }}</span></td>
                                <td>{{ $reg->age_group }}</td>
                                <td>{{ $reg->gender }}</td>
                                <td><span class="badge badge-{{ $reg->status }}">{{ ucfirst($reg->status) }}</span></td>
                                <td>{{ $reg->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="actions-cell">
                                        <button class="action-btn" onclick="viewDetails({{ json_encode($reg) }})">{{ __('messages.admin_view') }}</button>
                                        @if($reg->status == 'pending')
                                            <button class="action-btn approve" onclick="approveRegistration({{ $reg->id }})">{{ __('messages.admin_approve') }}</button>
                                            <button class="action-btn reject" onclick="openRejectModal({{ $reg->id }})">{{ __('messages.admin_reject') }}</button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>

                @if($registrations->hasPages())
                    <div class="pagination-wrap">
                        {{ $registrations->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                @endif
            @else
                <div class="empty-state">
                    <div class="empty-icon">&#128237;</div>
                    <h3>{{ __('messages.admin_no_registrations_found') }}</h3>
                    <p>{{ __('messages.admin_no_registrations_matching') }}</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Details Modal -->
    <div id="detailsModal" class="modal-overlay">
        <div class="modal-box">
            <div class="modal-head">
                <h3>{{ __('messages.admin_athlete_details') }}</h3>
                <button class="modal-close" onclick="closeModal('detailsModal')">&times;</button>
            </div>
            <div class="modal-body" id="detailsContent"></div>
            <div class="modal-foot">
                <button class="btn btn-outline" onclick="closeModal('detailsModal')">{{ __('messages.admin_close') }}</button>
            </div>
        </div>
    </div>

    <!-- Reject Modal -->
    <div id="rejectModal" class="modal-overlay">
        <div class="modal-box">
            <div class="modal-head">
                <h3>{{ __('messages.admin_reject_registration') }}</h3>
                <button class="modal-close" onclick="closeModal('rejectModal')">&times;</button>
            </div>
            <div class="modal-body">
                <p>{{ __('messages.admin_reject_confirm') }}</p>
                <label style="font-size:13px;font-weight:600;color:var(--text);display:block;margin-bottom:6px;">{{ __('messages.admin_reason_optional') }}</label>
                <textarea id="rejectReason" placeholder="{{ __('messages.admin_reason_placeholder') }}"></textarea>
            </div>
            <div class="modal-foot">
                <button class="btn btn-outline" onclick="closeModal('rejectModal')">{{ __('messages.admin_cancel') }}</button>
                <button class="btn" style="background:#dc2626;color:white;" onclick="confirmReject()">{{ __('messages.admin_reject_btn') }}</button>
            </div>
        </div>
    </div>

    <script>
        window.__adminChartLabels = [
            @json(__('messages.admin_chart_approved')),
            @json(__('messages.admin_chart_pending')),
            @json(__('messages.admin_chart_rejected'))
        ];
        window.__adminLabels = {
            personal_info: @json(__('messages.admin_personal_information')),
            full_name: @json(__('messages.admin_full_name')),
            email: @json(__('messages.admin_email')),
            phone: @json(__('messages.admin_phone')),
            gender: @json(__('messages.admin_gender')),
            sport_info: @json(__('messages.admin_sport_information')),
            sport: @json(__('messages.admin_sport')),
            age_group: @json(__('messages.admin_age_group')),
            position: @json(__('messages.position')),
            jersey_number: @json(__('messages.admin_jersey_number')),
            status: @json(__('messages.admin_status')),
            registered: @json(__('messages.admin_registered')),
            notes: @json(__('messages.admin_notes'))
        };

        // Greeting based on time of day (translated)
        (function() {
            const h = new Date().getHours();
            const greetings = {
                morning: @json(__('messages.admin_good_morning')),
                afternoon: @json(__('messages.admin_good_afternoon')),
                evening: @json(__('messages.admin_good_evening'))
            };
            let greeting = greetings.evening;
            let icon = '&#127769;';
            if (h < 12) { greeting = greetings.morning; icon = '&#9728;&#65039;'; }
            else if (h < 17) { greeting = greetings.afternoon; icon = '&#127774;'; }
            const now = new Date();
            const dateStr = now.toLocaleDateString(document.documentElement.lang || 'en', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
            document.getElementById('greetingTime').innerHTML = `${icon} ${greeting} &middot; ${dateStr}`;
        })();

        // Animated counters
        document.querySelectorAll('.counter').forEach(el => {
            const target = parseInt(el.dataset.target) || 0;
            if (target === 0) { el.textContent = '0'; return; }
            const duration = 1200;
            const step = Math.max(1, Math.floor(target / (duration / 16)));
            let current = 0;
            const timer = setInterval(() => {
                current += step;
                if (current >= target) { current = target; clearInterval(timer); }
                el.textContent = current.toLocaleString();
            }, 16);
        });

        // Dark mode
        const darkToggle = document.getElementById('darkToggle');
        const darkIcon = document.getElementById('darkIcon');
        function setDark(on) {
            document.body.classList.toggle('dark', on);
            darkIcon.innerHTML = on ? '&#9728;' : '&#9790;';
            localStorage.setItem('darkMode', on);
        }
        darkToggle.addEventListener('click', () => setDark(!document.body.classList.contains('dark')));
        if (localStorage.getItem('darkMode') === 'true') setDark(true);

        // Chart colors
        const green = '#1D5944';
        const orange = '#FF7A59';
        const yellow = '#FFD93D';
        const purple = '#8b5cf6';
        const blue = '#3b82f6';
        const pink = '#ec4899';
        const teal = '#14b8a6';
        const chartColors = [green, orange, yellow, purple, blue, pink, teal, '#f59e0b', '#6366f1', '#10b981', '#ef4444', '#06b6d4', '#f97316', '#84cc16'];

        function getChartTextColor() {
            return document.body.classList.contains('dark') ? '#9aa0a8' : '#6b7280';
        }

        // Status Doughnut
        new Chart(document.getElementById('statusChart'), {
            type: 'doughnut',
            data: {
                labels: window.__adminChartLabels || ['Approved', 'Pending', 'Rejected'],
                datasets: [{
                    data: [{{ $stats['approved'] }}, {{ $stats['pending'] }}, {{ $stats['rejected'] }}],
                    backgroundColor: [green, yellow, orange],
                    borderWidth: 0,
                    spacing: 3,
                    borderRadius: 6,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '65%',
                plugins: {
                    legend: { position: 'bottom', labels: { padding: 16, usePointStyle: true, pointStyle: 'circle', color: getChartTextColor(), font: { size: 12, weight: 600 } } }
                }
            }
        });

        // Sports Bar Chart
        new Chart(document.getElementById('sportsChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($sportBreakdown->pluck('sport_name')) !!},
                datasets: [{
                    data: {!! json_encode($sportBreakdown->pluck('count')) !!},
                    backgroundColor: chartColors.slice(0, {{ $sportBreakdown->count() }}),
                    borderRadius: 6,
                    borderSkipped: false,
                    barThickness: 24,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                indexAxis: 'y',
                plugins: { legend: { display: false } },
                scales: {
                    x: { grid: { display: false }, ticks: { color: getChartTextColor(), font: { size: 11 } } },
                    y: { grid: { display: false }, ticks: { color: getChartTextColor(), font: { size: 11, weight: 600 } } }
                }
            }
        });

        // Approval Ring
        new Chart(document.getElementById('approvalRing'), {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [{{ $stats['approved'] }}, {{ $stats['pending'] }}, {{ $stats['rejected'] }}],
                    backgroundColor: [green, yellow, orange],
                    borderWidth: 0,
                    spacing: 2,
                    borderRadius: 8,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '78%',
                plugins: { legend: { display: false }, tooltip: { enabled: true } }
            }
        });

        // Trend Line Chart
        new Chart(document.getElementById('trendChart'), {
            type: 'line',
            data: {
                labels: {!! json_encode(collect($weeklyTrend)->pluck('day')) !!},
                datasets: [{
                    data: {!! json_encode(collect($weeklyTrend)->pluck('count')) !!},
                    borderColor: green,
                    backgroundColor: 'rgba(29,89,68,0.08)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 2.5,
                    pointBackgroundColor: green,
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: { grid: { display: false }, ticks: { color: getChartTextColor(), font: { size: 11, weight: 600 } } },
                    y: { grid: { color: 'rgba(0,0,0,0.04)' }, ticks: { color: getChartTextColor(), font: { size: 11 }, stepSize: 1 }, beginAtZero: true }
                }
            }
        });

        // Modals
        let currentRejectId = null;

        function viewDetails(reg) {
            const s = reg.status;
            const badgeClass = `badge badge-${s}`;

            const L = window.__adminLabels || {};
            const content = `
                <div class="detail-section-title">${L.personal_info || 'Personal Information'}</div>
                <div class="details-grid">
                    <div class="detail-item">
                        <div class="detail-label">${L.full_name || 'Full Name'}</div>
                        <div class="detail-value highlight">${reg.full_name || reg.user?.name || 'N/A'}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">${L.email || 'Email'}</div>
                        <div class="detail-value">${reg.email || reg.user?.email || 'N/A'}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">${L.phone || 'Phone'}</div>
                        <div class="detail-value">${reg.phone || '—'}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">${L.gender || 'Gender'}</div>
                        <div class="detail-value">${reg.gender || '—'}</div>
                    </div>
                </div>

                <div class="detail-section-title">${L.sport_info || 'Sport Information'}</div>
                <div class="details-grid">
                    <div class="detail-item">
                        <div class="detail-label">${L.sport || 'Sport'}</div>
                        <div class="detail-value highlight">${reg.sport_name}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">${L.age_group || 'Age Group'}</div>
                        <div class="detail-value">${reg.age_group}</div>
                    </div>
                    ${reg.position ? `<div class="detail-item"><div class="detail-label">${L.position || 'Position'}</div><div class="detail-value">${reg.position}</div></div>` : ''}
                    ${reg.jersey_number ? `<div class="detail-item"><div class="detail-label">${L.jersey_number || 'Jersey #'}</div><div class="detail-value">${reg.jersey_number}</div></div>` : ''}
                </div>

                <div class="detail-section-title">${L.status || 'Status'}</div>
                <div class="details-grid">
                    <div class="detail-item">
                        <div class="detail-label">${L.status || 'Status'}</div>
                        <div style="margin-top:4px;"><span class="${badgeClass}">${s.toUpperCase()}</span></div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">${L.registered || 'Registered'}</div>
                        <div class="detail-value">${new Date(reg.created_at).toLocaleDateString('en-US', {month:'short',day:'numeric',year:'numeric'})}</div>
                    </div>
                </div>

                ${reg.notes ? `<div class="detail-section-title">${L.notes || 'Notes'}</div><div class="notes-box">${reg.notes}</div>` : ''}
            `;

            document.getElementById('detailsContent').innerHTML = content;
            document.getElementById('detailsModal').style.display = 'flex';
        }

        function openRejectModal(id) {
            currentRejectId = id;
            document.getElementById('rejectModal').style.display = 'flex';
        }

        async function confirmReject() {
            const reason = document.getElementById('rejectReason').value;
            await rejectRegistration(currentRejectId, reason);
            closeModal('rejectModal');
        }

        const adminApproveConfirmMsg = @json(__('messages.admin_approve_confirm'));

        async function approveRegistration(id) {
            if (!confirm(adminApproveConfirmMsg)) return;
            try {
                const res = await fetch(`{{ url('/admin/approve') }}/${id}`, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'X-Requested-With': 'XMLHttpRequest' }
                });
                const data = await res.json();
                if (data.success) location.reload();
                else alert('Error: ' + data.message);
            } catch (e) { alert('An error occurred'); }
        }

        async function rejectRegistration(id, reason) {
            try {
                const res = await fetch(`{{ url('/admin/reject') }}/${id}`, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' },
                    body: JSON.stringify({ reason })
                });
                const data = await res.json();
                if (data.success) location.reload();
                else alert('Error: ' + data.message);
            } catch (e) { alert('An error occurred'); }
        }

        function closeModal(id) {
            document.getElementById(id).style.display = 'none';
            if (id === 'rejectModal') document.getElementById('rejectReason').value = '';
        }

        document.querySelectorAll('.modal-overlay').forEach(m => {
            m.addEventListener('click', e => { if (e.target === m) closeModal(m.id); });
        });
    </script>
</body>
</html>
