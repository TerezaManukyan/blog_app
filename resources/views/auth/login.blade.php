@extends('layouts.app')

@section('content')
    @if (session('successMessage'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('successMessage') }}
        </div>
    @endif

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
        <h2 style="text-align: center; margin-bottom: 20px;">Login</h2>

        <form method="POST" action="{{ route('login') }}" style="display: flex; flex-direction: column;">
            @csrf

            <div style="margin-bottom: 15px;">
                <label for="email" style="font-weight: bold;">Email</label>
                <input id="email" type="text" name="email" value="{{ old('email') }}"  autofocus style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="password" style="font-weight: bold;">Password</label>
                <input id="password" type="password" name="password"  autocomplete="current-password" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px;">
            </div>

            <div>
                <button type="submit" style="background-color: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">Login</button>
            </div>
        </form>
    </div>
@endsection


