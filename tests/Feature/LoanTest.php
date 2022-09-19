<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Loan;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoanTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A test to determine if loan name is provided.
     * @test
     * @return void
     */
    public function loan_amount_is_required()
    {
        foreach (['administrator', 'client'] as $role) {
            Role::create([
                'name'  => $role,
                'url'   => $role,
            ]);
        }

        /**
         * Create user record with factory.
         * @var \Illuminate\Contracts\Auth\Authenticatable $user
         */
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'web')->withMiddleware(['permitted.user' => true])->post('/client/loans', array_merge($this->loanRequest(), ['loan_amount' => '']));

        $response->assertSessionHasErrors('loan_amount');
    }

    /**
     * A test to determine if loan duration is provided.
     * @test
     * @return void
     */
    public function loan_duration_is_required()
    {
        foreach (['administrator', 'client'] as $role) {
            Role::create([
                'name'  => $role,
                'url'   => $role,
            ]);
        }

        /**
         * Create user record with factory.
         * @var \Illuminate\Contracts\Auth\Authenticatable $user
         */
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'web')->withMiddleware(['permitted.user' => true])->post('/client/loans', array_merge($this->loanRequest(), ['duration' => '']));

        $response->assertSessionHasErrors('duration');
    }

    /**
     * A test to determine if loan type is provided.
     * @test
     * @return void
     */
    public function loan_type_is_required()
    {
        foreach (['administrator', 'client'] as $role) {
            Role::create([
                'name'  => $role,
                'url'   => $role,
            ]);
        }

        /**
         * Create user record with factory.
         * @var \Illuminate\Contracts\Auth\Authenticatable $user
         */
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'web')->withMiddleware(['permitted.user' => true])->post('/client/loans', array_merge($this->loanRequest(), ['loan_type' => '']));

        $response->assertSessionHasErrors('loan_type');
    }

    /**
     * A test to assertain that a loan can only be requested by an authenticated user.
     * @test
     * @return void
     */
    public function only_an_authenticated_user_can_request_for_a_loan()
    {
        $this->post('/client/loans', $this->loanRequest())
            ->assertRedirect('/login');

        $this->assertCount(0, Loan::all());
    }

    /**
     * A test to assertain that only an authenticated user can request for a loan.
     * @test
     * @var \Illuminate\Contracts\Auth\Authenticatable $user
     * @return void
     */
    public function an_authenticated_user_can_request_for_a_loan()
    {
        foreach (['administrator', 'client'] as $role) {
            Role::create([
                'name'  => $role,
                'url'   => $role,
            ]);
        }

        /**
         * Create user record with factory.
         * @var \Illuminate\Contracts\Auth\Authenticatable $user
         */
        $user = User::factory()->create();

        $this->actingAs($user, 'web')->withMiddleware(['permitted.user' => true])->post('/client/loans', $this->loanRequest());

        //Verify if roles record were created
        $this->assertCount(2, Role::all());

        //Verify if a user record was created
        $this->assertCount(1, User::all());

        //Verify if a loan record was created
        $this->assertCount(1, Loan::all());
    }

    /**
     * A test to assertain that a loan id exist in the database before editing
     * @test
     * @return void
     */
    public function loan_id_exists()
    {
        $this->actingAs($this->createUserRecord(), 'web')->withMiddleware(['permitted.user' => true])->get('/client/loans/124')
            ->assertStatus(404);

        $this->assertCount(0, Loan::all());
    }

    /**
     * A test to assertain that a loan request can only be updated by an authenticated user.
     * @test
     * @return void
     */
    public function only_an_authenticated_user_can_update_a_loan_request()
    {
        foreach (['administrator', 'client'] as $role) {
            Role::create([
                'name'  => $role,
                'url'   => $role,
            ]);
        }

        /**
         * Create user record with factory.
         * @var \Illuminate\Contracts\Auth\Authenticatable $user
         */
        $user = User::factory()->create();

        $this->actingAs($user, 'web')->withMiddleware(['permitted.user' => true])->post('/client/loans', $this->loanRequest());

        $loan = Loan::first();

        Auth::logout();

        $this->patch($loan->path(), array_merge($this->loanRequest(), ['loan_amount' => '500,000']))->assertRedirect('/login');

        $this->assertEquals($loan->loan_amount, '450000.0');
    }

    /**
     * A test to delete an existing loan request record.
     * @test
     * @return void
     */
    public function can_delete_loan_record()
    {
        foreach (['administrator', 'client'] as $role) {
            Role::create([
                'name'  => $role,
                'url'   => $role,
            ]);
        }

        /**
         * Create user record with factory.
         * @var \Illuminate\Contracts\Auth\Authenticatable $user
         */
        $user = User::factory()->create();

        $this->actingAs($user, 'web')->withMiddleware(['permitted.user' => true])->post('/client/loans', $this->loanRequest());

        $loan = Loan::first();

        //Verify if a loan record was created
        $this->assertCount(1, Loan::all());

        // Execute delete book record
        $response = $this->actingAs($user, 'web')->withMiddleware(['permitted.user' => true])->delete('/client/loans/' . $loan['uuid']);

        $response->assertStatus(302);

        //Verify if a book record was successfully deleted
        $this->assertCount(0, Loan::all());
    }

    private function loanRequest()
    {
        return [
            'loan_amount'   => '450,000',
            'duration'      => 2,
            'loan_type'     => 'months'
        ];
    }

    private function createUserRecord()
    {
        /**
         * Create user record with factory.
         * @var \Illuminate\Contracts\Auth\Authenticatable $user
         */
        $user = User::factory()->create();

        return $user;
    }

    private function createRoles()
    {
        foreach (['administrator', 'client'] as $role) {
            Role::create([
                'name'  => $role,
                'url'   => $role,
            ]);
        }
    }
}
