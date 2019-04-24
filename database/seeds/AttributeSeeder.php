<?php

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = [
            'váha' => 'numeric',
            'veľkosť' => 'numeric',
            'farba' => 'text',
            'popis' => 'text',
        ];
        foreach ($attributes as $attribute => $attribute_type) {
            Attribute::create([
                'name' => $attribute,
                'type' => $attribute_type,
            ]);
        }
    }
}
