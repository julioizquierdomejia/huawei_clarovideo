<?php

namespace App\Http\Controllers;

use App\Models\Imei;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ImeiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function register()
    {
        $correo = \Cookie::get('email');
        $user = User::where('email', '=', $correo)->first();

        if($user)
            return redirect('ruleta')->with('user');
        else
            return view('register');
    }

    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required|min:3',
            'lastname' => 'required|min:3',
            'imei' => 'required|min:5',
            'dni' => 'required|digits:8',
            'phone' => 'required|min:6',
            'email' => 'required|email|max:255|unique:users',
            'confirm_terms' => 'required|boolean:in:1',
        );
        $messages = array(
            'required' => 'El :attribute es requerido.',
            'email' => 'El :attribute debe ser una dirección de correo válida.',
            'email.unique' => 'El email ya fue registrado.',
            'confirm_terms.required' => 'Aceptar términos y condiciones es requerido.',
        );
        $validator = \Validator::make($request->all(), $rules, $messages);

        $name = $request->get('name');
        $lastname = $request->get('lastname');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $dni = $request->get('dni');
        $imei = $request->get('imei');

        $user_by_imei = User::where('imei', $imei)->exists();
        if ($user_by_imei === false) {
            $imei_by_imei = Imei::where('name', $imei)->exists();
            if ($imei_by_imei) {
                $user = new User();
                $user->name = $name;
                $user->lastname = $lastname;
                $user->email = $email;
                $user->phone = $phone;
                $user->dni = $dni;
                $user->imei = $imei;
                $user->password = Hash::make(12345678);
                $user->save();

                \Auth::login($user);

                return redirect('ruleta');
            } else {
                //Codigo invalido
                $validator->getMessageBag()->add('imei', 'El código no existe.');
                return redirect()->back()->withErrors($validator);
            }
        }
        //existe imei con otro usuario
        $validator->getMessageBag()->add('imei', 'El código ya fue usado.'); 

        return redirect()->back()->withErrors($validator);
    }

    public function ruleta(Request $request)
    {
        return view('videos.list');
    }

    public function video(Request $request, $slug)
    {
        $array = array('cocina-peruana', 'fullbody');
        if (in_array($slug, $array) == false) {
            return redirect('/');
        }
        //$video = Video::where('id', $id)->firstOrFail();
        return view('videos.show', [
            'video' => $slug
        ]);
    }

    public function login(Request $request)
    {
        $rules = array(
            'email' => 'required|email|max:255|exists:users',
        );
        $messages = array(
            'required' => 'El :attribute es requerido.',
            'email' => 'El :attribute debe ser una dirección de correo válida.',
        );
        $validator = \Validator::make($request->all(), $rules, $messages);

        $email = $request->get('email');

        $user = User::where('email', '=', $email)->first();

        if($user) {
            //\Cookie::queue('email', $email, 100);
            \Auth::login($user);

            return redirect('ruleta')->with('user');
        } else {
            return redirect('/');
        }
    }

    public function opcion(Request $request)
    {
        return view('opcion');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Imei  $imei
     * @return \Illuminate\Http\Response
     */
    public function show(Imei $imei)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Imei  $imei
     * @return \Illuminate\Http\Response
     */
    public function edit(Imei $imei)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Imei  $imei
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imei $imei)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Imei  $imei
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imei $imei)
    {
        //
    }
}
