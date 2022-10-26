import { useWeather } from "../../Context/WeatherContext";
import Card from "../Card";

const WeeklyWeather = () => {
  const { weekly, days } = useWeather();
  return (
    <div className="wrapper">
      {(weekly &&
        weekly.daily.map((dayWeather, i) => (
          <Card key={i}>
            <div className="date"><span>{new Date(dayWeather.dt * 1000).toLocaleDateString()}</span></div>
            <h3>{days[new Date(dayWeather.dt * 1000).getDay()]}</h3>
            <div className="main-temp-text">{dayWeather.temp.day}°</div>
            <div>
              <img
                src={`http://openweathermap.org/img/wn/${dayWeather.weather[0].icon}@2x.png`}
                // // src={`https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/${dayWeather.weather[0]["icon"]
                //   }.svg`}
                alt={dayWeather.weather[0].description}
              />
            </div>
            <div className="description">
              {dayWeather.weather[0].description}
            </div>
            <div>
              <span className="temp-text">
                {dayWeather.temp.min}° /{" "}
              </span>
              <span className="temp-text">{dayWeather.temp.max}°</span>
            </div>
          </Card>
        ))) || <h2>Yükleniyor...</h2>}
    </div>
  );
};

export default WeeklyWeather;
