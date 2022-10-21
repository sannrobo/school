<?php

namespace App\Http\Livewire\Class;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Classes;
use App\Models\ClassStudent;
use App\Models\Student;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\VarDumper\Caster\ClassStub;

class Index extends Component
{
    use LivewireAlert;
    use WithPagination;
    

    public $classid;
    public $classAssign ;
    public $classCreate;
    public $timeid;

    public $student, $student_id, $studata = [];

    protected $listeners = [
        'confirmed'
    ];

    public function paginationView()
    {
        return 'custom-pagination-links-view';
    }

    

    public function render()
    {
        abort_if(Gate::denies('show_class'),403);
        $classes = Classes::where('status',1)
        ->join('courses','classes.course_id','courses.id')
        ->join('rooms','classes.room_id','rooms.id')
        ->join('sections','classes.section_id','sections.id')
        ->join('employees','classes.teacher_id','employees.id')

        ->select('classes.name as class_name','classes.id as class_id','courses.*','sections.name as time','rooms.name as room_name','employees.name_en as teacher_name_en','employees.name_kh as teacher_name_kh')
        ->orderBy('class_id' ,'desc')
        ->paginate(10);
      

        
      
        return view('livewire.class.index', compact('classes'));
    }

    protected $rules = [
        'student_id' => 'required',
        'classid' => 'required',
    ];

    public function mount()
    {
        
        $this->studata = Student::
        take(5)->orderBy('id','desc')->get();
    }

    public function updatedStudent(){
        $this->studata = Student::where('st_code','like','%'.$this->student.'%')
        ->orWhere('st_name_kh','like','%'.$this->student.'%')
        ->orWhere('st_name_en','like','%'.$this->student.'%')
        ->orWhere('phone','like','%'.$this->student.'%')
        ->take(5)->get();

        if($this->studata==''){
            $this->studata = [];
        }
    }

    public function getStudent($id, $name){
        $this->student_id= $id;
        $this->student = $name;
        $this->studata = [];
    }

    public function assignStudent()
    {
        $arrayStu=[];
        $stu = ClassStudent::whereIn('class_id',[$this->classid])->get();
        foreach ($stu as $s) {
            $arrayStu[$s->student_id]=$s->student_id;
        }
        if(in_array($this->student_id, $arrayStu))
        {
            if(auth()->user()->lang == 'kh')
            {
            $this->alert('warning', 'បញ្ហា', [
                'position' => 'center',
                'timer' => '3000',
                'toast' => false,
                'timerProgressBar' => true,
                'width' => '300',
                'text'=>"សិស្ស $this->student មានក្នុងថ្នាក់រួចហើយ ",
                'showCancelButton' => false,
            ]);
            }else
            {
                $this->alert('warning', "Room and Time is already exist!", [
                    'position' => 'center',
                    'timer' => '',
                    'toast' => false,
                    'timerProgressBar' => true,
                    'width' => '300',
                    'showCancelButton' => true,
                ]); 
            }
            $this->dispatchBrowserEvent('is-close');
        }  
        else
        {
            $this->validate();
            $a = new ClassStudent();
            $a->student_id = $this->student_id;
            $a->class_id  = $this->classid;
            $a->save();
            $this->dispatchBrowserEvent('is-open');
            $this->reset(['student','classid']);
        }

     
     

     ;
    }

    // public function saveSection()
    // {

    //     Classes::create([
    //     'name'=>$this->name
    //     ]);

    //     $this->alert('success', 'Inserted!', [
    //         'position' => 'center',
    //         'timer' => '1000',
    //         'toast' => false,
    //         'timerProgressBar' => true,
    //         'width' => '300',
    //     ]);

    //     $this->reset();
    // }

    // public function Edit($id)
    // {
    //     $section = Classes::find($id);
    //     $this->name = $section->name;
    //     $this->secid = $id;
    //     $this->text = "Update";
    // }

    // public function updateSection()
    // {
    //     Classes::find($this->secid)->update([
    //         'name'=>$this->name
    //     ]);
    //     if(auth()->user()->lang == 'kh')
    //     {
    //     $this->alert('success', "កែប្រែបានជៅគជ័យ", [
    //         'position' => 'center',
    //         'timer' => '1000',
    //         'toast' => false,
    //         'timerProgressBar' => true,
    //         'width' => '300',
    //     ]);
    //     }else
    //     {
    //         $this->alert('success', "Updated!", [
    //             'position' => 'center',
    //             'timer' => '1000',
    //             'toast' => false,
    //             'timerProgressBar' => true,
    //             'width' => '300',
    //         ]); 
    //     }
    //     $this->reset();
    // }

    public function deleteConfirm($id)
    {
        
        $this->classid = Classes::find($id);
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

     
        $this->classid->delete();
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

    public function Edit($id)
    {
        return redirect()->route('class.edit',$id);
    }

    public function addStudent()
    {
        $this->classAssign= !$this->classAssign;
    }
}
