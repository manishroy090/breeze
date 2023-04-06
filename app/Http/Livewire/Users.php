<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Jon;
class Users extends Component
{
 public $firstname;
 public $lastname;
 public $email;
 public $number;
 public $status;
 public $role;
 public $password;
 public $confirmpass;

 protected $rules=[
    'firstname'=>'required',
    'lastname'=>'required',
    'email'=>'required',
    'number'=>'required',
    'status'=>'required',
    'role'=>'required',
    'password'=>'required',
    'confirmpass'=>'required'
 ];
public function store(){

    
   $validdata= $this->validate();
    Jon::create($validdata);
    return redirect()->route('user.index');
    
    
  
}
 
    public function render()
    {
        return view('livewire.users');
    }
}
