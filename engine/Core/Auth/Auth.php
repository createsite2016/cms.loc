<?php


namespace Engine\Core\Auth;

use Engine\Helper\Cookie;

class Auth implements AuthInterface
{
    protected $authorized = false;
    protected $user;

    /**
     * Возвращает авторизованность
     * @return bool
     */
    public function authorized()
    {
        return $this->authorized;
    }

    /**
     * @return mixed
     */
    public function user()
    {
        return $this->user;
    }

    /**
     * Метод который авторизовывает пользователя
     * @param $user
     */
    public function authorize($user)
    {
        Cookie::set('auth.authorized', true);
        Cookie::set('auth.user', $user);

        $this->authorized = true;
        $this->user       = $user;
    }

    /**
     * Метод который делает пользователя не авторизованным
     * @param $user
     */
    public function unAuthorize()
    {
        Cookie::delete('auth.authorized');
        Cookie::delete('auth.user');

        $this->authorized = false;
        $this->user       = null;
    }

    /**
     * Генерация к новому паролю рандомной соли
     * @return string
     */
    public static function salt()
    {
        return (string) rand(10000000, 99999999);
    }

    /**
     * Создание хэша пароля
     * @param $password
     * @param string $salt
     * @return string
     */
    public static function encryptPassword($password, $salt = '')
    {
        return hash('sha256', $password . $salt);
    }
}