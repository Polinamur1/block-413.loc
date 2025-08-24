<? 
class Validator {
    private $errors = [];
    private $validatorList = ['required', 'min', 'max', "email", 'match']; // название функий валидации
    private $messages = [
        'required' => 'Поле :fieldname: field обязательно для заполнения',
        'min' => 'Поле :fieldname: field должно быть не менее :rule_value: символов',
        'max' => 'Поле :fieldname: field должно быть не более :rule_value: символов',
        'email' => 'Not valid email',
        'match' => 'The :fieldname: field must match :rulevalue: field',
    ];

    private $dataItems; // весь массив данных для проверки
    public function validate(array $data = [], array $rules = []) {
        $this->dataItems = $data;
        foreach($data as $fieldname => $value) {
            // если название $fieldname есть в массиве из названий ключей $rulse
            if(in_array($fieldname, array_keys($rules))) {
                $field = [
                    'fieldname' => $fieldname,
                    'value' => $value,
                    'rules' => $rules[$fieldname],
                ];
                // валидируем
                $this->callValidator($field);

            }

        }
    }
    private function callValidator(array $field) {
        foreach($field['rules'] as $rule => $ruleValue) {
            if(in_array($rule, $this->validatorList)) {
                if(!call_user_func_array([$this, $rule], [$field['value'], $ruleValue])){
                    $errMesage = str_replace([':fieldname:', ':rule_value:'], [$field['fieldname'], $ruleValue], $this->messages[$rule]);
                    $this->addError($field['fieldname'], $errMesage);

                }
            }
        }

    }
    public function hasErrors() {
        return !empty($this->errors);
    }
    public function getErrors() {
        return $this->errors;
    }
    private function addError(string $fieldname, string $errMessage) {
        $this->errors[$fieldname][] = $errMessage;
    }   
    // валидаторы
    // $value - правила валидации, которые нужно проверить 
    private function required($value, bool $ruleValue) {
        return !empty($value);
    }
    private function min($value, int $ruleValue) {
        return len($value) >= $ruleValue;
    }
    private function max($value, int $ruleValue) {
        return len($value) <= $ruleValue;
    }

    protected function email($value, $rule_value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
    protected function match($value, $rule_value)
    {
        return $value === $this->dataItems[$rule_value];
    }

    public function listErrors($fieldname){
        $errors_list = '<div class="invalid-feedback d-block"><ul class="list-unstyled">';
        if(isset($this->errors[$fieldname])){
                    foreach ($this->errors[$fieldname] as $errMessage){
            $errors_list .= "<li>$errMessage</li>";
        }
        }
        $errors_list .= '</ul></div>';
        return $errors_list;
    }
}

