<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://horizon-ui.com/shadcn-nextjs-boilerplate/_next/static/css/12f72a06cf11dcdf.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <title>Halaman Deteksi</title>
  <style>
    @layer utilities {
      .bg-coklat1 {
        background-color: #5a4038;
        /* Ganti sesuai warna coklat */
      }
    }
  </style>
</head>

<body>
  <div class="drawer lg:drawer-open">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col items-center justify-start overflow-x-hidden overflow-y-auto min-h-screen">
      <!-- Page content here -->
      <div class="flex items-center justify-center min-h-screen w-full bg-white pt-12 ">
        <div class="w-96 xl:w-full mx-auto rounded-lg overflow-hidden xl:flex xl:justify-center xl:items-center">
          <div class="flex">
            <div class="w-full p-3">
              <!-- Area Upload -->
              <div id="upload-area"
                class="relative border-dashed h-[400px] xl:h-[600px] xl:w-[900px] sm:h-[350px] 
                sm:w-[400px] w-full max-w-sm sm:max-w-4xl rounded-lg border-4 border-color-coklat1 bg-blue-100 flex justify-center items-center">
                <div class="absolute text-center">
                  <div class="flex flex-col items-center">
                    <img id="uploaded-image" class="hidden mb-4 max-w-full max-h-72" />
                    <img src="{{ asset('gambar/gambardeteksi.png') }}" alt="Upload Area">
                    <span class="block text-gray-400 font-normal">
                      Drop your files here or
                      <button id="browse-button" class="text-color-coklat1 hover:underline">Browse</button>
                    </span>
                  </div>
                </div>
                <input type="file" class="absolute inset-0 h-full w-full opacity-0" id="image-upload" name="image">
              </div>

              <!-- Tombol Deteksi -->
              <div class="flex justify-center space-x-4 mt-2">
                <button id="detect-btn" class="mt-6  bg-color-coklat1 text-white px-12 py-4 rounded-lg text-lg  font-semibold hover:bg-blue-600 transition">
                  Deteksi
                </button>
                <button id="delete-btn" class=" hidden mt-6  bg-red-500 text-white px-12 py-4 rounded-lg text-lg  font-semibold hover:bg-red-600 transition">
                  Hapus Gambar
                </button>
              </div>
              <!-- Preview Hasil -->
              <div id="result" class="hidden w-full mt-6">
                <div
                  class="mr-5 flex h-10 min-h-[40px] min-w-[40px] items-center justify-center rounded-full bg-zinc-950 border border-zinc-800">
                  <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                    aria-hidden="true" class="h-4 w-4 text-white" height="1em" width="1em"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M9 4.5a.75.75 0 0 1 .721.544l.813 2.846a3.75 3.75 0 0 0 2.576 2.576l2.846.813a.75.75 0 0 1 0 1.442l-2.846.813a3.75 3.75 0 0 0-2.576 2.576l-.813 2.846a.75.75 0 0 1-1.442 0l-.813-2.846a3.75 3.75 0 0 0-2.576-2.576l-2.846-.813a.75.75 0 0 1 0-1.442l2.846-.813A3.75 3.75 0 0 0 7.466 7.89l.813-2.846A.75.75 0 0 1 9 4.5ZM18 1.5a.75.75 0 0 1 .728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 0 1 0 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 0 1-1.456 0l-.258-1.036a2.625 2.625 0 0 0-1.91-1.91l-1.036-.258a.75.75 0 0 1 0-1.456l1.036-.258a2.625 2.625 0 0 0 1.91-1.91l.258-1.036A.75.75 0 0 1 18 1.5ZM16.5 15a.75.75 0 0 1 .712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 0 1 0 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 0 1-1.422 0l-.395-1.183a1.5 1.5 0 0 0-.948-.948l-1.183-.395a.75.75 0 0 1 0-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0 1 16.5 15Z"
                      clip-rule="evenodd"></path>
                  </svg>
                </div>
                <div
                  class="rounded-lg border-4 shadow-sm flex !max-h-max p-5 !px-[22px] !py-[22px] text-base font-normal leading-6 text-black backdrop-blur-xl md:text-base md:leading-[26px]">
                  <div class=" font-normal">
                    <!-- <p><strong>Hasil Deteksi</strong></p> -->
                    <p>&nbsp;</p>
                    <img id="result-image" class="mt-4 mb-4 rounded-lg max-w-full mx-auto hidden" />
                    <p id="result-text"></p>
                  </div>
                </div>
              </div>
              <div class="flex justify-center">
                <button id="retry-btn" class="hidden mt-4 bg-blue-500 text-white px-12 py-4 rounded-lg hover:bg-blue-600 transition">Coba Deteksi Lagi</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Drawer -->
    <div class="flex ">
      <input type="checkbox" id="drawer-toggle" class="relative sr-only peer" checked>
      <label for="drawer-toggle" class="absolute top-0 left-0 inline-block p-4 transition-all duration-500 bg-coklat1 rounded-lg peer-checked:rotate-180 peer-checked:left-52 xl:peer-checked:left-64">
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
  </div>
  <!-- JavaScript untuk Logika -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Elemen-elemen DOM
      const uploadInput = document.getElementById('image-upload');
      const uploadArea = document.getElementById('upload-area');
      const detectButton = document.getElementById('detect-btn');
      const resultDiv = document.getElementById('result');
      const resultText = document.getElementById('result-text');
      const resultImage = document.getElementById('result-image');
      const retryButton = document.getElementById('retry-btn');
      const deleteButton = document.getElementById('delete-btn');
      const uploadedPreview = document.createElement('img'); // Elemen untuk menampilkan gambar yang diunggah

      uploadedPreview.classList.add('max-w-full', 'rounded-lg', 'hidden', 'mb-4'); // Tambahkan kelas gaya
      uploadArea.parentNode.insertBefore(uploadedPreview, uploadArea.nextSibling); // Sisipkan di bawah form upload

      //Fungsi untuk mengetikkan teks satu per satu
      function typeText(element, text, delay = 5) {
        return new Promise((resolve) => {
          element.innerHTML = ""; // Mengosongkan elemen sebelum mengetik
          let index = 0;

          function type() {
            if (index < text.length) {
              element.innerHTML += text[index]; // Tambahkan huruf satu per satu
              index++;
              setTimeout(type, delay); // Tunda sesuai waktu delay
            } else {
              resolve();
            }
          }
          type(); // Mulai mengetik
        });

      }

      //Alert Unggah Gambar
      uploadInput.addEventListener('change', () => {
        const file = uploadInput.files[0];
        if (file) {
          //Menampilkan alert sukses jika gambar berhasil diunggah
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Gambar berhasil diunggah!",
            showConfirmButton: false,
            timer: 1500

          });


          const reader = new FileReader();
          reader.onload = function(e) {
            uploadedPreview.src = e.target.result; // Setel sumber gambar dari file yang diunggah
            uploadedPreview.classList.remove('hidden'); // Tampilkan gambar
            uploadArea.classList.add('hidden'); // Sembunyikan form upload
            deleteButton.classList.remove('hidden'); // Tampilkan tombol hapus
          };
          reader.readAsDataURL(file); // Baca file gambar sebagai URL
        }
      });

      // Alert hapus gambar
      deleteButton.addEventListener('click', () => {
        uploadInput.value = ''; // Kosongkan input file
        uploadedPreview.src = ''; // Kosongkan sumber gambar
        uploadedPreview.classList.add('hidden'); // Sembunyikan gambar pratinjau
        uploadArea.classList.remove('hidden'); // Tampilkan form upload kembali
        deleteButton.classList.add('hidden'); // Sembunyikan tombol Hapus Gambar
        // Tampilkan alert sukses untuk hapus gambar
        Swal.fire({
          position: "center",
          icon: "success",
          title: "Gambar berhasil dihapus!",
          showConfirmButton: false,
          timer: 1500
        });
      });

      // Alert deteksi gambar
      detectButton.addEventListener('click', async () => {
        const file = uploadInput.files[0];
        if (!file) {
          //Alert jika tidak ada gambar yang diunggah
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Silakan unggah gambar terlebih dahulu!",
          });
          return;
        }

        const formData = new FormData();
        formData.append('image', file);
        // Efek loading ke deteksi
        Swal.fire({
          title: "Sedang memproses...",
          html: "Harap tunggu, gambar anda sedang dianalisis.",
          allowOutsideClick: false,
          didOpen: () => {
            Swal.showLoading(); // Tampilkan animasi loading
          },
        });


        try {
          // Mengirim permintaan ke server untuk mendeteksi gambar
          const response = await fetch("{{ route('deteksi.upload') }}", {
            method: 'POST',
            headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}', //Token CSRF untuk keamanan
            },
            body: formData, //Gambar yang diunggah
          });

          const result = await response.json();

          if (response.ok) {
            Swal.close(); // Tutup loading setelah proses selesai
            // Proses hasil deteksi dan formatkan menjadi terstruktur
            // const sections = result.result.split("- **"); // Asumsi setiap bagian diawali dengan "- **"
            resultText.innerHTML = ""; // Kosongkan kontainer hasil sebelumnya

            resultImage.src = result.image_url; // URL gambar yang diunggah
            resultImage.classList.remove('hidden'); // Pastikan gambar terlihat
            resultDiv.classList.remove('hidden'); // Tampilkan hasil deteksi

            // FUngsi untuk menampilkan hasil deteksi dengan efek mengetik
            async function displaySections(sections) {
              for (const section of sections) {
                if (section.trim()) {
                  const headerEnd = section.indexOf(":");
                  const header = section.substring(0, headerEnd).trim(); // Header
                  const content = section.substring(headerEnd + 1).trim(); // Konten

                  //Hapus tanda bintang dari header dan konten
                  const cleanHeader = header.replace(/\*\*/g, "");
                  const cleanContent = content.replace(/\*\*/g, "");

                  // Tambahkan header dengan efek mengetik
                  const headerElement = document.createElement("h3");
                  headerElement.classList.add("font-bold", "mb-2", "text-lg");
                  resultText.appendChild(headerElement);

                  await typeText(headerElement, cleanHeader, 10);

                  // Tambahkan konten dengan efek mengetik
                  const contentElement = document.createElement("p");
                  contentElement.classList.add("font-roboto", "text-black", "mb-4", 'font-medium');
                  resultText.appendChild(contentElement);

                  await typeText(contentElement, cleanContent, 4);

                  // Jeda sebelum menampilkan bagian berikutnya
                  await new Promise(resolve => setTimeout(resolve, 300));
                }
              }
            }

            // Split hasil berdasarkan "- **" dan tampilkan bagian satu per satu
            const sections = result.result.split("- **"); // Asumsi setiap bagian diawali dengan "- **"
            displaySections(sections);


            // Sembunyikan tombol
            detectButton.classList.add('hidden');
            uploadArea.classList.add('hidden');
            uploadedPreview.classList.add('hidden');
            deleteButton.classList.add('hidden');
            retryButton.classList.remove('hidden');
          } else {
            //Alert jika terjadi error pada server
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: result.message || "Gagal mendeteksi gambar.",
            });
          }
        } catch (error) {
          // Alert jika terjadi error pada koneksi
          console.error('Error:', error);
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Terjadi kesalahan saat mendeteksi.",
          });
        }
      });

      // Event listener untuk tombol coba deteksi lagi
      retryButton.addEventListener('click', () => {
        //Alert coba deteksi lagi
        Swal.fire({
          position: "center",
          icon: "info",
          title: "Siap untuk deteksi baru!",
          showConfirmButton: false,
          timer: 1500
        });
        setTimeout(() => {
          // Reset tampilan untuk mencoba deteksi baru
          uploadInput.value = ''; // Kosongkan input file
          resultDiv.classList.add('hidden'); // Sembunyikan hasil deteksi
          resultText.textContent = ''; // Kosongkan teks hasil
          resultImage.src = ''; // Kosongkan URL gambar
          resultImage.classList.add('hidden'); // Sembunyikan gambar
          retryButton.classList.add('hidden'); // Sembunyikan tombol Retry
          detectButton.classList.remove('hidden'); // Tampilkan tombol Deteksi
          uploadArea.classList.remove('hidden'); // Tampilkan Form Upload
          uploadedPreview.classList.add('hidden'); // Sembunyikan gambar pratinjau
          deleteButton.classList.add('hidden'); // Sembunyikan tombol Hapus Gambar
        }, 1500);
      });
    });
  </script>
</body>

</html>