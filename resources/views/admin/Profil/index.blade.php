@extends('admin.layouts.main')

@push('styles')
<style>
  :root {
    --bg:        #f4f6f9;
    --white:     #ffffff;
    --border:    #e4e8ef;
    --text:      #1a2233;
    --muted:     #7a8499;
    --muted2:    #a0aab8;
    --cyan:      #1da8e0;
    --cyan-dk:   #0d85b5;
    --cyan-lt:   #e8f6fd;
    --gold:      #c89b3c;
    --gold-lt:   #fdf6e3;
    --danger:    #e05555;
    --danger-lt: #fdf0f0;
    --success:   #2ea86a;
    --success-lt:#e8f7ef;
  }

  .page-head { display:flex; align-items:center; justify-content:space-between; padding:24px 32px 0; }
  .page-head h1 { font-family:'Rajdhani',sans-serif; font-size:20px; font-weight:700; }
  .breadcrumb { display:flex; align-items:center; gap:6px; font-size:12px; color:var(--muted); }
  .breadcrumb a { color:var(--cyan); text-decoration:none; }
  .content { padding:20px 32px 60px; }

  @keyframes fadeUp { from{opacity:0;transform:translateY(16px)} to{opacity:1;transform:translateY(0)} }

  .profile-wrap {
    max-width: 600px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    gap: 16px;
  }

  .avatar-card {
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 36px 28px 28px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    box-shadow: 0 1px 6px rgba(0,0,0,.05);
    animation: fadeUp .3s ease both;
    position: relative;
  }

  .avatar-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--cyan), var(--gold));
    border-radius: 16px 16px 0 0;
  }

  .ava-circle {
    width: 96px; height: 96px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--gold), var(--cyan));
    display: flex; align-items: center; justify-content: center;
    font-family: 'Rajdhani', sans-serif;
    font-size: 32px; font-weight: 700; color: #fff;
    position: relative;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(29,168,224,.25);
    flex-shrink: 0;
  }

  .ava-circle img {
    width: 100%; height: 100%;
    object-fit: cover;
    position: absolute; inset: 0;
  }

  .ava-hint { font-size: 11px; color: var(--muted2); margin-top: 8px; }

  .profile-name-display {
    font-family: 'Rajdhani', sans-serif;
    font-size: 22px; font-weight: 700;
    color: var(--text); margin-top: 14px;
  }

  .profile-role-display {
    display: inline-flex; align-items: center; gap: 5px;
    background: var(--cyan-lt); color: var(--cyan);
    font-size: 11px; font-weight: 700;
    padding: 3px 12px; border-radius: 20px;
    border: 1px solid rgba(29,168,224,.22);
    margin-top: 6px;
  }

  .profile-joined {
    font-size: 12px; color: var(--muted2);
    margin-top: 8px;
  }

  .data-card {
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 1px 6px rgba(0,0,0,.05);
    animation: fadeUp .35s ease both;
  }

  .card-header {
    display: flex; align-items: center; justify-content: space-between;
    padding: 16px 20px;
    border-bottom: 1px solid var(--border);
  }

  .card-header-left {
    display: flex; align-items: center; gap: 8px;
    font-family: 'Rajdhani', sans-serif;
    font-size: 14px; font-weight: 700; color: var(--text);
  }

  .card-header-left .ch-ico {
    width: 28px; height: 28px; border-radius: 7px;
    background: var(--cyan-lt);
    display: flex; align-items: center; justify-content: center;
    font-size: 13px;
  }

  .edit-toggle {
    background: none; border: 1px solid var(--border);
    color: var(--muted); font-family: 'Nunito', sans-serif;
    font-size: 12px; font-weight: 700;
    padding: 5px 13px; border-radius: 7px;
    cursor: pointer; transition: all .15s;
    display: inline-flex; align-items: center; gap: 5px;
    text-decoration: none;
  }

  .edit-toggle:hover { border-color: var(--cyan); color: var(--cyan); background: var(--cyan-lt); }

  .field-row {
    display: grid;
    grid-template-columns: 140px 1fr;
    align-items: center;
    padding: 13px 20px;
    border-bottom: 1px solid var(--border);
    gap: 12px;
    transition: background .15s;
  }

  .field-row:last-child { border-bottom: none; }
  .field-row:hover { background: #fafbfc; }

  .field-label {
    font-size: 12px; font-weight: 700;
    color: var(--muted); letter-spacing: .3px;
  }

  .field-value {
    font-size: 13.5px; color: var(--text); font-weight: 600;
    line-height: 1.4;
  }

  .field-value.empty {
    color: var(--muted2);
    font-style: italic;
    font-weight: 400;
  }

  @media(max-width:900px){
    .content{padding:16px 16px 60px;}
    .field-row{grid-template-columns:110px 1fr;}
  }
</style>
@endpush

@section('content')
<div class="page-head">
  <h1>Profil Saya</h1>
  <div class="breadcrumb"><a href="{{ route('welcome') }}">Home</a> / <span>Profil</span></div>
</div>

<div class="content">
  <div class="profile-wrap">

    <div class="avatar-card">
      <div class="ava-circle">
        @if(!empty($user->foto))
          <img src="{{ asset('storage/' . $user->foto) }}" alt="{{ $user->name }}">
        @else
          {{ strtoupper(substr($user->name ?? 'A', 0, 2)) }}
        @endif
      </div>

      <div class="ava-hint">Foto profil dikelola dari halaman edit profil</div>

      <div class="profile-name-display">
        {{ $user->name ?? '-' }}
      </div>

      <div class="profile-role-display">
        <span>●</span>
        <span>{{ $user->jabatan ?? 'Administrator' }}</span>
      </div>

      <div class="profile-joined">
        Bergabung sejak {{ $user->created_at ? $user->created_at->format('F Y') : '-' }}
      </div>
    </div>

    <div class="data-card">
      <div class="card-header">
        <div class="card-header-left">
          <div class="ch-ico">👤</div>
          Data Pribadi
        </div>
        <a href="{{ route('profil.edit') }}" class="edit-toggle">✏ Edit</a>
      </div>

      <div class="field-row">
        <div class="field-label">Nama Lengkap</div>
        <div class="field-value {{ empty($user->name) ? 'empty' : '' }}">
          {{ $user->name ?: 'Belum diisi' }}
        </div>
      </div>

      <div class="field-row">
        <div class="field-label">Username</div>
        <div class="field-value {{ empty($user->username) ? 'empty' : '' }}">
          {{ $user->username ?: 'Belum diisi' }}
        </div>
      </div>

      <div class="field-row">
        <div class="field-label">Jabatan</div>
        <div class="field-value {{ empty($user->jabatan) ? 'empty' : '' }}">
          {{ $user->jabatan ?: 'Belum diisi' }}
        </div>
      </div>

      <div class="field-row">
        <div class="field-label">Email</div>
        <div class="field-value {{ empty($user->email) ? 'empty' : '' }}">
          {{ $user->email ?: 'Belum diisi' }}
        </div>
      </div>

      <div class="field-row">
        <div class="field-label">Telepon</div>
        <div class="field-value {{ empty($user->phone) ? 'empty' : '' }}">
          {{ $user->phone ?: 'Belum diisi' }}
        </div>
      </div>

      <div class="field-row">
        <div class="field-label">Alamat</div>
        <div class="field-value {{ empty($user->alamat) ? 'empty' : '' }}">
          {{ $user->alamat ?: 'Belum diisi' }}
        </div>
      </div>
    </div>

  </div>
</div>
@endsection