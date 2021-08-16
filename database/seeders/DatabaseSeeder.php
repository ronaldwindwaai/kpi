<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Rating;
use App\Models\Profile;
use App\Models\Position;
use App\Models\Workplan;
use App\Models\Appraisal;
use App\Models\Department;
use Illuminate\Support\Str;
use App\Models\Qualification;
use App\Models\WorkPlan as ModelsWorkPlan;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info("Creating Roles and Permissions.");
        $this->call([RolesAndPermissionsSeeder::class]);
        $this->command->info("Creating Factory three(3) User and Profile of type Manager.");
        User::factory(3)
            ->create()
            ->each(function ($user) {
                $role = Role::findByName('manager');
                $role->users()->attach($user->user_id);

                $department = Department::factory()
                    ->create(
                        [
                            'manager_id' => $user->id,
                        ]
                    );

                Profile::factory()
                    ->create([
                        'user_id' => $user->id,
                        'department_id' => $department->id
                    ]);
            });
        $this->command->info("Creating Factory ten(10) User and Profiles.");
        Profile::factory(10)
            ->create()
            ->each(function ($user) {
                $role = Role::all()->random();
                $role->users()->attach($user->user_id);
            });

        $this->command->info("Creating Super Admin User.");
        $admin = User::factory()->create(
            [
                'first_name' => 'Ronald',
                'last_name' => 'Windwaai',
                'email' => 'ronaldwindwaai@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('admin'),
                'remember_token' => Str::random(10),
            ]
        );
        $this->command->info("Creating Super Admin User Profile.");
        Profile::factory()->create(
            [
                'user_id' => $admin->id
            ]
        );

        $this->command->info("Assign Super Admin User Profile.");
        $role = Role::findByName('super-admin');
        $role->users()->attach($admin);
        $this->command->info("Creating Appraisal 15 Model.");
        Appraisal::factory(15)->create();
        $this->command->info("Creating Position 10 Model.");
        Position::factory(10)->create();
        $this->command->info("Creating Qualification 20 Model.");
        Qualification::factory(20)->create();
        $this->command->info("Creating Rating 15 Model.");
        Rating::factory(15)->create();
        $this->command->info("Creating WorkPlan 20 Model.");
        WorkPlan::factory(20)->create();
        $this->command->info("Creating Department 2 Model.");
        Department::factory(2)->create();
    }
}
