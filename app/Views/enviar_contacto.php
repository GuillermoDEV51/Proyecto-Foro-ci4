<?php
// contacto.php
require 'vendor/autoload.php'; // Carga automática de Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$statusMessage = '';
$statusClass   = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitiza la entrada
    $nombre  = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $email   = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $asunto  = filter_input(INPUT_POST, 'asunto', FILTER_SANITIZE_STRING);
    $mensaje = filter_input(INPUT_POST, 'mensaje', FILTER_SANITIZE_STRING);

    if (!$nombre || !$email || !$asunto || !$mensaje) {
        $statusMessage = 'Por favor, completa todos los campos.';
        $statusClass   = 'error';
    } else {
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP (Mailtrap)
            $mail->isSMTP();
            $mail->Host       = 'smtp.mailtrap.io';
            $mail->SMTPAuth   = true;
            $mail->Username   = '3005229a9a1afd';   // tu usuario Mailtrap
            $mail->Password   = 'fc68e82f3cb182';   // tu contraseña Mailtrap
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 2525;

            // Remitente y destinatario
            $mail->setFrom($email, $nombre);
            $mail->addAddress('alarconbooking1@gmail.com', 'Soporte Forum');

            // Contenido del mensaje
            $mail->Subject = $asunto;
            $mail->Body    = "Nombre: $nombre\nEmail: $email\n\nMensaje:\n$mensaje";

            // Enviar
            $mail->send();

            $statusMessage = 'Mensaje enviado correctamente.';
            $statusClass   = 'success';
        } catch (Exception $e) {
            $statusMessage = "Error al enviar el mensaje: {$mail->ErrorInfo}";
            $statusClass   = 'error';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contacto – Foro de Proyectos</title>
  <!-- Tipografía similar a Scribd -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <style>
    :root {
      --color-acento: rgb(255, 94, 0);
      --color-fondo: #f5f5f5;
      --color-texto: #333333;
      --color-header: #ffffff;
      --color-nav: #ffffff;
      --color-botones: rgb(255, 94, 0);
      --color-success: rgb(40, 167, 69);
      --color-error: rgb(220, 53, 69);
      --radio-bordes: 4px;
      --sombra-card: rgba(0, 0, 0, 0.1);
    }
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    body {
      font-family: 'Roboto', sans-serif;
      background-color: var(--color-fondo);
      color: var(--color-texto);
      line-height: 1.6;
      position: relative;
      overflow-x: hidden;
    }
    body::before {
      content: "";
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: url('https://images.unsplash.com/photo-1457369804613-52c61a468e7d') center/cover no-repeat;
      opacity: 0.5;
      z-index: -1;
    }
    a {
      text-decoration: none;
      color: inherit;
    }
    ul {
      list-style: none;
    }
    header {
      background-color: var(--color-header);
      border-bottom: 1px solid #e0e0e0;
      position: sticky; top: 0; z-index: 100;
      box-shadow: 0 2px 4px var(--sombra-card);
    }
    .header-container {
      max-width: 1100px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0.75rem 1rem;
    }
    .logo {
      display: flex;
      align-items: center;
    }
    .logo img {
      height: 32px;
      margin-right: 0.5rem;
    }
    .logo span {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--color-acento);
      letter-spacing: 1px;
    }
    .login-link {
      font-weight: 500;
      color: var(--color-texto);
      padding: 0.5rem 0.75rem;
      border-radius: var(--radio-bordes);
      transition: background-color 0.2s ease;
    }
    .login-link:hover {
      background-color: #f0f0f0;
    }
    nav {
      background-color: var(--color-nav);
      border-bottom: 1px solid #e0e0e0;
    }
    .nav-container {
      max-width: 1100px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      padding: 0.5rem 1rem;
      gap: 1.5rem;
    }
    .nav-container a {
      font-weight: 500;
      color: var(--color-texto);
      font-size: 0.95rem;
      transition: color 0.2s, transform 0.2s;
    }
    .nav-container a:hover {
      color: var(--color-acento);
      transform: translateY(-2px);
    }
    .nav-container a.active {
      color: var(--color-acento);
      font-weight: 700;
    }
    .main-content {
      max-width: 600px;
      margin: 2rem auto;
      padding: 1rem;
      background-color: #fff;
      border-radius: var(--radio-bordes);
      box-shadow: 0 1px 3px var(--sombra-card);
    }
    .section-title {
      font-size: 1.4rem;
      font-weight: 700;
      margin-bottom: 1rem;
      color: var(--color-acento);
      text-align: center;
    }
    form {
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }
    label {
      font-weight: 500;
      margin-bottom: 0.25rem;
    }
    input[type="text"], input[type="email"], textarea {
      width: 100%;
      padding: 0.5rem;
      border: 1px solid #ccc;
      border-radius: var(--radio-bordes);
      font-size: 1rem;
      transition: border-color 0.2s;
    }
    input[type="text"]:focus, input[type="email"]:focus, textarea:focus {
      border-color: var(--color-acento);
      outline: none;
      box-shadow: 0 0 5px rgb(155, 58, 1);
    }
    textarea {
      resize: vertical;
      min-height: 120px;
    }
    button[type="submit"] {
      background-color: var(--color-botones);
      color: #fff;
      border: none;
      padding: 0.75rem;
      border-radius: var(--radio-bordes);
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.2s;
    }
    button[type="submit"]:hover {
      background-color: rgb(255, 94, 0);
    }
    .status-message {
      padding: 0.75rem 1rem;
      border-radius: var(--radio-bordes);
      margin-bottom: 1rem;
      font-weight: 500;
      text-align: center;
    }
    .status-message.success {
      background-color: var(--color-success);
      color: #fff;
    }
    .status-message.error {
      background-color: var(--color-error);
      color: #fff;
    }
    footer {
      background-color: var(--color-acento);
      color: #fff;
      padding: 2rem 1rem;
      margin-top: 2rem;
    }
    .footer-container {
      max-width: 1100px;
      margin: 0 auto;
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
      justify-content: space-between;
    }
    .footer-column {
      flex: 1 1 200px;
    }
    .footer-column h3 {
      font-size: 1.1rem;
      margin-bottom: 0.75rem;
    }
    .footer-column ul li {
      margin-bottom: 0.5rem;
    }
    .footer-column a {
      color: #f0f0f0;
      font-size: 0.9rem;
    }
    .footer-column a:hover {
      text-decoration: underline;
    }
    .footer-bottom {
      text-align: center;
      margin-top: 1.5rem;
      font-size: 0.85rem;
      opacity: 0.9;
    }
    @media (max-width: 600px) {
      .main-content {
        margin: 1rem;
      }
    }
  </style>
</head>
<body>
  <!-- Header principal -->
  <header>
    <div class="header-container">
    <a href="<?= base_url() ?>" class="logo">
      <img src="<?= base_url() ?>img/LOGOFP.png" alt="LOGOFP" />
      <span>Foro de Proyectos</span>
    </a>
      <a href="login.php" class="login-link"><i class="fas fa-user"></i> Iniciar Sesión</a>
    </div>
  </header>

  <!-- Barra de navegación -->
  <nav>
    <div class="nav-container">
      <a href="index.php">Inicio</a>
      <a href="proyectos.php">Proyectos</a>
      <a href="ayuda.php">Ayuda</a>
      <a href="contacto.php" class="active">Contacto</a>
    </div>
  </nav>

  <!-- Contenido principal: Formulario de Contacto -->
  <main class="main-content">
    <h2 class="section-title">Contáctanos</h2>

    <?php if ($statusMessage): ?>
      <div class="status-message <?= $statusClass ?>">
        <?= htmlspecialchars($statusMessage) ?>
      </div>
    <?php endif; ?>

    <form action="contacto.php" method="post">
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" required 
             value="<?= isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : '' ?>">

      <label for="email">Correo electrónico:</label>
      <input type="email" id="email" name="email" required
             value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">

      <label for="asunto">Asunto:</label>
      <input type="text" id="asunto" name="asunto" required
             value="<?= isset($_POST['asunto']) ? htmlspecialchars($_POST['asunto']) : '' ?>">

      <label for="mensaje">Mensaje:</label>
      <textarea id="mensaje" name="mensaje" required><?= isset($_POST['mensaje']) ? htmlspecialchars($_POST['mensaje']) : '' ?></textarea>

      <button type="submit">Enviar</button>
    </form>
  </main>

  <!-- Footer -->
  <footer>
    <div class="footer-container">
      <div class="footer-column">
        <h3>Acerca de</h3>
        <ul>
          <li><a href="nuestramision.php">Nuestra Misión</a></li>
          <li><a href="equipo.php">Equipo</a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h3>Redes Sociales</h3>
        <ul>
          <li><a href="#"><i class="fab fa-instagram"></i> </a></li>
          <li><a href="#"><i class="fab fa-linkedin-in"></i> </a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2025 Foro de Proyectos. Todos los derechos reservados.</p>
    </div>
  </footer>
</body>
</html>
