 <?php
    include("./views/layout/header.php")
    ?>

 <body>
     <!-- LANDING PAGE -->
     <div class="modal" id="miModal" style="display: none;">
         <div class="modal-content" id="contenidoModal"></div>
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
             fetch('login_app.php?vista=' + vista)
                 .then(r => r.text())
                 .then(html => {
                     document.getElementById('contenidoModal').innerHTML = html;
                     document.getElementById('miModal').style.display = 'flex';
                 });
         }

         function cerrarModal() {
             document.getElementById('miModal').style.display = 'none';
             document.getElementById('contenidoModal').innerHTML = '';
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