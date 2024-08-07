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
    function request()
    {
        $request = $_SERVER['REQUEST_METHOD'];
        if ($request == 'POST') {
            return $_POST;
        }
        return $_GET;
    }
    function redirect($target)
    {
        return header("location:/?page={$target}");
    }
    function redirectToHome($target)
    {
        return header("location:/");
    }