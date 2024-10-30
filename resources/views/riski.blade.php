<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>

<body>
  <div class="drawer lg:drawer-open">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col items-center justify-center">
      <!-- Page content here -->
      <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden">
        Open drawer
      </label>

      <div class=" flex items-center justify-center h-screen w-screen bg-white ">
        <div class="max-w-[1098px] mx-auto rounded-lg overflow-hidden ">
          <div class="md:flex">
            <div class="w-full p-3">
              <div class="relative border-dashed h-[600px] w-[900px] rounded-lg border-dashed border-4 border-color-biru1 bg-color-biru2 flex justify-center items-center">

                <div class="absolute">

                  <div class="flex flex-col items-center flex">
                    <img src="{{ asset('gambar/gambardeteksi.png') }}">
                    <span class="block text-gray-400 font-normal">Drop your files here or
                      <button class="text-color-biru1">Browse</button></span>
                  </div>
                </div>

                <input type="file" class="h-full w-full opacity-0" name="">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-color-coklat1 drawer-side h-screen ">
      <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
      <ul class="menu text-base-content text-white w-80 p-4">

        <!-- Sidebar content here -->
        <div class="flex justify-between items-center pb-14">
          <div class="flex items-center gap-x-2">
            <img class="w-6 h-6 " src="{{ asset('Icon/image 3.svg') }}">
            <h1 class="text-white text-2xl font-semibold"> Gaichu </h1>
          </div>
          <button @click="isSidebarOpen = false"><img class="w-5 h-5" src="{{ asset('Icon/Vector.svg') }}"></button>
        </div>
        <li class="text-white text-3xl">
          <a href="informasihama" class="font-light"><img class="w-7 h-7" src="{{ asset('Icon/iconhama.svg') }}">Hama</a>
        </li>
        <li class="pt-9 text-white text-3xl">
          <a href="informasitanaman" class="font-light"><img class="w-7 h-7" src="{{ asset('Icon/icontanaman.svg') }}">Tanaman</a>
        </li>
        <li class="pt-9 text-white text-3xl">
          <a class="font-light"><img class="w-7 h-7" src="{{ asset('Icon/icondeteksi.svg') }}">Deteksi</a>
        </li>
      </ul>
      <div class="avatar pl-4 pb-4 fixed bottom-0">
        <div class="ring-primary ring-offset-base-100 w-14 rounded-full ring ring-offset-2">
          <button><img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" /></button>
        </div>
      </div>

    </div>
  </div>
</body>

</html>