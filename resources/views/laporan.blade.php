<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Form AyoLapor</title>

      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />

      <!-- Library / Plugin Css Build -->
      <link rel="stylesheet" href="{{ asset('assets/css/core/libs.min.css') }}" />

      <!-- Hope Ui Design System Css -->
      <link rel="stylesheet" href="{{ asset('assets/css/hope-ui.min.css?v=2.0.0') }}" />

      <!-- Custom Css -->
      <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css?v=2.0.0') }}" />

      <!-- Dark Css -->
      <link rel="stylesheet" href="{{ asset('assets/css/dark.min.css') }}"/>

      <!-- Customizer Css -->
      <link rel="stylesheet" href="{{ asset('assets/css/customizer.min.css') }}" />

      <!-- RTL Css -->
      <link rel="stylesheet" href="{{ asset('assets/css/rtl.min.css') }}"/>

      <!-- Flatpickr css -->
      <link rel="stylesheet" href="{{ asset('assets/vendor/flatpickr/dist/flatpickr.min.css') }}" />

      <style>
        body {
          overflow-x: hidden;
        }

        .main-img .container h1 span {
          text-transform: capitalize;
        }

        @media (min-width: 1140px) {
            .container.body-class-1 {
                margin-left: 280px;
            }
        }

        @media (min-width: 1340px) {
            .container.body-class-1 {
                margin-left: 560px;
            }
        }

        .container.body-class-1 {
          margin-bottom: 200px;
        }
      </style>
  </head>
  <body class="uikit " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body"></div>
      </div>    </div>

      <div class="wrapper">
    <span class="uisheet screen-darken"></span>
    <div class="header" style="background: url('./assets/images/dashboard/top-image.jpg'); background-size: cover; background-repeat: no-repeat; height: 100vh;position: relative;">
        <div class="main-img">
            <div class="container">
                <svg class="icon-150"  width="150" viewBox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="-0.423828" y="34.5762" width="50" height="7.14286" rx="3.57143" transform="rotate(-45 -0.423828 34.5762)" fill="white"/>
                    <rect x="14.7295" y="49.7266" width="50" height="7.14286" rx="3.57143" transform="rotate(-45 14.7295 49.7266)" fill="white"/>
                    <rect x="19.7432" y="29.4902" width="28.5714" height="7.14286" rx="3.57143" transform="rotate(45 19.7432 29.4902)" fill="white"/>
                    <rect x="19.7783" y="-0.779297" width="50" height="7.14286" rx="3.57143" transform="rotate(45 19.7783 -0.779297)" fill="white"/>
                </svg>
                <h1 class="my-4">
                    <span>Form AyoLapor!</span>
                </h1>
            </div>
        </div>
        <div class="container">
            <nav class="rounded nav navbar navbar-expand-lg navbar-light top-1">
                <div class="container-fluid">
                    <a class="mx-2 navbar-brand" href="/">
                        <div class="logo-main">
                            <div class="logo-normal">
                                <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                                    <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                                    <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                                    <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                                </svg>
                            </div>
                            <div class="logo-mini">
                                <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                                    <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                                    <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                                    <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                                </svg>
                            </div>
                        </div>

                        <h5 class="logo-title">AyoLapor!</h5>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-2" aria-controls="navbar-2" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar-2">
                        <ul class="mb-2 navbar-nav ms-auto mb-lg-0 d-flex align-items-start">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('dashboard.index') }}">Dashboard</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="row justify-content-center">
<div class="col-md-12">
  <div class="container body-class-1 mt-5 pt-5">
    <div class="bd-cheatsheet container-fluid bg-trasprent">
        <section id="forms">
            <article id="overview">
                <div class="card iq-document-card iq-doc-head">
                    <div class="tab-content">
                        <div class="tab-pane bd-heading-1 fade show active" id="content-form-prv" role="tabpanel">
                            <div class="bd-example">
                                <!-- Menampilkan pesan sukses jika ada -->
                                @if(session()->has('success'))
                                <div class="alert alert-success alert-dismissble fade show" role="alert">
                                   {{ session('success') }}
                                   {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                                </div>
                                @endif

                                <!-- Form laporan -->
                                <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="isi" class="form-label">Kategori</label>
                                        <select class="form-control text-black" id="kategori" name="kategori" required>
                                            <option value="">Kategori</option>
                                            <option value="Fasilitas Umum">Fasilitas Umum</option>
                                            <option value="Kriminal">Kriminal</option>
                                         </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="isi" class="form-label">Isi laporan</label>
                                        <input type="text" class="form-control" id="isi" name="isi" placeholder="Isi Laporan" required>
                                    </div>
                                    <div class="mb-3">
                                      <label for="isi" class="form-label">Upload Lampiran Foto atau Video</label>
                                      <input type="file" class="form-control form-control-sm" id="lampiran" name="lampiran" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </div>
  </div>
</div>
    </div>

  </div>

    <!-- Library Bundle Script -->
    <script src="{{ asset('assets/js/core/libs.min.js') }}"></script>

    <!-- External Library Bundle Script -->
    <script src="{{ asset('assets/js/core/external.min.js') }}"></script>

    <!-- Widgetchart Script -->
    <script src="{{ asset('assets/js/charts/widgetcharts.js') }}"></script>

    <!-- mapchart Script -->
    <script src="{{ asset('assets/js/charts/vectore-chart.js') }}"></script>
    <script src="{{ asset('assets/js/charts/dashboard.js') }}" ></script>

    <!-- fslightbox Script -->
    <script src="{{ asset('assets/js/plugins/fslightbox.js') }}"></script>

    <!-- Settings Script -->
    <script src="{{ asset('assets/js/plugins/setting.js') }}"></script>

    <!-- Slider-tab Script -->
    <script src="{{ asset('assets/js/plugins/slider-tabs.js') }}"></script>

    <!-- Form Wizard Script -->
    <script src="{{ asset('assets/js/plugins/form-wizard.js') }}"></script>

    <!-- App Script -->
    <script src="{{ asset('assets/js/hope-ui.js') }}" defer></script>

    <!-- Flatpickr Script -->
    <script src="{{ asset('assets/vendor/flatpickr/dist/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/flatpickr.js') }}" defer></script>

    <script src="{{ asset('assets/js/plugins/prism.mini.js') }}"></script>
  </body>
</html>
