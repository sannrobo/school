<?php

namespace App\Http\Livewire\Course;

use App\Models\Course;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $name;
    public $desc;
    public $price;
    public $secid;
    protected $listeners = [
        'confirmed'
    ];

    public $text="Save";
    public function render()
    {
        $courses = Course::paginate(5);
        return view('livewire.course.index',compact('courses'));
    }

    public function paginationView()
    {
        return 'custom-pagination-links-view';
    }

    public function saveSection()
    {

        Course::create([
        'name'=>$this->name,
        'price'=>$this->price,
        'description'=>$this->desc
        ]);

        $this->alert('success', 'Inserted!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
            'timerProgressBar' => true,
            'width' => '300',
        ]);

        $this->reset();
    }

    public function Edit($id)
    {
        $section = Course::find($id);
        $this->name = $section->name;
      
        $this->price = $section->price;
        $this->desc = $section->description;
        $this->secid = $id;
        $this->text = "Update";
    }

    public function updateSection()
    {
        Course::find($this->secid)->update([
            'name'=>$this->name,
            'description'=>$this->desc,
            'price'=>$this->price,
        ]);
        if(auth()->user()->lang == 'kh')
        {
        $this->alert('success', "កែប្រែបានជៅគជ័យ", [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
            'timerProgressBar' => true,
            'width' => '300',
        ]);
        }else
        {
            $this->alert('success', "Updated!", [
                'position' => 'center',
                'timer' => '1000',
                'toast' => false,
                'timerProgressBar' => true,
                'width' => '300',
            ]); 
        }
        $this->reset();
    }

    public function deleteConfirm($id)
    {
        $this->secid = Course::find($id);
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
