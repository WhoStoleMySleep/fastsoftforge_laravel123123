<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PagesController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function projects()
    {
        $project = new Project();
        $project = $project->get();
        // $project->name = 'name';
        // $project->type = 'type';
        // $project->link = 'link';
        // $project->img = 'img';
        // $project->name_short = 'name_short';
        // $project->about = 'about';
        // $project->task = 'task';
        // $project->details = 'details';
        // $project->feedback = 'feedback';
        // $project->about_short = 'about_short';
        // $project->technologies = 'technologies';

        // $project->save();
        
        return view('projects')->with(['project' => $project]);
    }

    public function submit_order(Request $request)
    {
        $valid = $request->validate([
            'type' => 'required',
            'have' => 'required',
            'description' => 'required',
            'budget' => 'required',
            'name' => 'required',
            'telephone' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $order = new Order();
        $order->type = $request->input('type');
        $order->have = $request->input('have');
        $order->description = $request->input('description');
        $order->budget = $request->input('budget');
        $order->name = $request->input('name');
        $order->telephone = $request->input('telephone');
        $order->email = $request->input('email');
        $order->password = $request->input('password');

        $order->save();

        return redirect('/');
    }

    public function login()
    {
        $loggined = Cache::get('login');

        if ($loggined) {
            return redirect('/'. $loggined);
        } else {
            return view('login');
        }
    }

    public function submit_login(Request $request) 
    {
        $order = new Order();
        $asdasd = $order->where('telephone', '=', $request->input('telephone'))->get();
        
        if ($request->input('password') == $asdasd[0]['password']) {
            Cache::put('login', $request->input('telephone'), 1200);
            return redirect('/'. $request->input('telephone'));
        }
    }

    public function user($telephone)
    {
        $order = new Order();
        $asdasd = $order->where('telephone', '=', $telephone)->get();

        $loggined = Cache::get('login');
        
        if ($loggined == $telephone && $asdasd) {
            return view('user')->with([
                'type' =>  $asdasd[0]['type'],
                'have' =>  $asdasd[0]['have'],
                'description' =>  $asdasd[0]['description'],
                'budget' =>  $asdasd[0]['budged'],
                'name' =>  $asdasd[0]['name'],
                'telephone' =>  $asdasd[0]['telephone'],
                'email' =>  $asdasd[0]['email'],
                'password' =>  $asdasd[0]['password'],
                'messages' =>  json_decode($asdasd[0]['messages'], true),
            ]);
        } else {
            return redirect('/login'); 
        }
    }

    public function exit_user(Request $request)
    {
        Cache::forget('login');
        return redirect('/login');
    }

    public function send_message(Request $request, $telephone)
    {
        $order = new Order();
        $asdasd = $order->where('telephone', '=', $telephone);

        if (json_decode(($asdasd->get())[0]['messages'])) {
            $splitArray = array_merge(json_decode(($asdasd->get())[0]['messages']), [["author" => "me", "message" => $request->input('message')]]);
        } else {
            $splitArray = [["author" => "me", "message" => $request->input('message')]];
        }

        $asdasd->update(['messages' => json_encode($splitArray)]);

        return redirect('/'. $telephone);
    }

    public function admin()
    {
        $order = new Order();
        $all = $order->all();
        
        return view('admin')->with(['all' => $all]);
    }

    public function admin_messager($telephone)
    {
        $order = new Order();
        $asdasd = $order->where('telephone', '=', $telephone)->get();
        
        return view('admin_messager')->with([
            'type' =>  $asdasd[0]['type'],
            'have' =>  $asdasd[0]['have'],
            'description' =>  $asdasd[0]['description'],
            'budget' =>  $asdasd[0]['budged'],
            'name' =>  $asdasd[0]['name'],
            'telephone' =>  $asdasd[0]['telephone'],
            'email' =>  $asdasd[0]['email'],
            'password' =>  $asdasd[0]['password'],
            'messages' =>  json_decode($asdasd[0]['messages'], true),
        ]);
    }

    public function admin_send_message(Request $request, $telephone)
    {
        $order = new Order();
        $asdasd = $order->where('telephone', '=', $telephone);
        
        if (json_decode(($asdasd->get())[0]['messages'])) {
            $splitArray = array_merge(json_decode(($asdasd->get())[0]['messages']), [["author" => "admin", "message" => $request->input('message')]]);
        } else {
            $splitArray = [["author" => "me", "message" => $request->input('message')]];
        }

        $asdasd->update(['messages' => json_encode($splitArray)]);

        return redirect('/admin/'. $telephone);
    }
}
