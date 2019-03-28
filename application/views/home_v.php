<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">        
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" integrity="sha384-DmABxgPhJN5jlTwituIyzIUk6oqyzf3+XuP7q3VfcWA2unxgim7OSSZKKf0KSsnh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/wikistyle.css"); ?>" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>KodMerkezi Sözlük - Alpha </title>
</head>
<body>
    <nav class="navbar navbar-expand navbar-white bg-light">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="https://linkedin.com/in/hlilbilgin" target="_blank">Hakkımda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://halilbilgin.com" target="_blank">Daha Fazlası</a>
          </li>
        </ul>
        <span class="navbar-text">
          <a href="https://forms.gle/Dget2SL4d2uoJLsJ7" target="_blank">Geri Bildirim</a>
        </span>
    </nav>
    <div class="container-fluid">
        <div class="kmhead">
            <div class="logo">
                <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url("assets/src/km.png"); ?>" id="kmlogo" alt="kodmerkezi"></a>
            </div>
            <div>
                <input id="kmsearch" name="kmsearch" class="kminput" type="text" name="q" maxlength="100" title="Search" autocomplete="off" placeholder="KodMerkezi Alpha Version">
                <input id="kmsubmit" class="kminput" type="submit" value="Ara">
            </div>
        </div>
    </div>
    <div class="container bg-dark">
            <div class="cont-title">
                <div class="kmsocial text-center">
                <div class="row">
                    <div class="col-3">
                       <a href="https://linkedin.com/in/hlilbilgin" target="_blank"><i class="fab fa-linkedin"></i></a>
                    </div>
                    <div class="col-3">
                       <a href="https://instagram.com/kodmerkezi" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                    <div class="col-3">
                       <a href="https://twitter.com/hlilbilgin" target="_blank"><i class="fab fa-twitter-square"></i></a>
                    </div>
                    <div class="col-3">
                       <a href="https://github.com/hlilbilgin" target="_blank"><i class="fab fa-github-square"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="data" style="margin:0;">
              <?php 
                echo "<div class='col-md-12 text-center'><b>Son Kayıtlar:</b><hr></div>";
            foreach ($res as $row){?>
            <div class="col-md-3 col-sm-6 datacard-border">
                <div class="datacard">
                    <b><?php echo $row->name;?></b>
                    <i class="datacard-body">
                        <?php echo $row->content;?>
                    </i>
                </div>
            </div>
            <?php }
            ?>
        </div>
        </div>
    <footer class="sticky-bottom text-center py-4">KodMerkezi - 2017</footer>
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
       $('#kmsearch').keypress(function(e){
            if(e.which == 13){//Enter key pressed
                ara();
            }
        });
       $('#kmsubmit').click(function(){
          ara();
       });
        function ara(){
            const search=$('#kmsearch').val();
               $.ajax({
                   url: '<?php echo base_url("welcome/paramControl/"); ?>',
                   type:'POST',
                   data:{search: search},
                   success: function(result){
                        console.log(result);
                       $("#data").html("");
                       $("#data").html(result);
                    }
               })
        }
    </script>
</body>
</html>