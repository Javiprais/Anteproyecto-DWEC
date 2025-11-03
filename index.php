 <?php
    include("./views/layout/header.php")
    ?>

 <body>
     <!-- LANDING PAGE -->
     <div class="modal" id="miModal">
         <div class="modal-content">
             <iframe id="iframeModal" src="login_app.php" width="100%" height="100%" frameborder="0"></iframe>
         </div>
     </div>
     <section class="hero">
         <div class="hero-content">

             <div class="hero-icon"><img src="public/images/icons/gamepad.svg" alt="Mando"></div>
             <h1>Comparte tus <span>LOGROS</span></h1>
             <p>Únete a la comunidad gamer y muestra tus estadísticas</p>

             <div class="hero-buttons">
                 <a href="index.php?page=register" class="btn-primary">Comienza ahora</a>
                 <a href="#ejemplos" class="btn-secondary">Ver ejemplos</a>
             </div>
         </div>
     </section>

     <script>
         function abrirModal(vista) {
             const iframe = document.getElementById('iframeModal');
             iframe.src = 'login_app.php?vista=' + vista; // 👈 cambiamos la vista
             document.getElementById('miModal').style.display = 'flex';
         }

         function cerrarModal() {
             document.getElementById('miModal').style.display = 'none';
         }

         window.onclick = function(event) {
             const modal = document.getElementById('miModal');
             if (event.target === modal) {
                 modal.style.display = 'none';
             }
         }
     </script>
 </body>
 <?php
    include("./views/layout/footer.php")
    ?>