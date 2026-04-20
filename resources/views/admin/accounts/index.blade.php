@extends('admin.layouts.main')

@section('content')
<style>
    .account-page {
        padding: 24px 28px 50px;
    }

    .account-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 22px;
        flex-wrap: wrap;
    }

    .account-header h1 {
        font-size: 26px;
        font-weight: 800;
        color: #1a2233;
        margin: 0;
    }

    .account-header p {
        margin: 6px 0 0;
        color: #7a8499;
        font-size: 14px;
    }

    .btn-add {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        background: linear-gradient(135deg, #1da8e0, #0d85b5);
        color: #fff;
        border: none;
        padding: 11px 18px;
        border-radius: 10px;
        font-weight: 800;
        box-shadow: 0 8px 18px rgba(29, 168, 224, 0.22);
        transition: .2s ease;
    }

    .btn-add:hover {
        color: #fff;
        transform: translateY(-1px);
        box-shadow: 0 12px 22px rgba(29, 168, 224, 0.28);
    }

    .alert-success-custom {
        background: #edfdf3;
        border: 1px solid #b7ebc6;
        color: #0f7a36;
        border-radius: 12px;
        padding: 14px 16px;
        margin-bottom: 18px;
    }

    .account-card {
        background: #fff;
        border: 1px solid #e4e8ef;
        border-radius: 18px;
        box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
        overflow: hidden;
    }

    .account-card-top {
        padding: 18px 22px;
        border-bottom: 1px solid #edf1f5;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        flex-wrap: wrap;
    }

    .account-card-top h2 {
        margin: 0;
        font-size: 18px;
        font-weight: 800;
        color: #1a2233;
    }

    .account-card-top span {
        font-size: 13px;
        color: #7a8499;
    }

    .table-wrap {
        overflow-x: auto;
    }

    .account-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 760px;
    }

    .account-table thead th {
        background: #f8fafc;
        color: #526076;
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .4px;
        padding: 14px 16px;
        border-bottom: 1px solid #e8edf3;
    }

    .account-table tbody td {
        padding: 16px;
        border-bottom: 1px solid #eef2f6;
        color: #1a2233;
        font-size: 14px;
        vertical-align: middle;
    }

    .account-table tbody tr:hover {
        background: #fafcff;
    }

    .user-name {
        font-weight: 800;
        color: #1a2233;
    }

    .user-username {
        font-size: 12px;
        color: #7a8499;
        margin-top: 4px;
    }

    .badge-role,
    .badge-status {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 6px 12px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 800;
    }

    .badge-role.admin {
        background: #e8f6fd;
        color: #0d85b5;
    }

    .badge-role.pelayan {
        background: #f3f0ff;
        color: #7c3aed;
    }

    .badge-status.active {
        background: #edfdf3;
        color: #0f7a36;
    }

    .badge-status.inactive {
        background: #fff3f3;
        color: #b42318;
    }

    .action-group {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .btn-edit,
    .btn-delete {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 12px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 800;
        text-decoration: none;
        border: 1px solid transparent;
        transition: .2s ease;
    }

    .btn-edit {
        background: #eef8fd;
        color: #0d85b5;
        border-color: #cdeaf7;
    }

    .btn-edit:hover {
        background: #dff2fb;
        color: #0a6d94;
    }

    .btn-delete {
        background: #fff3f3;
        color: #d92d20;
        border-color: #f7d4d1;
    }

    .btn-delete:hover {
        background: #ffe5e3;
        color: #b42318;
    }

    .empty-state {
        padding: 40px 24px;
        text-align: center;
        color: #7a8499;
    }

    .empty-state h3 {
        font-size: 18px;
        color: #1a2233;
        margin-bottom: 8px;
    }

    @media (max-width: 768px) {
        .account-page {
            padding: 18px 14px 40px;
        }

        .account-card-top {
            padding: 16px;
        }
    }
</style>

<div class="account-page">
    <div class="account-header">
        <div>
            <h1>Manajemen Akun</h1>
            <p>Kelola akun admin dan pelayan yang memiliki akses ke dashboard.</p>
        </div>

        <a href="{{ route('accounts.create') }}" class="btn-add">
            + Tambah Akun
        </a>
    </div>

    @if(session('success'))
        <div class="alert-success-custom">
            {{ session('success') }}
        </div>
    @endif

    <div class="account-card">
        <div class="account-card-top">
            <h2>Daftar Akun</h2>
            <span>Total: {{ $users->count() }} akun</span>
        </div>

        <div class="table-wrap">
            <table class="account-table">
                <thead>
                    <tr>
                        <th>Pengguna</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>
                                <div class="user-name">{{ $user->name }}</div>
                                <div class="user-username">{{ '@' . $user->username }}</div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge-role {{ $user->role }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td>
                                <span class="badge-status {{ $user->is_active ? 'active' : 'inactive' }}">
                                    {{ $user->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td>
                                <div class="action-group">
                                    <a href="{{ route('accounts.edit', $user->id) }}" class="btn-edit">
                                        Edit
                                    </a>

                                    <form action="{{ route('accounts.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Hapus akun ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="empty-state">
                                    <h3>Belum ada akun</h3>
                                    <p>Tambahkan akun admin atau pelayan baru untuk mulai mengelola akses dashboard.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection