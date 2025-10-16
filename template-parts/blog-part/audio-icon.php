<?php
    $post_format_url = function_exists('get_field') ? get_field('post_format_url') : null;
?>

<?php if (!empty($post_format_url)): ?>
    <div class="blog-card__audio-icon">
        <button class="play-btn border-0" aria-label="Play/Pause">
            <svg class="icon-play" width="50" height="50" viewBox="0 0 50 50" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M15 20V30H20L28 36V14L20 20H15Z" fill="black" />
                <path d="M32 20C33.5 21.5 33.5 28.5 32 30" stroke="black" stroke-width="2" stroke-linecap="round" />
            </svg>

            <svg class="icon-pause" width="50" height="50" viewBox="0 0 50 50" fill="none"
                xmlns="http://www.w3.org/2000/svg" style="display:none;">
                <rect x="15" y="14" width="6" height="22" fill="black" />
                <rect x="24" y="14" width="6" height="22" fill="black" />
            </svg>
        </button>
        <audio src="<?php echo esc_url($post_format_url); ?>"></audio>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const audioWrapper = document.querySelector('.blog-card__audio-icon');
        const playBtn = audioWrapper.querySelector('.play-btn');
        const audio = audioWrapper.querySelector('audio');
        const iconPlay = audioWrapper.querySelector('.icon-play');
        const iconPause = audioWrapper.querySelector('.icon-pause');

        playBtn.addEventListener('click', function() {
          if (audio.paused) {
            audio.play();
            iconPlay.style.display = 'none';
            iconPause.style.display = 'block';
          } else {
            audio.pause();
            iconPlay.style.display = 'block';
            iconPause.style.display = 'none';
          }
        });

        // যখন audio শেষ হয়ে যাবে তখন icon আবার play এ ফিরে যাবে
        audio.addEventListener('ended', function() {
          iconPlay.style.display = 'block';
          iconPause.style.display = 'none';
        });
      });
    </script>
<?php endif; ?>
