<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sclass = DB::table('subjects')->get();
        return response()->json($sclass);
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
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'class_id' => 'required|unique:subjects|max:25',
            'subject_name' => 'required|unique:subjects|max:25',
            'subject_code' => 'nullable|max:25',

        ]);

        $data = array();
        $data['class_id'] = $request->class_id;
        $data['subject_name'] = $request->subject_name;
        $data['subject_code'] = $request->subject_code;

        $sub = Subject::create($data);
        return response('Insert Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idMAtch = Subject::find($id);
        if ($idMAtch)
            return response()->json($idMAtch);
        else
            return response('No Found');

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
        $validateData = $request->validate([
            'class_id' => 'required|max:25',
            'subject_name' => 'required|max:25',
            'subject_code' => 'nullable|max:25',

        ]);

        $data = array();
        $data['class_id'] = $request->class_id;
        $data['subject_name'] = $request->subject_name;
        $data['subject_code'] = $request->subject_code;

        $update = Subject::where('id', $id)->update($data);

        //$update = DB::table('subjects')->where('id', $id)->update($data);

        return response('Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subject::where('id', $id)->delete();
        //DB::table('subjects')->where('id', $id)->delete();
        return response('Deleted Successfully');
    }
}
