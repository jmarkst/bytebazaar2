<?php
namespace app\core;

abstract class Model {
    /**
     * Model class
     * Base class para sa mga models.
    */
    
    // validation rules constants.
    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public const RULE_NULL = 'null'; // is field optional
    public const RULE_VALID_SUFFIX = 'suffix';
    
    public array $errors = [];
    abstract public function rules(): array;
    
    public function load($data) {
        /**
         * load()
         * Ilo-load yung data na natanggap.
         * Parameters:
         * - (array) $data: yung data na gagamitin.
        */
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }
    
    public function validate() {
        /**
         * validate()
         * Returns true kapag valid ang data na binigay (depende sa model), o yung array ng errors kapag false.
        */
        
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};
            foreach ($rules as $rule) {
                $ruleName = $rule;
                if (is_array($ruleName)) {
                    $ruleName = $rule[0];
                }
                if ($ruleName === self::RULE_REQUIRED && !$value) {
                    $this->addError($attribute, self::RULE_REQUIRED);
                }
                if ($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($attribute, self::RULE_EMAIL);
                }
                if ($ruleName === self::RULE_MIN && strlen($value) < $rule['min']) {
                    $this->addError($attribute, self::RULE_MIN, $rule);
                }
                if ($ruleName === self::RULE_MAX && strlen($value) > $rule['max']) {
                    $this->addError($attribute, self::RULE_MAX, $rule);
                }
            }
        }
        
        return empty($this->errors);
    }
    
    public function addError(string $attribute, string $rule, $params = []) {
        /**
         * addError($attribute, $rule)
         * Naglalagay ng error sa $errors array.
         * Parameters:
         * - (string) $attribute: yung attribute (field) na may error.
         * - (string) $rule: yung nilabag na rule. Tinatanggap lang yung mga predefined rule constants dito.
         * - (array) $params: addn info para magamit sa error message.
        */
        $message = $this->errorMessages()[$rule] ?? '';
        foreach ($params as $key => $value) {
            $message = str_replace("{$key}", $value, $message);
        }
        $this->errors[$attribute][] = $message;
        //var_dump($this->errors);
    }
    
    public function errorMessages() {
        /**
         * errorMessages()
         * Rine-return ang array ng mga error messages.
        */
        return [
            self::RULE_REQUIRED => 'This field is required.',
            self::RULE_EMAIL => 'The email provided is not valid.',
            self::RULE_MIN => 'This field should have a length not less than min.',
            self::RULE_MAX => 'This field should have a length not greater than max.',
            self::RULE_MATCH => 'This field must match {match}.',
            self::RULE_VALID_SUFFIX => 'The name suffix provided is not valid. Please use a Roman numeral, Jr., or Sr.'
            ];
    }
    
}