<?php

header('Content-Type: text/html; charset=UTF-8');
$json = file_get_contents("data/quran.json");
$data = json_decode($json, true)['data'];



// Cek apakah parameter surah ada
$surahNumber = isset($_GET['surah']) ? (int)$_GET['surah'] : null;

?>
<?php include "components/head.html";?>

<body>
   <div class="github">
      <a id="github">
         <img src="./images/peel.png" width="50" height="50" class="d-inline-block align-top" alt="github">
      </a>
   </div>

   <?php include "components/header.html";?>

   <div class="container rounded">

      <?php
                $surahData = null;
                foreach ($data as $surah) {
                    if ($surah['number'] === $surahNumber) {
                        $surahData = $surah;
                        break;
                    }
                }
            ?>
      <?php if ($surahData): ?>
      <h3 id="namaSurah" class="text-white m-3">Surah <?= $surahData['name']['transliteration']['id']; ?>
         (<?= $surahData['name']['translation']['id']; ?>)
      </h3>
      <?php foreach ($surahData['verses'] as $verse): ?>

      <div id="verse" class="bg-white card rounded m-2 mt-2 ">

         <div class="row   ">
            <div class="col-md-2 text-center pt-4 ">
               <div class="image-container ">
                  <img src="images/segi8.png" width="40" height="40" class="d-inline-block align-top" alt="separator">
                  <p class="overlay-text  ">
                     <?=  $verse ['number']['inSurah']; ?> </p>
               </div>
            </div>

            <div class="col-md-10 card-body arabic-text text-right ">
               <p class="fs-4 fw-bolder lh-lg pe-4"><?= $verse['text']['arab'] ;?>
               </p>
            </div>
         </div>
         <div class="dropdown-divider"></div>
         <div class="transliteration mx-4 ">Latin :</div>
         <div class="transliteration mx-4 m-2 "><?= $verse['text']['transliteration']['en']; ?></div>
         <div class="dropdown-divider"></div>
         <div class="transliteration mx-4 ">Terjemahan :</div>
         <div class=" mx-4 fw-lighter  fst-italic m-2"><?= $verse['translation']['id']; ?></div>

      </div>
      <?php endforeach; ?>
      <div class="m-3 mb-5">
         <a href="/quran/surah.php?surah=<?php echo $surahNumber+1?>">Surah Selanjutnya </a>
      </div>

      <!-- Back to Top -->
      <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded "><i class="bi bi-arrow-up"></i></a>
      <?php else: ?>
      <h1>Surah tidak ditemukan</h1>
      <div class="mt-3">
         <a href="/quran/">Home</a>
      </div>
      <?php endif; ?>
   </div>

   <section class="sticky footer bg-dark text-white">
      <footer class="">
         <p>&copy; 2025 Quran Kareem. All rights reserved.</p>
      </footer>
   </section>

   <script src="js/dark.js"></script>
</body>

</html>