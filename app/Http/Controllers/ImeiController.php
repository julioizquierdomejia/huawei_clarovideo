<?php

namespace App\Http\Controllers;

use App\Models\Imei;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Prize;
use App\Models\Winner;
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
        return view('register');
    }

    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required|min:3',
            'apellidos' => 'required|min:3',
            'imei' => 'required|min:5|unique:users,imei|exists:imeis,code',
            'dni' => 'required|digits:8',
            'celular' => 'required|min:6',
            'email' => 'required|email|max:255|unique:users',
            'confirm_terms' => 'required|boolean:in:1',
        );
        $messages = array(
            'required' => ':attribute es requerido.',
            'email.email' => 'El email debe ser una dirección de correo válida.',
            'email.unique' => 'El email ya fue registrado.',
            'imei.unique' => 'El imei ya fue usado.',
            'imei.exists' => 'El imei ingresado es inválido.',
            'confirm_terms.required' => 'Aceptar términos y condiciones es requerido.',
        );
        $this->validate($request, $rules, $messages);

        $name = $request->get('name');
        $apellidos = $request->get('apellidos');
        $email = $request->get('email');
        $celular = $request->get('celular');
        $dni = $request->get('dni');
        $imei = $request->get('imei');

        $user = new User();
        $user->name = $name;
        $user->lastname = $apellidos;
        $user->email = $email;
        $user->phone = $celular;
        $user->dni = $dni;
        $user->imei = $imei;
        $user->password = Hash::make(12345678);
        $user->save();

        \Auth::login($user);

        return redirect('ruleta');
        return redirect()->back();
    }

    public function ruleta(Request $request)
    {
        $prizes = Prize::where('enabled', 1)->get();
        return view('videos.list', compact('prizes'));
    }

    public function storeWinner(Request $request)
    {
        $rules = array(
            'prize_id' => 'required|exists:prizes,id',
        );

        $prize_id = $request->get('prize_id');
        $user_id = \Auth::id();

        $exist_winner = Winner::where('user_id', $user_id)->exists();

        $prize = Prize::findOrFail($prize_id);
        if ($prize->total >= $prize->quantity) {
            if ($exist_winner) {
                return response()->json(['data'=>"Ya ganó :)", 'success'=>false]);
            } else {
                $prize->total -= $prize->quantity;
                $prize->save();

                $winner = new Winner();
                $winner->user_id = $user_id;
                $winner->prize_id = $prize_id;
                $winner->save();

                $prize_data = $prize->makeHidden('total')->makeHidden('original_total')->makeHidden('quantity');

                return response()->json(['data'=>json_encode($prize_data),'success'=>true]);
            }
        }
        return response()->json(['success'=>false]);
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
