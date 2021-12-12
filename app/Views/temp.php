<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?=$jdlapp?></title>
   <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-dark bg-danger bg-gradient">
      <div class="container">
         <a class="navbar-brand" href="<?= base_url() ?>">MIGRATE GENERATOR V1.0</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navSC" aria-controls="navSC" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navSC">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="#">(<?= db_connect()->database ?>)</a>
               </li>
            </ul>
         </div>
      </div>
   </nav>
   <div class="container mt-4">
      <?= $contents; ?>
      <!-- footer -->
      <footer class="mt-4 text-muted">ASA_CODE &copy; 2021. Upgrading Programming Skils From Newbie to Next Level</footer>
   </div>
   <script src="<?= base_url('assets/js/jquery-3.5.1.min.js') ?>"></script>
   <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>