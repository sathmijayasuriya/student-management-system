<div class="container mt-4">
    @if (session()->has('message'))
        <div class="alert alert-success" x-data="{ show: true }" x-init="setTimeout(() => show = false, 1000)" x-show="show">
            {{ session('message') }}
        </div>
    @endif

    <button wire:click="create" class="btn btn-outline-primary mb-5">+ Create Course</button>

    @if ($isOpen)
        <div class="card mb-5">
            <div class="card-body">
                <h5 class="card-title">{{ $isEditMode ? 'Edit Course' : 'Create Course' }}</h5>
                <form wire:submit.prevent="store"
                    wire:key="{{ $isEditMode ? 'edit-form-' . $course_id : 'create-form' }}">
                    <input type="text" wire:model="name" placeholder="Name" class="form-control mb-2">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <textarea wire:model="description" placeholder="Description" class="form-control mb-2"></textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" wire:model="duration" placeholder="Duration (e.g. 3 months)"
                        class="form-control mb-2">
                    @error('duration')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <input type="number" wire:model="credits" placeholder="Credits" class="form-control mb-2">
                    @error('credits')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <input type="text" wire:model="code" placeholder="Code" class="form-control mb-2">
                    @error('code')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror


                    <button class="btn btn-primary">{{ $isEditMode ? 'Update' : 'Save' }}</button>
                    <button type="button" class="btn btn-outline-dark" wire:click="closeModal">Cancel</button>
                </form>
            </div>
        </div>
    @endif

    <livewire:search-box placeholder="Search courses..." />
    <div class="table-responsive mt-3">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th scope="col" class="px-3 py-3">Name</th>
                    <th scope="col" class="px-3 py-3">Code</th>
                    <th scope="col" class="px-3 py-3">Credits</th>
                    <th scope="col" class="px-3 py-3">Duration</th>
                    <th scope="col" class="px-3 py-3 text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($courses && count($courses))
                    @foreach ($courses as $course)
                        <tr wire:key="course-{{ $course->id }}" class="border-t cursor-pointer">
                            <td class="px-3 py-3">
                                <span class="fw-medium"> {{ $course->name }}</span>
                            </td>
                            <td class="px-3 py-3">
                                <span class="text-muted">{{ $course->code }}</span>
                            </td>
                            <td class="px-3 py-3">{{ $course->credits }}</td>
                            <td class="px-3 py-3">{{ $course->duration }}</td>
                            <td class="px-3 py-3 text-end">
                                <button wire:click="edit({{ $course->id }})"
                                    class="btn btn-light btn-sm">Edit</button>
                                <button
                                    onclick="confirm('Are you sure you want to delete this course?') || event.stopImmediatePropagation()"
                                    wire:click="delete({{ $course->id }})" class="btn btn-danger btn-sm">
                                    Delete
                                </button>

                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">No courses found.</td>
                    </tr>
                @endif

            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <small class="text-muted">
                Showing {{ $courses->firstItem() ?? 0 }} to {{ $courses->lastItem() ?? 0 }}
                of {{ $courses->total() }} results
                @if ($search)
                    for "{{ $search }}"
                @endif
            </small>
        </div>
        <div>
            <select wire:model.live="perPage" class="form-select form-select-sm" style="width: auto;">
                <option value="5">5 per page</option>
                <option value="10">10 per page</option>
                <option value="25">25 per page</option>
                <option value="50">50 per page</option>
            </select>
        </div>
    </div>
    @if ($courses->hasPages())
        <div class="d-flex justify-content-center ">
            {{ $courses->links() }}
        </div>
    @endif

</div>
