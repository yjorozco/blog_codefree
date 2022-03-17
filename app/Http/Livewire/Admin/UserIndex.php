<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
class UserIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "boopstrap";
    public function render()
    {
        $user = User::paginate();
        return view('livewire.admin.user-index', compact('users'));
    }
}
