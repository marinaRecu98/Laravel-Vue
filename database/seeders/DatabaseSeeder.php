<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\Models\Worker;
use App\Models\Supplier;
use App\Models\Order;
use App\Models\RawMaterial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User
        User::factory()->create([
            'name' => 'Admin Bake.App',
            'email' => 'admin@bake.app',
            'password' => bcrypt('password'),
        ]);

        // Projects
        Project::factory(5)->create();

        // Workers
        Worker::factory(8)->create();

        // Suppliers
        Supplier::factory(6)->create();

        // Orders
        Order::factory(12)->create();

        // Raw Materials
        RawMaterial::factory(10)->create();
    }
}
