
## Ödev 6 - Koa.js ile Web Sunucusu Yazımı

```js
const Koa = require('koa');
const app = new Koa();

const port= 3000;

app.use(ctx => {
  
  switch (ctx.path) {
    case '/':
        ctx.body = `<h1>Index sayfasına hoşgeldiniz</h1>`;
        break;
  
    case '/hakkimda':
        ctx.body = `<h1>Hakkımda sayfasına hoşgeldiniz</h1>`;
        break;
  
    case '/iletisim':
        ctx.body = `<h1>İletişim sayfasına hoşgeldiniz</h1>`;
        break;
  
    default:
        ctx.body = `<h1>404 sayfa bulunamadı</h1>`;
        break;
  }
});

app.listen(port,()=>{
    console.log(`Sunucu ${port} ile çalışmaya başladı.`);
});
```

