<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{
    use LivewireAlert;
    public $emp_id;

    protected $listeners = [
        'confirmed'
    ];
    public function render()
    {
        $emps = Employee::join('roles','employees.role_id','roles.id')->get(['employees.*','roles.title as role']);
       
        return view('livewire.employee.index',compact('emps'));
    }

    public function deleteConfirm($id)
    {
        $this->emp_id = Employee::findOrFail($id);

        if(auth()->user()->lang == 'en')
        {
        $this->alert('warning', '', [
            'position' => 'center',
            'timer' => '',
            'toast' => false,
            'text' => 'Do you want to delete ? ',
            'showConfirmButton' => true,
            'onConfirmed' => 'confirmed',
            'showCancelButton' => true,
            'onDismissed' => '',
            'confirmButtonText' => 'Delete',
            'cancelButtonText' => 'No',
           ]);
        }
        else
        {
            $this->alert('warning', '', [
                'position' => 'center',
                'timer' => '',
                'toast' => false,
                'text' => 'តើអ្នកពិតជាចង់លុបមែនទេ ? ',
                'showConfirmButton' => true,
                'onConfirmed' => 'confirmed',
                'showCancelButton' => true,
                'onDismissed' => '',
                'confirmButtonText' => 'លុប',
                'cancelButtonText' => 'ទេ',
               ]);
        }

    }

    public function confirmed()
    {

        $this->emp_id->delete();
        if(auth()->user()->lang == 'en')
        {
        $this->alert('success', 'Deleted!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
            'timerProgressBar' => true,
            'width' => '300',
           ]);
        }
        else
        {
            $this->alert('success', 'លុបបានជោគជ័យ', [
                'position' => 'center',
                'timer' => '1000',
                'toast' => false,
                'timerProgressBar' => true,
                'width' => '300',
               ]);
        }
    }
    
}
