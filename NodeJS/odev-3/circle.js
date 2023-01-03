const circleArea = (radius) => {
    const pi = Math.PI
    return pi * Math.pow(radius, 2)
}

const circleCircumference = (radius) => {
    const pi = Math.PI
    return 2 * pi * radius
}


module.exports = {
    circleArea,
    circleCircumference
}