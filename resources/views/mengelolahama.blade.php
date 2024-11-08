<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')

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

    <div class="drawer-content flex flex-col py-2 bg-color-abu1">

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
                <td>{{$hama->Nama}}</td>
                <td>{{$hama->Deskripsi}}</td>
                <td>{{$hama->Klasifikasi}}</td>
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
              <button type="button" class="btn" onclick="document.getElementById('my_modal_delete{{$hama->Id_Hama}}').close();">Cancel</button>
             <form method="POST" action="{{route ('mengelolahama.destroy', $hama->Id_Hama)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn bg-red-600 text-white">Delete</button>
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
                <input type="text" name="nama" class="input input-bordered w-full" placeholder="Nama Tanaman" value="{{$hama->Nama}}" />
            </label>
            <label class="flex flex-col gap-1">
                <span class="font-medium">Klasifikasi</span>
                <input type="text"  name="klasifikasi" class="input input-bordered w-full" placeholder="Klasifikasi Tanaman" value="{{$hama->Klasifikasi}}" />
            </label>
            <label class="flex flex-col gap-1">
                <span class="font-medium">Gambar</span>
                <input type="file"  name="gambar" class="input input-bordered w-full" placeholder="Gambar Tanaman" />
            </label>
            <label class="flex flex-col gap-1">
                <span class="font-medium">Deskripsi</span>
                <input type="text"  name="deskripsi" class="input input-bordered w-full" placeholder="Deskripsi" value="{{$hama->Deskripsi}}" />
            </label>
        </div>

    
      <div class="modal-action">
        <form method="dialog">
          <!-- if there is a button in form, it will close the modal -->
          <button type="button" class="btn" onclick="document.getElementById('my_modal_edit{{$hama->Id_Hama}}').close();">Close</button>
          <button class="btn bg-green-600 text-white" type="submit">Confirm</button>
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
                <input type="text" name="nama" class="input input-bordered w-full" placeholder="Nama Tanaman" />
            </label>
            <label class="flex flex-col gap-1">
                <span class="font-medium">Klasifikasi</span>
                <input type="text"  name="klasifikasi" class="input input-bordered w-full" placeholder="Klasifikasi Tanaman" />
            </label>
            <label class="flex flex-col gap-1">
                <span class="font-medium">Gambar</span>
                <input type="file"  name="gambar" class="input input-bordered w-full" placeholder="Gambar Tanaman" />
            </label>
            <label class="flex flex-col gap-1">
                <span class="font-medium">Deskripsi</span>
                <input type="text"  name="deskripsi" class="input input-bordered w-full" placeholder="Deskripsi" />
            </label>
        </div>
            <div class="modal-action">
                <button type="button" class="btn" onclick="document.getElementById('my_modal_tambah').close();">Close</button>
                <button type="submit" class=" btn bg-green-600 text-white ">Confirm</button>
            </div>
        </form>
    </div>
</dialog>
   <!-- Modal Tambah -->




</body>

</html>