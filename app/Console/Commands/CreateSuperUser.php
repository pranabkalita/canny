<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class CreateSuperUser extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'canny:create {superuser}';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Creates a super user for the application';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {
    $first_name =  $this->ask('What is you first name');
    $last_name =  $this->ask('What is you last name');
    $email = $this->ask('Provide your email address');
    $password = $this->secret('Enter a secure password');
    $password_confirmation = $this->secret('Confirm your password');

    while ($password !== $password_confirmation) {
      $this->error('Passwords does not match!');

      $password = $this->secret('Enter a secure password');
      $password_confirmation = $this->secret('Confirm your password');
    }

    User::insert([
      'first_name' => $first_name,
      'last_name' => $last_name,
      'email' => $email,
      'is_superuser' => true,
      'password' => Hash::make($password),
      'email_verified_at' => Carbon::now()
    ]);

    $this->info('Superuser created !');


    return 0;
  }
}
