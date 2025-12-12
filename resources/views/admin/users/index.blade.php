@extends('layouts.admin')
@section('title','Users')
@section('content')
<div class="header-card">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h2 class="fw-bold mb-0"><i class="bi bi-people"></i> Kelola Users</h2>
            <p class="text-muted mb-0">Daftar semua pengguna aplikasi</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th><i class="bi bi-person"></i> Nama</th>
                        <th><i class="bi bi-envelope"></i> Email</th>
                        <th><i class="bi bi-telephone"></i> Telepon</th>
                        <th><i class="bi bi-shield"></i> Role</th>
                        <th><i class="bi bi-calendar"></i> Bergabung</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($users ?? [] as $u)
                    <tr>
                        <td><strong>#{{ $u->id }}</strong></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" 
                                     style="width: 35px; height: 35px; font-weight: bold;">
                                    {{ substr($u->name, 0, 1) }}
                                </div>
                                <div class="ms-2">
                                    <div class="fw-bold">{{ $u->name }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->phone ?? '-' }}</td>
                        <td>
                            @if($u->role == 'admin')
                                <span class="badge bg-danger"><i class="bi bi-shield-fill"></i> Admin</span>
                            @else
                                <span class="badge bg-primary"><i class="bi bi-person"></i> User</span>
                            @endif
                        </td>
                        <td>{{ $u->created_at ? $u->created_at->format('d M Y') : '-' }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#detailModal{{ $u->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <a href="{{ route('admin.users.edit', $u->id) }}" class="btn btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Modal Detail -->
                    <div class="modal fade" id="detailModal{{ $u->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title"><i class="bi bi-person-circle"></i> Detail User</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th width="120">Nama:</th>
                                            <td>{{ $u->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email:</th>
                                            <td>{{ $u->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Telepon:</th>
                                            <td>{{ $u->phone ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Role:</th>
                                            <td>{{ ucfirst($u->role) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Bergabung:</th>
                                            <td>{{ $u->created_at ? $u->created_at->format('d M Y H:i') : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Total Booking:</th>
                                            <td><strong>{{ $u->bookings ? $u->bookings->count() : 0 }}</strong></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <i class="bi bi-inbox display-1 text-muted"></i>
                            <p class="mt-3 text-muted">Belum ada user.</p>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        
        @if(isset($users) && $users->hasPages())
        <div class="mt-3">
            {{ $users->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
