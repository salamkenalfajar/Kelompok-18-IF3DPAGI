<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <!-- Page content here -->
  <div class=" flex-1 p-3 ">
    <div class="flex items-center justify-between mb-8 gap-8">
      <div class="flex gap-2 items-center justify-center">
        <a class="btn btn-ghost" href="pricing">
          <h1 class="text-2xl font-semibold ml-5">Membership</h1>
          <img class="w-7 h-9 " src="{{ asset('Icon/membership.svg') }}">
        </a>
      </div>
      <!-- Input Pencarian -->
      <div class="mb-4 mt-6">
        <form action="{{ route('informasihama.index') }}" method="GET" class="flex items-center p-2 bg-white border rounded-xl">
          <div class="relative flex-grow">
            <svg class="absolute top-1/2 left-3 transform -translate-y-1/2 w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
            </svg>
            <input type="text" name="cari" value="{{ $pencarian ?? '' }}" placeholder="Cari Informasi Hama"
              class="w-full p-2 pl-10 outline-none rounded-l-xl" />
          </div>
          <button type="submit"
            class="p-2 bg-color-coklat2 text-white rounded-r-xl hover:bg-color-coklat1 transition duration-300">
            Search
          </button>
        </form>
      </div>
    </div>
    <div class="grid grid-cols-1 xl:grid-cols-4 xl:gap-8 gap-56 h-2/3">
      @if ($hamaa->isEmpty())
      <div class="flex justify-center items-center h-64">
        <p class="text-center text-lg font-medium">Informasi Hama tidak ditemukan.</p>
      </div>
      @else
      @foreach ($hamaa as $hama)


      <!-- Card 1 -->
      <a class="btn btn-ghost hover:bg-transparent" onclick="document.getElementById('my_modal_hama{{ $hama->Nama }}').showModal();">
        <div class="relative overflow-hidden rounded-lg shadow-lg w-full xl:h-[255px]">
          <img src="{{ asset('uploads/' . $hama->Gambar) }}" alt="Serangga Padi" class="w-full h-64 object-cover">
          <div class="absolute bottom-0 w-full bg-black bg-opacity-50 text-white text-center py-2">
            {{$hama->Nama}}
          </div>
        </div>
      </a>
      <dialog id="my_modal_hama{{$hama->Nama}}" class="modal">
        <div class="max-h-[50rem] overflow-y-hidden bg-transparent border-2 rounded-3xl w-80 xl:w-full xl:max-w-2xl">
          <img class="w-full max-h-96 max-w-2xl object-cover" src="{{ asset('uploads/' . $hama->Gambar) }}">
          <div class="bg-white px-5 w-80 xl:w-full xl:overflow-y-auto overflow-y-auto h-96">
            <p class="text-left font-bold 2xl py-2">Deskripsi</p> 
            <p class="text-left text-xl">{{$hama->Deskripsi}}</p>
            <p class="text-left font-bold 2xl py-2 ">Klasifikasi Atau Jenis</p>
            <p class="text-left text-xl">{{$hama->Klasifikasi}}</p>
            <p class="text-left font-bold 2xl py-2">Penanganan</p>
            <p class="text-left text-xl">{{$hama->Deskripsi}}</p>
            <div class="modal-action py-5">
              <form method="dialog">
                <!-- if there is a button, it will close the modal -->
                <button class="btn">Close</button>
              </form>
            </div>
          </div>

        </div>
      </dialog>
      @endforeach
      @endif

    </div>
  </div>
  <!-- Drawer -->
  <div class="flex ">
    <input type="checkbox" id="drawer-toggle" class="relative sr-only peer" checked>
    <label for="drawer-toggle" class=" absolute top-0 left-0 inline-block p-4 transition-all duration-500 bg-color-coklat1 rounded-lg peer-checked:rotate-180 peer-checked:left-52 xl:peer-checked:left-64">
      <div class="w-6 h-1 mb-3 -rotate-45 bg-white rounded-lg"></div>
      <div class="w-6 h-1 rotate-45 bg-white rounded-lg"></div>


    </label>
    <div class="fixed top-0 left-0 z-20 w-52 xl:w-64 h-full transition-all duration-500 transform -translate-x-full bg-color-coklat1 shadow-lg peer-checked:translate-x-0">
      <div class="px-6 py-4">
        <div class="flex gap-2 text-left">
          <img class="w-8 h-8 col-span-1" src="{{ asset('Icon/image 3.svg') }}" alt="Logo">
          <h2 class="text-2xl font-semibold text-white">Gaichu</h2>
        </div>
        <div class="grid pt-10 gap-4 text-white text-2xl">
          <div class="flex gap-4 mb-8">
            <img src="{{ asset('Icon/icondeteksi.svg') }}" alt="Deteksi Icon" class="#">
            <p>Deteksi Tanaman</p>
          </div>
          <div class="flex gap-4 mb-8">
            <img src="{{ asset('Icon/icontanaman.svg') }}" alt="Deteksi Icon" class="#">
            <p>Informasi Tanaman</p>
          </div>
          <div class="flex gap-4 mb-8">
            <img src="{{ asset('Icon/iconhama.svg') }}" alt="Deteksi Icon" class="#">
            <p>Informasi Hama</p>
          </div>
        </div>
        <div class="p-4 translate-y-[35rem]">
          <div class="dropdown dropdown-top mt-auto text-black">
            <div class="avatar pt-4">
              <div class="w-14 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                <button>
                  <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" alt="User Avatar" />
                </button>
                <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box shadow w-52 p-2 z-10">
                  <li><a href="pricing">Membership</a></li>
                  <li><a href="#">Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>