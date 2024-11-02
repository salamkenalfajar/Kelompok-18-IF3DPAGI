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
      <div class=" flex-1 p-3 ">
        <div class="flex items-center justify-between mb-8 pr-5 pl-1">
          <div class="flex gap-2 items-center justify-center">
            <a class="btn btn-ghost">
              <h1 class="text-2xl font-semibold">Membership</h1>
              <img class="w-7 h-7 " src="{{ asset('Icon/membership.svg') }}">
            </a>
          </div>
          <input type="text" placeholder="search" class="p-2 border rounded-xl shadow-2xl">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 h-2/3">
          <!-- Card 1 -->
          <a class="btn btn-ghost hover:bg-transparent" onclick="my_modal_1.showModal()">
            <div class="relative overflow-hidden rounded-lg shadow-lg">
              <img src="{{ asset('gambar/serangga padi 1.png') }}" alt="Serangga Padi" class="w-screen h-64 object-cover">
              <div class="absolute bottom-0 w-full bg-black bg-opacity-50 text-white text-center py-2">
                Serangga Padi
              </div>
            </div>
          </a>
          <!-- Card 2 -->
          <a class="btn btn-ghost hover:bg-transparent">
            <div class="relative overflow-hidden rounded-lg shadow-lg">
              <img src="https://via.placeholder.com/300x200" alt="Hama Bambu" class="w-screen h-64 object-cover">
              <div class="absolute bottom-0 w-full bg-black bg-opacity-50 text-white text-center py-2">
                Hama Bambu
              </div>
            </div>
          </a>

          <!-- Card 3 -->
          <a class="btn btn-ghost hover:bg-transparent">
            <div class="relative overflow-hidden rounded-lg shadow-lg">
              <img src="https://via.placeholder.com/300x200" alt="Lalat Buah" class="w-screen h-64 object-cover">
              <div class="absolute bottom-0 w-full bg-black bg-opacity-50 text-white text-center py-2">
                Lalat Buah
              </div>
            </div>
          </a>
          <a class="btn btn-ghost hover:bg-transparent">
            <div class="relative overflow-hidden rounded-lg shadow-lg">
              <img src="https://via.placeholder.com/300x200" alt="Serangga Padi" class="w-screen h-64 object-cover">
              <div class="absolute bottom-0 w-full bg-black bg-opacity-50 text-white text-center py-2">
                Serangga Padi
              </div>
            </div>
          </a>

        </div>
      </div>
    </div>
    <div class="bg-color-coklat1 drawer-side h-screen">
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
        <li class="mb-8 rounded-lg text-white text-3xl hover:bg-color-coklat2 active:bg-color-coklat2 focus:outline-none focus:ring focus:ring-bg-color-coklat2">
          <a class="font-light"><img class="w-7 h-7" src="{{ asset('Icon/iconhama.svg') }}">Hama</a>
        </li>
        <li class="mb-8 rounded-lg text-white text-3xl hover:bg-color-coklat2 active:bg-color-coklat2 focus:outline-none focus:ring focus:ring-bg-color-coklat2">
          <a href="informasitanaman" class="font-light"><img class="w-7 h-7" src="{{ asset('Icon/icontanaman.svg') }}">Tanaman</a>
        </li>
        <li class=" rounded-lg text-white text-3xl hover:bg-color-coklat2 active:bg-color-coklat2 focus:outline-none focus:ring focus:ring-bg-color-coklat2">
          <a href="tes" class="font-light"><img class="w-7 h-7" src="{{ asset('Icon/icondeteksi.svg') }}">Deteksi</a>
        </li>
      </ul>
      <div class="avatar pl-8 pb-4 fixed bottom-0">
        <div class="ring-primary ring-offset-base-100 w-14 rounded-full ring ring-offset-2">
          <button><img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" /></button>
        </div>
      </div>

    </div>
  </div>
  <dialog id="my_modal_1" class="modal">
    <div class="modal-box w-full max-w-7xl bg-transparent shadow-none">
      <img class="w-full" src="{{ asset('gambar/serangga padi.png') }}">
      <div class="bg-white px-5 ">
        <p class="py-4 text-center font-bold text-2xl">Serangga Padi</p>
        <p class="py-4 text-left text-xl">Serangga padi adalah hama yang
          sering menyerang tanaman padi, mengakibatkan penurunan produksi.
          Salah satu hama yang umum adalah wereng coklat (Nilaparvata lugens),
          yang merusak tanaman dengan menghisap cairan dari batang, menyebabkan
          tanaman menguning dan mati. Hama lain termasuk penggerek batang padi dan walang sangit.
          Untuk mengatasi serangga padi, penggunaan pestisida, penanaman varietas tahan hama,
          serta pengelolaan lingkungan tanam secara terpadu merupakan langkah penting.</p>
        <div class="modal-action py-5">
          <form method="dialog">
            <!-- if there is a button, it will close the modal -->
            <button class="btn">Close</button>
          </form>
        </div>
      </div>

    </div>
  </dialog>
</body>

</html>