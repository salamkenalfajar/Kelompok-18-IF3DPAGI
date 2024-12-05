<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Login</title>
    <style>
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
    <div class="h-screen w-full bg-gray-100 flex justify-center items-center">
        <div class=" flex-col bg-white w-7/12 h-[35rem] flex justify-center shadow-2xl relative">
            <!-- Navbar yang sudah diperbaiki -->

            <div class="absolute w-full top-4 left-4 z-50">
                <ul class="flex items-center gap-2">
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
            <div class="w-full h-full flex justify-between">
                <div class="h-full flex items-center justify-start gap-4 w-full px-4 md:px-0 mx-auto">
                    <form method="POST" action="{{ route('login') }}" class="gap-4 flex flex-col xl:pl-20">
                        @csrf
                        <label class="text-center text-3xl font-semibold text-color-coklat1 underline underline-offset-8">Login</label>

                        @if ($errors->has('loginError'))
                        <div class="text-red-500 text-center">{{ $errors->first('loginError') }}</div>
                        @endif

                        <label class="input input-bordered flex items-center gap-4 w-38">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-4 w-4 opacity-70">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                            </svg>
                            <input type="text" name="username" class="grow w-full" placeholder="Username" required />
                        </label>

                        <label class="input input-bordered flex items-center gap-4 w-38">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-4 w-4 opacity-70">
                                <path fill-rule="evenodd" d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z" clip-rule="evenodd" />
                            </svg>
                            <input type="password" name="password" class="grow w-full" placeholder="Password" required />
                        </label>

                        
                        <button type="submit" class="btn bg-color-coklat1 text-white w-full md:w-[250px] ">Login</button>
                    </form>
                </div>



                <img class="object-contain xl:block hidden" width="447.7" src="{{ asset('Icon/elipse.svg') }}" alt="Elipse">

            </div>

        </div>
    </div>
</body>

</html>