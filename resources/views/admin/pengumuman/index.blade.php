@extends('admin.layouts.main')

@section('content')
<style>
    .pengumuman-page {
        padding: 24px 28px 50px;
    }

    .pengumuman-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 22px;
        flex-wrap: wrap;
    }

    .pengumuman-header h1 {
        font-size: 26px;
        font-weight: 800;
        color: #1a2233;
        margin: 0;
    }

    .pengumuman-header p {
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

    .pengumuman-card {
        background: #fff;
        border: 1px solid #e4e8ef;
        border-radius: 18px;
        box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
        overflow: hidden;
    }

    .pengumuman-card-top {
        padding: 18px 22px;
        border-bottom: 1px solid #edf1f5;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        flex-wrap: wrap;
    }

    .pengumuman-card-top h2 {
        margin: 0;
        font-size: 18px;
        font-weight: 800;
        color: #1a2233;
    }

    .pengumuman-card-top span {
        font-size: 13px;
        color: #7a8499;
    }

    .table-wrap {
        overflow-x: auto;
    }

    .pengumuman-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 760px;
    }

    .pengumuman-table thead th {
        background: #f8fafc;
        color: #526076;
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .4px;
        padding: 14px 16px;
        border-bottom: 1px solid #e8edf3;
        text-align: left;
    }

    .pengumuman-table tbody td {
        padding: 16px;
        border-bottom: 1px solid #eef2f6;
        color: #1a2233;
        font-size: 14px;
        vertical-align: middle;
    }

    .pengumuman-table tbody tr:hover {
        background: #fafcff;
    }

    .title-wrap {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .thumb {
        width: 54px;
        height: 54px;
        border-radius: 10px;
        object-fit: cover;
        border: 1px solid #e6ebf1;
        background: #f4f6f9;
        flex-shrink: 0;
    }

    .thumb-placeholder {
        width: 54px;
        height: 54px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eef8fd;
        color: #0d85b5;
        font-size: 20px;
        border: 1px solid #d7edf8;
        flex-shrink: 0;
    }

    .title-main {
        font-weight: 800;
        color: #1a2233;
        margin-bottom: 4px;
    }

    .title-sub {
        font-size: 12px;
        color: #7a8499;
    }

    .badge-status {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 6px 12px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 800;
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
        .pengumuman-page {
            padding: 18px 14px 40px;
        }

        .pengumuman-card-top {
            padding: 16px;
        }
    }
</style>

<div class="pengumuman-page">
    <div class="pengumuman-header">
        <div>
            <h1>Data Pengumuman</h1>
        </div>

        <a href="{{ route('pengumuman.create') }}" class="btn-add">
            + Tambah Pengumuman
        </a>
    </div>

    @if(session('success'))
        <div class="alert-success-custom">
            {{ session('success') }}
        </div>
    @endif

    <div class="pengumuman-card">
        <div class="pengumuman-card-top">
            <h2>Daftar Pengumuman</h2>
            <span>Total: {{ $pengumuman->count() }} data</span>
        </div>

        <div class="table-wrap">
            <table class="pengumuman-table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Tanggal Publish</th>
                        <th>Status</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengumuman as $item)
                        <tr>
                            <td>
                                <div class="title-wrap">
                                    @if($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="thumb">
                                    @else
                                        <div class="thumb-placeholder">📢</div>
                                    @endif

                                    <div>
                                        <div class="title-main">{{ $item->title }}</div>
                                        <div class="title-sub">
                                            {{ \Illuminate\Support\Str::limit($item->content, 60) }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $item->publish_date ?: '-' }}</td>
                            <td>
                                <span class="badge-status {{ $item->is_active ? 'active' : 'inactive' }}">
                                    {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td>
                                <div class="action-group">
                                    <a href="{{ route('pengumuman.edit', $item->id) }}" class="btn-edit">
                                        Edit
                                    </a>

                                    <form action="{{ route('pengumuman.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus pengumuman ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <div class="empty-state">
                                    <h3>Belum ada pengumuman</h3>
                                    <p>Tambahkan pengumuman baru agar informasi gereja bisa tampil di halaman user.</p>
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