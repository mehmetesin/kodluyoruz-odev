import { useState } from 'react'
import './App.css';
import Todo from './components/todo/'

function App() {
  const [todo, setTodo] = useState([])
  return (
    <Todo />
  );
}

export default App;
