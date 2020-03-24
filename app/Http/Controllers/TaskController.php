<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use function PHPSTORM_META\type;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->get();
        $tasks = DB::table('tasks')->get();
        return view('home')->with(['users' => $users, 'tasks' => $tasks]);
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
        $o_users = ($request->input('otvet'));
        $p_users = ($request->input('postan'));
        $name = ($request->input('name'));
        $date = $request->input('date');
        error_log($date);
        $reso = [];
        $resp = [];
        $resn = [];
        $resd = [];
        $ans = [];
        if ($o_users != null) {
            error_log(1);
            $users = DB::table('user_task')->whereIn('user_id', $o_users)->get();
            $td = [];
            foreach($users as $x) 
                array_push($td, $x->task_id);
            
            $td = DB::table('tasks')->whereIn('id', $td)->get();
            foreach($td as $x)
                array_push($reso, $x->id);

            if (count($reso) > 0)
                if (count($ans) > 0)
                    $ans = array_intersect($ans, $reso);
                else
                    $ans = $reso;
        }
        if ($p_users != null) {
            $users = DB::table('task_user')->whereIn('user_id', $p_users)->get();
            $td = [];
            foreach($users as $x) 
                array_push($td, $x->id);
                
            $td = DB::table('tasks')->whereIn('id', $td)->get();
            foreach($td as $x)
                array_push($resp, $x->id);

            if (count($resp) > 0)
                if (count($ans) > 0)
                    $ans = array_intersect($ans, $resp);
                else
                    $ans = $resp;
        }
        if ($name != null) {
            $td = DB::table('tasks')->where('title', '=', $name)->get();
            foreach($td as $x)
                array_push($resn, $x->id);
            
            if (count($resn) > 0)
                if (count($ans) > 0)
                    $ans = array_intersect($ans, $resn);
                else
                    $ans = $resn;
        }
        if($date != null) {
            $td = DB::table('tasks')->where('deadline', '=', Carbon::createFromFormat('d/m/Y', $date)->format('d-m-Y'))->get();
            foreach($td as $x)
                array_push($resd, $x->id);
            
            if (count($resd) > 0)
                if (count($ans) > 0)
                    $ans = array_intersect($ans, $resd);
                else
                    $ans = $resd;
        }

        foreach($ans as $x) {
            error_log($x);
        }

        $tasks = DB::table('tasks')->whereIn('id', $ans)->get();
        //U9YXrrpZsS

        return response()->json($tasks);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
