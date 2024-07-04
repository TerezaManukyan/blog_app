@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="mb-4">
            <ul class="bg-red-200 border border-red-600 text-red-800 px-4 py-3 rounded relative">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div style="max-width: 400px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h2 style="text-align: center; margin-bottom: 20px;">Register</h2>

        <form method="POST" action="{{ route('register') }}" style="display: flex; flex-direction: column;">
            @csrf

            <div style="margin-bottom: 15px;">
                <label for="name" style="font-weight: bold;">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}"  autofocus style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="email" style="font-weight: bold;">Email</label>
                <input id="email" type="text" name="email" value="{{ old('email') }}"  style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="password" style="font-weight: bold;">Password</label>
                <input id="password" type="password" name="password"  autocomplete="new-password" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="password_confirmation" style="font-weight: bold;">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation"  autocomplete="new-password" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px;">
            </div>

            <div>
                <button type="submit" style="background-color: #28a745; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">Register</button>
            </div>
        </form>
    </div>
@endsection
