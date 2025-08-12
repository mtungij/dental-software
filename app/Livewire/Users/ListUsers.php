<?php
namespace App\Livewire\Users;
use Livewire\Attributes\Computed;
use Spatie\Permission\Models\Permission;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class ListUsers extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $search = '';

    public $selectedUserId;

    public $permissions = [];
public $showPermissionsModal = false;
public $permissionUserName = '';




public $allPermissions = [];
public $selectedPermissions = [];

public $editingUserId = null;


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function editUser($userId)
    {
        // For demo: just emit event or redirect
        $this->selectedUserId = $userId;
        // You can redirect or open modal here
        $this->dispatchBrowserEvent('notify', ['message' => "Edit user ID: $userId"]);
    }

    public function deleteUser($userId)
    {
        $user = User::find($userId);
        if ($user) {
            $user->delete();
            session()->flash('message', 'User deleted successfully.');
            $this->resetPage();
        }
    }


    public function closeModal()
{
    $this->showPermissionsModal = false;
}

public function selectAllPermissions()
{
    // Select all permissions from $allPermissions
    $this->selectedPermissions = $this->allPermissions ?? [];
}

public function unselectAllPermissions()
{
    // Clear all selected permissions
    $this->selectedPermissions = [];
}

    public function blockUser($userId)
    {
        $user = User::find($userId);
        if ($user) {
            $user->is_blocked = !$user->is_blocked; // toggle block
            $user->save();
            $status = $user->is_blocked ? 'blocked' : 'unblocked';
            session()->flash('message', "User $status successfully.");
        }
    }

public function viewPermissions($userId)
{
    $user = User::find($userId);
    if (!$user) {
        session()->flash('message', 'User not found.');
        return;
    }

    $this->editingUserId = $user->id;
    $this->permissionUserName = $user->name;

    // Load all permissions available in system
    $this->allPermissions = Permission::select('name', 'label')->get();

    // Load user current permissions
    $this->selectedPermissions = $user->getAllPermissions()->pluck('name')->toArray();

    $this->showPermissionsModal = true;
}

  public function checkAll()
{
    $this->selectedPermissions = $this->allPermissions->pluck('name')->toArray();
}

public function uncheckAll()
{
    $this->selectedPermissions = [];
}


public function updatePermissions()
{
    if (!$this->editingUserId) {
        session()->flash('message', 'No user selected.');
        return;
    }

    $user = User::find($this->editingUserId);
    if (!$user) {
        session()->flash('message', 'User not found.');
        return;
    }

    // Sync permissions according to selected checkboxes
    $user->syncPermissions($this->selectedPermissions);

    session()->flash('message', "Permissions updated for {$user->name}.");

    $this->showPermissionsModal = false;
}

    #[Computed]
    public function users()
    {
        // This method can be used to fetch users if needed
        return User::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', "%{$this->search}%")
                      ->orWhere('email', 'like', "%{$this->search}%")
                      ->orWhere('position', 'like', "%{$this->search}%");
            })
            ->orderBy('name')
            ->paginate(9);
    }

    public function render()
    {
        $users = User::query()
            ->when($this->search, fn($q) =>
                $q->where('name', 'like', "%{$this->search}%")
                  ->orWhere('email', 'like', "%{$this->search}%")
                  ->orWhere('position', 'like', "%{$this->search}%")
            )
            ->orderBy('name')
            ->paginate(9);

        return view('livewire.users.list-users', ['users' => $users]);
    }
}
