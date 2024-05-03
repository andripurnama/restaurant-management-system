<?php

namespace Database\Seeders;

use App\Models\MasterProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->productSeeds();
    }

    private function productSeeds()
    {
        MasterProduct::create(['ProductName' => 'Lorem Ipsum','ProductCategory' => 'Lorem','ProductCategory' => 'Locat','SellingPrice' => 50]);
    }
}
