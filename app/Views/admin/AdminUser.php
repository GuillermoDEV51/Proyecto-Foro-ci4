<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forum de Proyectos</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="<?php

                use App\Controllers\Admin\AdminUser;

                echo base_url() ?>boostrap/css/bootstrap.min.css" rel="stylesheet">

    <script src="<?php echo base_url() ?>boostrap/js/bootstrap.bundle.min.js"></script>

    <link href="<?php echo base_url() ?>style/normalize.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>style/home.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('style/EstilosAdmin/vistacrud.css') ?>">


</head>

<body>


    <!-- Header principal -->
    <!-- Sidebar -->
    <div class="sidebar">
        <img src="<?= base_url() ?>img/LOGOFP.png" alt="Logo Foro de Proyectos" class="logo-header">
        <a href="<?= base_url() ?>admin/VistaCRUD"><i class="fa-solid fa-user-tie p-2"></i>Dashbord</a>
        <a href="<?= base_url() ?>admin/EditarProyecto"><i class="fas fa-upload me-2"></i>Subir Proyecto</a>
        <a href="<?= base_url() ?>user/indexusuario" class="text-warning fw-bold mt-5 ms-3 d-block">← Volver al Inicio</a>
    </div>

    <!-- Encabezado -->
    <header class="content d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="<?= base_url() ?>img/LOGOFP.png" alt="Logo Foro de Proyectos" class="logo-header">
            <span class="admin-title">Panel de Administración</span>
        </div>
        <form action="<?php echo base_url() ?>login/logout" method="POST">
            <button class="btn btn-outline-dark"><i class="fas fa-sign-out-alt"></i> Salir</button>
        </form>
    </header>




    <main class="content">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <section id="usuarios">
            <h2 class="section-title">Gestión de Usuarios</h2>
            <div class="mb-3">
                <a href="<?php echo base_url() ?>admin/AddUser" class="btn btn-primary ms-auto p-2"><i class="fas fa-plus"></i> Add User</a>
            </div>

            <table class="table table-striped table-bordered shadow-sm">

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>

                        <th>Código</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    <!-- Aquí se mostrarán los usuarios -->
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><?= $user['codigo'] ?></td>
                            <td>
                                <?php
                                foreach ($roles as $rol) {
                                    if ($rol['id'] == $user['id_rol']) {
                                        echo $rol['Rol'];
                                        break;
                                    }
                                }
                                ?>
                            </td>
                            <td>

                                <a href="<?php echo base_url('AdminUser/' . $user['id'] . '/edit') ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a>

                                <button
                                    class="btn btn-danger btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#eliminaModal"
                                    data-bs-url="<?php echo base_url('AdminUser/' . $user['id']) ?>">
                                    <i class="fas fa-trash-alt"></i> Eliminar
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>



                </tbody>

            </table>
            <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

            <!-- Modal para eliminar usuario -->
            <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="eliminaModalLabel">Aviso</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>¿Desea eliminar este registro?</p>
                        </div>
                        <div class="modal-footer">
                            <!-- Formulario para eliminar usuario -->
                                <?= form_open('', ['method' => 'delete', 'id' => 'form-elimina']) ?>
                                <input type="hidden" name="_method" value="delete">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                <?= form_close() ?>
                            
                        </div>
                    </div>
                </div>
            </div>
                


        </section>

    </main>



    <script>
        const eliminaModal = document.getElementById('eliminaModal')
        if (eliminaModal) {
            eliminaModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget
                // Extract info from data-bs-* attributes
                const url = button.getAttribute('data-bs-url')

                // Update the modal's content.
                const form = eliminaModal.querySelector('#form-elimina')
                form.setAttribute('action', url)
            })
        }
    </script>


<script src="<?php echo base_url() ?>boostrap/js/bootstrap.bundle.min.js"></script>
    

</body>

</html>