<?php
    /**
     * Function to test variables
     * @param $dump
     * @return void
     */
    function dd($dump)
    {
        var_dump($dump);
        die();
    }

    /**
     * Request form method
     * @return array
     */
    function request(): array
    {
        $request = $_SERVER['REQUEST_METHOD'];
        if ($request == 'POST') {
            return $_POST;
        }
        return $_GET;
    }
    function redirect($target = null)
    {
        if ($target) {
            $url = "/?page=" . urlencode($target);
        } else {
            $url = "/";
        }
        header("Location: $url");
        exit();
    }

    function redirectToHome()
    {
        header("Location: /");
        exit();
    }