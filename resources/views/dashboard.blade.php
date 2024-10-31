<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    
    <title>Dashboard</title>
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
      <li class="text-white text-2xl rounded-l-2xl p-1 bg-color-coklat2">
        <a  href="dashboard" class=" font-semibold"><img class="w-7 h-7" src="{{ asset('Icon/iconhama.svg') }}" alt="Dashboard Icon">Dashboard</a>
      </li>
      <li class=" text-color-coklat1 text-2xl rounded-l-2xl p-1 bg-white">
        <a  href="pengguna" class="font-semibold"><img class="w-7 h-7" src="{{ asset('Icon/icontanaman.svg') }}" alt="Pengguna Icon">Pengguna</a>
      </li>
      <li class=" text-color-coklat1 text-2xl rounded-l-2xl p-1 bg-white">
        <a href="mengelolatanaman" class="font-semibold"><img class="w-7 h-7" src="{{ asset('Icon/icondeteksi.svg') }}" alt="Tanaman Icon">Tanaman</a>
      </li>
      <li class=" text-color-coklat1 text-2xl  rounded-l-2xl bg-white p-1 ">
        <a href="mengelolahama" class="font-semibold"><img class="w-7 h-7" src="{{ asset('Icon/icondeteksi.svg') }}" alt="Hama Icon">Hama</a>
      </li>
      <ul class="space-y-2">
    </ul>
  </div>

  <div class="drawer-content flex flex-col py-2">

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
    
   
    <div class="p-4">
      <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden">Open drawer</label>
    </div>
  </div>
</div>



           
</body>
</html>