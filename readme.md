# Laravel/VueJS Flash Alerts

## Installation

1. Run the following command from your project root:

`composer require erikgall/flash-alert`

2. Add the following line to your service providers in your `config/app.php` file:

`EGALL\FlashAlert\FlashAlertServiceProvider::class`

3. In the command line run the following command to publish the assets:

`php artisan vendor:publish --provider FlashAlertServiceProvider`

4. Import the component like such (assuming your are inside your main app.js located at `resources/assets/js`):

```js
 import FlashAlert from './components/flash-alert.vue';
```

5. Add the component to your VueJs components

```js
new Vue({
    el: '#app',
    components: {
        FlashAlert
    }
});
```

6. Add the following line to your main blade layout file. This line must be wrapped in a div#app

```html

<div id="app">
    @include('vendor.flash.alert')
</div>

```

## Usage

The easiest way to use the package is in your controller like so:

```php
class AuthController extends Controller {

    public function login() {

        // Login Success
        alert()->success('You have been successfully signed in.')->autohide(4000);

        return redirect()->to('/users');

    }

}
```
