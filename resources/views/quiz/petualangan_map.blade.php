@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="mb-5 text-center text-gradient-primary text-shadow-lg display-4 animate__animated animate__bounceInDown"
            style="font-weight: bold;">🗺️ Peta Petualangan Edukasi</h2>
        <div
            style="background-image: url('/images/bg-petualangan.jpg'); background-size: cover; background-position: center; border-radius: 12px; box-shadow: 0 0 20px rgba(0,0,0,0.3);">
            <div class="py-5">
                <div class="row g-4 justify-content-center animate__animated animate__fadeIn">
                    @foreach ($levels as $level)
                                    @php
                                        $is_unlocked = in_array($level, $progress) || $user->level == $level;
                                        $is_done = in_array($level, $progress);
                                        $icons = ['🏕️', '🏞️', '🌋', '🏰', '🏜️', '🏝️', '🌲', '🗿', '🌌', '🧭'];
                                        $icon = $icons[($level - 1) % count($icons)];
                                    @endphp

                                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 animate__animated animate__slideInUp"
                                        style="animation-delay: {{ 0.15 * $loop->index }}s;">
                                        <div
                                            class="card level-card text-center {{ $is_unlocked ? '' : 'locked' }} {{ $user->level == $level ? 'current animate__animated animate__pulse animate__infinite infinite' : '' }}">
                                            <div class="card-body py-4">
                                                <h5 class="card-title mb-2" style="font-size: 1.2rem;">{{ $icon }} Level {{ $level }}</h5>
                                                <div class="mb-3">
                                                    @if ($is_done)
                                                        <span class="badge bg-success rounded-pill animate__animated animate__fadeIn"><i
                                                                class="bi bi-check-circle-fill me-1"></i> Selesai</span>
                                                    @elseif ($user->level == $level)
                                                        <span
                                                            class="badge bg-info rounded-pill animate__animated animate__heartBeat animate__infinite infinite"><i
                                                                class="bi bi-play-circle-fill me-1"></i> Sekarang</span>
                                                    @else
                                                        <span class="badge bg-secondary rounded-pill animate__animated animate__fadeIn"><i
                                                                class="bi bi-lock-fill me-1"></i> Terkunci</span>
                                                    @endif
                                                </div>
                                                @if ($user->level == $level)
                                                    <a href="{{ route('quiz.petualangan.index') }}"
                                                        class="btn btn-play mt-2 btn-sm rounded-pill shadow-sm animate__animated animate__fadeIn"><i
                                                            class="bi bi-play-fill me-1"></i> Mulai</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mt-5 text-center animate__animated animate__fadeIn">
            <form method="POST" action="{{ route('quiz.petualangan.reset') }}">
                @csrf
                <button class="btn btn-danger btn-lg rounded-pill shadow animate__animated animate__shakeX"><i
                        class="bi bi-arrow-clockwise me-2"></i> Mulai Ulang Petualangan</button>
            </form>
        </div>

        @if(session('level_up'))
            <div id="levelUpPopup" class="popup-wrapper">
                <div class="popup-content text-center bg-white p-5 rounded shadow-lg animate__animated animate__bounceIn">
                    <h2 class="mb-3">
                        <i
                            class="bi bi-star-fill text-warning me-2 animate__animated animate__pulse animate__infinite infinite"></i>
                        Level Naik! 🎉
                    </h2>
                    <p class="lead mb-4">
                        Selamat! Kamu telah mencapai
                        <span class="fw-bold">Level {{ $user->level }}</span>!
                        Petualangan baru menanti!
                        <span style="font-size: 1.5em;">🚀</span>
                    </p>
                    <button id="btn-close-popup" type="button"
                        class="btn btn-success mt-3 rounded-pill animate__animated animate__fadeInUp">
                        <i class="bi bi-check-lg me-1"></i> Lanjutkan Petualangan
                    </button>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('styles')
    <style>
        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        }

        .level-card {
            transition: transform 0.3s cubic-bezier(0.25, 0.8, 0.25, 1), box-shadow 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            background: linear-gradient(145deg, #e0e0e0, #fafafa);
            border-radius: 12px;
            box-shadow: 6px 6px 12px #d9d9d9, -6px -6px 12px #ffffff;
            cursor: pointer;
        }

        .level-card:hover {
            transform: translateY(-10px) rotate(3deg);
            /* Efek sedikit naik dan berputar */
            box-shadow: 12px 12px 24px #d1d1d1, -12px -12px 24px #ffffff;
            /* Bayangan lebih dramatis */
        }

        .level-card.locked {
            opacity: 0.6;
            filter: grayscale(80%);
            pointer-events: none;
        }

        .level-card.current {
            border: 2px solid #007bff;
            box-shadow: 0 0 18px rgba(0, 123, 255, 0.6);
        }

        .btn-play {
            background: linear-gradient(to right, #667eea, #764ba2);
            border: none;
            color: #fff;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .btn-play:hover {
            transform: scale(1.08);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .popup-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(2px);
            display: none;
            /* Awalnya disembunyikan */
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }


        .popup-content {
            max-width: 500px;
            width: 90%;
        }

        /* Styling untuk judul yang lebih keren (Gradien dan Bayangan) */
        .text-gradient-primary {
            background: linear-gradient(45deg, #007bff, #6610f2);
            /* Contoh gradien biru ke ungu */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .text-shadow-lg {
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.5);
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Hover 3D effect untuk card
            const cards = document.querySelectorAll('.level-card');
            cards.forEach(card => {
                card.addEventListener('mousemove', (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;
                    const deltaX = (x - centerX) / centerX;
                    const deltaY = (y - centerY) / centerY;
                    card.style.transform = `rotateX(${deltaY * 5}deg) rotateY(${deltaX * 5}deg) scale(1.05)`;
                });

                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'scale(1) rotateX(0deg) rotateY(0deg)';
                });
            });

            @if(session('level_up'))
                // Popup Level Up tampil
                const popup = document.getElementById('levelUpPopup');
                popup.style.display = 'flex';

                // Jalankan confetti saat popup muncul
                confetti({
                    particleCount: 100,
                    spread: 70,
                    origin: { y: 0.6 }
                });

                // Tutup popup saat tombol diklik
                document.getElementById('btn-close-popup').addEventListener('click', function () {
                    popup.style.display = 'none';
                });
            @endif
        });
    </script>
@endpush