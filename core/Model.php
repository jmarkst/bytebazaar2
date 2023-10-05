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
    public const RULE_CONTAINS = 'contains';
    public const RULE_VALID_SUFFIX = 'suffix';
    
    
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
                $this->($key) = $value;
            }
        }
    }
    
    public function validate() {
        /**
         * validate()
         * Returns true kapag valid ang data na binigay (depende sa model).
        */
    }
    
}