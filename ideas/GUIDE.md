## VS code plugins
- PHP intelephense
- PHP all-in-one
- Laravel Blade Snippets
- Laravel Extension Pack
- Tailwind CSS Inteliisense

## commands

- `php artisan serve`
- `php artisan make:controller MyController`
- `php artisan migrate`
- `php artisan make:migration tableName`
- `php artisan make:model MyMode`
- `php artisan make:mode Comment -m -c` 
- `php artisan make:controller UserController -r` -- resource controller
- `php artisan storage:link` -- connect storage path with public folder
- `php artisan make:mail WelcomeEmail` - mail class
- `php artisan  make:controller MyInvokableController --invokable` -- invokable controller that contains only one method __invoke and it performs only one action
- `php artisan make:policy IdeaPolicy --model=Idea` -- policies

- `php artisan make:request UpdateUserRequest` -- form request
- `php artisan lang:publish` -- translation folder

## PACKAGES

- composer require barryvdh/laravel-debugbar --dev

## TRANSLATIONS
- make seprate file for each language and add translations in associative array.
- {{ __('fileName.key') }} or {{trans('fileName.key')}} or @lang('filename.key')

## REALTIONS
- One on One
- `One to Many (no pivot table)`
    - relation btw user-posts (one user can have many posts)
    - UserModel
        ```
            function posts()
            {
                return $this->hasMany(Post::class)->latest();
            }
        ```
    - PostModel
        ```
            function users()
            {
                return $this->belongsTo(User::class);
            }
        ```
- `Many to Many (pivot table)`
    - pivot table with alphabetical order first
    - relation btw user likes post (many users can like many posts)
    - pivot table - idea_like (contains user_id, post_id)
    - UserModel
        ```
            function likes()
            {
                return $this->belongsToMany(Idea::class, 'idea_like')->withTimestamps();
            }
        ```
    - PostModel
        ```
            function users()
            {
                return $this->belongsToMany(User::class, 'idea_like')->withTimestamps();
            }
        ```