<?php

namespace App\Http\Controllers;

use App\Factory\RequestStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RequestController extends Controller
{

    /**
     * Show the application main page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|phone_number',
            'text' => 'required|string'
        ]);

        if ($validator->fails()){
            return Response()->json([
                'success' => false,
                'errors' => $validator->getMessageBag(),
            ]);
        }

        $requestStorage = new RequestStorage('DB');
        $requestStorage->save($request->name, $request->phone, $request->text);

        $requestStorage = new RequestStorage('FILE');
        $requestStorage->save($request->name, $request->phone, $request->text);

        return Response()->json([
            'success' => true,
            'message' => 'Вы успешно отправили заявку'
        ]);

    }
}
