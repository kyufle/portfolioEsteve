<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio pocho</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Elms+Sans:ital,wght@0,100..900;1,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Oswald:wght@200..700&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header id="header">
        <a href=""><img src="images/logo.png" alt="logo empresarial"></a>
        <div>
            <a href="">
                <h3>Sobre mi</h3>
            </a>
            <a href="#works">
                <h3>Trabajos</h3>
            </a>
            <a href="#contact">
                <h3>Contacto</h3>
            </a>
        </div>
    </header>
    <div class="introduccion" id="me">
        <div class="image">
            <img class="asterisco" src="images/asterisco.png" alt="asterisco">
            <img src="images/cuadrados.png" alt="cuadrados con imagen">
            <img class="cat" src="images/gato.png" alt="gato">
        </div>
        <div class="texto">
            Soy Ruth Romero, estudiante de Desarrollo de Aplicaciones Web - DAW.
            Mi formación me ha proporcionado una base sólida en programación orientada a objetos, bases de datos
            relacionales y desarrollo frontend.
            Este portfolio es una colección de mis proyectos durante el segundo año del curso.
        </div>
        <a href="#works" class="work-class"><img src="images/flecha-abajo.png" alt="flecha hacia abajo"></a>
    </div>
    <h1 id="works">Trabajos</h1>
    <div class="container-classes">
        <section class="classes">
            <h2>M06 - Desarrollo web en entorno cliente</h2>
            <p>Este módulo se centra en el desarrollo de la parte de la aplicación web que se ejecuta en el navegador
                del usuario (el cliente), utilizando principalmente JavaScript para añadir interactividad, dinamismo y
                manipular la interfaz de usuario.</p>
            <ul>
                <?php
                $files = scandir("./M6", SCANDIR_SORT_ASCENDING);
                foreach ($files as $file) {
                    if ($file == "." || $file == "..")
                        continue;
                    echo "<li><a href='M6/$file'>$file</a></li>\n";
                }
                ?>
            </ul>
        </section>
        <section class="classes">
            <h2>M07 - Desarrollo web en entorno servidor</h2>
            <p>Este módulo aborda el desarrollo de la parte de la aplicación web que se ejecuta en el servidor,
                encargada de gestionar la lógica del negocio, el acceso a la base de datos y generar la respuesta que se
                enviará al cliente.</p>
            <ul>
                <?php
                $files = scandir("./M7", SCANDIR_SORT_ASCENDING);
                foreach ($files as $file) {
                    if ($file == "." || $file == "..")
                        continue;
                    echo "<li><a href='M7/$file'>$file</a></li>\n";
                }
                ?>
            </ul>
        </section>
        <!-- <section class="classes"> 
        <h2>M08</h2>
        <ul>
            <?php
            $files = scandir("./M8", SCANDIR_SORT_ASCENDING);
            foreach ($files as $file) {
                if ($file == "." || $file == "..")
                    continue;
                echo "<li><a href='M8/$file'>$file</a></li>\n";
            }
            ?>
        </ul>
        
    </section> -->
        <section class="classes">
            <h2>M09 - Diseño de interficies web</h2>
            <p>Este módulo se enfoca en los principios, metodologías y herramientas para diseñar interfaces web
                atractivas y funcionales. Cubre aspectos de usabilidad, accesibilidad, experiencia de usuario (UX) y la
                aplicación de estándares y tecnologías de diseño.</p>
            <ul>
                <?php
                $files = scandir("./M9", SCANDIR_SORT_ASCENDING);
                foreach ($files as $file) {
                    if ($file == "." || $file == "..")
                        continue;
                    echo "<li><a href='M9/$file'>$file</a></li>\n";
                }
                ?>
            </ul>
        </section>
    </div>
    <h1 id="contact">Contacto</h1>
    <div class="contact">
        <div class="classes form">
            <form>
                <div class="name-email">
                    <div class="name">
                        <label for="name">Nombre *</label>
                        <input type="text" name="name" id="name" required>
                    </div>
                    <div class="email">
                        <label for="email">Correo electrónico *</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                </div>

                <label for="phoneNumber">Número de teléfono *</label>
                <input type="tel" name="phoneNumber" id="phoneNumber" required>
                <label for="message">Mensaje *</label>
                <textarea name="message" id="message" required></textarea>
                <div class="button-submit-form">
                    <button type="submit">Enviar</button>
                </div>
            </form>
        </div>
        <div class="all-social-media">
            <a href="https://github.com/kyufle" target="_blank">
                    <div class="classes social-media-contant">
                <img src="images/github.png" alt="github icon">
                <p>¿Quieres ver el código y el trabajo real? En mis repositorios encontrarás la implementación y el
                    historial completo de mis proyectos.</p>
            </div>
            </a>
            <a href="mailto:rromerocarretero.cf@iesesteveterradas.cat" target="_blank">          <div class="classes social-media-contant">
                <img src="images/correo.png" alt="email icon">
                <p>Para consultas laborales, oportunidades de negocio o cualquier pregunta profesional, puedes
                    escribirme directamente al correo electrónico que aparece aquí.
                    <em>Respuesta garantizada en 24 horas</em>
                </p>
            </div>
            </a>
            <a href="https://rromerocarretero.ieti.site/wordpress/" target="_blank">            <div class="classes social-media-contant">
                <img src="images/wordpress.png" alt="wordpress icon">
                <p>¿Buscas ver el resultado final de mi trabajo? En mi sitio web de WordPress está mi portafolio
                    completo, muestras de diseño y contenido.</p>
            </div>
            </a>
            <a href="https://www.youtube.com/" target="_blank">
            <div class="classes social-media-contant">
                <img src="images/youtube.png" alt="youtube icon">
                <p>Todo el contenido que he creado, desde tutoriales y análisis hasta la documentación de mis proyectos,
                    está en mi Canal de YouTube. Es la mejor forma de ver cómo trabajo.</p>
            </div>
            </a>
            <a href="https://x.com/?lang=es" target="_blank">
            <div class="classes social-media-contant">
                <img src="images/twitter.png" alt="twitter icon">
                <p>Para estar al día con mis pensamientos rápidos, noticias del sector, y comentarios sobre mis proyectos en tiempo real. Es el mejor lugar para una conversación rápida.</p>
            </div>
            </a>
        </div>
    </div>
    <div class="flecha-arriba">
                <a href="#header"><img src="images/flecha-arriba.png" alt="flecha arriba"></a>
    </div>
    <footer>
        <div class="footer-baby">
            <p>Esta página está alojada en los servidores de <a href="https://agora.xtec.cat/iesesteveterradas/"
                    target="_blank">Esteve Terradas i Illa</a>.</p>
        </div>
        <div class="social-media">
            <a href="https://github.com/kyufle" target="_blank"><img src="images/github.png" alt="github"></a>
             <a href="mailto:rromerocarretero.cf@iesesteveterradas.cat" target="_blank"><img src="images/correo.png"
                    alt="correo"></a>
            <a href="https://rromerocarretero.ieti.site/wordpress/" target="_blank"><img src="images/wordpress.png"
                    alt="wordpress"></a>
            <a href="https://www.youtube.com/" target="_blank"><img src="images/youtube.png" alt="youtube"></a>
            <a href="https://x.com/?lang=es" target="_blank"><img src="images/twitter.png" alt="twitter"></a>
        </div>
    </footer>

</body>

</html>