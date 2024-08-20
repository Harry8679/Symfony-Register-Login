<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

class UniqueEmail extends Constraint {
    public $message = 'Cet email {{ value }} est déjà utilisé !';
}