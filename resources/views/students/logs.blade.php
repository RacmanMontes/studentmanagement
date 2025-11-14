@extends('layouts.app')

@section('content')
<div class="container py-4" style="max-width: 900px;">

    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div class="card-header bg-gradient text-white d-flex justify-content-between align-items-center" 
             style="background: linear-gradient(135deg, #ffc107, #ffdd57);">
            <h5 class="mb-0 fw-bold" style="color:black;">Activity Logs - {{ $student->first_name }} {{ $student->last_name }}</h5>
            <a href="{{ route('students.show', $student->id) }}" class="btn btn-sm btn-outline-dark shadow-sm">
                <i class="bi bi-arrow-left me-1"></i> Back
            </a>
        </div>

        <div class="card-body p-3 table-responsive">

            <table class="table table-hover text-center align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Action</th>
                        <th>Subject</th>
                        <th>Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($activityLogs as $log)
                        <tr class="align-middle">
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <span class="badge {{ $log->action == 'add' ? 'bg-success' : 'bg-danger' }} shadow-sm">
                                    {{ ucfirst($log->action) }}
                                </span>
                            </td>
                            <td>{{ $log->subject->subject_name ?? 'N/A' }}</td>
                            <td class="small text-muted">{{ $log->created_at->format('M d, Y h:i A') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-muted py-3">No activity logs available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>

<style>
.table-hover tbody tr:hover {
    background-color: rgba(255, 193, 7, 0.15) !important; 
    transition: background-color 0.3s ease;
}

.table th, .table td {
    vertical-align: middle;
    border-color: #ffc107 !important;
    color: #212529 !important; 
}

.table-dark th {
    background-color: #343a40 !important;
    color: #ffc107 !important; 
}

.badge {
    font-weight: 500;
    font-size: 0.85rem;
}

.card-header h5 {
    font-size: 1.1rem;
}
</style>
@endsection
