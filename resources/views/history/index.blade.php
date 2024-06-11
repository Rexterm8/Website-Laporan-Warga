@extends('layouts.app')

@section('title', 'History')

@section('content')

<div class="row">
  <div class="col-md-12">
      <!-- Card untuk menampilkan riwayat laporan -->
      <div class="card mt-5" data-aos="fade-up" data-aos-delay="800">
         <div class="card-body">
            <div class="table-responsive">
               <table class="table">
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

                  <thead class="text-black">
                     <tr>
                        <th>Nama</th>
                        <th>Tanggal Laporan</th>
                        <th>Kategori</th>
                        <th>Isi Laporan</th>
                        <th>Bukti Laporan</th>
                        <th>Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     <!-- Looping untuk menampilkan setiap laporan -->
                     @foreach ($laporan as $row)

                        <tr onclick="window.location='/tracking/{{ $row['id'] }}'" class="hovering" >
                           <td>{{ $row['user']['nama'] }}</td>
                           <td>{{ \Carbon\Carbon::parse($row['created_at'])->timezone('Asia/Jakarta')->format('d F Y H:i:s') }}</td>
                           <td><strong>{{ $row['kategori'] }}</strong></td>
                           <td style="max-width: 25rem;white-space:normal; word-wrap:break-word; cursor: pointer;"><div style="max-height: 4.5rem; overflow:hidden"onclick="this.classList.toggle('expanded')">{{ $row['name'] }}</td>
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
                        </tr>

                     @endforeach
                  </tbody>
               </table>
                </div>
         </div>
      </div>
  </div>
  <ul class="pagination justify-content-center">
    {{ $laporan->links() }}
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
    </script>
@endsection
