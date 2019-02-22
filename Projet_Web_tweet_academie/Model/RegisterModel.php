<?php

class Validator
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    private function getField($field)
    {
        if (!isset($this->data[$field])) {
            return null;
        }
        return $this->data[$field];
    }

    public function isAlpha($field, $errorMsg)
    {
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $this->getField($field))) {
            $this->errors[$field] = $errorMsg;
            return false;
        }
        return true;
    }

    public function isUniq($field, $bd, $errorMsg)
    {
        $record = $bd->query("SELECT id_user FROM user WHERE $field = ?", [$this->getField($field)])->fetch();
        if ($record) {
            $this->errors[$field] = $errorMsg;
            return false;
        }
        return true;
    }

    public function isEmail($field, $errorMsg)
    {
        if (!filter_var($this->getField($field), FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = $errorMsg;
            return false;
        }
        return true;
    }

    public function isConfirmed($field, $errorMsg = '')
    {
        $value = $this->getField($field);
        if (empty($value) || $value != $this->getField($field . '_confirm')) {
            $this->errors[$field] = $errorMsg;
            return false;
        }
        return true;
    }

    public function isValid()
    {
        return empty($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function register($bd, $username, $email, $firstname, $lastname, $password)
    {
        $salt = "si tu aimes la wac tape dans tes mains";
        $password = hash('ripemd160', $salt . $password);

        $bd->query("INSERT INTO user SET username = ?, email = ?, firstname = ?, lastname = ?, password = ?, avatar = ?,  register_date = NOW()", [
            $username,
            $email,
            $firstname,
            $lastname,
            $password,
            $avatar = "https://www.reussirmavie.net/photo/art/grande/4917219-7338890.jpg?v=1517524283"
        ]);
        header('Location: index.php');

    }
}
