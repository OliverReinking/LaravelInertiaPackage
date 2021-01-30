<template>
    <div class="max-w-6xl mx-auto pb-32">
        <div class="flex flex-col">
            <div class="h-32">
                <logo class="h-32 w-full object-contain"></logo>
            </div>

            <h1 class="docu-title">Laravel Inertia Package</h1>
            <h2 class="docu-subtitle">
                Implementation documentation
            </h2>

            <h3 class="docu-caption">Basis</h3>
            <div class="docu-text">
                The base is the Laravel Starter Package:
                <a
                    href="https://github.com/OliverReinking/LaravelStarterPackage"
                    class="docu-link"
                    target="_blank"
                    >https://github.com/OliverReinking/LaravelStarterPackage</a
                >
            </div>

            <h3 class="docu-caption">
                Installation of inertia - Server
            </h3>

            <div class="docu-text">
                We now add the following to the existing Laravel Starter
                Package:
            </div>

            <pre class="docu-code">
 composer require inertiajs/inertia-laravel </pre
            >

            <div class="docu-text">Add to the file welcome.blade.php:</div>
            <pre class="docu-code">@inertia </pre>

            <div class="docu-text">
                Now we create a middleware for inertia with:
            </div>

            <pre class="docu-code">php artisan inertia:middleware </pre>

            <div class="docu-text">
                This will create the HandleInertiaRequests.php file in the
                app\Middleware directory. In order for this file to be taken
                into account, we add the following line in Kernel.php:
            </div>

            <pre class="docu-code">
protected $middlewareGroups = [
    'web' => [
    ...
    \App\Http\Middleware\HandleInertiaRequests::class,</pre
            >

            <div class="docu-text">
                In the file HandlerInertialRequest.php the variable $rootView is
                preset with app. I.e. the file app.blade.php is expected in the
                directory resources/views. However, we have the file
                welcome.blade.php here. So we replace app with welcome.
            </div>

            <h3 class="docu-caption">
                Installation of inertia - Client
            </h3>

            <div class="docu-text">Now install the client side extensions:</div>

            <pre class="docu-code">
npm install @inertiajs/inertia --save-dev
npm install @inertiajs/inertia-vue --save-dev</pre
            >

            <div class="docu-text">Now adjust the app.js file:</div>

            <pre class="docu-code">
import Vue from 'vue';

import { InertiaApp, plugin } from '@inertiajs/inertia-vue'
Vue.use(plugin)

const app = document.getElementById('app');

new Vue({
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) =>
                require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);</pre
            >

            <div class="docu-text">
                Finally, the web.php file is changed to:
            </div>

            <pre class="docu-code">
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return Inertia::render('Homepage/Views/Home');
});</pre
            >

            <h3 class="docu-caption">
                Installation of Ziggy
            </h3>

            <h4 class="docu-subcaption">Internet</h4>
            <div class="docu-text">
                <a
                    href="https://github.com/tighten/ziggy"
                    class="docu-link"
                    target="_blank"
                >
                    https://github.com/tighten/ziggy
                </a>
            </div>

            <h4 class="docu-subcaption">Installation</h4>
            <div class="docu-text">
                With the help of Ziggy we can use named routes in Javascript. We
                install:
            </div>

            <pre class="docu-code"> composer require tightenco/ziggy </pre>

            <div class="docu-text">
                Then we add the following to the head section of
                welcome.blade.php:
            </div>

            <pre class="docu-code">@routes</pre>

            <div class="docu-text">
                In the app.js we now add the following:
            </div>

            <pre class="docu-code">
 Vue.mixin({ methods: { route: window.route } }); </pre
            >

            <h3 class="docu-caption">
                Installation of NProgres
            </h3>

            <h4 class="docu-subcaption">Internet</h4>
            <div class="docu-text">
                <a
                    href="https://github.com/inertiajs/progress"
                    class="docu-link"
                    target="_blank"
                    >https://github.com/inertiajs/progress</a
                >
                <br /><a
                    href="https://inertiajs.com/progress-indicators"
                    class="docu-link"
                    target="_blank"
                    >https://inertiajs.com/progress-indicators</a
                >
            </div>

            <div class="docu-text">
                With the help of @inertiajs/progress the wrapper NProgress is
                integrated into the application.
            </div>

            <pre class="docu-code">
 npm install @inertiajs/progress --save-dev </pre
            >

            <div class="docu-text">
                Then we add the following lines to app.js:
            </div>

            <pre class="docu-code">
import { InertiaProgress } from '@inertiajs/progress'
InertiaProgress.init({
    // The delay after which the progress bar will
    // appear during navigation, in milliseconds.
    delay: 250,
    // The color of the progress bar.
    color: '#312E81',
    // Whether to include the default NProgress styles.
    includeCSS: true,
    // Whether the NProgress spinner will be shown.
    showSpinner: false,
}) </pre
            >

            <div class="docu-text">
                We can also setup our own custom page loading:
            </div>

            <pre class="docu-code"> npm install nprogress --save-dev </pre>

            <div class="docu-text">Insert the following in app.js:</div>

            <pre class="docu-code">
import NProgress from "nprogress";
<br>
// inerta progress events
let timeout = null;
// starts progress indicator
Inertia.on("start", () => {
    console.log("34 start");
    timeout = setTimeout(() => NProgress.start(), 250);
});
// observe progress
Inertia.on("progress", event => {
    if (NProgress.isStarted() && event.detail.progress.percentage) {
        NProgress.set((event.detail.progress.percentage / 100) * 0.9);
    }
});
// ends progress indicator
Inertia.on("finish", event => {
    console.log("45 finish");
    clearTimeout(timeout);
    if (!NProgress.isStarted()) {
        return;
    } else if (event.detail.visit.completed) {
        NProgress.done();
    } else if (event.detail.visit.interrupted) {
        NProgress.set(0);
    } else if (event.detail.visit.cancelled) {
        NProgress.done();
        NProgress.remove();
    }
});</pre>

            <h4 class="docu-subcaption">Example</h4>
            <div class="docu-text">Start NProgress</div>
            <div class="docu-text">
                <button @click="startNProgress" class="docu-button">
                    Starte NProgress
                </button>
            </div>

            <div class="docu-text">End NProgress</div>
            <div class="docu-text">
                <button @click="endNProgress" class="docu-button">
                    Beende NProgress
                </button>
            </div>

            <h3 class="docu-caption">
                Installation of Fortify
            </h3>

            <h4 class="docu-subcaption">Internet</h4>
            <div class="docu-text">
                <a
                    href="https://github.com/laravel/fortify"
                    class="docu-link"
                    target="_blank"
                    >https://github.com/laravel/fortify</a
                >
            </div>

            <h4 class="docu-subcaption">Installation</h4>
            <div class="docu-text">First we install the package with:</div>

            <pre class="docu-code">composer require laravel/fortify</pre>

            <div class="docu-text">
                Then we create a configuration file with:
            </div>

            <pre class="docu-code">
php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"</pre
            >

            <div class="docu-text">
                The above command creates files: <br />
                config/fortify.php<br />
                Actions/Fortify/CreateNewUser.php<br />
                Actions/Fortify/PasswordValidationRules.php<br />
                Actions/Fortify/ResetUserPassword.php<br />
                Actions/Fortify/UpdateUserPassword.php<br />
                Actions/Fortify/UpdateUserProfileInformation.php<br />
                Providers/FortifyServiceProvider.php<br />
                databasee/migrations/2014_10_12_200000_add_two_factor_columns_to_users_table.php<br />
            </div>
            <div class="docu-text">
                Now we perform another migration:
            </div>

            <pre class="docu-code">php artisan migrate</pre>

            <div class="docu-text">
                And finally, we adjust the app.php file:
            </div>

            <pre class="docu-code">
'providers' => [
    ...
    App\Providers\FortifyServiceProvider::class,</pre
            >

            <h3 class="docu-caption">
                Authentication
            </h3>

            <div class="docu-text">
                We will now add a login form to the application.
            </div>

            <h4 class="docu-subcaption">Blade Files</h4>

            <div class="docu-text">
                We create the new directory auth under resources/views.
                <br />
                In auth we then create the directory layout and three files
                there:<br />
                footer.blade.php<br />
                layout.blade.php<br />
                logo.blade.php<br />
                <br />
                Under auth we create the files<br />
                <br />
                forgot-password.blade.php<br />
                login.blade.php<br />
                register.blade.php<br />
                reset-password.blade.php<br />
                verify-email.blade.php <br />
            </div>

            <h4 class="docu-subcaption">CSS Files</h4>

            <div class="docu-text">
                Before we include the CSS file for the login mask, we build
                colours into the application.
                <br />
                To do this, we create the subdirectory colourschemes in the less
                directory and the file application.less there.
                <br />
                This file looks like this:
            </div>

            <pre class="docu-code">
#root {
  --primary: theme("colors.indigo.500");
  --primary-light: theme("colors.indigo.300");
  --primary-lighter: theme("colors.indigo.50");
  --primary-dark: theme("colors.indigo.700");
  --on-primary: theme("colors.gray.900");
  --on-primary-dark: theme("colors.gray.100");
  ...
  ...</pre
            >

            <div class="docu-text">
                Since colours are used here that are not available by default in
                tailwindcss, we extend the configuration file tailwind.config.js
                accordingly:
            </div>

            <pre class="docu-code">
theme: {
    extend: {
        colors: {
            coolGray: colors.coolGray,
            violet: colors.violet,
            warmGray: colors.warmGray,
            primary: "var(--primary)",
            "primary-light": "var(--primary-light)",
            "primary-lighter": "var(--primary-lighter)",
            ...
            ...</pre
            >

            <div class="docu-text">
                In the file welcome.blade.php we change the body tag to:
            </div>

            <pre class="docu-code">
&lt;body id="root" class="bg-background text-on-background" v-cloak&gt;</pre
            >

            <div class="docu-text">
                In the directory resources/less/components we create the file:
                auth.less
            </div>

            <div class="docu-text">
                In the file welcome.blade.php we change the body tag to:
            </div>

            <pre class="docu-code">
// import colour schemes
@import "colorschemes/application.less";</pre
            >

            <h4 class="docu-subcaption">FortifyServiceProvider</h4>

            <div class="docu-text">
                After creating the necessary blade files, we now adapt
                FortifyServiceProvider.
            </div>

            <pre class="docu-code">
namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::registerView(function () {
            return view('auth.register');
        });

        Fortify::verifyEmailView(function () {
            return view('auth.verify-email');
        });

        Fortify::loginView(function () {
            return view('auth.login');
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password');
        });

        Fortify::resetPasswordView(function ($request) {
            return view('auth.reset-password', ['request' => $request]);
        });
    }
}
</pre
            >

            <div class="docu-text">
                We now have the following routes, among others: <br />
                /login<br />
                /register<br />
            </div>

            <h4 class="docu-subcaption">Login</h4>

            <div class="docu-text">
                <a href="/login" class="docu-link">Login</a>
            </div>

            <h4 class="docu-subcaption">Register</h4>

            <div class="docu-text">
                <a href="/register" class="docu-link">Register</a>
            </div>

            <h3 class="docu-caption">
                The Applicationswitch
            </h3>

            <div class="docu-text">
                After logging in, I want to direct the user to a specific page.
                To do this, I create the so-called applicationswitch.
            </div>

            <h4 class="docu-subcaption">The necessary routes in web.php</h4>

            <pre class="docu-code">
Route::middleware(['auth'])->group(function () {
    // ---------------------
    // The Applicationswitch
    // ---------------------
    Route::get('/applicationswitch', [ApplicationController::class, 'index'])->name('applicationswitch');
    ...
    ...</pre
            >

            <div class="docu-text">
                The /applicationswitch route is called after login. We achieve
                this by assigning the value applicationswitch to the variable
                HOME in the file RouteServiceProvider.php (in the Providers
                directory):
            </div>

            <pre class="docu-code">
...
public const HOME = '/applicationswitch';
...</pre
            >

            <div class="docu-text">
                And this is what the ApplicationController looks like:
            </div>

            <pre class="docu-code"></pre>

            <div class="docu-text"></div>

            <pre class="docu-code">
php artisan make:migration add_last_login_and_is_manager_to_users --table=users</pre
            >

            <div class="docu-text">We change the created file to:</div>

            <pre class="docu-code">
class AddLastLoginAndIsManagerToUsers extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->boolean('is_admin')->default(false);
            $table->timestamp('last_login_at')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('is_admin');
            $table->dropColumn('last_login_at');
        });
    }
}</pre
            >

            <div class="docu-text">
                Now we create a middleware that checks whether the user is an
                administrator. To do this, we create the file (directory
                middleware) UserIsAdmin:
            </div>

            <pre class="docu-code">
class UserIsAdmin
{
    public function handle($request, Closure $next)
    {
        //dd("UserIsAdmin handle: ", $request, Auth::user());
        if (!Auth::user()->is_admin) {
            Auth::guard('web')->logout();
            return redirect(route('login'));
        }
        //
        return $next($request);
    }
}</pre
            >

            <div class="docu-text">Now we change the Kernel.php file:</div>

            <pre class="docu-code">
protected $routeMiddleware = [
    ...
    'is_admin' => \App\Http\Middleware\UserIsAdmin::class,
    ...</pre
            >

            <div class="docu-text">Now we adapt the web.php file:</div>

            <pre class="docu-code">
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AdminDashboardController;

Route::get('/', function () {
    return Inertia::render('Homepage/Views/Home');
})->name('home');

Route::middleware(['auth'])->group(function () {
    // ---------------------
    // The Applicationswitch
    // ---------------------
    Route::get('/applicationswitch', [ApplicationController::class, 'index'])->name('applicationswitch');
    // -----------------
    // Application Admin
    // -----------------
    Route::middleware(['is_admin'])->group(function () {
        // Dashboard
        Route::get('/admin/dashboard/{name?}', [AdminDashboardController::class, 'admin_index'])->name('admin.dashboard');
    });
    // --------------------
    // Application Customer
    // --------------------
    // Dashboard
    Route::get('/customer/dashboard/{name?}', [CustomerDashboardController::class, 'customer_index'])->name('customer.dashboard');
});
</pre
            >

            <div class="docu-text">
                Now we create two more controllers: the AdminDashboardController
                and the CustomerDashboardController
            </div>

            <div class="docu-text">
                The AdminDashboardController looks like this:
            </div>

            <pre class="docu-code">
namespace App\Http\Controllers;

use Inertia\Inertia;

class AdminDashboardController extends Controller
{
    public function admin_index($name = null)
    {
        return Inertia::render('Admin/Dashboard');
    }
}</pre
            >

            <div class="docu-text">
                Now we create the two Vue files Dashboard.vue. One in the
                directory Pages/Admin and one in the directory Pages/Customer.
            </div>

            <div class="docu-text">
                When we register now, the applicationswitch redirects us to the
                Customer/Dashboard page because the value for is_admin in the
                users table is false.
            </div>

            <div class="docu-text">Now run the following command:</div>

            <pre class="docu-code">
npm run watch
valet link</pre
            >

            <div class="docu-text">
                Then call the following address in the browser:
                <br />
                <a href="http://laravelinertiapackage.test" class="docu-link"
                    >http://laravelinertiapackage.test</a
                >
            </div>
        </div>
    </div>
</template>
<script>
import NProgress from "nprogress";
//
import Logo from "@/js/Pages/Shared/Logo/Logo";
//
export default {
    name: "Home",
    //
    components: {
        Logo
    },
    //
    methods: {
        startNProgress() {
            console.log("startNProgress");
            //
            let timeout = null;
            timeout = setTimeout(() => NProgress.start(), 250);
        },
        endNProgress() {
            console.log("endNProgress");
            //
            NProgress.done();
        }
    }
};
</script>
