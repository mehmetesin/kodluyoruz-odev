//Dairenin Alanı = π x r2 
function circleArea(radius) {
    const pi = Math.PI
    return pi * Math.pow(radius, 2)
}

let radius = process.argv[2]
let area = circleArea(radius)
console.log(`Yarıçapı (${radius}) olan dairenin alanı: (${area})`);