@extends('layouts.app')
<style>
    .create-form-container {
        width: 400px;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    .form-input {
        width: 100%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .radio-group {
        margin-top: 5px;
    }

    .error-message {
        color: red;
        margin-top: 5px;
    }

    .submit-button {
        text-align: center;
        margin-top: 20px;
    }

    .submit-button button {
        padding: 10px 20px;
        background-color: #1aa1ff;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
    }

    .header-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100px;
    }

    .header-container h1 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #333;
    }
</style>

@section('content')
    <div class="create-form-container">
        <div class="header-container">
            <h1 class="title is-2">New User</h1>
        </div>

        <form method="POST" action="/users">
            @csrf

            <div class="form-group">
                <label for="name"><strong>Name</strong></label>

                <div>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-input">

                    @error('name')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="email"><strong>Email</strong></label>

                <div>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-input">

                    @error('email')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="password"><strong>Password</strong></label>

                <div>
                    <input type="password" name="password" id="password" class="form-input">

                    @error('password')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="password_confirmation"><strong>Confirm Password</strong></label>

                <div>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-input">

                    @error('password_confirmation')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="role" class="col-md-4 col-form-label text-md-right">Account Type:</label>
                <div class="select col-md-6 @error('role') is-danger @enderror">
                    <select class="col-md-6" name="role"  id="role">
                        <option id="user" value="user"  {{ old('role') == 'user' ? "selected" : ''}}>Normal User</option>
                        <option id="admin" value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @if ($errors->has('role'))
                        <span class="text-danger">{{ $errors->first('role') }}</span>
                    @endif
                </div>
            </div>


            <div class="submit-button">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>

@endsection
