import { useState } from 'react'

function Footer({ todos, setTodos, hide, setHide }) {
    // const [select]

    const deleteTodos = () => {
        setTodos(todos.filter(todo => todo.isDone == false));
    };

    const statusShow = (e) => {
        setHide(e.target.id);
    }

    return (
        <footer className="footer">

            <span className="todo-count">
                <strong>{todos.length}</strong>
                items left
            </span>

            <ul className="filters">
                <li>
                    <a className={hide == 'All' ? 'selected' : ''} id="All" onClick={statusShow}>All</a>
                </li>
                <li>
                    <a className={hide == 'Active' ? 'selected' : ''} id="Active" onClick={statusShow}>Active</a>
                </li>
                <li>
                    <a className={hide == 'Completed' ? 'selected' : ''} id="Completed" onClick={statusShow}>Completed</a>
                </li>
            </ul>
            <button className="clear-completed" onClick={deleteTodos}>
                Clear completed
            </button>
        </footer>
    )
}

export default Footer