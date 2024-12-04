<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <title>Selamat Ulang Tahun!</title>
    <link rel="stylesheet" href="{{ asset('css/birthday.css') }}">
</head>
<body>
    <div class="container">
        <div class="title-container">
            <h1 class="title">
                <span>S</span>
                <span>e</span>
                <span>l</span>
                <span>a</span>
                <span>m</span>
                <span>a</span>
                <span>t</span>
                <span>&nbsp;</span>
                <span>U</span>
                <span>l</span>
                <span>a</span>
                <span>n</span>
                <span>g</span>
                <span>&nbsp;</span>
                <span>T</span>
                <span>a</span>
                <span>h</span>
                <span>u</span>
                <span>n</span>
                <span>!</span>
                <span>🎉</span>
            </h1>
        </div>
        
        <div class="cake">
            <div class="plate"></div>
            <div class="layer layer-bottom"></div>
            <div class="layer layer-middle"></div>
            <div class="layer layer-top"></div>
            <div class="icing"></div>
            <div class="candle">
                <div class="flame" id="flame"></div>
            </div>
        </div>

        <button id="blowButton" class="blow-button">Tiup Lilin 🌬️</button>

        <div class="wishes">
            <p>Semoga semua impianmu terwujud</p>
            <p>Panjang umur dan sehat selalu!</p>
        </div>

        <div class="balloons">
            <div class="balloon"></div>
            <div class="balloon"></div>
            <div class="balloon"></div>
            <div class="balloon"></div>
            <div class="balloon"></div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const blowButton = document.getElementById('blowButton');
        const flame = document.getElementById('flame');

        blowButton.addEventListener('click', function() {
            // Matikan api
            if (flame) {
                flame.style.display = 'none';
                blowButton.disabled = true;
                blowButton.textContent = 'Lilin Tertiup! ✨';
                
                console.log('Lilin ditiup!'); // Untuk debugging
                
                // Delay 3 detik sebelum pindah halaman
                setTimeout(() => {
                    try {
                        window.location.href = '{{ route("ucapan") }}';
                    } catch (error) {
                        console.error('Error redirecting:', error);
                    }
                }, 3000);
            } else {
                console.error('Element flame tidak ditemukan');
            }
        });
    });
    </script>
</body>
</html>
