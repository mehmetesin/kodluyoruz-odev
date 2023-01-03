
## Ödev 5 Kendi Web Sunucumuz

```js
const htpp = require('http');

const server = htpp.createServer((reg, res)=>{
    const url = reg.url;
    
    switch (url) {
        case '/':
            res.writeHead(200, {"Content-Type": "text/html; charset=utf-8"});
            res.write(`<h2>Index sayfasına hoşgeldiniz</h2>`)
            break;
    
        case '/hakkimda':
            res.writeHead(200, {"Content-Type": "text/html; charset=utf-8"});
            res.write(`<h2>Hakkımda sayfasına hoşgeldiniz</h2>`)
            break;
    
        case '/iletisim':
            res.writeHead(200, {"Content-Type": "text/html; charset=utf-8"});
            res.write(`<h2>İletişim sayfasına hoşgeldiniz</h2>`)
            break;
    
        default:
            res.writeHead(404, {"Content-Type": "text/html; charset=utf-8"});
            res.write('<h2>404 Sayfa bulunamadı!</h2>')
            break;
    }
    
    res.end();
});

const port = 5000;

server.listen(port,()=>{
    console.log(`sunucu ${port} portunu dinlemeye başladı`);
})

```

