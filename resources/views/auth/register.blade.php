<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>DevScribe - Register</title>
</head>

<body class="bg-slate-900">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-slate-800 p-8 rounded-lg shadow-lg w-full max-w-md">
            <p class="text-white text-2xl font-mono mb-5">&lt;DevScribe /&gt;</p>
            <h2 class="text-2xl font-bold text-white mb-6">Create Account</h2>
            <form action="{{ Route('register') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="username" class="block text-gray-300 mb-2">Username</label>
                    <input type="text" id="username" name="username"
                        class="w-full px-3 py-2 bg-slate-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('username') }}"
                        required>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-300 mb-2">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full px-3 py-2 bg-slate-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-gray-300 mb-2">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="w-full px-3 py-2 bg-slate-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-400 transition duration-300">Register</button>

                @if ($errors->any())
                    <div class="text-red-500 mt-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-sm">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
            <p class="text-gray-400 text-center mt-4">
                Already have an account? <a href="{{ Route('show.login') }}" class="text-blue-400 hover:underline">Login</a>
            </p>
        </div>
    </div>
</body>

</html>