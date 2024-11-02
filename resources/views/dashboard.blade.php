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
            <a href="dashboard" class=" font-semibold"><img class="w-7 h-7" src="{{ asset('Icon/Dashboard.svg') }}" alt="Dashboard Icon">Dashboard</a>
          </li>
          <li class=" text-color-coklat1 text-2xl rounded-l-2xl p-1 bg-white">
            <a href="pengguna" class="font-semibold"><img class="w-7 h-7" src="{{ asset('Icon/pengguna admin.svg') }}" alt="Pengguna Icon">Pengguna</a>
          </li>
          <li class=" text-color-coklat1 text-2xl rounded-l-2xl p-1 bg-white">
            <a href="mengelolatanaman" class="font-semibold"><img class="w-7 h-7" src="{{ asset('Icon/tanaman admin.svg') }}" alt="Tanaman Icon">Tanaman</a>
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
      <div class="grid grid-cols-3 w-full gap-4 p-10">
        <div class="col-span-1 w-full ">
          <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
              <div class="flex justify-between">
                <h2 class="card-title text-3xl">
                  50
                </h2>
                <img src="{{ asset('Icon/pengguna admin.svg') }}">
              </div>
              <p class="text-3xl">Pengguna</p>
              <div class="card-actions justify-end">
                <button class="btn btn bg-color-coklat1 text-white">See all</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-span-1 w-full ">
          <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
              <div class="flex justify-between">
                <h2 class="card-title text-3xl">
                  50
                </h2>
                <img src="{{ asset('Icon/hama admin.svg') }}">
              </div>
              <p class="text-3xl">Informasi Hama</p>
              <div class="card-actions justify-end">
                <button class="btn btn bg-color-coklat1 text-white">See all</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-span-1 w-full ">
          <div class="card bg-base-100 shadow-xl  bg-color-coklat1">
            <div class="card-body">
              <div class="flex justify-between">
                <h2 class="card-title text-3xl text-white">
                  50
                </h2>
                <img src="{{ asset('Icon/tanaman admin.svg') }}">
              </div>
              <p class="text-3xl text-white">Informasi Tanaman</p>
              <div class="card-actions justify-end">
                <button class="btn btn bg-color-coklat1 text-white">See all</button>
              </div>
            </div>
          </div>
        </div>
        <div class=" w-full col-span-2 shadow-lg text-lg bg-white">
          <div class="flex justify-between p-5 border-b-2 items-center">
            <h1>Status Pengguna</h1>
            <button class="btn bg-color-coklat1 text-white">See all</button>
          </div>
          <table class="table text-lg">
            <!-- head -->
            <thead class="text-lg">
              <tr>
                <th></th>
                <th>Username</th>
                <th>Email</th>
                <th>Membership</th>
              </tr>
            </thead>
            <tbody>
              <!-- row 1 -->
              <tr>
                <th>1</th>
                <td>Cy Ganderton</td>
                <td>Quality Control Specialist</td>
                <td>Blue</td>
              </tr>
              <!-- row 2 -->
              <tr>
                <th>2</th>
                <td>Hart Hagerty</td>
                <td>Desktop Support Technician</td>
                <td>Purple</td>
              </tr>
              <!-- row 3 -->
              <tr>
                <th>3</th>
                <td>Brice Swyre</td>
                <td>Tax Accountant</td>
                <td>Red</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-span-1 bg-white text-lg shadow-lg">
          <div class="flex justify-between p-5 border-b-2 items-center">
            <h1>Informasi Tanaman</h1>
            <button class="btn bg-color-coklat1 text-white">See all</button>
          </div>
          <table class="table">
            <!-- head -->
            <thead>
              <tr>
                <th></th>
                <th>Nama</th>
                <th>Job</th>
                <th>Favorite Color</th>
              </tr>
            </thead>
            <tbody>
              <!-- row 1 -->
              <tr>
                <th>1</th>
                <td>Cy Ganderton</td>
                <td>Quality Control Specialist</td>
                <td>Blue</td>
              </tr>
              <!-- row 2 -->
              <tr>
                <th>2</th>
                <td>Hart Hagerty</td>
                <td>Desktop Support Technician</td>
                <td>Purple</td>
              </tr>
              <!-- row 3 -->
              <tr>
                <th>3</th>
                <td>Brice Swyre</td>
                <td>Tax Accountant</td>
                <td>Red</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>



      <div class="p-4">

        <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden">Open drawer</label>
      </div>
    </div>
  </div>




</body>

</html>