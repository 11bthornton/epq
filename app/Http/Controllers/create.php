<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
//including APP|User|Options|Votes|Question|
use App\User;
use App\options;
use App\votes;
use App\questions;
class create extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        //Returns Poll Creation View
        return view('create');
    }
    public function store(Request $request) {
        //Handing form data
        //We need to separate the request into data that goes into the separate
        //tables. We do this by creating a new Questions and Options instance:
        $Question = new Questions;
        //Because in the Options and Questions model files we began a fillable array
        //I can now assign the relevant aspects of the request into the model instances.
        $Question->body = $request->body;
        //I don't need to do this for the auto-incrementing ID or the timestamps because
        //they are automatically generated, but I do need to generate the key. For testing
        //purposes I'm going to hardcode this in.
        $key = '';
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_';
        do {
            for($i=1;$i<6;$i++){
            $random = rand(0,63);
            $key .= $chars[$random];     
        }
        $record = Questions::where('key', '=', $key)->first();
        } while($record !== NULL);
        $Question->key = $key;
        $Question->uid = \Auth::user()->id;
        $Question->save();
        foreach($request->options as $choice) {
                if(isset($choice)) {
                    $option = new Options;
                    $option->body = $choice;
                    $option->questionid = $Question->id;
                    $option->save();
                }
            }
            $redirect = '/poll/'.$key;
            return redirect($redirect);    
    } 
    public function load($id) {
        //Search for relevant poll:
        $poll = Questions::where('key', '=', $id)->get()->first();
        if($poll == NULL) {
            //throw 404 not found error if poll doesn't exist
            return view('errors.404');
        }
        else {
        //Pulls up user voting record specific to poll
        $hasVoted = votes::where([
            ['questionid', '=', $poll->id],
            ['userid', '=', \Auth::user()->id],
        ])->get()->count();
        if($hasVoted !== 0){
            //if has voted, redirect to result page
            $redirect = '/poll/'.$id.'/r';
            return redirect($redirect);
        }
        else {
        $options = Options::where('questionid', '=', $poll->id)->get();
        return view('poll', compact('poll', 'options'));
        }
        }

    }
    
    //handles the voting
    public function vote(Request $request) {
    $vote = new Votes;
    $vote->questionid = $request->PollID;
    $vote->optionid = $request->radio;
    $vote->userid = \Auth::user()->id;
    $vote->save();
    $poll = Questions::where('id', '=', $vote->questionid)->get()->first();
    $redirect = '/poll/'.$poll->key.'/r';
    return redirect($redirect);
    }
    public function results($id) {
        //usual process of checking whether poll exists
        $poll = Questions::where('key', '=', $id)->get()->first();
        if($poll == NULL) {
            //throw 404 not found error if poll doesn't exist
            return view('errors.404');
        }
        else {
            //pull up poll, options, votes
            $question = Questions::where('key', '=', $id)->get()->first();
            $options = Options::where('questionid', '=', $question->id)->get();
            $total = 0;
            foreach($options as $option) {
                $votes = Votes::where([
                    ['questionid', '=', $question->id],
                    ['optionid', '=', $option->id],
                ])->get()->count();
                $option->votes = $votes;
                $total = $total + $votes;
            }
            return view('results', compact('question', 'options'));
        }
        
    }
}