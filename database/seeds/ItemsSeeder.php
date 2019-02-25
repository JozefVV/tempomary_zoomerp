<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use App\Models\Category;
use App\Models\Item;
use App\Models\AttributeType;
use App\Models\AttributeInstance;

class ItemsSeeder extends Seeder
{
    private $items = [
        [
            "name" => [ "DEV1S SPECTRUM GAMER",
                        "Mustad HP Polarized Sunglasses Black Frame + Smoke Lens",
                        "Wiley X Valor",
                        "Uvex Sportstyle 507"
                    ],
            "category" => 0,
            "parameters" => [
                "Značka" => ["AROZZI","DEV1s","GUNNAR"],
                "Farba" => ["Číra","Jantárová","Žlté"],
                "Použitie" => ["Kancelárske","Herný"],
                "Dioptrie" => [0,0.25],
                "Štýl" => ["Klasik","Moderný","Elegantný"],
                "Veľkosť nos" => [15,16,17,18,23],
                "Veľkosť nožička" => [51,130,132,138,140],
                "Veľkosť sklo" => [19.5,41,54,365,380,390],
            ]
        ],
        [
            "name" => [
                "Alpina Twist Five HR VL+ tin – black",
                "FOX Rage Sunglasses",
                "FOX Sunglasses Khaki Frame",
                "Delphin Polarizačné okuliare SG Power",
            ],
            "category" => 1,
            "parameters" => [
                "Značka" => ["3M","Alpina","Bliz","Bollé","Granite","Marshall","POC","UVEX"],
                "Farba" => ["Čierne","Biele","Žlté"],
            ]
        ],
        [
            "name" => [
                "Ardon okuliare V10",
                "Wiley X Echo",
                "Trakker Wrap Around Sunglasses",
                "Mustad HP Polarized",
            ],
            "category" => 2,
            "parameters" => [
                "Značka" => ["3M","Ardon Safety s.r.o.","Canis safety.a.s","HECHT","Mediashop"],
                "Farba" => ["Čierna","Červená","Číra","Modrá","Oranžová","Žltá,Ružová"],
                "Materiál" => ["Polykarbonát","Nylon","Polypropylén","TPR"],
                "Určenie" => ["Pánske","Dámske","Unisex","Špeciálne"],
                "Normy" => ["EN 166 K & N","EN 17","EN 172","EN 166:2001 F","EN 166"," EN 170"],
            ]
        ],
        [
            "name" => [
                "Delphin Polarizačné okuliare SG Sport",
                "Wiley X Valor",
                "Uvex Sportstyle 507",
                "Force Max",
            ],
            "category" => 3,
            "parameters" => [
                "Značka" => ["Delphin","FOX","Mustad","Trakker"],
                "Farba rámu" => ["Čierna","Červená","Číra","Modrá,Žltá"],
                "Farba skiel" => ["Čierna","Červená","Číra","Modrá","Žltá","Hnedá"],
            ]
        ]
    ];

    private $categories = [
        "Okuliare na počítač",
        "Slnečné okuliare",
        "Ochranné okuliare",
        "Rybárske okuliare",
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->items as $item) {
            foreach (range(0, 5) as $number) {
                $itemModel = Item::create(["name" => Arr::random($item["name"])]);
                $this->createOrAsignCategoryToItem($this->categories[$item["category"]], $itemModel);

                foreach ($item["parameters"] as $key=>$array) {
                    $this->createOrAsignAtributeToItem($itemModel, $key, Arr::random($array));
                }
            }
        }
    }

    protected function createOrAsignCategoryToItem($categoryName, $item)
    {
        //find category by name
        $category = Category::where("name", $categoryName)->first();

        //create category if it does not exist
        if (!$category) {
            $category = Category::create(["name"=>$categoryName]);
        }

        $item->categories()->attach($category);

        return $category;
    }

    protected function createOrAsignAtributeToItem($item, $atr_name, $atr_value = "", $atr_type = "text", $atr_prefix = null, $atr_sufix = null)
    {
        //find atribute type by name
        $attributeType = AttributeType::where("name", $atr_name)->first();

        //create atribute type if it does not exist
        if (!$attributeType) {
            $attributeType = AttributeType::create([
                "name" => $atr_name,
                "prefix" => $atr_prefix,
                "sufix" => $atr_sufix,
                "type" => $atr_type,
            ]);
        }

        $attributeInstance = AttributeInstance::create([
            "value" => $atr_value,
            "attribute_id" => $attributeType->id,
            "item_id" => $item->id
        ]);

        return $attributeInstance;
    }
}
