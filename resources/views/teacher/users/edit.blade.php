@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit User</h2>
    <form action="{{ route('teacher.users.update', $user) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select name="role" class="form-select" required>
                <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Guru</option>
                <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Siswa</option>
            </select>
        </div>

        <a href="{{ route('teacher.users.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
