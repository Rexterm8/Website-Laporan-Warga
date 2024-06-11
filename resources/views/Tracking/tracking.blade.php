@extends('layouts.app')

@section('title', 'Tracking')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between flex-wrap">
                        <div class="header-title">
                            <h4 class="card-title mb-2">Tracking Laporan</h4>
                            <p class="mb-0">
                                Laporan ID : {{ $laporan->id }}
                            </p>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($laporan->status == 'Sudah Selesai')
                            <div class=" d-flex profile-media align-items-top mb-2">
                                <div class="profile-dots-pills border-primary mt-1"></div>
                                <div class="ms-4">
                                    <h4 class=" mb-1">Laporan Selesai</h4>
                                    <h6>Terimakasih telah menggunakan website AyoLapor!</h6>
                                    <span
                                        class="mb-0">{{ $laporan->updated_at->timezone('Asia/Jakarta')->format('d F Y H:i:s') }}</span>
                                </div>
                            </div>
                        @endif

                        @if ($laporan->status == 'Ditolak')
                            <div class=" d-flex profile-media align-items-top mb-2">
                                <div class="profile-dots-pills border-primary mt-1"></div>
                                <div class="ms-4">
                                    <h4 class=" mb-1">Laporan Ditolak</h4>
                                    <h6>Laporan tidak dapat ditindaklanjuti</h6>
                                    <span
                                        class="mb-0">{{ $laporan->updated_at->timezone('Asia/Jakarta')->format('d F Y H:i:s') }}</span>
                                </div>
                            </div>
                        @endif

                        {{-- @if ($laporan->created_at->addDays($hari)->addDays($hari) <= now())
                        <div class=" d-flex profile-media align-items-top mb-2">
                            <div class="profile-dots-pills border-primary mt-1"></div>
                            <div class="ms-4">
                                <h4 class=" mb-1">Laporan Anda Akan Ditindak Ulang</h4>
                                <h6>Estimasi Laporan Selesai : {{ $laporan->created_at->addDays($hari)->addDays($hari)->addDays($hari)->timezone('Asia/Jakarta')->format('d F Y') }}</h6>
                                <span
                                    class="mb-0">{{ $laporan->created_at->addDays($hari)->addDays($hari)->timezone('Asia/Jakarta')->format('d F Y H:i:s') }}</span>
                            </div>
                        </div>
                    @endif --}}


                        @for ($i = $diffCounter - 1; $i >= 0; $i--)

                                <div class=" d-flex profile-media align-items-top mb-2">
                                    <div class="profile-dots-pills border-primary mt-1"></div>
                                        <div class="ms-4">
                                            <h4 class=" mb-1">Laporan Anda Akan Ditindak Ulang</h4>
                                            <h6>Estimasi Laporan Selesai : {{ $laporan->created_at->addDays($hari * ($i+1))->addDays($hari)->timezone('Asia/Jakarta')->format('d F Y') }}</h6>
                                            <span
                                            class="mb-0">{{ $laporan->created_at->addDays($hari * ($i+1))->timezone('Asia/Jakarta')->format('d F Y H:i:s') }}</span>
                                        </div>
                                </div>

                        @endfor


                        <div class=" d-flex profile-media align-items-top mb-2">
                            <div class="profile-dots-pills border-primary mt-1"></div>
                            <div class="ms-4">
                                <h4 class=" mb-1">Laporan Masuk & Sedang DitindakLanjuti</h4>
                                <h6>Estimasi Laporan Selesai : {{ $laporan->created_at->addDays($hari)->timezone('Asia/Jakarta')->format('d F Y') }}</h6>
                                <span
                                    class="mb-0">{{ $laporan->created_at->timezone('Asia/Jakarta')->format('d F Y H:i:s') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
