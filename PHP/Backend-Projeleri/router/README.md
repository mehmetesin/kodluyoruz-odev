# Router Sınıfı

* GET, POST, PUT, DELETE Methodlarını kullanabilme.
* Route üzerinde regex ile parametre alabilme.
* Route oluştururken bir callback fonksiyon veya Class@Method çağırabilme.

### **Router**, başlatmak için ;

```php
require_once './router.php';

#prefix : namespace prefix
#controller : Controller dosyalarının bulunduğu klasör

$router = new m_esin\Router([
    'controller' => 'Controller',
    'prefix' => 'm_esin' 
]);

$router->get('/', 'Home@Index');

$router->run();
```

### Callback fonksiyon veya Class@Method çağırabilme
```php
$router->get('/', 'Home@Index');

$router->get('/about', function () {
    echo '<h1>About Page</h1>';
});


```

### Regex ile parametre kullanımı
```php
$router->post('/blog/([0-9]+)', function ($id) {
    echo 'blog id: ' . $id;
});
```

