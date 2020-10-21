<div class="index">
    <h1 class="index__title">Inicar Sesion</h1>
    <div class="index__container">
        <div class="index__circle"></div>
        <?php echo form_open('home/perfil', ['class' => 'index__form']);  ?>
        <div class="index__input">
            <?php echo form_input(array('name' => 'usuario', 'placeholder' => "Ci", 'required' => 'required', 'autofocus' => 'autofocus')) ?>
            <i class="fas fa-user-lock"></i>
        </div>
        <div class="index__input">
            <?php echo form_input(array('name' => 'password', 'type' => 'password', 'placeholder' => "Contraseña", 'required' => 'required')) ?>
            <i class="fas fa-lock"></i>
        </div>
        <?php echo form_submit('guarda', 'Guardar', ['class' => 'index__formBtn']) ?>
        </form>
        <?php echo form_close() ?>
    </div>
</div>