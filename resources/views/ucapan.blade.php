<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Happy Birthday! 🎉</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Poppins:wght@300;400;500&family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/ucapan.css') }}">
</head>
<body>
    <div class="hearts" id="hearts"></div>
    <div class="stars" id="stars"></div>
    <div class="container">
        <div class="content-wrapper">
            <div class="profile-frame">
                <img src="img/pp1.png" alt="Birthday Person" class="profile-pic">
            </div>
            
            <!-- Bagian pesan ucapan -->
            <div class="birthday-message">
                <p>Di hari spesialmu ini,</p>
                <p>Semoga semua impian dan harapanmu menjadi kenyataan</p>
                <p class="hide-on-scroll">Tetap tersenyum dan bahagia selalu! 💖</p>
            </div>
            
            <!-- Bagian quotes -->
            <div class="quote-section">
                <p class="quote">"Usia hanyalah angka, yang terpenting adalah bagaimana kamu menjalani setiap momentnya dengan penuh makna"</p>
            </div>
                
            <!-- Galeri foto dengan caption -->
            <div class="photo-gallery">
                <div class="photo-item">
                    <img src="img/1.jpg" alt="Memory 1">
                    <div class="photo-caption">Moment Bahagia 1</div>
                </div>
                <div class="photo-item">
                    <img src="img/2.jpg" alt="Memory 2">
                    <div class="photo-caption">Moment Bahagia 2</div>
                </div>
                <div class="photo-item">
                    <img src="img/3.jpg" alt="Memory 3">
                    <div class="photo-caption">Moment Bahagia 3</div>
                </div>
                <div class="photo-item">
                    <img src="img/4.jpg" alt="Memory 4">
                    <div class="photo-caption">Moment Bahagia 4</div>
                </div>
            </div>
        </div>
        
        <button class="memory-btn">A Memorize</button>
    </div>

    <!-- Tambahkan modal untuk video -->
    <div class="modal" id="videoModal">
        <div class="modal-content">
            <button class="close-btn" onclick="closeVideo()">&times;</button>
            <div class="video-container">
                <div id="videoFrame"></div>
            </div>
        </div>
    </div>

    <!-- Tambahkan YouTube API -->
    <script src="https://www.youtube.com/iframe_api"></script>

    <script>
        let player;

        function createHearts() {
            const hearts = document.getElementById('hearts');
            const emojis = [];
            
            setInterval(() => {
                const heart = document.createElement('div');
                heart.className = 'heart';
                heart.style.left = Math.random() * 100 + 'vw';
                heart.textContent = '';
                heart.style.fontSize = (Math.random() * 20 + 10) + 'px';
                heart.style.animationDuration = (Math.random() * 2 + 3) + 's';
                hearts.appendChild(heart);

                setTimeout(() => {
                    heart.remove();
                }, 4000);
            }, 300);
        }

        function createCelebrationIcons() {
            const container = document.querySelector('.container');
            const icons = [];
            
            icons.forEach((icon, index) => {
                const celebIcon = document.createElement('div');
                celebIcon.className = 'celebration-icons';
                celebIcon.textContent = icon;
                celebIcon.style.left = (20 + index * 25) + '%';
                celebIcon.style.top = '20px';
                celebIcon.style.animationDelay = (index * 0.2) + 's';
                container.appendChild(celebIcon);
            });
        }

        // Fungsi untuk menampilkan video
        function showVideo() {
            const modal = document.getElementById('videoModal');
            const videoId = 'OR_VVY2pAzQ';
            
            // Inisialisasi player YouTube jika belum ada
            if (!player) {
                player = new YT.Player('videoFrame', {
                    videoId: videoId,
                    playerVars: {
                        'autoplay': 0,
                        'modestbranding': 1,
                        'rel': 0,
                        'playsinline': 1,     // Untuk iOS
                        'fs': 1,              // Mengizinkan fullscreen
                        'controls': 1         // Menampilkan kontrol player
                    },
                    events: {
                        'onReady': function(event) {
                            event.target.setVolume(25);
                        }
                    }
                });
            } else {
                player.loadVideoById(videoId);
                player.setVolume(25);
            }
            
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        // Fungsi untuk menutup video
        function closeVideo() {
            const modal = document.getElementById('videoModal');
            if (player) {
                player.stopVideo();
            }
            modal.style.display = 'none';
            
            // Kembalikan scroll body
            document.body.style.overflow = '';
        }

        // Menambahkan event listener ke tombol
        document.querySelector('.memory-btn').addEventListener('click', showVideo);

        // Menutup modal jika user klik di luar video
        window.onclick = function(event) {
            const modal = document.getElementById('videoModal');
            if (event.target == modal) {
                closeVideo();
            }
        }

        function createShootingStars() {
            const starsContainer = document.getElementById('stars');
            const colors = [
                '#FFD700', // Gold
                '#FF1493', // Deep Pink
                '#00FFFF', // Cyan
                '#FF69B4', // Hot Pink
                '#FFA500', // Orange
                '#FF4500', // OrangeRed
                '#FF0000', // Red
                '#00FF00', // Lime
                '#1E90FF', // DodgerBlue
                '#FF00FF'  // Magenta
            ];
            
            function createStar() {
                const numberOfStars = Math.floor(Math.random() * 2) + 1;
                
                for(let i = 0; i < numberOfStars; i++) {
                    const star = document.createElement('div');
                    star.className = 'shooting-star';
                    
                    star.style.top = Math.random() * 100 + '%';
                    
                    // Warna lebih solid tanpa transparansi
                    const randomColor = colors[Math.floor(Math.random() * colors.length)];
                    star.style.background = `linear-gradient(90deg, ${randomColor} 0%, ${randomColor}80 50%, transparent 100%)`;
                    star.style.color = randomColor;
                    
                    starsContainer.appendChild(star);
                    
                    setTimeout(() => {
                        star.remove();
                    }, 3500);
                }
            }
            
            setInterval(createStar, 2000);
            
            setInterval(() => {
                const burstCount = Math.floor(Math.random() * 3) + 2;
                for(let i = 0; i < burstCount; i++) {
                    setTimeout(createStar, Math.random() * 1000);
                }
            }, 8000);
        }

        window.onload = () => {
            createHearts();
            createCelebrationIcons();
            createShootingStars();
        }

        // Menangani touch events untuk mobile
        document.addEventListener('touchstart', function(e) {
            if (e.target.classList.contains('memory-btn')) {
                e.preventDefault();
                showVideo();
            }
        }, {passive: false});

        // Memperbaiki masalah double tap zoom di iOS
        let lastTouchEnd = 0;
        document.addEventListener('touchend', function(e) {
            const now = (new Date()).getTime();
            if (now - lastTouchEnd <= 300) {
                e.preventDefault();
            }
            lastTouchEnd = now;
        }, false);
    </script>
</body>
</html>
