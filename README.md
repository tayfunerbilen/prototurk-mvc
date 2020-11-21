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

#### Adlandırılmış Rotalar

Rotalarınızı adlandırarak daha sonra ilgili isimle url'lerinizi oluşturabilirsiniz.

```php
Route::get('/user/:id', function($id){
    //
})->name('user');

echo route('user', ['id' => 5]);
# /user/5
```

#### Rota Öneki (prefix) ve Gruplama
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

#### Controller kullanımı

```php
Route::get('/', 'Home@index');
# App/Controllers/Home.php altında index metodunu çağırır
```