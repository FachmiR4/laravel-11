<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request('search')){
            $data = Todo::where('taks','like','%'.request('search').'%')->get();
        }else{
            $data = Todo::orderBy('taks','asc')->get();
        }
        // dd($data)
        // return view('todo.app', ['data'=>$data]);
        return view('todo.app', compact('data'));
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
        $request->validate([
            'task' => 'required|min:3|max:25'
        ],[
            'task.required'=> 'Isian taks wajib diisikan',
            'task.min'=>'Minimal isian untuk task minimal 3',
            'task.max'=>'maximum isian untuk task maximal 25'
        ]);
        $data = [
            'taks' => $request->input('task')
        ];

        Todo::create($data);
        return redirect()->Route('todo')->with('success','berhasil simpan data');
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
        $request->validate([
            'task' => 'required|min:3|max:25'
        ],[
            'task.required'=> 'Isian taks wajib diisikan',
            'task.min'=>'Minimal isian untuk task minimal 3',
            'task.max'=>'maximum isian untuk task maximal 25'
        ]);
        $data = [
            'taks' => $request->input('task'),
            'Id_done' => $request->input('is_done')
        ];
        Todo::where('id',$id)->update($data);
        return redirect()->Route('todo')->with('success','Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Todo::where('id',$id)->delete();
        return redirect()->route('todo')->with('success', 'Data berhasil dihapus');
    }
}
