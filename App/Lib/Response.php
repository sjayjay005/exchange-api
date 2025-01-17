<?php

/**
 * exchange API V1
 *
 * @author    sjayjay005
 * @link      https://github.com/sjayjay005
 *
 */

namespace App\Lib;

class Response
{
    private $status = 200;

    public function status(int $code)
    {
        $this->status = $code;
        return $this;
    }

    public function toJSON($data = [])
    {
        http_response_code($this->status);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
