<?php

namespace App\Livewire\Admin;

use App\Enums\Lang;
use App\Models\WebMenu;
use App\Models\WebPage;
use Livewire\Component;

class WebMenuEditor extends Component
{
//    public $menu_type; // do buducna ked bude viacej moznosti (horne, bocne, spodne, atd)

    public $itemTypes = ['webPage', 'custom'];
    public $itemType = 'webPage';
    public $itemId;
    public $itemCustom = [];
    public $parentId;

    public function boot()
    {
        foreach(Lang::cases() as $lang){
            $this->itemCustom[$lang->value] = '';
        }
    }

    public function langs()
    {
        return Lang::cases();
    }

    public function webPages()
    {
        return WebPage::all();
    }

    public function webMenu()
    {
        return WebMenu::whereNull('parent_id')->get();
    }

    public function render()
    {
//        $webMenu = WebMenu::find(1);
//        dd($webMenu, $webMenu->target); // todo: TMP

        return view('livewire.admin.web-menu-editor');
    }

    public function add()
    {
        if($this->itemType == 'webPage' && !empty($this->itemId)){
            $webMenuData = ['target_id' => $this->itemId, 'target_type' => 'App\Models\WebPage'];
        }else{
            $webMenuData = ['title_langs' => $this->itemCustom];
        }

        if(!empty($this->parentId)){
            $webMenuData['parent_id'] = $this->parentId;
        }

//        dd('add', $this, $webMenuData); // todo: TMP
        $webmenu = WebMenu::create($webMenuData);

        $this->reset('itemId', 'itemCustom', 'parentId');
    }
}
