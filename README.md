# prototurk-mvc

Bu çatı, prototurk için videolu eğitimlerde hazırlanmaktadır. Henüz tamamlanmadı, bir şeyler söylemek için çok erken ancak tamamlandığı kadarıyla dökümanlamak gerektiğini düşünerek başlıyoruz.

## Kurulum

Repoyu bilgisayarınıza klonlayın.

```
git clone https://github.com/tayfunerbilen/prototurk-mvc.git prototurk-mvc
```

Gerekli bağımlılıkları ve ayarları yükleyin
```
composer install && composer update
```
`.env.example` dosyasını `.env` adıyla kopyalayın ve içindeki bilgileri kendinize göre doldurun
```
BASE_PATH=/prototurk-mvc
```

## Rota - Route

En temel olarak bir rota şöyle tanımlanır

```php
Route::get('/', function(){
    return 'homepage';
});
```

#### Rota Metodları

Şu an için sadece `get()` ve `post()` olsa da zamanla çoğalacak.

```php
Route::get($uri, $callback);
Route::post($uri, $callback);
```

#### Parametreli Rotalar

```php
Route::get('user/:id/:url', function($userId, $userUrl){
    return 'User id = ' . $userId . '<br> User url = ' . $userUrl;
});
```

#### `name()` Metodu

Rotalarınızı adlandırarak daha sonra ilgili isimle url'lerinizi oluşturabilirsiniz.

```php
Route::get('/user/:id', function($id){
    //
})->name('user');

echo route('user', ['id' => 5]);
# /user/5
```

#### `prefix()` ve `group()` Metodları
Belli bir önek ile rotalarınızı gruplayabilirsiniz. Örneğin `admin/` altındaki tüm rotalarınızı tek bir grupta toplayabilirsiniz.

```php
Route::prefix('/admin')->group(function(){
    Route::get('/?', function(){
        # /admin ile eşleşir
    });
    Route::get('/users', function(){
        # /admin/users ile eşleşir
    });
});
```

#### `where()` Metodu
Özel parametre belirtmek için bu metodu kullanabilirsiniz.
```php
# /@tayfunerbilen
Route::get('/@:username', function($username){
    return 'Üye = ' . $username;
})->where('username', '[a-z]+');
```
Bir başka örnek
```php
# /search/kelime
Route::get('/search/:keyword', function($keyword){
    return 'Aranan kelime = ' . rawurldecode($keyword);
})->where('keyword', '.*');
```

#### `redirect()` Metodu
Gelen bir isteği başka bir rotaya yönlendirmek için kullanabilirsiniz. Örneğin;

```php
Route::redirect('/php-dersleri', '/php', 301);
```

#### Controller ile kullanımı

```php
Route::get('/', 'Home@index');
# App/Controllers/Home.php altında index metodunu çağırır
```

## Yardımcı Fonksiyonlar

Projenin genelinde global olarak kullanileceğiniz yardımcı fonksiyonlar.

```php
view($name, $data = []);
model($name);
route($name, $params = []);
url($name, $params = []);
```