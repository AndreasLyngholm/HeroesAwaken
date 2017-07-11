<?php

namespace App\Providers;

use App\Comment;
use App\Forum;
use App\Policies\CommentPolicy;
use App\Policies\ForumPolicy;
use App\Policies\PostPolicy;
use App\Policies\TopicPolicy;
use App\Post;
use App\Topic;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Comment::class => CommentPolicy::class,
        Forum::class => ForumPolicy::class,
        Post::class => PostPolicy::class,
        Topic::class => TopicPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gates
        // AdminAccess
        Gate::define('admin-access', function ($user) {
            return $user->hasGroup('admin');
        });
    }
}
