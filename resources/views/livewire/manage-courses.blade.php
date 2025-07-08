<div class="container mt-4">
    @if (session()->has('message'))
        <div class="alert alert-success" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">
            {{ session('error') }}
        </div>
    @endif

    <button wire:click="create" class="btn btn-outline-primary mb-5">+ Create Course</button>

    @if ($isOpen)
        <div class="card mb-5">
            <div class="card-body">
                @if ($isViewMode)
                    {{-- View Mode --}}
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class=" mb-0">Course Details</h3>
                        <div>
                            <button wire:click="editFromView" class="btn btn-outline-primary btn-sm">
                                <i class="ti ti-edit me-1"></i>Edit
                            </button>
                            <button wire:click="closeModal" class="btn btn-outline-dark btn-sm">
                                <i class="ti ti-x me-1"></i>Close
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold text-muted">Course Name</label>
                                <p class="form-control-plaintext">{{ $viewCourse->name }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold text-muted">Course Code</label>
                                <p class="form-control-plaintext">
                                    <span class="badge rounded-pill bg-success">{{ $viewCourse->code }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold text-muted">Credits</label>
                                <p class="form-control-plaintext">{{ $viewCourse->credits }} Credits</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold text-muted">Duration</label>
                                <p class="form-control-plaintext">{{ $viewCourse->duration }}</p>
                            </div>
                        </div>
                    </div>

                    @if ($viewCourse->description)
                        <div class="mb-3">
                            <label class="form-label fw-bold text-muted">Description</label>
                            <p class="form-control-plaintext">{{ $viewCourse->description }}</p>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold text-muted">Created At</label>
                                <p class="form-control-plaintext">{{ $viewCourse->created_at->format('M d, Y h:i A') }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold text-muted">Last Updated</label>
                                <p class="form-control-plaintext">{{ $viewCourse->updated_at->format('M d, Y h:i A') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @else
                    {{-- Create/Edit  --}}
                    <h4 class="card-title mb-5">{{ $isEditMode ? 'Edit Course' : 'Create Course' }}</h4>
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
                @endif
            </div>
        </div>
    @endif

    {{-- show all --}}
    @if (!$isOpen)
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
            {{-- Search --}}
            <div class="flex-grow-1 me-3">
                <livewire:search-box placeholder="Search courses..." />
            </div>
            {{-- Sort controls --}}
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <div class="d-flex align-items-center">
                    <label for="sortField" class="form-label mb-0 me-2 fw-semibold"></label>
                    <select wire:model.live="sortField" id="sortField" class="form-select form-select"
                        style="width: 150px;">
                        @foreach ($sortOptions as $field => $label)
                            <option value="{{ $field }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex align-items-center">
                    <select wire:model.live="sortDirection" class="form-select form-select" style="width: 130px;">
                        <option value="asc">Ascending</option>
                        <option value="desc">Descending</option>
                    </select>
                </div>

                <button wire:click="clearSort" class="btn btn-outline-primary">Reset</button>
            </div>

            {{-- Export --}}
            <div>
                <button wire:click="exportExcel" class="btn btn-outline-success">
                    Export <i class="ti ti-file-export"></i>
                </button>
            </div>
        </div>

        {{-- Bulk Actions - Simplified inline version --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            @if (count($selectedCourses))
                <div class="d-flex gap-2 align-items-center">
                    <span class="badge rounded-pill bg-light text-dark">{{ count($selectedCourses) }} selected</span>

                    <button class="btn btn-outline-danger btn-sm" wire:click="deleteSelected"
                        wire:confirm="Are you sure you want to delete {{ count($selectedCourses) }} selected course(s)?">
                        <i class="ti ti-trash me-1"></i>Delete Selected
                    </button>

                    <button class="btn btn-light btn-sm" wire:click="unselectAll">
                        <i class="ti ti-x me-1"></i>Clear Selection
                    </button>
                </div>
                <div class="d-flex gap-2 align-items-center">
                    <span class="text-muted small">
                        <i class="ti ti-info-circle me-1"></i>Select courses to perform bulk actions
                    </span>
                    <button class="btn btn-outline-primary btn-sm" wire:click="selectAllVisible"
                        title="Select all courses on current page">
                        <i class="ti ti-check-all me-1"></i>Select All
                    </button>
                </div>
            @endif
        </div>

        <div class="table-responsive mt-3">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>
                            <input type="checkbox" style="width: 15px; height: 15px;" wire:model.live="selectAll">
                        </th>
                        <th scope="col" class="px-3 py-3" style="cursor:pointer" wire:click="sortBy('name')">
                            Name {!! $this->sortIcon('name') !!}
                        </th>
                        <th scope="col" class="px-3 py-3" style="cursor:pointer" wire:click="sortBy('code')">
                            Code {!! $this->sortIcon('code') !!}
                        </th>
                        <th scope="col" class="px-3 py-3" style="cursor:pointer" wire:click="sortBy('credits')">
                            Credits {!! $this->sortIcon('credits') !!}
                        </th>
                        <th scope="col" class="px-3 py-3" style="cursor:pointer" wire:click="sortBy('duration')">
                            Duration {!! $this->sortIcon('duration') !!}
                        </th>
                        <th scope="col" class="px-3 py-3 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($courses && count($courses))
                        @foreach ($courses as $course)
                            <tr wire:key="course-{{ $course->id }}" class="border-t cursor-pointer">
                                <td>
                                    <input type="checkbox" wire:model.live="selectedCourses"
                                        style="width: 15px; height: 15px;" value="{{ $course->id }}">
                                </td>
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
                                        class="btn btn-light border-0 bg-transparent shadow-none">
                                        <i class="ti ti-edit "></i>
                                    </button>
                                    <button wire:click="delete({{ $course->id }})"
                                        wire:confirm="Are you sure you want to delete this course?"
                                        class="btn btn-light border-0 bg-transparent shadow-none">
                                        <i class="ti ti-trash text-danger"></i>
                                    </button>
                                    <button wire:click="view({{ $course->id }})"
                                        class="btn btn-success border-0 bg-transparent shadow-none"
                                        title="View Details">
                                        <i class="ti ti-eye text-success"></i>
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
    @endif
</div>
