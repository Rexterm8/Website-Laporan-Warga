<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informasi Profil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Berikut informasi data anda") }}
        </p>
    </header>

        <div class="position-relative">
            <table class="text-black">

            <tr>
                <td>Nama</td>
                <td>&nbsp;: &nbsp;{{ $user->nama }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>&nbsp;: &nbsp;{{ $user->email }}</td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>&nbsp;: &nbsp;{{ $user->tanggal_lahir }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>&nbsp;: &nbsp;{{ $user->nik }}</td>
            </tr>

        </table>


            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <!-- Other profile fields -->
                @if ($user->foto)
                    <div class="mb-3 position-absolute top-0 end-0 me-5 pe-05">
                    <label for="photo" class="form-label"><img id="previewPhoto" src="/storage/{{ $user->foto }}" alt="User-Profile" style="cursor: pointer; margin-top: -103px; margin-right: 150px; width: 7.5cm; height: 7.5cm" class="theme-color-default-img img-fluid avatar avatar-100 avatar-rounded "></label>
                    <div></div>
                    <input type="file" class="form-control d-none" id="photo" name="foto">
                </div>
                @else
                <div class="mb-3 position-absolute top-0 end-0 me-5 pe-05">
                    <label for="photo" class="form-label"><img id="previewPhoto" src="../assets/images/avatars/01.png" alt="User-Profile" style="cursor: pointer; margin-top: -103px; margin-right: 150px; width: 7.5cm; height: 7.5cm" class="theme-color-default-img img-fluid avatar avatar-100 avatar-rounded "></label>
                    <div></div>
                    <input type="file" class="form-control d-none" id="photo" name="foto">
                </div>

                @endif


                <button type="submit" class="btn btn-primary mt-3">Perbarui Profil</button>
            </form>
        </div>

</section>
