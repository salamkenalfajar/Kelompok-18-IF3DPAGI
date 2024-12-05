<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Register</title>
    <style>
        .bg-login {
            background-image: url('/gambar/bglogin.jpg');
            background-size: cover;
        }
        .nav-link {
            cursor: pointer;
            padding: 0.5rem;
            transition: all 0.2s;
        }
        .nav-link:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <div class="h-screen bg-login w-screen flex justify-center items-center">
        <div class="bg-white w-7/12 h-[35rem] flex justify-center shadow-lg relative">
            <!-- Navbar yang sudah diperbaiki -->
            <div class="absolute w-7/12 top-4 left-4 z-50">
                <ul class="flex items-center gap-8">
                    <li>
                        <img width="30" src="{{ asset('Icon/image 3.svg') }}" alt="Logo" class="object-contain">
                    </li>
                    <li>
                        <a href="/" class="nav-link text-gray-600">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('/login') }}" class="nav-link text-gray-600">Login</a>
                    </li>
                    <li>
                        <a href="{{ url('/register') }}" class="nav-link text-gray-600">Daftar</a>
                    </li>
                </ul>
            </div>

            <form method="POST" action="{{ route('register') }}" class="flex flex-col justify-center -translate-x-64 gap-4">
                @csrf
                <label class="text-center text-3xl font-semibold text-color-coklat1 underline underline-offset-8">Daftar</label>

                @if ($errors->any())
                    <div class="text-red-500 text-center">
                        {{ implode(', ', $errors->all()) }}
                    </div>
                @endif

                <!-- Username Input -->
                <label class="input input-bordered flex items-center gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-4 w-4 opacity-70">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                    </svg>
                    <input type="text" name="username" class="grow" placeholder="Username" value="{{ old('username') }}" required />
                </label>
                @error('username')
                    <span class="text-red-500 text-center text-sm">{{ $message }}</span>
                @enderror

                <!-- Email Input -->
                <label class="input input-bordered flex items-center gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-4 w-4 opacity-70">
                        <path d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                        <path d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                    </svg>
                    <input type="email" name="email" class="grow" placeholder="Email" value="{{ old('email') }}" required />
                </label>
                @error('email')
                    <span class="text-red-500 text-center text-sm">{{ $message }}</span>
                @enderror

                <!-- Password Input -->
                <label class="input input-bordered flex items-center gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-4 w-4 opacity-70">
                        <path fill-rule="evenodd" d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z" clip-rule="evenodd" />
                    </svg>
                    <input type="password" name="password" class="grow" placeholder="Password" required />
                </label>
                @error('password')
                    <span class="text-red-500 text-center text-sm">{{ $message }}</span>
                @enderror

                <!-- Submit Button -->
                <button type="submit" class="btn btn-wide bg-color-coklat1 text-white gap-4">Daftar</button>
            </form>

            <img class="object-contain translate-x-[21rem] absolute" width="447.7" src="{{ asset('Icon/elipse.svg') }}" alt="Elipse">
        </div>
    </div>
</body>
</html>