<audio id="bg-music" src="<?php echo e(asset('audio/petualangan.mp3')); ?>" autoplay loop></audio>

<script>
    const music = document.getElementById('bg-music');
    const savedTime = localStorage.getItem('bg-music-time');

    music.volume = 0.3;

    if (savedTime) music.currentTime = parseFloat(savedTime);

    music.play().catch(() => {
        document.addEventListener('click', function once() {
            music.play();
            document.removeEventListener('click', once);
        });
    });

    setInterval(() => {
        if (!music.paused) {
            localStorage.setItem('bg-music-time', music.currentTime);
        }
    }, 500);
</script>
<?php /**PATH C:\xampp\htdocs\sicerdas\resources\views/partials/music.blade.php ENDPATH**/ ?>