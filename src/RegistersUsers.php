<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 17/11/15
 * Time: 14:09
 */

namespace it\thecsea\laravel\noredirect_traits;

use Illuminate\Foundation\Auth\RegistersUsers as RegistersUsersOriginal;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class RegistersUsers
 * @package it\thecsea\laravel\noredirect_traits
 * @author Claudio Cardinale <cardi@thecsea.it>
 * @copyright 2015 Claudio Cardinale
 * @version 1.0.0
 */
trait RegistersUsers
{

    use RegistersUsersOriginal{
        postRegister as postRegisterOriginal;
    }


    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        Auth::login($this->create($request->all()));

        return new JsonResponse('', 200);
    }
}