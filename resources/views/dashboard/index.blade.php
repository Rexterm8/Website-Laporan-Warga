@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="row">
  <div class="col-md-12">
      <!-- Card untuk menampilkan daftar laporan -->
      <div class="card mt-5" data-aos="fade-up" data-aos-delay="800">
         <div class="card-body">
            <!-- Form input pencarian -->
            <div class="row mb-3 justify-content-end">
                <div class="col-md-4">
                  <div class="input-group search-input">
                    <span class="input-group-text" id="search-input">
                      <svg class="icon-18" width="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                          <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg>
                    </span>
                    <input type="search" class="form-control" id="searchInput" placeholder="Search...">
                  </div>
                </div>
              </div>
            <!-- Pesan sukses jika ada -->
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissble fade show" role="alert">
               {{ session('success') }}
               {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
            </div>

            @endif

            <!-- Tabel responsif untuk menampilkan daftar laporan -->
            <div class="table-responsive">
               <table class="table">
                  <thead class="text-black">
                     <tr>
                        <th>Nama</th>
                        <th>Tanggal Laporan</th>
                        <th>Kategori</th>
                        <th>Isi Laporan</th>
                        <th>Bukti Laporan</th>
                        <th>Status</th>
                        <!-- Kolom tindakan hanya muncul jika pengguna adalah admin -->
                        @if(auth()->user()->role == "admin")
                        <th class="text-center">Tindakan</th>
                        @endif
                     </tr>
                  </thead>
                  <tbody>
                     <!-- Looping untuk menampilkan setiap laporan -->
                     @foreach ($laporan as $row)
                        <tr>
                           <td style="max-width: 10rem;white-space:normal; word-wrap:break-word;">{{ $row['user']['nama'] }}</td>
                           <td>{{ \Carbon\Carbon::parse($row['created_at'])->timezone('Asia/Jakarta')->format('d F Y H:i:s') }}</td>
                           <td><strong>{{ $row['kategori'] }}</strong></td>
                           <td style="max-width: 25rem;white-space:normal; word-wrap:break-word; cursor: pointer;"><div style="max-height: 4.5rem; overflow:hidden"onclick="this.classList.toggle('expanded')">{{ $row['name'] }}</div></td>
                           <td>
                              <!-- Tombol untuk melihat lampiran laporan -->
                              <a href="{{ asset($row['lampiran']) }}" class="btn btn-primary rounded-pill" target="__blank">Lihat</a>
                           </td>
                           <td>
                              <!-- Menampilkan status laporan -->
                              @if($row['status'] == 'Sedang Berjalan')
                                 <p class="btn btn-warning rounded-pill mt-3">{{ $row['status'] }}</p>
                              @elseif($row['status'] == 'Sudah Selesai')
                                 <p class="btn btn-success rounded-pill mt-3">{{ $row['status'] }}</p>
                                 @elseif($row['status'] == 'Ditolak')
                                 <p class="btn btn-danger rounded-pill mt-3">{{ $row['status'] }}</p>
                              @else
                                 <p class="btn btn-secondary rounded-pill mt-3">{{ $row['status'] }}</p>
                              @endif
                           </td>
                           <!-- Kolom tindakan hanya muncul jika pengguna adalah admin -->
                           @if(auth()->user()->role == "admin")
                           <td>
                               <!-- Tombol untuk mengubah status laporan -->
                              <button type="button" class="btn btn-info update-status rounded-pill" data-bs-toggle="modal" data-bs-target="#updateStatus" data-id="{{ $row['id'] }}" @if($row['status'] == 'Sudah Selesai'|| $row['status'] == 'Ditolak') disabled @endif>
                                 Ubah Status
                             </button>
                           </td>
                           @endif
                        </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
  </div>

  <!-- Modal untuk mengubah status laporan -->
  <div class="modal fade" id="updateStatus" tabindex="-1" aria-labelledby="updateStatusLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h1 class="modal-title fs-5" id="updateStatusLabel">Ubah Status</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
               <div class="modal-body text-black">
                     @method('put')
                     @csrf
                     <div class="form-group">
                        <label for="status" class="form-label">Status Laporan</label>
                        <select class="form-control text-black" id="status" name="status" required>
                           <option value="">Pilih Status Laporan</option>
                           <option value="Sudah Selesai">Sudah Selesai</option>
                           <option value="Ditolak">Ditolak</option>
                        </select>
                     </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger">Ubah Status</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<ul class="pagination justify-content-center">
    {{ $laporan->onEachside(1)->links() }}
</ul>

@endsection

@section('js')
<script>
// Ambil elemen input pencarian
    const searchInput = document.getElementById('searchInput');

    // Tambahkan event listener untuk menangani input pada elemen input pencarian
    searchInput.addEventListener('change', function() {
        const searchText = this.value.toLowerCase(); // Ambil teks pencarian dan ubah ke huruf kecil

        // Ambil semua baris dalam tabel kecuali baris header
                    const rows = document.querySelectorAll('tbody tr');

        // Loop melalui setiap baris dan sembunyikan yang tidak cocok dengan teks pencarian
        rows.forEach(row => {
            const nama = row.querySelector('td:nth-child(1)').textContent.toLowerCase(); // Ambil teks nama dan ubah ke huruf kecil
            const tanggalLaporan = row.querySelector('td:nth-child(2)').textContent.toLowerCase(); // Ambil teks tanggal laporan dan ubah ke huruf kecil
            const isiLaporan = row.querySelector('td:nth-child(3)').textContent.toLowerCase(); // Ambil teks isi laporan dan ubah ke huruf kecil
            const statusLaporan = row.querySelector('td:nth-child(5)').textContent.toLowerCase(); // Ambil teks status laporan dan ubah ke huruf kecil

            // Jika teks pencarian cocok dengan nama atau tanggal laporan, tampil                kan baris; jika tidak, sembunyikan
            if (nama.includes(searchText) || tanggalLaporan.includes(searchText) || isiLaporan.includes(searchText) || statusLaporan.includes(searchText)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
   document.querySelectorAll('.update-status').forEach(button => {
       button.addEventListener('click', function() {
           var laporanId = this.getAttribute('data-id');
           var modalForm = document.querySelector('#updateStatus form');
           modalForm.setAttribute('action', '{{ route("dashboard.updateStatus", ["laporan" => ":laporan"]) }}'.replace(':laporan', laporanId));
       });
   });
</script>
@endsection

