<?php

namespace App\Livewire;

use Livewire\Component;

class SearchBox extends Component
{
    public $search = '';
    public $placeholder = 'Search...';


    public function updatedSearch()
    {
        $this->dispatch('searchUpdated', $this->search);
    }
        public function render()
    {
        return view('livewire.search-box');
    }
    public function resetSearch()
    {
        $this->search = '';
        $this->dispatch('searchUpdated', '');
    }

}