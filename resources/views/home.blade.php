<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Home</title>
    <style>
        @import url(https://pro.fontawesome.com/releases/v5.10.0/css/all.css);
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;800&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }

        .hover\:w-full:hover {
            width: 100%;
        }

        .group:hover .group-hover\:w-full {
            width: 100%;
        }

        .group:hover .group-hover\:inline-block {
            display: inline-block;
        }

        .group:hover .group-hover\:flex-grow {
            flex-grow: 1;
        }

        @keyframes word {
            0% {
                transform: translateY(100%);
            }

            15% {
                transform: translateY(-10%);
                animation-timing-function: ease-out;
            }

            20% {
                transform: translateY(0);
            }

            40%,
            100% {
                transform: translateY(-110%);
            }
        }

        .animate-word {
            animation: word 7s infinite;
        }

        .animate-word-delay-1 {
            animation: word 7s infinite;
            animation-delay: -1.4s;
        }

        .animate-word-delay-2 {
            animation: word 7s infinite;
            animation-delay: -2.8s;
        }

        .animate-word-delay-3 {
            animation: word 7s infinite;
            animation-delay: -4.2s;
        }

        .animate-word-delay-4 {
            animation: word 7s infinite;
            animation-delay: -5.6s;
        }
    </style>
</head>
<div class="h-screen w-screen flex justify-end items-center">
    <!-- Navbar -->
    <div class="w-full max-w-md mx-auto">
        <div class="px-7 bg-white rounded-2xl mb-5 translate-x-[1rem] -translate-y-[23rem]">
            <div class="flex">
                <div class="flex-auto hover:w-full group">
                    <a href="#" class="flex items-center justify-center text-center mx-auto px-4 py-2 group-hover:w-full text-color-coklat1">
                        <span class="block px-1 py-1 group-hover:bg-color-coklat3 rounded-full group-hover:flex-grow">
                            <i class="far fa-home text-2xl pt-1"></i><span class="hidden group-hover:inline-block ml-3 align-bottom pb-1">Home</span>
                        </span>
                    </a>
                </div>
                <div class="flex-auto hover:w-full group">
                    <a href="#" class="flex items-center justify-center text-center mx-auto px-4 py-2 group-hover:w-full text-color-coklat1">
                        <span class="block px-1 py-1 group-hover:bg-color-coklat3 rounded-full group-hover:flex-grow">
                            <i class="far fa-phone text-2xl pt-1"></i><span class="hidden group-hover:inline-block ml-3 align-bottom pb-1">Contact us</span>
                        </span>
                    </a>
                </div>
                <div class="flex-auto hover:w-full group">
                    <a href="#" class="flex items-center justify-center text-center mx-auto px-4 py-2 group-hover:w-full text-color-coklat1">
                        <span class="block px-1 py-1 group-hover:bg-color-coklat3 rounded-full group-hover:flex-grow">
                            <i class="far fa-user text-2xl pt-1"></i><span class="hidden group-hover:inline-block ml-3 align-bottom pb-1">Login</span>
                        </span>
                    </a>
                </div>
                <div class="flex-auto hover:w-full group">
                    <a href="#" class="flex items-center justify-center text-center mx-auto px-4 py-2 group-hover:w-full text-color-coklat1">
                        <span class="block px-1 py-1 group-hover:bg-color-coklat3 rounded-full group-hover:flex-grow">
                            <i class="far fa-sign-in text-2xl pt-1"></i><span class="hidden group-hover:inline-block ml-3 align-bottom pb-1">Sign in</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--Kata kata -->
    <div class="flex h-80 items-center justify-center font-bold text-black -translate-x-[28rem]">
        <div class=" text-center space-y-12">
            <div class="text-center text-5xl font-bold">
                Website Ini Menyediakan
                <div class="relative inline-grid grid-cols-1 grid-rows-1 gap-12 overflow-hidden">
                    <span class="animate-word col-span-full row-span-full">Deteksi Tanaman</span>
                    <span class="animate-word-delay-1 col-span-full row-span-full">Informasi Hama</span>
                    <span class="animate-word-delay-2 col-span-full row-span-full">Informasi Tanaman</span>
                </div>
            </div>
            <p class=" text-black">
                Ingin Mengetahui Gejala Tanaman Anda? <a class="underline" href="login">klik disini</a>
            </p>
        </div>
    </div>
    <!-- Gambar -->
    <img class="object-contain " width="695" src="{{ asset('Icon/home.svg') }}">
</div>

</html>