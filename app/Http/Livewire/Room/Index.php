<?php

namespace App\Http\Livewire\Room;

use App\Models\Room;
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
        $rooms = Room::paginate(5);
        return view('livewire.room.index' , compact('rooms'));
    }
    public function saveSection()
    {

        Room::create([
        'name'=>$this->name,
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
        $section = Room::find($id);
        $this->name = $section->name;
   
        $this->desc = $section->description;
        $this->secid = $id;
        $this->text = "Update";
    }

    public function updateSection()
    {
        Room::find($this->secid)->update([
            'name'=>$this->name,
            'description'=>$this->desc,

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
        $this->secid = Room::find($id);
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
