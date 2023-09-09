<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class MembersTable extends Component
{
    use WithPagination;

    public $search = '';
    public $sortDirection = 'asc';
    public $sortColumn = 'name';

    public function findUser()
    {
        if ($this->search) {
            $this->resetPage();

            // Build the search query
            $usersQuery = User::query()->where('role_id', '=', 4);

            if ($this->search) {
                $usersQuery->where(function ($query) {
                    $query->where('name', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('address', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('email', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('contact_number', 'LIKE', '%' . $this->search . '%');
                });
            }

            // Order the results based on sorting criteria (if any)
            $usersQuery->orderBy($this->sortColumn, $this->sortDirection);

            // Paginate the results
            $users = $usersQuery->paginate(5);

            // Update the $users property to reflect the search results
            $this->users = $users;
        }
    }

    public function sortBy($column)
    {
        // Toggle the sort direction if the same column is clicked again
        if ($column === $this->sortColumn) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortColumn = $column;
    }

    public function render()
    {
        $usersQuery = User::query()->where('role_id', '=', 4);

        if ($this->search) {
            $usersQuery->where(function ($query) {
                $query->where('name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('address', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('email', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('contact_number', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('role_id', 'LIKE', '%' . $this->search . '%');
            });
        }

        $users = $usersQuery
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate(10);

        return view('livewire.members-table', compact('users'));
    }
}
