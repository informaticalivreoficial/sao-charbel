<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhatsappCat;
use Illuminate\Http\Request;

class WhatsappController extends Controller
{
    public function index()
    {
        $listas = WhatsappCat::orderBy('created_at', 'DESC')->paginate(25);

        return view('admin.whatsapp.listas',[
            'listas' => $listas
        ]);
    }
}
