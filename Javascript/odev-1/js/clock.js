let myName = document.querySelector('#myName');
let myClock = document.querySelector('#myClock');

let userInput = prompt("Lütfen isminizi giriniz");

myName.innerHTML = userInput;

// eğer tek hane ise kontrol edip başına "0" ekle
function fixDigit(digit) {
    return `${digit.toString().length > 1 ? '' : '0'}${digit}`;
};

function showTime() {
    // zaman bilgisinden bize gerekleri parçalayıp al. 
    let date = new Date();
    let hour = date.getHours();
    let minute = date.getMinutes();
    let second = date.getSeconds();
    let day = date.getDay();

    // Günleri yazı ile yazabilmek için bir dizi oluştur
    let days = ["Pazar", "Pazartesi", "Salı", "Çarşamba", "Perşembe", "Cuma", "Cumartesi"]

    // myClock ID li elementte gösterilecek zamanı istenilen formata göre hazırla
    time = `${fixDigit(hour)}:${fixDigit(minute)}:${fixDigit(second)} ${days[day]}`;
    
    myClock.innerHTML = time;

    // her saniyede tekrarla
    setTimeout(showTime, 1000);
};

showTime();