import React, { useState, useEffect } from 'react'
import Form from './Form'
import List from './List'
import Footer from './Footer'

function Todo() {
    const [todos, setTodos] = useState(JSON.parse(localStorage.getItem('todos')));
    const [hide, setHide] = useState('All');

    useEffect(() => {
        // console.log('todo listesi değişti', todos.length);
        localStorage.setItem('todos', JSON.stringify(todos));
    }, [todos]);

    return (
        <section className="todoapp">
            <Form setTodos={setTodos} todos={todos} />
            <List todos={todos} setTodos={setTodos} hide={hide} setHide={setHide} />
            <Footer todos={todos} setTodos={setTodos} hide={hide} setHide={setHide} />
        </section>
    )
}

export default Todo