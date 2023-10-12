<?php
namespace app\models;

use app\core\Model;

class RegisterModel extends Model {
    /**
     * RegisterModel class
     * Model class para sa Registration
    */
    
    // properties: kailangan pareho yung name ng inputs sa pangalan ng variable.
    public string $username;
    public string $firstName;
    public string $middleName;
    public bool $hasMiddleName;
    public string $lastName;
    public string $suffix;
    public bool $hasSuffix;
    public string $gender; // 0 - not to say, 1 - male, 2 female
    public string $email;
    public string $password;
    public string $confirm;
    
    public function register() {
        /**
         * register();
         * I-register yung account sa database. Returns true kapag OK.
        */
        // todo
        echo "Registering account...";
    }
    
    public function rules(): array {
        return [
                'username' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
                'firstName' => [self::RULE_REQUIRED],
                'middleName' => [self::RULE_NULL],
                'lastName' => [self::RULE_REQUIRED],
                'suffix' => [self::RULE_NULL, self::RULE_VALID_SUFFIX],
                'gender' => [self::RULE_REQUIRED],
                'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
                'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8]],
                'confirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]
            ];
    }
}