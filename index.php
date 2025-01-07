<?php
    $tituloPágina = 'She talk, He talk!'
?>

<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo  $tituloPágina;?></title>
    
        <link rel="stylesheet" href="style/styleMain.css">
    </head>
      <body>
      
        <header>
          <?php include 'php/header.php'; ?>
        </header> 
    <main>
            <div class="linha">

              <div class="coluna1-2">
                  <div class="card">

                    <h3 class="saudacoes">Bem-vindo!</h3>
                    <p>
                    Se você é apaixonado por filmes, séries, animes e documentários, está no lugar certo! Aqui no He Talk, She Talk!, quatro vozes diferentes – cada uma com suas próprias opiniões, gostos e pontos de vista – se juntam para trazer debates envolventes, dicas imperdíveis e análises detalhadas sobre o universo do entretenimento.
                    </p>
                  </div>
              </div>

              <div class="coluna1-2">
                <div class="card">
                  <div class="carousel">
                    <div class="carousel-track">
                      <div class="carousel-item">
                        <img src="https://via.placeholder.com/600x300?text=Image+1" alt="Image 1">
                      </div>
                      <div class="carousel-item">
                        <img src="https://via.placeholder.com/600x300?text=Image+2" alt="Image 2">
                      </div>
                      <div class="carousel-item">
                        <img src="https://via.placeholder.com/600x300?text=Image+3" alt="Image 3">
                      </div>
                    </div>
                    <div class="carousel-buttons">
                      <button class="carousel-button prev">&#10094;</button>
                      <button class="carousel-button next">&#10095;</button>
                    </div>

                    <script src="js/appCarrosel.js"></script>
                  </div>  
                </div>

              </div>
              
            </div>
            
            <div class="linha">
              
            </div>

    </main>

    <footer>
        <?php
          include 'php/footer.php'
        ?>
    </footer>
</body>
</html>