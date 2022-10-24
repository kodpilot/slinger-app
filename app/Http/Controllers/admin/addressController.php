<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\addresses;
use Illuminate\Support\Facades\Auth;

class addressController extends Controller
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


    public function createAjax(Request $request)
    {
        $addresObj = new addresses;
        $addresObj->address     = $request->address;
        $addresObj->name        = $request->name;
        $addresObj->surname     = $request->surname;
        $addresObj->addressName = $request->addressName;
        $addresObj->country     = $request->country;
        $addresObj->city        = $request->city;
        $addresObj->town        = $request->town;
        $addresObj->billing     = "1";
        $addresObj->zipCode     = $request->zipCode;
        $addresObj->user_id     = Auth::user()->id;
        $addresObj->tel         = Auth::user()->tel;
        $addresObj->mail        = Auth::user()->email;
        $addresObj->tc          = $request->tc;
        $status = $addresObj->save();
        $data = [
            'id' => $addresObj->id,
            'address'=>$addresObj->address,
            'name'=>$addresObj->name,
            'surname'=>$addresObj->surname,
            'addressName'=>$addresObj->addressName,
            'country'=>$addresObj->country,
            'city'=>$addresObj->city,
            'town'=>$addresObj->town,
            'billing'=>$addresObj->town,
            'zipCode'=>$addresObj->billing,
            'user_id'=>$addresObj->user_id,
            'tel'=>$addresObj->tel,
            'mail'=>$addresObj->mail,
        ];
        if($status){
            $data['status'] = 1;
            return response($data,200);
        }
        else{
            return response(['status'=>0],400);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy     =   addresses::where('id',$id)->first();
        if ($destroy->status == '1') {
            $destroy->status = '0';
          } else {
            $destroy->status = '1';
          }
        $destroy->save();

        toastr()->success('İşlem başarı ile sonuçlandı!', 'Başarılı');
        return redirect()->back();
    }
}
