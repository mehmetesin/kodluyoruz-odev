import React from "react"
import { useTheme } from "../../Context/ThemeContext"
import { useWeather } from "../../Context/WeatherContext"

export const SearchBox = () => {
    const { isDark, toogleTheme, theme } = useTheme()
    const { city, setCity, cities } = useWeather()

    return (
        <div className="wrapper">
            <div>
                <select
                    id="city"
                    className="cities"
                    onChange={(e) => setCity(cities[e.target.value - 1])}
                    value={city.id}
                >
                    {cities.map((c, i) => (
                        <option key={i + c.name} value={c.id}>{c.name}</option>
                    ))}
                </select>
            </div>
            <div>
                <h1> {city.region} / {city.name}</h1>
            </div>
            <button className='switch-theme' onClick={toogleTheme}>{isDark ? 'açık' : 'karanlık'}</button>
            {/* <div className='switch-theme' onClick={() => setIsDark(isDark => !isDark)}>{isDark ? '⚪ açık' : '⚫ karanlık'}</div> */}
        </div>
    )
}
