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

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        background: #f4f6f9;
        color: #1a2233;
        border: 1px solid #dbe2ea;
        padding: 10px 16px;
        border-radius: 10px;
        font-weight: 700;
        transition: .2s ease;
    }

    .btn-back:hover {
        background: #e9eef5;
        color: #1a2233;
    }

    .account-card {
        background: #fff;
        border: 1px solid #e4e8ef;
        border-radius: 18px;
        box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
        overflow: hidden;
    }

    .account-card-top {
        padding: 22px 24px;
        background: linear-gradient(135deg, #1da8e0, #0d85b5);
        color: #fff;
    }

    .account-card-top h2 {
        margin: 0;
        font-size: 20px;
        font-weight: 800;
    }

    .account-card-top p {
        margin: 8px 0 0;
        font-size: 13px;
        color: rgba(255,255,255,.88);
    }

    .account-card-body {
        padding: 24px;
    }

    .alert-danger-custom {
        background: #fff3f3;
        border: 1px solid #f3c7c7;
        color: #b42318;
        border-radius: 12px;
        padding: 14px 16px;
        margin-bottom: 20px;
    }

    .alert-danger-custom strong {
        display: block;
        margin-bottom: 6px;
    }

    .alert-danger-custom ul {
        margin: 0;
        padding-left: 18px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-bottom: 18px;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    .form-group label {
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .4px;
        color: #526076;
        text-transform: uppercase;
    }

    .form-control-custom,
    .form-select-custom {
        width: 100%;
        border: 1px solid #dbe2ea;
        background: #f8fafc;
        border-radius: 12px;
        padding: 12px 14px;
        font-size: 14px;
        color: #1a2233;
        outline: none;
        transition: .2s ease;
    }

    .form-control-custom:focus,
    .form-select-custom:focus {
        background: #fff;
        border-color: #1da8e0;
        box-shadow: 0 0 0 4px rgba(29, 168, 224, 0.12);
    }

    .form-help {
        font-size: 12px;
        color: #7a8499;
        margin-top: -2px;
    }

    .section-title {
        font-size: 15px;
        font-weight: 800;
        color: #1a2233;
        margin: 6px 0 16px;
        padding-bottom: 10px;
        border-bottom: 1px solid #edf1f5;
    }

    .action-row {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        margin-top: 12px;
        flex-wrap: wrap;
    }

    .btn-cancel {
        background: #f4f6f9;
        color: #1a2233;
        border: 1px solid #dbe2ea;
        text-decoration: none;
        padding: 11px 18px;
        border-radius: 10px;
        font-weight: 700;
        transition: .2s ease;
    }

    .btn-cancel:hover {
        background: #e9eef5;
        color: #1a2233;
    }

    .btn-save {
        border: none;
        background: linear-gradient(135deg, #1da8e0, #0d85b5);
        color: #fff;
        padding: 11px 20px;
        border-radius: 10px;
        font-weight: 800;
        transition: .2s ease;
        box-shadow: 0 8px 18px rgba(29, 168, 224, 0.22);
    }

    .btn-save:hover {
        transform: translateY(-1px);
        box-shadow: 0 12px 22px rgba(29, 168, 224, 0.28);
    }

    @media (max-width: 768px) {
        .account-page {
            padding: 18px 14px 40px;
        }

        .account-card-top,
        .account-card-body {
            padding: 18px;
        }

        .form-grid {
            grid-template-columns: 1fr;
            gap: 0;
        }

        .action-row {
            flex-direction: column;
        }

        .btn-cancel,
        .btn-save {
            width: 100%;
            text-align: center;
        }
    }
</style>

<div class="account-page">
    <div class="account-header">
        <div>
            <h1>Edit Akun</h1>
            <p>Perbarui data akun admin atau pelayan sesuai kebutuhan aksesnya.</p>
        </div>

        <a href="{{ route('accounts.index') }}" class="btn-back">
            ← Kembali
        </a>
    </div>

    <div class="account-card">
        <div class="account-card-top">
            <h2>Form Edit Akun</h2>
            <p>Ubah informasi akun, role, status, atau password bila diperlukan.</p>
        </div>

        <div class="account-card-body">
            @if ($errors->any())
                <div class="alert-danger-custom">
                    <strong>Terjadi kesalahan.</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('accounts.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="section-title">Informasi Dasar</div>

                <div class="form-grid">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control-custom"
                            value="{{ old('name', $user->name) }}"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input
                            type="text"
                            name="username"
                            class="form-control-custom"
                            value="{{ old('username', $user->username) }}"
                            required
                        >
                    </div>

                    <div class="form-group full">
                        <label>Email</label>
                        <input
                            type="email"
                            name="email"
                            class="form-control-custom"
                            value="{{ old('email', $user->email) }}"
                            required
                        >
                    </div>
                </div>

                <div class="section-title">Keamanan Akun</div>

                <div class="form-grid">
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input
                            type="password"
                            name="password"
                            class="form-control-custom"
                            placeholder="Kosongkan jika tidak diubah"
                        >
                        <div class="form-help">Isi hanya jika ingin mengganti password.</div>
                    </div>

                    <div class="form-group">
                        <label>Konfirmasi Password Baru</label>
                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control-custom"
                            placeholder="Ulangi password baru"
                        >
                    </div>
                </div>

                <div class="section-title">Hak Akses</div>

                <div class="form-grid">
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-select-custom" required>
                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="pelayan" {{ old('role', $user->role) == 'pelayan' ? 'selected' : '' }}>Pelayan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status Akun</label>
                        <select name="is_active" class="form-select-custom" required>
                            <option value="1" {{ old('is_active', $user->is_active) == 1 ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ old('is_active', $user->is_active) == 0 ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                    </div>
                </div>

                <div class="action-row">
                    <a href="{{ route('accounts.index') }}" class="btn-cancel">Batal</a>
                    <button type="submit" class="btn-save">Update Akun</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 