<?php

namespace App\Livewire\Medicine;

use Livewire\Component;
use App\Models\Medicine;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;

class ManageMedicine extends Component
{
    use WithPagination;

    public $name, $quantity, $container = 1, $buy_price, $sell_price, $stock_limit;
    public $editId = null;
    public $showEditModal = false;
    public $search = '';

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'quantity' => 'required|numeric|min:1',
            'container' => 'required|numeric|min:1',
            'buy_price' => 'required|numeric|min:0',
            'sell_price' => 'required|numeric|min:0',
            'stock_limit' => 'required|numeric|min:0',
        ];
    }

    public function getTotalQuantityProperty()
    {
        if (is_numeric($this->quantity) && is_numeric($this->container)) {
            return $this->quantity * $this->container;
        }
        return 0;
    }

 public function save()
{
    $this->validate();

    

    Medicine::create([
        'name' => $this->name,
        'quantity' => (int) $this->quantity,
        'container' => (int) $this->container,
        'total_quantity' => (int) $this->totalQuantity,
        'buy_price' => (float) $this->buy_price,
        'sell_price' => (float) $this->sell_price,
        'stock_limit' => (int) $this->stock_limit,
    ]);

    session()->flash('success', 'Medicine saved successfully!');
    $this->resetInputFields();
}
    // public function resetInputFields()
    // {
    //     $this->reset(['name', 'quantity', 'container', 'buy_price', 'sell_price', 'stock_limit']);
    //     $this->editId = null;
    // }

    public function edit($id)
    {
        $medicine = Medicine::findOrFail($id);
        $this->editId = $id;
        $this->name = $medicine->name;
        $this->quantity = $medicine->quantity;
        $this->container = $medicine->container;
        $this->buy_price = $medicine->buy_price;
        $this->sell_price = $medicine->sell_price;
        $this->stock_limit = $medicine->stock_limit;

        $this->showEditModal = true;
    }

 public function update()
{
    $this->validate();

    if ($this->editId) {
        $medicine = Medicine::findOrFail($this->editId);
        $medicine->update([
            'name' => $this->name,
            'quantity' => (int) $this->quantity,
            'container' => (int) $this->container,
            'total_quantity' => (int) $this->totalQuantity,
            'buy_price' => (float) $this->buy_price,
            'sell_price' => (float) $this->sell_price,
            'stock_limit' => (int) $this->stock_limit,
        ]);

        session()->flash('success', 'Medicine updated successfully!');
        $this->showEditModal = false;
        $this->resetInputFields();
    }
}

    public function exportPDF()
    {
        $medicines = Medicine::where('name', 'like', "%{$this->search}%")
            ->orderBy('name')
            ->get();

        $pdf = Pdf::loadView('livewire.reports.medicines-report', compact('medicines'));
        return response()->streamDownload(
            fn () => print($pdf->output()),
            "medicines.pdf"
        );
    }

    public function cancelEdit()
    {
        $this->resetInputFields();
        $this->showEditModal = false;
    }

    private function resetInputFields()
    {
        $this->reset(['name', 'quantity', 'container', 'buy_price', 'sell_price', 'stock_limit', 'editId']);
    }

    public function delete($id)
    {
        Medicine::destroy($id);
        session()->flash('success', 'Medicine deleted successfully!');
    }

    public function render()
    {
        $medicines = Medicine::paginate(10);

        // dd($medicines);

        return view('livewire.medicine.manage-medicine', [
            'medicines' => $medicines,
        ]);
    }
}
