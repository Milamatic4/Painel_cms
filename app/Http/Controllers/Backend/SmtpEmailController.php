<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SmtpEmail;
use Illuminate\Http\Request;
use Flasher\Laravel\Facade\Flasher;

class SmtpEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $email = SmtpEmail::first();
        return view('admin.email-smtp.index', compact('email'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'smtp'  => ['required', 'max:255'],
            'email' => ['required', 'max:255'],
            'senha' => ['required', 'max:255'],
            'porta' => ['required'],
        ]);

        $email = SmtpEmail::find(8772);

        $email->smtp = $request->smtp;
        $email->email = $request->email;
        $email->senha = $request->senha;
        $email->porta = $request->porta;

        $email->save();

        Flasher::addSuccess('Atualizado com sucesso!');

        return redirect()->back();
    }

}
