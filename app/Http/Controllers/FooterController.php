<?php

namespace App\Http\Controllers;

use App\Models\ContactFooter;
use App\Models\RRSSFooter;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {

        $contactFooter = ContactFooter::first();
        $rrssFooter = RRSSFooter::first();
        $footer = Footer::first();

        return view('admin.footer.index', compact('contactFooter', 'rrssFooter', 'footer'));
    }

    public function saveDescription(Request $request)
    {
        $data = [
            'description' => $request->description,

        ];

        $footer = Footer::updateOrCreate(['id' => 1], $data); // Ajusta la condición según tu lógica

        if ($footer) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function saveContact(Request $request)
    {
        $data = [
            'correo' => $request->correo,
            'status_correo' => $request->status_correo,
            'celular' => $request->celular,
            'status_celular' => $request->status_celular,
            'whatsapp' => $request->whatsapp,
            'status_whatsapp' => $request->status_whatsapp,
        ];

        $footer = ContactFooter::updateOrCreate(['id' => 1], $data); // Ajusta la condición según tu lógica

        if ($footer) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function saveRRSS(Request $request)
    {
        $data = [
            'facebook' => $request->facebook,
            'status_facebook' => $request->status_facebook,
            'instagram' => $request->instagram,
            'status_instagram' => $request->status_instagram,
            'youtube' => $request->youtube,
            'status_youtube' => $request->status_youtube,
        ];

        $footer = RRSSFooter::updateOrCreate(['id' => 1], $data); // Ajusta la condición según tu lógica

        if ($footer) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
