<?=view('layouts/header');?> 

  </head>
  <body>
    <div class="fixed-header">
        <div style="color: #3a4a58;" class="container">
          <a href="<?=base_url('home')?>"><i style="display: inline-block; vertical-align: baseline;" class="fas fa-camera-retro fa-2x"></i></a>
          <h1 style="display: inline-block; vertical-align: baseline; margin: 0px; margin-left: 5px;">Visema Insta</h1>
          <div style="float: right; display: flex; justify-content: flex-end">
            <p>Welcome, <?=session('username')?></p>
            <a href="<?=base_url('Profile')?>"><i style="display: inline-block; vertical-align: baseline; margin-top: 5px;" class="fas fa-user-circle fa-2x"></i></a>
          </div>
        </div>
    </div>

    <div class="tm-container" style="margin-top: 70px;"> 
      <?php 
        foreach ($photo as $key) { 
          echo view('layouts/main', $key);
        }
      ?>
    </div>
    <script src="<?=base_url('')?>/dist/js/jquery-3.4.1.min.js"></script>
    <script>
      $(function() {
        // Adjust intro image height based on width.
        $(window).resize(function() {
          var img = $("#tm-intro-img");
          var imgWidth = img.width();

          // 640x425 ratio
          var imgHeight = (imgWidth * 425) / 640;

          if (imgHeight < 300) {
            imgHeight = 300;
          }

          img.css("min-height", imgHeight + "px");
        });
      });
    </script>
  </body>
</html>