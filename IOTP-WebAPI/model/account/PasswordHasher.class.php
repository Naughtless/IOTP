<?php

class PasswordHasher {

    public static function hashPassword($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }
    public static function verifyPassword($password, $hashedPassword) {
        if(password_verify($password, $hashedPassword)) {
            return true;
        }
        else {
            return false;
        }
    }
}
