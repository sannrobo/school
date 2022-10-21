<?php

namespace App\Http\Livewire\Sections;

use App\Models\Section;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;
    use WithPagination;
    public $name;
    public $secid;
    public $text="Save";
    protected $listeners = [
        'confirmed'
    ];
    public function paginationView()
    {
        return 'custom-pagination-links-view';
    }
    public function render()
    {
        abort_if(Gate::denies('show_time'),403);
        $sections = Section::paginate(5);
        return view('livewire.sections.index' , compact('sections'));
    }
    public function saveSection()
    {
        abort_if(Gate::denies('create_time'),403);
        Section::create([
        'name'=>$this->name
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
        $section = Section::find($id);
        $this->name = $section->name;
        $this->secid = $id;
        $this->text = "Update";
    }

    public function updateSection()
    {
        Section::find($this->secid)->update([
            'name'=>$this->name
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
        $this->secid = Section::find($id);
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
