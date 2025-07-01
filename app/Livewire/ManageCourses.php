<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class ManageCourses extends Component
{
    use WithPagination;
    
    public $name, $description, $duration, $credits, $code, $course_id;
    public $isOpen = false;
    public $isEditMode = false;
    public $search = '';
    public $perPage = 10; 
    
    protected $paginationTheme = 'bootstrap'; 
    
    #[On('searchUpdated')]
    public function setSearch($term)
    {
        $this->search = $term;
        $this->resetPage(); // Reset 
    }

    public function render()
    {
        return view('livewire.manage-courses', [
            'courses' => Course::query()
                ->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('code', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate($this->perPage)
        ]);
    }

    public function resetFields()
    {
        $this->name = '';
        $this->description = '';
        $this->duration = '';
        $this->credits = '';
        $this->code = '';
        $this->course_id = null;
    }

    public function create()
    {
        $this->resetFields();
        $this->isEditMode = false;
        $this->isOpen = true;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'duration' => 'required|string',
            'credits' => 'required|integer',
            'code' => 'required|string|unique:courses,code,' . $this->course_id,
        ]);

        Course::updateOrCreate(['id' => $this->course_id], [
            'name' => $this->name,
            'description' => $this->description,
            'duration' => $this->duration,
            'credits' => $this->credits,
            'code' => $this->code,
        ]);

        session()->flash(
            'message',
            $this->course_id ? 'Course updated successfully.' : 'Course created successfully.'
        );

        $this->closeModal();
        $this->resetFields();
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $this->course_id = $id;
        $this->name = $course->name;
        $this->description = $course->description;
        $this->duration = $course->duration;
        $this->credits = $course->credits;
        $this->code = $course->code;

        $this->isEditMode = true;
        $this->isOpen = true;
    }

    public function delete($id)
    {
        Course::find($id)->delete();
        session()->flash('message', 'Course deleted successfully.');
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }
}