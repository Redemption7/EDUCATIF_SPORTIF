<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - NK EDUCATIF SPORTIF</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
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
            font-family: 'Poppins', sans-serif;
            background: #ffffff;
            color: var(--text-dark);
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            background: white;
            color: var(--text-dark);
            padding: 16px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--border-light);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar h1 {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .logout-btn {
            background: transparent;
            color: var(--text-dark);
            border: 1px solid var(--border-light);
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
            font-weight: 500;
            font-size: 13px;
        }

        .logout-btn:hover {
            background: var(--bg-light);
            border-color: var(--primary-green);
            color: var(--primary-green);
        }

        /* Container */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 32px 40px;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: var(--bg-light);
            border: 1px solid var(--border-light);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04);
            transition: all 0.2s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            border-color: var(--primary-green);
            box-shadow: 0 4px 12px rgba(29, 89, 68, 0.08);
        }

        .stat-icon {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .stat-label {
            color: var(--text-light);
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            margin-bottom: 6px;
        }

        .stat-number {
            font-size: 32px;
            font-weight: 700;
            color: var(--primary-green);
        }

        /* Filters */
        .filters-section {
            background: white;
            border: 1px solid var(--border-light);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 24px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04);
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            align-items: flex-end;
        }

        .filter-group {
            flex: 1;
            min-width: 150px;
        }

        .filter-group label {
            display: block;
            font-weight: 500;
            margin-bottom: 6px;
            font-size: 12px;
            color: var(--text-dark);
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .filter-group select {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid var(--border-light);
            border-radius: 6px;
            font-size: 13px;
            font-family: inherit;
            transition: all 0.2s ease;
            background: white;
            cursor: pointer;
            color: var(--text-dark);
        }

        .filter-group select:focus {
            outline: none;
            border-color: var(--primary-green);
            box-shadow: 0 0 0 2px rgba(29, 89, 68, 0.05);
        }

        .btn-primary {
            background: var(--primary-green);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 13px;
        }

        .btn-primary:hover {
            background: #164033;
            box-shadow: 0 4px 8px rgba(29, 89, 68, 0.15);
        }

        .btn-export {
            background: var(--accent-yellow);
            color: var(--text-dark);
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 13px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-export:hover {
            background: #ffc107;
            box-shadow: 0 4px 8px rgba(255, 211, 61, 0.2);
        }

        /* Table Section */
        .table-section {
            background: white;
            border: 1px solid var(--border-light);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        thead {
            background: var(--bg-light);
            border-bottom: 1px solid var(--border-light);
        }

        th {
            padding: 12px 16px;
            text-align: left;
            font-weight: 600;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            color: var(--text-light);
        }

        td {
            padding: 14px 16px;
            border-bottom: 1px solid var(--border-light);
        }

        tbody tr {
            transition: background 0.15s ease;
        }

        tbody tr:hover {
            background: var(--bg-light);
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.2px;
            text-transform: uppercase;
        }

        .status-pending {
            background: #fef3c7;
            color: #d97706;
        }

        .status-approved {
            background: #d1fae5;
            color: #047857;
        }

        .status-rejected {
            background: #fee2e2;
            color: #dc2626;
        }

        .actions {
            display: flex;
            gap: 6px;
        }

        .action-btn {
            padding: 6px 10px;
            border: 1px solid var(--border-light);
            border-radius: 4px;
            cursor: pointer;
            font-size: 11px;
            font-weight: 600;
            transition: all 0.2s ease;
            background: white;
            color: var(--text-dark);
        }

        .btn-view {
            border-color: #dbeafe;
            color: #2563eb;
        }

        .btn-view:hover {
            background: #eff6ff;
            border-color: #2563eb;
        }

        .btn-approve {
            border-color: #d1fae5;
            color: #047857;
        }

        .btn-approve:hover {
            background: #d1fae5;
        }

        .btn-reject {
            border-color: #fee2e2;
            color: #dc2626;
        }

        .btn-reject:hover {
            background: #fee2e2;
        }

        .empty-state {
            text-align: center;
            padding: 48px 20px;
            color: var(--text-light);
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 4px;
            margin-top: 16px;
            padding: 16px;
        }

        .pagination a,
        .pagination span {
            padding: 8px 10px;
            border: 1px solid var(--border-light);
            border-radius: 4px;
            text-decoration: none;
            color: var(--text-dark);
            transition: all 0.2s ease;
            font-size: 12px;
            font-weight: 500;
        }

        .pagination a:hover {
            background: var(--primary-green);
            color: white;
            border-color: var(--primary-green);
        }

        .pagination .active {
            background: var(--primary-green);
            color: white;
            border-color: var(--primary-green);
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(2px);
        }

        .modal-content {
            background: white;
            border-radius: 8px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            animation: slideUp 0.2s ease;
            max-height: 85vh;
            overflow-y: auto;
        }

        /* Details Modal Specific Styles */
        .details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .detail-item {
            background: var(--bg-light);
            padding: 12px 14px;
            border-radius: 6px;
            border: 1px solid var(--border-light);
        }

        .detail-item-full {
            grid-column: 1 / -1;
        }

        .detail-label {
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            color: var(--text-light);
            display: block;
            margin-bottom: 4px;
        }

        .detail-value {
            font-size: 14px;
            font-weight: 500;
            color: var(--text-dark);
            word-break: break-word;
        }

        .detail-value.highlight {
            background: linear-gradient(135deg, var(--primary-green), var(--primary-orange));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 600;
        }

        .detail-section {
            margin-bottom: 16px;
        }

        .detail-section:last-child {
            margin-bottom: 0;
        }

        .section-title {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-dark);
            padding-bottom: 8px;
            margin-bottom: 12px;
            border-bottom: 1px solid var(--border-light);
        }

        .status-display {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.2px;
            text-transform: uppercase;
        }

        .notes-box {
            background: #f0fdf4;
            border: 1px solid #dcfce7;
            border-radius: 6px;
            padding: 12px 14px;
            font-size: 13px;
            color: var(--text-dark);
            line-height: 1.5;
            word-break: break-word;
        }

        @keyframes slideUp {
            from {
                transform: translateY(10px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-header {
            padding: 20px;
            border-bottom: 1px solid var(--border-light);
            font-size: 16px;
            font-weight: 600;
            color: var(--text-dark);
        }

        .modal-body {
            padding: 20px;
        }

        .modal-body p {
            margin: 10px 0;
            color: var(--text-light);
            line-height: 1.5;
            font-size: 13px;
        }

        .modal-body textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--border-light);
            border-radius: 6px;
            font-family: inherit;
            font-size: 13px;
            resize: vertical;
            min-height: 80px;
            transition: all 0.2s ease;
        }

        .modal-body textarea:focus {
            outline: none;
            border-color: var(--primary-green);
            box-shadow: 0 0 0 2px rgba(29, 89, 68, 0.05);
        }

        .modal-footer {
            padding: 16px 20px 20px;
            display: flex;
            gap: 8px;
            justify-content: flex-end;
            border-top: 1px solid var(--border-light);
        }

        .modal-footer button {
            padding: 8px 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.2s ease;
            font-size: 13px;
        }

        .btn-cancel {
            background: var(--bg-light);
            color: var(--text-dark);
            border: 1px solid var(--border-light);
        }

        .btn-cancel:hover {
            background: #f3f4f6;
        }

        .btn-confirm {
            background: var(--primary-green);
            color: white;
        }

        .btn-confirm:hover {
            background: #164033;
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                gap: 12px;
                padding: 16px;
            }

            .container {
                padding: 16px;
            }

            .stats-grid {
                grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
                gap: 12px;
                margin-bottom: 20px;
            }

            .stat-card {
                padding: 16px;
            }

            .stat-number {
                font-size: 24px;
            }

            .filters-section {
                flex-direction: column;
                gap: 10px;
            }

            .filter-group {
                min-width: auto;
            }

            table {
                font-size: 12px;
            }

            th, td {
                padding: 10px 12px;
            }

            .actions {
                flex-direction: column;
            }

            .action-btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <h1>NK EDUCATIF</h1>
        <div style="display: flex; align-items: center; gap: 16px;">
            <div style="font-size: 13px; color: var(--text-light);">
                Welcome, <strong style="color: var(--text-dark);">{{ Auth::user()->name ?? 'Admin' }}</strong>
            </div>
            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>

    <!-- Main Container -->
    <div class="container">
        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">📝</div>
                <div class="stat-label">Total</div>
                <div class="stat-number">{{ $stats['total'] }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">⏳</div>
                <div class="stat-label">Pending</div>
                <div class="stat-number">{{ $stats['pending'] }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">✅</div>
                <div class="stat-label">Approved</div>
                <div class="stat-number">{{ $stats['approved'] }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">❌</div>
                <div class="stat-label">Rejected</div>
                <div class="stat-number">{{ $stats['rejected'] }}</div>
            </div>
        </div>

        <!-- Filters -->
        <div class="filters-section">
            <form style="display: flex; gap: 12px; flex-wrap: wrap; align-items: flex-end; width: 100%;" method="GET" action="{{ route('admin.registrations') }}">
                <div class="filter-group">
                    <label>Status</label>
                    <select name="status">
                        <option value="">All</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>
                <button type="submit" class="btn-primary">Filter</button>
            </form>
            <a href="{{ route('admin.export') }}" class="btn-export">Export CSV</a>
        </div>

        <!-- Table Section -->
        <div class="table-section">
            @if($registrations->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Sport</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registrations as $reg)
                            <tr>
                                <td>#{{ $reg->id }}</td>
                                <td>{{ $reg->full_name ?? ($reg->user->name ?? 'N/A') }}</td>
                                <td>{{ $reg->email ?? ($reg->user->email ?? 'N/A') }}</td>
                                <td>{{ $reg->sport_name }}</td>
                                <td>{{ $reg->age_group }}</td>
                                <td>{{ $reg->gender }}</td>
                                <td>
                                    <span class="status-badge status-{{ $reg->status }}">
                                        {{ ucfirst($reg->status) }}
                                    </span>
                                </td>
                                <td>{{ $reg->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="actions">
                                        <button class="action-btn btn-view" onclick="viewDetails({{ json_encode($reg) }})" title="View details">View</button>
                                        @if($reg->status == 'pending')
                                            <button class="action-btn btn-approve" onclick="approveRegistration({{ $reg->id }})" title="Approve">Approve</button>
                                            <button class="action-btn btn-reject" onclick="openRejectModal({{ $reg->id }})" title="Reject">Reject</button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($registrations->hasPages())
                    <div class="pagination">
                        {{ $registrations->links('pagination::bootstrap-4') }}
                    </div>
                @endif
            @else
                <div class="empty-state">
                    <div style="font-size: 48px; margin-bottom: 12px;">📭</div>
                    <h3 style="font-size: 16px; margin-bottom: 6px; color: var(--text-dark);">No Registrations</h3>
                    <p style="font-size: 12px;">There are no registrations to display.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- View Details Modal -->
    <div id="detailsModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">Student Details</div>
            <div class="modal-body" id="detailsContent"></div>
            <div class="modal-footer">
                <button class="btn-cancel" onclick="closeModal('detailsModal')">Close</button>
            </div>
        </div>
    </div>

    <!-- Reject Modal -->
    <div id="rejectModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">Reject Registration</div>
            <div class="modal-body">
                <p>Are you sure you want to reject this registration?</p>
                <p style="color: var(--text-dark); font-weight: 500; margin-top: 12px; margin-bottom: 6px;">Reason (optional):</p>
                <textarea id="rejectReason" placeholder="Enter reason..."></textarea>
            </div>
            <div class="modal-footer">
                <button class="btn-cancel" onclick="closeModal('rejectModal')">Cancel</button>
                <button class="btn-confirm" onclick="confirmReject()">Reject</button>
            </div>
        </div>
    </div>

    <script>
        let currentRejectId = null;

        function viewDetails(registration) {
            const statusClass = `status-display status-${registration.status}`;
            const statusText = registration.status.toUpperCase();
            
            const personalInfo = `
                <div class="detail-item">
                    <span class="detail-label">Full Name</span>
                    <span class="detail-value highlight">${registration.full_name || registration.user?.name || 'N/A'}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Email</span>
                    <span class="detail-value">${registration.email || registration.user?.email || 'N/A'}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Phone</span>
                    <span class="detail-value">${registration.phone || '—'}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Gender</span>
                    <span class="detail-value">${registration.gender || '—'}</span>
                </div>
            `;

            const sportInfo = `
                <div class="detail-item">
                    <span class="detail-label">Sport</span>
                    <span class="detail-value highlight">${registration.sport_name}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Age Group</span>
                    <span class="detail-value">${registration.age_group}</span>
                </div>
                ${registration.position ? `
                <div class="detail-item">
                    <span class="detail-label">Position</span>
                    <span class="detail-value">${registration.position}</span>
                </div>
                ` : ''}
                ${registration.jersey_number ? `
                <div class="detail-item">
                    <span class="detail-label">Jersey Number</span>
                    <span class="detail-value">${registration.jersey_number}</span>
                </div>
                ` : ''}
            `;

            const registrationInfo = `
                <div class="detail-item">
                    <span class="detail-label">Status</span>
                    <div style="margin-top: 4px;">
                        <span class="${statusClass}">${statusText}</span>
                    </div>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Registered On</span>
                    <span class="detail-value">${new Date(registration.created_at).toLocaleDateString()}</span>
                </div>
                ${registration.approved_at ? `
                <div class="detail-item">
                    <span class="detail-label">Approved On</span>
                    <span class="detail-value">${new Date(registration.approved_at).toLocaleDateString()}</span>
                </div>
                ` : ''}
            `;

            const notesSection = registration.notes ? `
                <div class="detail-section">
                    <div class="section-title">Notes</div>
                    <div class="notes-box">${registration.notes}</div>
                </div>
            ` : '';

            const content = `
                <div class="detail-section">
                    <div class="section-title">Personal Information</div>
                    <div class="details-grid">
                        ${personalInfo}
                    </div>
                </div>

                <div class="detail-section">
                    <div class="section-title">Sport Information</div>
                    <div class="details-grid">
                        ${sportInfo}
                    </div>
                </div>

                <div class="detail-section">
                    <div class="section-title">Registration Status</div>
                    <div class="details-grid">
                        ${registrationInfo}
                    </div>
                </div>

                ${notesSection}
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

        async function approveRegistration(id) {
            if (!confirm('Approve this registration?')) return;

            try {
                const response = await fetch(`{{ url('/admin/approve') }}/${id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'X-Requested-With': 'XMLHttpRequest',
                    }
                });

                const data = await response.json();
                if (data.success) {
                    alert('Approved!');
                    location.reload();
                } else {
                    alert('Error: ' + data.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred');
            }
        }

        async function rejectRegistration(id, reason) {
            try {
                const response = await fetch(`{{ url('/admin/reject') }}/${id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'X-Requested-With': 'XMLHttpRequest',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ reason })
                });

                const data = await response.json();
                if (data.success) {
                    alert('Rejected!');
                    location.reload();
                } else {
                    alert('Error: ' + data.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred');
            }
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
            if (modalId === 'rejectModal') {
                document.getElementById('rejectReason').value = '';
            }
        }

        // Close modal when clicking outside
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    closeModal(modal.id);
                }
            });
        });
    </script>
</body>
</html>
