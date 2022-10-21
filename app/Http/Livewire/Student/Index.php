<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;
use App\Models\Student;
use Illuminate\Support\Facades\Gate;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;
    public $search;
    
    public $secid;
    public function render()
    {
        abort_if(Gate::denies('show_student'),403);
    
        $st = Student::orderBy('id','desc')->get();
      
        return view('livewire.student.index' , compact('st'));
    }
    protected $listeners = [
        'confirmed'
    ];


    public function mount()
    {
     
    }

    public function updatedSearch()
    {
        $this->st = Student::where('st_code','like','%'.$this->search.'%')
                             ->orWhere('st_name_kh','like','%'.$this->search.'%')
                             ->orWhere('st_name_en','like','%'.$this->search.'%')
                             ->orWhere('phone','like','%'.$this->search.'%')
                            ->orderBy('id','desc')->get();
    }

    public function Edit($id)
    {
        return redirect()->to('/students/edit/' .$id) ;
    }

    public function deleteConfirm($id)
    {
        abort_if(Gate::denies('delete_student'),403);
        $this->secid = Student::find($id);
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

        $this->secid->delete();
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
