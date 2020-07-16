<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use App\ItemFilters;

class Settings {
    public $page_title;
    public $background;
}

class ShopController extends Controller
{

    public function catalog(Request $request, $gender = null)
    {
        $settings = $this->setSettings($gender);

        if(isset($gender))
            $items = ItemFilters::where('filter', $gender)->first()->items()->orderBy('id', 'desc')->paginate(12);
        else
            $items = Items::orderBy('id', 'desc')->paginate(12);


        if ($request->ajax()) {
            $data = '';
            foreach ($items as $item) {
                $data = $data.view('shop._item', [
                    'item' => $item
                ]);
            }
            return $data;
        }

        return view('shop.catalog', [
            'items' => $items,
            'settings' => $settings,
        ]);
    }

    public function item(Items $item)
    {
        $recommended = Items::orderBy('id', 'desc')->where('id', '!=', $item->id)->take(4)->get();

        return view('shop.item', [
            'item' => $item,
            'recommended' => $recommended,
        ]);
    }

    public function setSettings($gender)
    {
        $settings = new Settings;

        switch($gender) {
            case "men":
                $settings->page_title = "Мужская одежда";
                $settings->background = "men.jpg";
                return $settings;
            case "women": 
                $settings->page_title = "Женская одежда";
                $settings->background = "women.jpg";
                return $settings;
            default:
                $settings->page_title = "Каталог";
                $settings->background = "default.jpg";
                return $settings;
        }
    }
}
