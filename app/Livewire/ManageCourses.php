<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CoursesExport;

class ManageCourses extends Component
{
    use WithPagination;

    public $name, $description, $duration, $credits, $code, $course_id;
    public $isOpen = false;
    public $isEditMode = false;
    public $search = '';
    public $perPage = 10;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $sortOptions = [
        'name' => 'Name',
        'code' => 'Code',
        'credits' => 'Credits',
        'duration' => 'Duration',
        'created_at' => 'Latest',
    ];
    public $viewingCourse = null;
    protected $paginationTheme = 'bootstrap';
    public $isViewMode = false;
    public $viewCourse = null;
    public $selectedCourses = [];
    public $selectAll = false;

    #[On('searchUpdated')]
    public function setSearch($term)
    {
        $this->search = $term;
        $this->resetPage();
    }

    public function render()
    {
        $query = Course::query()
            ->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('code', 'like', '%' . $this->search . '%');
            });
        // Always apply sorting - remove the conditional
        $query->orderBy($this->sortField, $this->sortDirection);

        return view('livewire.manage-courses', [
            'courses' => $query->paginate($this->perPage),
        ]);
    }

    public function view($id)
    {
        $this->viewCourse = Course::findOrFail($id);
        $this->isViewMode = true;
        $this->isEditMode = false;
        $this->isOpen = true;
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

    public function editFromView()
    {
        if ($this->viewCourse) {
            $this->isViewMode = false;
            $this->edit($this->viewCourse->id);
            $this->viewCourse = null;
        }
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

    public function exportExcel()
    {
        return Excel::download(new CoursesExport($this->search), 'courses.xlsx');
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            // Toggle direction
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            // New sort field
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
        $this->resetPage();
    }

    public function sortIcon($field)
    {
        if ($this->sortField !== $field) {
            return '';
        }
        return $this->sortDirection === 'asc' ? '↑' : '↓';
    }

    public function clearSort()
    {
        $this->sortField = 'created_at'; // Reset to default
        $this->sortDirection = 'desc'; // Reset to default
        $this->resetPage();
    }

    // Bulk Actions - Simple Implementation
    public function deleteSelected()
    {
        if (empty($this->selectedCourses)) {
            session()->flash('error', 'No courses selected.');
            return;
        }

        try {
            Course::whereIn('id', $this->selectedCourses)->delete();
            
            $count = count($this->selectedCourses);
            $this->selectedCourses = [];
            $this->selectAll = false;
            
            session()->flash('message', $count . ' course(s) deleted successfully.');
            $this->resetPage(); // Reset pagination if needed
        } catch (\Exception $e) {
            session()->flash('error', 'Error deleting courses: ' . $e->getMessage());
        }
    }

    public function unselectAll()
    {
        $this->selectedCourses = [];
        $this->selectAll = false;
        // session()->flash('message', 'All selections cleared.');
    }

    public function selectAllVisible()
    {
        $this->selectedCourses = $this->getCourses()->pluck('id')->toArray();
        $this->selectAll = true;
        // session()->flash('message', 'All visible courses selected.');
    }

    // Select All checkbox functionality
    public function updatedSelectAll()
    {
        if ($this->selectAll) {
            // Select all visible courses on current page
            $this->selectedCourses = $this->getCourses()->pluck('id')->toArray();
        } else {
            $this->selectedCourses = [];
        }
    }

    public function updatedSelectedCourses()
    {
        // Update selectAll checkbox based on selection
        $currentPageIds = $this->getCourses()->pluck('id')->toArray();
        $this->selectAll = !empty($currentPageIds) &&
            count(array_intersect($this->selectedCourses, $currentPageIds)) === count($currentPageIds);
    }

    private function getCourses()
    {
        return Course::query()
            ->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('code', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);
    }
}