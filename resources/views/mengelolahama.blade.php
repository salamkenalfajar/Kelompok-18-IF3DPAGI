<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/js/app.js', 'resources/css/app.css'])
  <title>Mengelola Informasi hama</title>
  
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
          <li class=" text-color-coklat1 text-2xl  rounded-l-2xl bg-white p-1 ">
            <a href="mengelolatanaman" class="font-semibold"><img class="w-7 h-7" src="{{ asset('Icon/tanaman admin.svg') }}" alt="Tanaman Icon">Tanaman</a>
          </li>
          <li class=" text-white text-2xl  rounded-l-2xl bg-color-coklat2 p-1 ">
            <a href="mengelolahama" class="font-semibold"><img class="w-7 h-7" src="{{ asset('Icon/iconhama.svg') }}" alt="Hama Icon">Hama</a>
          </li>
          <ul class="space-y-2">
          </ul>
    </div>

    <div class="drawer-content flex flex-col  bg-color-abu1">

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
            <h1>Informasi Hama</h1>
            <button class="btn bg-color-coklat1 text-white" onclick="my_modal_tambah.showModal()">Tambah</button>
          </div>
          <table class="table text-lg">
            <!-- head -->
            <thead class="text-lg ">
              <tr>
                <th></th>
                <th>Nama Hama</th>
                <th>Deskripsi</th>
                <th>Klasifikasi Hama</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($hamaa as $index => $hama)
              <!-- row 1 -->
              <tr>
                <th>{{ $index + 1 }}</th>
                <td>
                  <p class="w-40 truncate">{{$hama->Nama}}</p>
                </td>
                <td>
                  <p class="w-40 truncate">{{$hama->Deskripsi}}</p>
                </td>
                <td>
                  <p class="w-40 truncate">{{$hama->Klasifikasi}}</p>
                </td>
                <th>
                  <a class="btn btn-ghost hover:bg-transparent">
                    <img src="{{ asset('icon/iconpalu.svg') }}" class="#" onclick="document.getElementById('my_modal_edit{{ $hama->Id_Hama}}').showModal();" >
                  </a>
                  <a class="btn btn-ghost hover:bg-transparent" onclick="document.getElementById('my_modal_delete{{ $hama->Id_Hama}}').showModal();">
                    <img src="{{ asset('icon/icontong.svg') }}" class="#">
                  </a>
                </th>

              </tr>
               <!-- Modal Hapus -->
        <dialog id="my_modal_delete{{$hama->Id_Hama}}" class="modal">
            <div class="modal-box">
              <h3 class="font-bold text-lg">Hello!</h3>
              <p class="py-4">Apakah anda yakin ingin menghapus ?</p>
              <div class="modal-action">
              <button type="button" class="btn" onclick="document.getElementById('my_modal_delete{{$hama->Id_Hama}}').close();">Tutup</button>
             <form method="POST" action="{{route ('mengelolahama.destroy', $hama->Id_Hama)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn bg-red-600 text-white">Hapus</button>
              </div>
            </div>
        </form>
           
          </dialog>
  <!-- Modal Hapus -->

  <!-- Modal edit-->

  <dialog id="my_modal_edit{{$hama->Id_Hama}}" class="modal">
    <div class="modal-box w-full max-w-lg mx-auto">
        <h2 class="text-xl font-semibold border-b pb-2 mb-4">Edit Data Tanaman</h2>
        <form action="{{route ('mengelolahama.update', $hama->Id_Hama)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
        <div class="gap-4 w-full p-3 grid">
            <label class="flex flex-col gap-1">
                <span class="font-medium">Nama</span>
                <input type="text" name="nama" class="input input-bordered w-full" placeholder="Nama Tanaman" value="{{$hama->Nama}}" required/>
            </label>
            <label class="flex flex-col gap-1">
                <span class="font-medium">Klasifikasi</span>
                <input type="text"  name="klasifikasi" class="input input-bordered w-full" placeholder="Klasifikasi Tanaman" value="{{$hama->Klasifikasi}}" required/>
            </label>
            <label class="flex flex-col gap-1">
                <span class="font-medium">Gambar</span>
                <input type="file" name="gambar" class="file-input file-input-bordered w-full  file:bg-color-coklat2"/>
            </label>
            <label class="flex flex-col gap-1">
                <span class="font-medium">Deskripsi</span>
                <textarea  name="deskripsi" class="input input-bordered w-full" placeholder="Deskripsi" required >{{$hama->Deskripsi}}</textarea>
            </label>
        </div>

    
      <div class="modal-action">
        <form method="dialog">
          <!-- if there is a button in form, it will close the modal -->
          <button type="button" class="btn" onclick="document.getElementById('my_modal_edit{{$hama->Id_Hama}}').close();">Tutup</button>
          <button class="btn bg-green-600 text-white" type="submit">Edit</button>
        </form>
      </div>
        </form>
    </div>
  </dialog>
   <!-- Modal edit-->
  @endforeach
            </tbody>
          </table>
        </div>
        <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden">Open drawer</label>
      </div>
    </div>
  </div>
 
  <!-- Modal Tambah -->
  <dialog id="my_modal_tambah" class="modal">
    <div class="modal-box w-full max-w-lg mx-auto">
        <h2 class="text-xl font-semibold border-b pb-2 mb-4">Tambah Data Hama</h2>
        <form action="{{ route('mengelolahama.store') }}" method="POST" enctype="multipart/form-data">
        @csrf 
            <div class="gap-4 w-full p-3 grid">
            <label class="flex flex-col gap-1">
                <span class="font-medium">Nama</span>
                <input type="text" name="nama" class="input input-bordered w-full" placeholder="Nama Hama"  required/>
            </label>
            <label class="flex flex-col gap-1">
                <span class="font-medium">Klasifikasi</span>
                <input type="text"  name="klasifikasi" class="input input-bordered w-full" placeholder="Klasifikasi Hama" required />
            </label>
            <label class="flex flex-col gap-1">
                <span class="font-medium">Gambar</span>
                <input type="file" name="gambar" class="file-input file-input-bordered w-full  file:bg-color-coklat2" required />
            </label>
            <label class="flex flex-col gap-1">
                <span class="font-medium">Deskripsi</span>
                <textarea  name="deskripsi" class="input input-bordered w-full" placeholder="Deskripsi" rows="4" required ></textarea>
            </label>
        </div>
            <div class="modal-action">
                <button type="button" class="btn" onclick="document.getElementById('my_modal_tambah').close();">Tutup</button>
                <button type="submit" class=" btn bg-green-600 text-white ">Tambah</button>
            </div>
        </form>
    </div>
</dialog>
   <!-- Modal Tambah -->

   @if (session()->has('success'))
<div id="toast"
    class="z-[100] fixed top-10 w-7/12 bg-green-50 border-s-4 border-green-500 p-4 transition-all duration-500 rounded-md"
    role="alert" tabindex="-1" aria-labelledby="hs-bordered-red-style-label">
    <div class="flex">
        <div class="shrink-0">
            <!-- Icon -->
            <span
                class="inline-flex justify-center items-center size-8 rounded-full border-4 border-green-100 bg-green-200 text-green-800 dark:border-green-900 dark:bg-green-800 dark:text-green-400">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                    <path d="m9 12 2 2 4-4"></path>
                </svg>
            </span>
            <!-- End Icon -->
        </div>
        <div class="ms-3">
            <h3 id="hs-bordered-green-style-label" class="text-gray-800 font-semibold">
                Berhasil!
            </h3>
            <p class="text-sm text-gray-700">
                {{ session('success')}}
            </p>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var toastElement = document.getElementById('toast');

        if (toastElement) {
            toastElement.classList.remove('opacity-0', 'translate-y-0');
            toastElement.classList.add('opacity-100', 'translate-y-10');

            setTimeout(function() {
                toastElement.classList.remove('opacity-100', 'translate-y-10');
                toastElement.classList.add('opacity-0', 'translate-y-0');

                setTimeout(function() {
                    toastElement.remove();
                }, 5000);
            }, 5000);
        }
    });
</script> 

@endif

</body>

</html>
