<?php
$usuario = $this->{'data'};
switch ($usuario[4]) {
    case 1:
        echo "<style>
        :root {--color1: #fff;--color2: #f6faff;--color3: #00d8ff;--color4: #0052ff;}
        </style>";
        break;
    case 2:
        echo "<style>
        :root {--color1: #000;--color2: #242424;--color3: #fff;--color4: #FE752F;}
        </style>";
        break;
    case 3:
        echo "<style>
        :root {--color1: #000;--color2: #242424;--color3: #fff;--color4: #1DB46F;}
        </style>";
        break;
    default:
        echo "<style>
        :root {--color1: #fff;--color2: #f6faff;--color3: #00d8ff;--color4: #0052ff;}
        </style>";
        break;
}
?>
<div class="index">
    <div class="home__title">
        <h1 class="home__h1">Usuario: <?= $usuario[5] ?> </h1>
        <a class="nav-link" href="<?php echo base_url() . '/login' ?>">Cerrar Sesion</a>
    </div>
    <!-- <?php echo form_open('/home/actualiza', ['class' => 'home__form', 'enctype' => 'multipart/form-data']);  ?> -->
    <?php echo form_open_multipart('/home/actualiza', ['class' => 'home__form']);  ?>
    <div class="home__body">
        <div class="home__data">
            <span>CI</span>
            <div class="data__container">
                <span>
                    <?= $usuario[2] ?>
                </span>
                <i class="fas fa-id-card"></i>
            </div>
            <span>Nombre Completo</span>
            <div class="data__container">
                <span>
                    <?= $usuario[5] ?>
                </span>
                <i class="fas fa-user"></i>
            </div>
            <span>Cuidad</span>
            <div class="data__container">
                <span>
                    <?= $usuario[7] ?>
                </span>
                <i class="fas fa-map-marked-alt"></i>
            </div>
            <span>Fecha de Nacimiento</span>
            <div class="data__container">
                <span>
                    <?= $usuario[6] ?>
                </span>
                <i class="fas fa-calendar-day"></i>
            </div>
        </div>
        <div class="home__options">
            <img src="<?php echo base_url() . '/assets/img/' . $usuario[3] ?>" class="home__img">
            <div class="home__file">
                <span class="texto">Cargar Imagen</span>
                <?php echo form_input(['name' => 'image', 'type' => 'file', 'class' => 'btn_enviar', 'value' => $usuario[3]]) ?>
            </div>
            <?php
            echo form_dropdown('colorS', [
                '1'  => 'tema 1',
                '2'    => 'tema 2',
                '3'  => 'tema 3',
            ], $usuario[4], ['class' => 'home__select']);
            echo form_input(['name' => 'id', 'type' => 'hidden', 'value' => $usuario[0]]); ?>
        </div>
    </div>
    <?php echo form_submit('save', 'Guardar cambios', ['class' => 'home__saveBtn']) ?>
    <?php echo form_close() ?>
</div>