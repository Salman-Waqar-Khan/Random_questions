<?php
namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Category A',
        ]);
        DB::table('categories')->insert([
            'name' => 'Category B',
        ]);
        DB::table('categories')->insert([
            'name' => 'Category C',
        ]);
    }
}
