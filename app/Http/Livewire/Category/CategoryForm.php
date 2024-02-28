<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryForm extends Component
{
    public $categoryId, $title;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'categoryId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function categoryId($categoryId)
    {
        $this->categoryId = $categoryId;
        $Category = Category::whereId($categoryId)->first();
        $this->title = $Category->title;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'title' => 'required',
        ]);

        if ($this->categoryId) {
            Category::whereId($this->categoryId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            Category::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeCategoryModal');
        $this->emit('refreshParentCategory');
        $this->emit('refreshTable');
    }

     // Soft delete category
     public function deleteCategory()
     {
         if ($this->categoryId) {
             $category = Category::find($this->categoryId);
 
             if ($category) {
                 $category->delete();
                 $action = 'error';
                 $message = 'Successfully Deleted';
             } else {
                 $action = 'error';
                 $message = 'Category not found';
             }
 
             $this->emit('flashAction', $action, $message);
             $this->resetInputFields();
             $this->emit('closeCategoryModal');
             $this->emit('refreshParentCategory');
             $this->emit('refreshTable');
         }
     }
 
     // Recover soft-deleted category
     public function recoverCategory()
     {
         if ($this->categoryId) {
             $category = Category::withTrashed()->find($this->categoryId);
 
             if ($category) {
                 $category->restore();
                 $action = 'success';
                 $message = 'Successfully Recovered';
             } else {
                 $action = 'error';
                 $message = 'Category not found or already recovered';
             }
 
             $this->emit('flashAction', $action, $message);
             $this->resetInputFields();
             $this->emit('closeCategoryModal');
             $this->emit('refreshParentCategory');
             $this->emit('refreshTable');
         }
     }

    public function render()
    {
        return view('livewire.category.category-form');
    }
}
