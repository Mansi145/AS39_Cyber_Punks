@extends('layouts.dashboard')
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('.mdb-select').materialSelect();
    });
</script>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <p class="h1 text-center">Edit User</p>
        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @method('PUT')
            @csrf
            <div class="md-form">
                <i class="fas fa-user prefix"></i>
                <input type="text" id="orangeForm-name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label for="orangeForm-name">Name</label>
            </div>
            <div class="md-form">
                <i class="fas fa-envelope prefix"></i>
                <input type="email" id="orangeForm-email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" readonly required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label for="orangeForm-email">Email</label>
            </div>

            <div class="md-form">
                <i class="fas fa-lock prefix"></i>
                <input type="password" id="orangeForm-pass" class="form-control @error('password') is-invalid @enderror" name="password" required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label for="orangeForm-pass">New Password</label>
            </div>

            <div class="md-form">
                <i class="fas fa-lock prefix"></i>
                <input type="password" id="orangeForm-pass-confirm" class="form-control" name="password_confirmation" required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label for="orangeForm-pass-confirm">Confirm Password</label>
            </div>

            <select class="mdb-select colorful-select dropdown-dark" name="user_type">
                <option value="" {{ $user->user_type == null ? ' selected' : ''}}>Select User Type</option>
                <option value="buyer" {{ $user->user_type == "buyer" ? ' selected' : ''}}>Buyer</option>
                <option value="seller" {{ $user->user_type == "seller" ? ' selected' : ''}}>Seller</option>
            </select>
            <label class="mdb-main-label">User Type</label>
            <div class="md-form">
                <input type="checkbox" class="form-check-input" id="materialUnchecked" name="super_admin">
                <label class="form-check-label" for="materialUnchecked">Super Admin</label>
            </div>

            <div class="text-center">
                <button class="btn btn-indigo btn-rounded mt-5">Update User</button>
            </div>
        </form>
    </div>
</div>

@endsection