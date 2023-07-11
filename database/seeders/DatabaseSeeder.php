<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Test;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $file = storage_path('app/Table_Input.csv'); 

        $handle = fopen($file, 'r');
        fgetcsv($handle);
    
                
        $result = [] ; 
        if ($handle !== false) {
            
            while (($data = fgetcsv($handle)) !== false) {
                $index = $data[0];  
                $value = $data[1]; 
    
                $result[] = (object) [
                    'index' => $index , 
                    'value' => $value
                ];
                
            }
        }
        //Save the detail from csv to database
        foreach($result as $res){
            $test = new Test;
            $test->index = $res->index;
            $test->value = $res->value;
            $test->save();
        }
    }
}
