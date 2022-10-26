import React, { useState } from "react";
import { useTheme } from "./Context/ThemeContext";
import { WeatherProvider } from "./Context/WeatherContext";
import { SearchBox } from "./component/SearchBox";
import WeeklyWeather from "./component/WeeklyWeather";

document.title = 'Hava Durumu'

const App = () => {
  const { isDark, toogleTheme, theme } = useTheme()

  return (
    <div className={isDark ? 'App dark' : 'App'}>
      <div className="container">
        <WeatherProvider>
          <SearchBox />
          <WeeklyWeather />
        </WeatherProvider >
      </div>
    </div>
  );
};

export default App;
