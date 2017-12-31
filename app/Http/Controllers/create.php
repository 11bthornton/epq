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
        //ENSURES USER HAS TO BE SIGNED IN
    }
    public function index() {
        //Returns Poll Creation View
        return view('create');
    }
    public function store(Request $request) {
        $Question = new Questions;
        //Create new instance of question
        $Question->body = $request->body;
        //Set question body to body from form
        //FOLLOWING CODE GENERATES KEY
        $key = '';
        $chars = 'abcdefghijklmnopqrstuvwxyz1234567890';
        do {
            for($i=1;$i<6;$i++){
            $random = rand(0,35);
            $key .= $chars[$random];     
        }
        $record = Questions::where('key', '=', $key)->first();
        } while($record !== NULL);
        $Question->key = $key;
        $Question->uid = \Auth::user()->id;
        $Question->save();
        //SAVES Key
        foreach($request->options as $choice) {
                if(isset($choice)) {
                    $option = new Options;
                    $option->body = $choice;
                    $option->questionid = $Question->id;
                    $option->save();
                }
            }
        //Saving each option
            $redirect = '/poll/'.$key;
        //redirect to the poll view
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
            $votes = Votes::where('questionid', '=', $question->id)->get();
            //take all records from database for analysis
            $total = $votes->count();
            //Number of all votes cast on this poll
            foreach($options as $option) {
                $votes = Votes::where([
                    ['questionid', '=', $question->id],
                    ['optionid', '=', $option->id],
                ])->get();
                $option->votes = $votes->count();
                $option->percentage = ($option->votes/$total)*100;
                //DEMOGRAPHICAL ANALYSIS:
                $option->MaleVotes = 0;
                $option->FemaleVotes = 0;
                $option->OtherVotes = 0;
                $option->range1 = 0;
                $option->range2 = 0;
                $option->range3 = 0;
                $option->range4 = 0;
                $option->range5 = 0;
                foreach($votes as $vote) {
                    //get user using id
                    $user = User::where('id', '=', $vote->userid)->get()->first();
                    //should only be 1 user with id
                    switch($user->gender) {
                        case "Male":
                            $option->MaleVotes = $option->MaleVotes + 1;
                            break;
                        case "Female":
                            $option->FemaleVotes = $option->FemaleVotes + 1; 
                            break;
                        case "Other":
                            $option->OtherVotes = $option->OtherVotes + 1; 
                            break;
                    }
                 $today = date("Y-m-d");
                 $diff = date_diff(date_create($user->dob), date_create($today));
                 $age = $diff->format('%y');
                 switch($age) {
                    case ($age < 18):
                         $option->range1 = $option->range1 + 1;
                         break;
                    case ($age >= 18 && $age < 30):
                         $option->range2 = $option->range2 + 1;
                         break;
                    case ($age >= 30 && $age < 50):
                         $option->range3 = $option->range3 + 1;
                         break;
                    case ($age >= 50 && $age < 65):
                         $option->range4 = $option->range4 + 1;
                         break;
                    case ($age >= 65):
                         $option->range5 = $option->range5 + 1;
                         break;
                         
                 }
                }
            }
            //Counting up individual votes, calculating percentage as well for length of bar for
            //visual indicator on screen
            return view('results', compact('question', 'options'));
        }
        
    }
}