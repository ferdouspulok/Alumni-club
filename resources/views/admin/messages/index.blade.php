@extends('layouts.admin')

@section('title', 'Contact Messages | Chatkhil Elite Club Limited')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="font-serif text-navy mb-0">Contact Inquiries & Feedback</h3>
            <span class="text-muted small">Submitted through public website contact form</span>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light small text-muted text-uppercase">
                    <tr>
                        <th>Sender Name</th>
                        <th>Subject</th>
                        <th>Mobile / Email</th>
                        <th>Date Received</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $msg)
                        <tr class="{{ !$msg->is_read ? 'table-warning fw-semibold' : '' }}">
                            <td>
                                <div class="font-serif fs-6 text-navy">{{ $msg->name }}</div>
                            </td>
                            <td>
                                <a href="{{ route('admin.messages.show', $msg) }}" class="text-navy text-decoration-none">
                                    {{ Str::limit($msg->subject, 45) }}
                                </a>
                            </td>
                            <td class="small">
                                <div>{{ $msg->phone }}</div>
                                <div class="text-muted">{{ $msg->email ?: 'N/A' }}</div>
                            </td>
                            <td class="small text-muted">{{ $msg->created_at->format('d M, Y h:i A') }}</td>
                            <td>
                                @if(!$msg->is_read)
                                    <span class="badge bg-warning text-dark">Unread</span>
                                @else
                                    <span class="badge bg-light text-muted border">Read</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.messages.show', $msg) }}" class="btn btn-sm btn-outline-primary" title="View Message">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form action="{{ route('admin.messages.destroy', $msg) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this message?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">No messages in inbox.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $messages->links('pagination::bootstrap-5') }}
    </div>

@endsection
