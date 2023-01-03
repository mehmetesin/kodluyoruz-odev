const fs = require('fs');

const file = 'employees.json';

const createFile = file => {
    fs.writeFile(file, '{ "name": "Employee 1 Name", "salary": 2000 }', 'utf8', (err) => {
        if (err) console.log(err);
        console.log(`${file} dosyası oluşturuldu`);
    })
}

const readFile = file => {
    fs.readFile(file, 'utf8', (err, data) => {
        if (err) console.log(err);
        console.log(`${file} dosyasının içeriği; \n\n ${data}`);
    })
}

const appendFile = file => {
    fs.appendFile(file, ',\n{ "name": "yeni veri", "salary": 9999 }', 'utf8', (err) => {
        if (err) console.log(err);
        console.log(`${file} dosyası güncellendi`);
    })
}

const removeFile = file => {
    fs.unlink(file, (err) => {
        if (err) console.log(err);
        console.log(`${file} dosyası silindi`);
    })
}
// createFile(file);
// readFile(file);
// appendFile(file)
// removeFile(file)