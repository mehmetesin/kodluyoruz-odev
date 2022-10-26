import { React } from "react";

const Card = ({ title, width, align, children }) => {
  return (
    <div
      className="card"
      style={{
        width: width ? `${width}px` : "",
        textAlign: align ? `${align}` : "",
      }}
    >
      <h3>{title}</h3>
      {children}
    </div>
  );
};

export default Card;
