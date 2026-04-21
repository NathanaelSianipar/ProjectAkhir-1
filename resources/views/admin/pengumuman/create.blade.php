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

    .pengumuman-card {
        background: #fff;
        border: 1px solid #e4e8ef;
        border-radius: 18px;
        box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
        overflow: hidden;
    }

    .pengumuman-card-top {
        padding: 22px 24px;
        background: linear-gradient(135deg, #1da8e0, #0d85b5);
        color: #fff;
    }

    .pengumuman-card-top h2 {
        margin: 0;
        font-size: 20px;
        font-weight: 800;
    }

    .pengumuman-card-top p {
        margin: 8px 0 0;
        font-size: 13px;
        color: rgba(255,255,255,.88);
    }

    .pengumuman-card-body {
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
    .form-select-custom,
    .form-textarea-custom {
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

    .form-textarea-custom {
        min-height: 150px;
        resize: vertical;
    }

    .form-control-custom:focus,
    .form-select-custom:focus,
    .form-textarea-custom:focus {
        background: #fff;
        border-color: #1da8e0;
        box-shadow: 0 0 0 4px rgba(29, 168, 224, 0.12);
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
        .pengumuman-page {
            padding: 18px 14px 40px;
        }

        .pengumuman-card-top,
        .pengumuman-card-body {
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

<div class="pengumuman-page">
    <div class="pengumuman-header">
        <div>
            <h1>Tambah Pengumuman</h1>
        </div>

        <a href="{{ route('pengumuman.index') }}" class="btn-back">
            ← Kembali
        </a>
    </div>

    <div class="pengumuman-card">
        <div class="pengumuman-card-top">
            <h2>Form Tambah Pengumuman</h2>
            <p>Isi judul, isi pengumuman, tanggal, gambar, dan status publikasi.</p>
        </div>

        <div class="pengumuman-card-body">
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

            <form action="{{ route('pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-grid">
                    <div class="form-group full">
                        <label>Judul Pengumuman</label>
                        <input type="text" name="title" class="form-control-custom" value="{{ old('title') }}" required>
                    </div>

                    <div class="form-group full">
                        <label>Isi Pengumuman</label>
                        <textarea name="content" class="form-textarea-custom" required>{{ old('content') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Publish</label>
                        <input type="date" name="publish_date" class="form-control-custom" value="{{ old('publish_date') }}">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="is_active" class="form-select-custom" required>
                            <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                    </div>

                    <div class="form-group full">
                        <label>Gambar Pengumuman</label>
                        <input type="file" name="image" class="form-control-custom">
                    </div>
                </div>

                <div class="action-row">
                    <a href="{{ route('pengumuman.index') }}" class="btn-cancel">Batal</a>
                    <button type="submit" class="btn-save">Simpan Pengumuman</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection