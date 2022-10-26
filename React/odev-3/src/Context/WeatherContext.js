import axios from "axios";
import { createContext, useEffect, useState, useContext } from "react";
import { cities } from "../Data/CityList";

const WeatherContext = createContext();

const api = {
  key: process.env.REACT_APP_API_KEY,
  weatherUrl: process.env.REACT_APP_WEATHER_API_URL,
};

const days = [
  "Pazar",
  "Pazartesi",
  "Salı",
  "Çarşamba",
  "Perşembe",
  "Cuma",
  "Cumartesi",
];

const WeatherProvider = ({ children }) => {
  const [weekly, setWeekly] = useState();
  const [city, setCity] = useState(cities[45]);

  const values = {
    weekly,
    setWeekly,
    days,
    city,
    setCity,
    cities
  };

  const getWeather = async () => {
    try {
      await axios
        .get(
          `${api.weatherUrl}?lat=${city.latitude}&lang=tr&lon=${city.longitude}&exclude=minutely,hourly&units=metric&appid=${api.key}`
        )
        .then((res) => setWeekly(res.data));
    } catch (error) {
      console.log("Günlük hava durumu alınamadı!");
    }
  };


  useEffect(() => {
    city && getWeather()
  }, [city]);

  //   console.log(weather);
  return (
    <WeatherContext.Provider value={values}>{children}</WeatherContext.Provider>
  );
};

const useWeather = () => useContext(WeatherContext);
export { useWeather, WeatherProvider };
