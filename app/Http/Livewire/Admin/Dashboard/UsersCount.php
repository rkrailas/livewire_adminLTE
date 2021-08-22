<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\user;
use Livewire\Component;

class UsersCount extends Component
{
    public $usersCount;

    public function mount()
    {
        $this -> getUsersCount();
    }

    public function getUsersCount($option = 'TODAY')
    {
        $this->usersCount = User::query()
            ->whereBetween('created_at', $this->getDateRange($option))
            ->count();
    }

    public function getDateRange($option)
    {
        if ($option == 'TODAY') {
            return [now()->today(), now()];
        }

        if ($option == 'MTD') {
            return [now()->firstOfMonth(), now()];
        }

        if ($option == 'YTD') {
            return [now()->firstOfYear(), now()];
        }
        
        return [now()->subDays(30), now()];
    }

    public function render()
    {
        return view('livewire.admin.dashboard.users-count');
    }
}
