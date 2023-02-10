<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;
use Illuminate\Validation\Rule;
use MongoDB\BSON\Regex;

class FIO implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  string  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if($value == null){
            $fail(':attribute - обязательное поле');
        }
        if(strlen($value) > 50){
            $fail('Максимальная длина поля :attribute 30 символов');
        }
        if(preg_match('/^[А-Яа-яA-Za-z.]{1,30}$/', $value)){
            $fail('В поле :attribute должны быть только буквы');
        }
    }
}
