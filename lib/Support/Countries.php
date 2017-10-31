<?php


namespace Acikgise\Support;


use Illuminate\Support\Facades\Storage;

class Countries
{
    public static function all()
    {
        $data = Storage::disk('local')->read('public/helpers/countries.json');

        return json_decode($data, true);
    }
}