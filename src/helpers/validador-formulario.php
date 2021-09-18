<?php

    function validarFormulario($dados, $fields) {
        foreach ($fields as $key => $field) {
            if (empty($dados[$field])) {
                throw new \Exception("Favor preencher os dados corretamente.");
            }
        }
    }
