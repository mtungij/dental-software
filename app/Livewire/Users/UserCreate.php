<?php

namespace App\Livewire\Users;

use Livewire\Component;
use Livewire\WithFileUploads;  // important to use this trait
use App\Models\User;
use Spatie\Permission\Models\Permission;

class UserCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $password;
    public $password_confirmation; // needed for confirmed validation
    public $phone;
    public $accademic_document;
    public $specialization;
    public $photo;
    public $gender;
    public $position;
  public $permission;

  public $permissions;

    public $selectedPermissions = []; 

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'password_confirmation' => 'required|string|min:8',
        'phone' => 'required|string|max:15',
        'accademic_document' => 'nullable|file|mimes:pdf|max:5120', // max 5MB pdf file
        'specialization' => 'nullable|string|max:255',
        'photo' => 'nullable|image|max:2048',
        'gender' => 'required|string|max:10',
        'position' => 'required|string|max:255',
        'permission' => 'nullable|string|exists:permissions,name',
       'selectedPermissions' => 'required|array|min:1',
       'selectedPermissions.*' => 'string|exists:permissions,name',
    ];

   public function save()
{
    $this->validate();

    $user = User::create([
        'name' => $this->name,
        'email' => $this->email,
        'password' => bcrypt($this->password),
        'phone' => $this->phone,
        'accademic_document' => $this->accademic_document ? $this->accademic_document->store('documents', 'public') : null,
        'specialization' => $this->specialization,
        'photo' => $this->photo ? $this->photo->store('photos', 'public') : null,
        'gender' => $this->gender,
        'position' => $this->position,
    ]);

    if (!empty($this->selectedPermissions)) {
        $user->syncPermissions($this->selectedPermissions);
    }

    $this->resetInputFields();

    // refresh permissions so list still shows
    $this->permissions = Permission::select('name', 'label')->get();

    $this->dispatch('toastMagic',
        status: 'success',
        title: 'Success!',
        message: 'Staff registered successfully.'
    );
}


    

   public function resetInputFields()
{
    $this->name = '';
    $this->email = '';
    $this->password = '';
    $this->password_confirmation = '';
    $this->phone = '';
    $this->accademic_document = null;
    $this->specialization = '';
    $this->photo = null;
    $this->gender = '';
    $this->position = '';
    $this->permission = '';  // reset selected permission
    $this->selectedPermissions = [];
}



    public function getPasswordMatchMessageProperty()
{
    if ($this->password === '' && $this->password_confirmation === '') {
        return null; // no message initially
    }

    if ($this->password === $this->password_confirmation) {
        return '<span class="text-green-600 text-sm mt-1 block">Passwords match ✔️</span>';
    }

    return '<span class="text-red-600 text-sm mt-1 block">Passwords do not match ✘</span>';
}


public function updated($propertyName)
{
    $this->validateOnly($propertyName);
}



      public function mount()
    {
        $this->permissions = Permission::select('name', 'label')->get();

        $this->resetInputFields();
    }


  public function render()
{
    // Always fetch fresh permissions
    $this->permissions = Permission::select('name', 'label')->get();

    return view('livewire.users.create');
}

}
