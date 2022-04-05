<?php

/**
 * Classe représentant la session php $_SESSION
 *
 */
require_once "models/User.php";
class Session {

    public static function start(): void {
        if (session_status() === PHP_SESSION_NONE)
        {
            session_start();
        }
    }

    public static function destroy(): void {
        $_SESSION['auth'] = [];
        unset($_SESSION['auth']);
        //session_destroy();
    }

    
    public static function init(int $id,string $firstname, string $lastname,string $mail, string $phone, string $address, string $city, int $zipcode, string $country, int $isAdmin): void {
        $_SESSION['auth'] = [
            'id' => intval($id),
            'name' => $firstname,
            'lastname' => $lastname,
            'mail' => $mail,
            'phone' => $phone,
            'address' => $address,
            'city' => $city,
            'zipcode' => $zipcode,
            'country' => $country,
            'role' => $isAdmin
        ];
    }

    public static function isConnected(): bool{
        return isset($_SESSION['auth']) ?? false;
    }

    public static function getLogged() {
        // Usage de l'opérateur static '::'
        // Pour utiliser des props ou méthodes static au sein de la class elle-même
        return self::isConnected() ? $_SESSION['auth'] : false;
    }

    public static function setError(string $error = null): void {
        $_SESSION['error'] = $error;
    }

    public static function getError(): ?string {
        return isset($_SESSION['error']) ? $_SESSION['error'] : null;
    }

}