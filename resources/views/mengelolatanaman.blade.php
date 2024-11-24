<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')

  <title>Mengelola Informasi tanaman</title>
</head>


<body>
  <div class="drawer lg:drawer-open">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />

    <div class="drawer-side bg-color-coklat1">
      <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
      <ul class="menu text-base-content text-white min-h-full w-80 p-4">
        <div class="flex justify-between items-center pb-14">
          <div class="flex items-center gap-x-2">
            <img class="w-6 h-6" src="{{ asset('Icon/image 3.svg') }}" alt="Logo">
            <h1 class="text-white text-2xl font-semibold">Gaichu</h1>
          </div>
        </div>
        <ul class="space-y-4 ">
          <li class="text-color-coklat1 text-2xl rounded-l-2xl p-1 bg-white">
            <a href="dashboard" class=" font-semibold"><img class="w-7 h-7" src="{{ asset('Icon/dashboard coklat.svg') }}" alt="Dashboard Icon">Dashboard</a>
          </li>
          <li class=" text-color-coklat1 text-2xl rounded-l-2xl p-1 bg-white">
            <a href="pengguna" class="font-semibold"><img class="w-7 h-7" src="{{ asset('Icon/pengguna admin.svg') }}" alt="Pengguna Icon">Pengguna</a>
          </li>
          <li class=" text-white text-2xl rounded-l-2xl p-1 bg-color-coklat2">
            <a href="mengelolatanaman" class="font-semibold"><img class="w-7 h-7" src="{{ asset('Icon/icontanaman.svg') }}" alt="Tanaman Icon">Tanaman</a>
          </li>
          <li class=" text-color-coklat1 text-2xl  rounded-l-2xl bg-white p-1 ">
            <a href="mengelolahama" class="font-semibold"><img class="w-7 h-7" src="{{ asset('Icon/hama admin.svg') }}" alt="Hama Icon">Hama</a>
          </li>
          <ul class="space-y-2">
          </ul>
    </div>

    <div class="drawer-content flex flex-col bg-color-abu1">

      <div class="navbar bg-base-100 shadow-lg ">
        <div class="flex-1">
          <a class=" pl-5 text-3xl font-bold text-color-coklat1 ">Dashboard</a>
        </div>
        <div class="flex-none gap-2">
          <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="flex items-center space-x-3 btn btn-ghost">
              <div class="avatar">
                <div class="w-10 rounded-full">
                  <img alt="User Avatar" src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                </div>
              </div>
              <div>
                <p class="font-bold">Salmon</p>
                <p class="text-sm font-semibold">Admin</p>
              </div>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
              <li><a>Logout</a></li>
            </ul>
          </div>
        </div>

      </div>


      <div class="p-10">
        <div class=" w-full col-span-2 shadow-lg text-lg bg-white">
          <div class="flex justify-between p-5 border-b-2 items-center text-2xl font-medium">
            <h1>Informasi Tanaman</h1>
            <button class="btn bg-color-coklat1 text-white">Tambah</button>
          </div>
          <table class="table text-lg">
            <!-- head -->
            <thead class="text-lg ">
              <tr>
                <th></th>
                <th>Nama Tanaman</th>
                <th>Deskripsi</th>
                <th>Klasifikasi Tanaman</th>
              </tr>
            </thead>
            <tbody>
              <!-- row 1 -->
              <tr>
                <th>1</th>
                <td>Cy Ganderton</td>
                <td>Quality Control Specialist</td>
                <td>Blue</td>
                <th>
                  <a class="btn btn-ghost hover:bg-transparent" onclick="my_modal_1.showModal()">
                    <img src="{{ asset('icon/iconpalu.svg') }}" class="#">
                  </a>
                  <a class="btn btn-ghost hover:bg-transparent">
                    <img src="{{ asset('icon/icontong.svg') }}" class="#">
                  </a>
                  <a class="btn btn-ghost hover:bg-transparent" onclick="my_modal_2.showModal()">
                    <img src="{{ asset('icon/detail.svg') }}" class="#">
                  </a>
                </th>

              </tr>
              <!-- row 2 -->
              <tr>
                <th>2</th>
                <td>Hart Hagerty</td>
                <td>Desktop Support Technician</td>
                <td>Purple</td>
                <th>
                  <a class="btn btn-ghost hover:bg-transparent">
                    <img src="{{ asset('icon/iconpalu.svg') }}" class="#">
                  </a>
                  <a class="btn btn-ghost hover:bg-transparent">
                    <img src="{{ asset('icon/icontong.svg') }}" class="#">
                  </a>
                </th>
              </tr>
              <!-- row 3 -->
              <tr>
                <th>3</th>
                <td>Brice Swyre</td>
                <td>Tax Accountant</td>
                <td>Red</td>
                <th>
                  <a class="btn btn-ghost hover:bg-transparent">
                    <img src="{{ asset('icon/iconpalu.svg') }}" class="#">
                  </a>
                  <a class="btn btn-ghost hover:bg-transparent">
                    <img src="{{ asset('icon/icontong.svg') }}" class="#">
                  </a>
                </th>
              </tr>
            </tbody>
          </table>
        </div>
        <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden">Open drawer</label>
      </div>
    </div>
  </div>
  <dialog id="my_modal_1" class="modal">
    <div class="modal-box w-screen">
      <div class="gap-2 w-80 p-3 grid">
        <label class="input input-bordered flex items-center gap-2">
          Nama
          <input type="text" class="grow w-80" placeholder="Nama Tanaman" />
        </label>
        <label class="input input-bordered flex items-center gap-2">
          Deskripsi
          <input type="text" class="grow w-80" placeholder="Deskripsi" />
        </label>
        <label class="input input-bordered flex items-center gap-2">
          Klasifikasi
          <input type="text" class="grow w-80" placeholder="Klasifikasi Tanaman" />
        </label>
        <label for="">
          <input type="file" class="file-input w-full  file:bg-color-coklat2 file:text-white file-input-bordered" />
        </label>
      </div>
      <div class="modal-action">
        <form method="dialog">
          <!-- if there is a button in form, it will close the modal -->
          <button class="btn">Close</button>
          <button class="btn">Confirm</button>
        </form>
      </div>
    </div>
  </dialog>
  <dialog id="my_modal_2" class="modal">
    <div class="modal-box">
      <div class="h-screen">
        <h3 class="text-lg font-bold border-b-2">Detail Tanaman</h3>
        <h3 class="text-lg font-bold mt-5 mb-4">Nama Tanaman</h3>
        <p>Tomat</p>
        <h3 class="text-lg font-bold mt-5 mb-4">Deskripsi</h3>
        <p>Tanaman Tomat (Solanum lycopersicum) adalah tanaman
          buah yang sangat populer dan banyak
          dibudidayakan karena nilai ekonomis dan kandungan gizinya yang tinggi.
          Tomat digunakan dalam berbagai kuliner dan kaya akan
          vitamin C, A, dan antioksidan seperti likopen yang baik untuk kesehatan.
          Hama yang umumnya menyerang tomat seperti kutu daun,ulat grayak, dan
          lalat buat. Tomat merupakan tanaman yang tumbuh optimal dalam kondisi
          cuaca yang hangat, tetapi tidak ekstrem.</p>
        <h3 class="text-lg font-bold mt-5 mb-4">Klasifikasi</h3>
        <p>Solanum lycopersicum</p>
        <h3 class="text-lg font-bold mt-5 mb-4">Gambar</h3>
        <img class="object-contain " width="695" src="{{ asset('gambar/tomat-1 1.png') }}">
      </div>
      <div class="modal-action">
        <form method="dialog">
          <!-- if there is a button in form, it will close the modal -->
          <button class="btn -translate-y-[1rem]">Close</button>
        </form>
      </div>
    </div>
  </dialog>




</body>

</html>