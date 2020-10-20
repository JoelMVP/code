<?php
echo "Login";
echo form_open('/home/guarda');
echo form_input(array('name' => 'usuario'));
echo form_input(array('name' => 'password'));
echo form_submit('guarda', 'Guardar');
echo form_close();
