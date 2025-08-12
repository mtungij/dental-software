<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class Components extends Component
{
    public string $title = 'UI Components';

    public function showSuccessToast()
    {
        $this->dispatch('toastMagic',
            status: 'success',
            title: 'Success!',
            message: 'Your action was completed successfully.'
        );
    }

    public function showInfoToast()
    {
        $this->dispatch('toastMagic',
            status: 'info',
            title: 'Did you know?',
            message: 'This is an informational toast message.'
        );
    }

    public function showErrorToast()
    {
        $this->dispatch('toastMagic',
            status: 'error',
            title: 'An Error Occurred',
            message: 'Something went wrong while processing your request.'
        );
    }

    public function render()
    {
        return view('livewire.components');
    }
}