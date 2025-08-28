<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaImages extends Component
{
    use WithFileUploads;

    public $model;

    #[Validate(['images.*' => 'image|max:10240'])]
    public $images = [];

    public function render()
    {
        return view('livewire.admin.media-images');
    }

    public function updatedImages(){
        $this->validate();

        if(empty($this->images)) return false;

        /** @var \Livewire\Features\SupportFileUploads\TemporaryUploadedFile $image */
        foreach($this->images as $image){
            $stored = $image->store('images');
            $path = storage_path('app/private/' . $stored);
            $this->model->addMedia($path)->toMediaCollection('images');
        }

        $this->reset('images');
    }

    public function delete(Media $image)
    {
        $image->delete();
    }
}
